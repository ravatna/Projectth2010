<?php if (!defined('BASEPATH'))	exit('No direct script access allowed');

/**
 *
 */
class Mregister extends CI_Model {

	function listregister() {
		$query = $this -> db ->order_by("id","desc")-> get("register");
                
		return $query->result_array() ;
		
	}
	function register($id) {
		$this->db->where('id',$id);
		$query = $this -> db -> get("register");
		return $query->result_array() ;
	}
	public function register_insert($data) {
		$this->db->insert('register',$data);
	}
	public function register_update($data)
	{
		$this->db->where('id',$data['id']);
		$this->db->update('register',$data);
	}
	public function register_del($data) {
		$this->db->where('id', $data);
		$this->db->delete('register');
	}


}
