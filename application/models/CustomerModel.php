<?php
class CustomerModel extends CI_Model{


	public function __construct(){
		parent::__construct();
		 $this->load->database();
     }

     public function getAll(){
         $result = $this->db->get("customers");
         return $result->result_array();
     }

}
     
?>