<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dispositivos_model extends CI_Model {

   public function getDispositivos(){
      $this->db->where("device_estado","1");
      $resultados = $this->db->get("devices");
      return $resultados->result();
   }

   public function getDispositivo($id){
      $this->db->where("device_id",$id);
      $resultado = $this->db->get("devices");
      return $resultado->row();
   }

   public function save($data){
      return $this->db->insert("devices",$data);
   }

   public function update($id,$data){
      $this->db->where("device_id",$id);
      return $this->db->update("devices",$data);
   }

   public function delete($id){
      $this->db->where("device_id",$id);
      return $this->db->delete("devices");
   }



}