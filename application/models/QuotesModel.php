<?php
class QuotesModel extends CI_Model{

  private $table_name='quotes';

	public function __construct(){
		parent::__construct();
		 $this->load->database();
     }

     public function getAll(){
        $this->db->order_by('rand()');
        $this->db->limit(1);
        $query = $this->db->get($this->table_name);
       return $query->result_array();
     }

     public function getOpt($val){
        $this->db->order_by('rand()');
        $this->db->limit($val);
        $query = $this->db->get($this->table_name);
       return $query->result_array();
     }
     public function getByCategory($val){
        $this->db->order_by('rand()');
        $this->db->limit(1);
        $this->db->where(array('category'=>$val));
        $query = $this->db->get($this->table_name);
       return $query->result_array();
     }

     function add($data)
    {
        $this->db->insert($this->table_name, $data);
        if($this->db->affected_rows()>=1)
         {
             return true;
         }
         else
         {
             return false;
         }
    }

}
     
?>