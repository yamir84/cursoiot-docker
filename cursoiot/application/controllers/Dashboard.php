<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

  public function __construct()
	{
		parent:: __construct();
    $this->load->model("Dispositivos_model");
    if (!$this->session->userdata("login")) {
			redirect(base_url());
		}

	}


  public function index()
	{
    $data = array(

      'dispositivos' => $this->Dispositivos_model->getDispositivos(),

    );
  	$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('dashboard',$data);
		$this->load->view('layouts/footer');
	}

}
