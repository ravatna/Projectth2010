<?php if (!defined('BASEPATH'))	exit('No direct script access allowed');

/**
 *
 */
class Mcarbrand extends CI_Model {

	function listcarbrand() {
		$query = $this -> db -> get("carbrand");
		return $query->result_array() ;
		
	}
	function carbrand($id) {
		$this->db->where('id',$id);
		$query = $this -> db -> get("carbrand");
		return $query->result_array() ;
	}
	public function carbrand_insert($data) {
		$this->db->insert('carbrand',$data);
	}
	public function carbrand_update($data)
	{
		$this->db->where('id',$data['id']);
		$this->db->update('carbrand',$data);
	}
	public function carbrand_del($data) {
		$this->db->where('id', $data);
		$this->db->delete('carbrand');
	}


}
