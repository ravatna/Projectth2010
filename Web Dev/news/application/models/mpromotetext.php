<?php if (!defined('BASEPATH'))	exit('No direct script access allowed');

/**
 *
 */
class Mpromotetext extends CI_Model {

	function listpromotetext() {
		$query = $this -> db -> get("promote_text");
		return $query->result_array() ;
		
	}
	function promotetext($id) {
		$this->db->where('id',$id);
		$query = $this -> db -> get("promotion_text");
		return $query->result_array() ;
	}
	 
	public function update($data)
	{
		$this->db->where('id',$data['id']);
		$this->db->update('promotion_text',$data);		
	}
	public function del($data)
	{
		$this->db->where('id', $data);
		$this->db->delete('promotion_text');
	}
}