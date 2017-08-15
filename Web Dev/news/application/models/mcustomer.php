<?php if (!defined('BASEPATH'))	exit('No direct script access allowed');

/**
 *
 */
class Mcustomer extends CI_Model {
	
        function listcustomer() {
		$query = $this -> db ->order_by("id","desc")-> get("customer");        
		return $query->result_array();
	}
        
	function customer($id) {
		$this->db->where('id',$id);
		$query = $this -> db -> get("customer");
		return $query->result_array() ;
	}
        
        function customer_by_email($email) {
		$this->db->where('email',$email);
		$query = $this -> db -> get("customer");
		return $query->result_array() ;
	}
        
	public function customer_insert($data) {
		$this->db->insert('customer',$data) ;
	}
        
	public function customer_update($data)
	{
		$this->db->where('id',$data['id']);
		$this->db->update('customer',$data);
	}
        
	public function customer_del($data) {
		$this->db->where('id', $data);
		$this->db->delete('customer');
	}
        
        public function checklogin($data)
	{
		$this->db->where('email',$data['email']);
		$this->db->where('password',$data['password']);
		$query = $this -> db -> get("customer");
		return $query->result_array();
	}
}