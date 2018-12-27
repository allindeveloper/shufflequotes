<?php
class CategoryModel extends CI_Model{

  private $table_name='category';

	public function __construct(){
		parent::__construct();
		 $this->load->database();
     }

     public function getAll(){
       $query = $this->db->get($this->table_name);
       return $query->result_array();
     }

  

}
     
?>