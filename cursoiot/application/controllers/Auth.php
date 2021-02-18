<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Users_model");
		
	}


	public function index()
	{
			if ($this->session->userdata("login")) {
			$this->session->set_flashdata("info","Bienvenido de nuevo al Curso de IOT con ESP32 de CubaElectronica!!!");
			redirect(base_url()."dashboard");
		}
		else{
			$this->load->view("login");
		}
	}

	public function login(){
		$correo = $this->input->post("correo");
		$password = $this->input->post("password");
		$res = $this->Users_model->login($correo, sha1($password));

		if (!$res) {
			$this->session->set_flashdata("error","El usuario y/o contraseña son incorrectos, intente de nuevo!");
			
		    redirect(base_url());
			//echo "$correo";
                       
		}
		else{
			$user_id = $res->user_id;
			$user_date = $res->user_date;
			$user_email = $res->user_email;
			$data  = array(
				'user_id' => $user_id,
				'user_date' => $user_date,
				'user_email' => $user_email,
				'login' => TRUE
			);

					$this->session->set_userdata($data);
					$this->session->set_flashdata("info","Bienvenido al Curso de IOT con ESP32 de CubaElectronica!!!");
		      redirect(base_url()."dashboard");
		}
	}

  //Cerrar Seccion de Usuario
	public function logout(){
		        $this->session->sess_destroy();
				    redirect(base_url());
	}


}
