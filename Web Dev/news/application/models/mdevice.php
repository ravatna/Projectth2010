<?php if (!defined('BASEPATH'))	exit('No direct script access allowed');

/**
 *
 */
class Mdevice extends CI_Model {
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	public function device_insert($data) {
		$this->db->insert("device",$data);
	}
	public function get_udid($udid) 
	{
		$this->db->where('udid',$udid);	
		$query=$this->db->get('device');
		return $query->result_array() ;
		
	}
	public function update($data)
	{
		$this->db->where('udid',$data['udid']);	
		$this->db->update('device',$data);
	}
	
	function get_device()
	{
		$query=$this->db->get('device');
		return $query->result_array() ;
	}
}