<?php if (!defined('BASEPATH'))	exit('No direct script access allowed');

/**
 *
 */
class Mdeposit extends CI_Model {

	function listdeposit() {
		$query = $this -> db ->order_by("id","desc")-> get("deposit");
                
		return $query->result_array() ;
		
	}
	function deposit($id) {
		$this->db->where('id',$id);
		$query = $this -> db -> get("deposit");
		return $query->result_array() ;
	}
	public function deposit_insert($data) {
		$this->db->insert('deposit',$data);
	}
	public function deposit_update($data)
	{
		$this->db->where('id',$data['id']);
		$this->db->update('deposit',$data);
	}
	public function deposit_del($data) {
		$this->db->where('id', $data);
		$this->db->delete('deposit');
	}


}
