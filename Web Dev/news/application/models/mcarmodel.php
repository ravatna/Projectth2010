<?php if (!defined('BASEPATH'))	exit('No direct script access allowed');

/**
 *
 */
class Mcarmodel extends CI_Model {

	function listcarmodel() {
		$query = $this -> db -> get("carmodel");
		return $query->result_array() ;
		
	}
        
	function listcarmodel_byid($brand_id) {
		$query = $this -> db -> get("carmodel");
                $this->db->where('carbrand_id',$brand_id);
		return $query->result_array() ;
		
	}
        
	function carmodel($id,$brand_id) {
		$this->db->where('id',$id)->where('carbrand_id',$brand_id);
		$query = $this -> db -> get("carmodel");
		return $query->result_array() ;
	}
        
	public function carmodel_insert($data) {
		$this->db->insert('carmodel',$data);
	}
	public function carmodel_update($data)
	{
		$this->db->where('id',$data['id']);
		$this->db->update('carmodel',$data);
	}
	public function carmodel_del($data) {
		$this->db->where('id', $data);
		$this->db->delete('carmodel');
	}


}
