<?php
class QuotesModel extends CI_Model{


	public function __construct(){
		parent::__construct();
		 $this->load->database();
     }

     public function getAll(){
        $this->db->order_by('rand()');
        $this->db->limit(1);
        $query['results'] = $this->db->get('quotes');
       return $query->result_array();
     }

     public function getOpt($val){
        $this->db->order_by('rand()');
        $this->db->limit($val);
        $query['results'] = $this->db->get('quotes');
       return $query->result_array();
     }

}
     
?>