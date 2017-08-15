<?php if (!defined('BASEPATH'))	exit('No direct script access allowed');

/**
 *
 */
class Mactivity extends CI_Model {

	function listactivity() {
		$query = $this -> db -> get("activity");
		return $query->result_array() ;
		
	}
	function activity($id) {
		$this->db->where('id',$id);
		$query = $this -> db -> get("activity");
		return $query->result_array() ;
	}
	function activitydate($date) {
		//$this->db->where('start >='.$date.' AND end <= '.$date, NULL, FALSE);
		$this->db->where('start <=', $date);
		$this->db->where('end >=', $date);
		$query = $this -> db -> get("activity");
		return $query->result_array() ;
	}
	public function update($data)
	{
		$this->db->where('id',$data['id']);
		$this->db->update('activity',$data);		
	}
	public function del($data)
	{
		$this->db->where('id', $data);
		$this->db->delete('activity');
	}
}