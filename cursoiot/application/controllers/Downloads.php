<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Downloads extends CI_Controller {

  public function __construct()
	{
		parent:: __construct();
 
	}


  public function index()
	{
 
    $this->load->view('downloads/header');
    $this->load->view('downloads/body');
    $this->load->view('downloads/footer');
		
	}

}

