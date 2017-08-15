<?php if (!defined('BASEPATH'))	exit('No direct script access allowed');

/**
 *
 */
class Mpricetoday extends CI_Model {
	
	public function add()
	{
		
	}
	public function getdata()
	{
		$query = $this -> db -> get("pricetoday");
		return $query->result_array() ;
	}
	public function updatedata($data)
	{
		$this->db->where('id',$data['id']);
		$this->db->update('pricetoday',$data);		
	}
	public function prepare()
	{
		$this->db->select("id, code, unlock_code, uses_remaining");
		$this->db->from('rw_promo_code');
		$query = $this -> db -> get();
		return $query->result_array();
	}
}