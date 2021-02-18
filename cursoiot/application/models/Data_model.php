<?php
defined('BASEPATH') OR exit('No direct script addess allowed');

class Data_model extends CI_Model {

   public function getData($fechainicio, $fechafin, $idDevice){
   
      $this->db->select("d.*, n.device_nombre as nombre");
      $this->db->select("d.*, s.device_serie as serie");
      $this->db->from("data d");
      $this->db->join("devices n" , "d.data_device_id = n.device_id");
      $this->db->join("devices s" , "d.data_device_id = s.device_id");
      $this->db->where("d.data_date >=", $fechainicio);  
      $this->db->where("d.data_date <=", $fechafin);
      $this->db->where("d.data_device_id",$idDevice);
      $resultados = $this->db->get();
      return $resultados->result();

   }

   public function getDatos($fecha_inicio, $fecha_fin, $dispositivo_serial, $variable){

       if ($variable == "WIFI-db") {
         $this->db->select("d.*, s.device_serie as serie");
         $this->db->select("d.data_date as mes, d.data_wifi as monto");
         $this->db->from("data d");
         $this->db->join("devices s" , "d.data_device_id = s.device_id");
         $this->db->where("d.data_date >=",$fecha_inicio);
         $this->db->where("d.data_date <=",$fecha_fin);
         $this->db->where("d.data_device_id = $dispositivo_serial");
         $consulta = $this->db->get();
         return $consulta->result();
       }elseif ($variable == "TEMP-CPU") {
         $this->db->select("d.*, s.device_serie as serie");
         $this->db->select("d.data_date as mes, d.data_temp_cpu as monto");
         $this->db->from("data d");
         $this->db->join("devices s" , "d.data_device_id = s.device_id");
         $this->db->where("d.data_date >=",$fecha_inicio);
         $this->db->where("d.data_date <=",$fecha_fin);
         $this->db->where("d.data_device_id = $dispositivo_serial");
         $consulta = $this->db->get();
         return $consulta->result();
       }elseif ($variable == "TEMP-EXT") {
         $this->db->select("d.*, s.device_serie as serie");
         $this->db->select("d.data_date as mes, d.data_temp_dht as monto");
         $this->db->from("data d");
         $this->db->join("devices s" , "d.data_device_id = s.device_id");
         $this->db->where("d.data_date >=",$fecha_inicio);
         $this->db->where("d.data_date <=",$fecha_fin);
         $this->db->where("d.data_device_id = $dispositivo_serial");
         $consulta = $this->db->get();
         return $consulta->result();
       }elseif ($variable == "HUM-EXT") {
         $this->db->select("d.*, s.device_serie as serie");
         $this->db->select("d.data_date as mes, d.data_hum_dht as monto");
         $this->db->from("data d");
         $this->db->join("devices s" , "d.data_device_id = s.device_id");
         $this->db->where("d.data_date >=",$fecha_inicio);
         $this->db->where("d.data_date <=",$fecha_fin);
         $this->db->where("d.data_device_id = $dispositivo_serial");
         $consulta = $this->db->get();
         return $consulta->result();
       }elseif ($variable == "IND-EXT") {
         $this->db->select("d.*, s.device_serie as serie");
         $this->db->select("d.data_date as mes, d.data_ind_dht as monto");
         $this->db->from("data d");
         $this->db->join("devices s" , "d.data_device_id = s.device_id");
         $this->db->where("d.data_date >=",$fecha_inicio);
         $this->db->where("d.data_date <=",$fecha_fin);
         $this->db->where("d.data_device_id = $dispositivo_serial");
         $consulta = $this->db->get();
         return $consulta->result();
       }elseif ($variable == "TODAS") {
         $this->db->select("d.*, s.device_serie as serie");
         $this->db->select("d.data_date as fechas, d.data_wifi as wifi, d.data_temp_cpu as cpu, d.data_temp_dht as temp, d.data_hum_dht as hum, d.data_ind_dht as ind");
         $this->db->from("data d");
         $this->db->join("devices s" , "d.data_device_id = s.device_id");
         $this->db->where("d.data_date >=",$fecha_inicio);
         $this->db->where("d.data_date <=",$fecha_fin);
         $this->db->where("d.data_device_id = $dispositivo_serial");
         $consulta = $this->db->get();
         return $consulta->result();
       }

   }

   
}