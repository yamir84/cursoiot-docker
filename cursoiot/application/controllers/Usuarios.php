<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

   public function __construct()
	{
		parent:: __construct();

        $this->load->model("Users_model");

		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}

	}


  public function index(){

    $data = array(

	    'usuarios' => $this->Users_model->getUsuarios(),

	);
		$this->load->view("layouts/header");
		$this->load->view('layouts/sidebar');
		$this->load->view("admin/list",$data);
		$this->load->view("layouts/footer");
	}

  	public function store(){
	    
	    $nombre = $this->input->post("nombre");
	    $correo = $this->input->post("correo");
		$contraseña = $this->input->post("password");

		$data = array(
			'user_nombre' => $nombre,
			'user_email' => $correo,
			'user_password' => sha1($contraseña),
			'user_estado'=> 1
			);

   		if ($this->Users_model->save($data)) {
   		   $this->session->set_flashdata("info","Usted registro un nuevo Usuario! :)");
           redirect(base_url()."usuarios");
		}
	}

	public function edit($id){
		$data = array(
			'usuario' => $this->Users_model->getUsuario($id),
   		);

		$this->load->view("layouts/header");
		$this->load->view('layouts/sidebar');
		$this->load->view("admin/edit",$data);
		$this->load->view("layouts/footer");
	}

	public function update()
	{
		$id = $this->input->post("id");
	    $nombre = $this->input->post("nombre");
		$correo = $this->input->post("correo");
		$password = $this->input->post("password");

		if ($id == 1) {

			$this->session->set_flashdata("error","Usted no esta autorizado para editar este Usuario! :)");
		    redirect(base_url()."usuarios");
	
			
		}else{

				if ($password != '') {
	        	$data = array(
					'user_nombre' => $nombre,
				    'user_email' => $correo,
				    'user_password' => sha1($password),
				    'user_estado' => 1
		      	);
		        }else{
		        	$data = array(
					    'user_nombre' => $nombre,
						'user_email' => $correo,
						'user_estado' => 1
			      	);
		        }

		 		if ($this->Users_model->update($id,$data)) {
		 		   $this->session->set_flashdata("success","Usuario actualizado correctamente! :)");
		           redirect(base_url()."usuarios");
				}

		}
        
		
	}

	public function delete($id){

		if ($id == 1){
		   $this->session->set_flashdata("error","Usted no esta autorizado para eliminar este Usuario! :)");
		   redirect(base_url()."usuarios");

		}else{

			$data = array(
			'user_estado' => 0,
		    );

		}
		

		$this->Users_model->update($id,$data);
		$this->session->set_flashdata("warning","Usuario eliminado correctamente! :(");
		redirect(base_url()."usuarios");
	}
  
	


}