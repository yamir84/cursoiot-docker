<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Broker extends CI_Controller {
   public function __construct()
	{
		parent:: __construct();

		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}

	}


    public function index(){

    	$this->load->view("layouts/header");
		$this->load->view('layouts/sidebar');
		$this->load->view("broker/view");
		$this->load->view("layouts/footer");
		
	}


	public function publish(){

    	$this->load->view("layouts/header");
		$this->load->view('layouts/sidebar');
		$this->load->view("broker/publish");
		$this->load->view("layouts/footer");
		
	}

  	

}