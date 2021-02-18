<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {

   public function login($correo, $password){
      $this->db->where("user_email", $correo);
      $this->db->where("user_password", $password);
      $resultados = $this->db->get("user");

      if ($resultados->num_rows() > 0) {
         return $resultados->row();
      }
      else{
         return false;
      }
   }

   public function getUsuarios(){
      $this->db->where("user_estado","1");
      $resultados = $this->db->get("user");
      return $resultados->result();
   }

   public function getUsuario($id){
      $this->db->where("user_id",$id);
      $resultado = $this->db->get("user");
      return $resultado->row();
   }

   public function save($data){
      return $this->db->insert("user",$data);
   }

   public function update($id,$data){
      $this->db->where("user_id",$id);
      return $this->db->update("user",$data);
   }

   public function delete($id){
      $this->db->where("user_id",$id);
      return $this->db->delete("user");
   }



}
