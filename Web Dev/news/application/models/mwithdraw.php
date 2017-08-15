<?php if (!defined('BASEPATH'))	exit('No direct script access allowed');

/**
 *
 */
class Mwithdraw extends CI_Model {

	function listwithdraw() {
		$query = $this -> db ->order_by("id","desc")-> get("withdraw");
                
		return $query->result_array() ;
		
	}
	function withdraw($id) {
		$this->db->where('id',$id);
		$query = $this -> db -> get("withdraw");
		return $query->result_array() ;
	}
	public function withdraw_insert($data) {
		$this->db->insert('withdraw',$data);
	}
	public function withdraw_update($data)
	{
		$this->db->where('id',$data['id']);
		$this->db->update('withdraw',$data);
	}
	public function withdraw_del($data) {
		$this->db->where('id', $data);
		$this->db->delete('withdraw');
	}


}
