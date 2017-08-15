<?php if (!defined('BASEPATH'))	exit('No direct script access allowed');

/**
 *
 */
class Mimg extends CI_Model {
	
	public function memberlogin($data)
	{
		$this->db->where('username',$data['username']);
		$this->db->where('password',$data['password']);
		$query = $this -> db -> get("member");
		return $query->result_array();
	}
}