<?php if (!defined('BASEPATH'))	exit('No direct script access allowed');

/**
 *
 */
class Mnews extends CI_Model {

	function listnews() {
		$query = $this -> db ->order_by("id","desc")-> get("news");
		return $query->result_array() ;
		
	}
	
	function listnews_filter_limit($filter,$from) {
		$query = $this -> db ->where("type_news ='".$filter."'")->order_by("id","desc")->limit($from)-> get("news");
		return $query->result_array() ;
		
	}
	
	function news($id) {
		$this->db->where('id',$id);
		$query = $this -> db -> get("news");
		return $query->result_array() ;
	}
	public function news_insert($data) {
		$this->db->insert('news',$data);
	}
	public function news_update($data)
	{
		$this->db->where('id',$data['id']);
		$this->db->update('news',$data);
	}
	public function news_del($data) {
		$this->db->where('id', $data);
		$this->db->delete('news');
	}


}
