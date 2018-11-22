<?php
class QuotesModel extends CI_Model{


	public function __construct(){
		parent::__construct();
		 $this->load->database();
     }

     public function getAll(){
         $result = $this->db->get("quotes");
         return $result->result_array();
     }

}
     
?>