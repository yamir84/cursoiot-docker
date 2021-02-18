<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Data_model");
		$this->load->model("Dispositivos_model");

		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		
	}


	public function index()
	{   
		$fechainicio = $this->input->post("fechainicio");
        $fechafin = $this->input->post("fechafin");
        $idDevice = trim($this->input->post("idDevice"));


        if ($this->input->post("fechainicio") && ($idDevice != "Dispositivos")) {

        	/*    var_dump($fechainicio);
		        var_dump($fechafin);
		        var_dump($idDevice);

		        die(); */

				$data = array(

			        'data' => $this->Data_model->getData($fechainicio, $fechafin, $idDevice),
			        'dispositivos' => $this->Dispositivos_model->getDispositivos(),
			        'fechainicio' => $fechainicio,
	                'fechafin' => $fechafin,
	                'idDevice' => $idDevice,
					
			    );

		}else {

	            $data = array(
	             
	                'dispositivos' => $this->Dispositivos_model->getDispositivos(),

		        );

		       if ($this->input->post("fechainicio")){

		       	  $this->session->set_flashdata("error","Tiene que seleccionar un Dispositivo!!");

		       } 
		        
	    }
		

	    $this->load->view("layouts/header");
		$this->load->view('layouts/sidebar');
		$this->load->view("graficas/list",$data);
		$this->load->view("layouts/footer");
	}

	public function graficas()
	{   
		

        $data = array(
         
            'dispositivos' => $this->Dispositivos_model->getDispositivos(),

        );

	    $this->load->view("layouts/header");
		$this->load->view('layouts/sidebar');
		$this->load->view("graficas/graf",$data);
		$this->load->view("layouts/footer");

	}

	public function getDato(){

            $dispositivo_serial = $this->input->post("device_serial");
            $fecha_inicio = $this->input->post("fecha_inicio");
            $fecha_fin = $this->input->post("fecha_fin");
            $variable = $this->input->post("variable");
            $resultado = $this->Data_model->getDatos($fecha_inicio, $fecha_fin, $dispositivo_serial, $variable);
            echo json_encode($resultado);

    }



}
