<?php if (!defined('BASEPATH'))	exit('No direct script access allowed');

/**
 *
 */
class Mbooking extends CI_Model {

	function listbooking() {
		//$query = $this -> db -> get("booking");
		
		$query=$this->db->query(" SELECT 
			bk.id
			,bk.cust_id
			,bk.booking_for
			,bk.status_text
			,bk.booking_date
		,mc.car_model 
		,mc.car_brand 
		,mc.body_no
		,mc.license_no
		,ctm.name as cust_name
		 FROM ((`booking` `bk` LEFT JOIN `customer` ctm ON `ctm`.`id`=`bk`.`cust_id`) LEFT JOIN membercar mc ON bk.car_id = mc.id) order by bk.updated_date desc" );
		
		return $query->result_array() ;
	}
        
        function listmybooking_($data){
            $query=$this->db->query(" SELECT bk.id,bk.cust_id,mc.car_model as `model_name`,mc.car_brand as brand_name,ctm.name as cust_name FROM ((`booking` `bk` LEFT JOIN `customer` ctm ON `ctm`.`id`=`bk`.`cust_id`) LEFT JOIN membercar mc ON bk.car_id = mc.id) where bk.cust_id='".$data['cust_id']. "' order by bk.updated_date desc" );
            return $query->result_array() ;
        }
        
        function listmybooking($data){
            $query=$this->db->query("SELECT 
	bk.id
	,bk.booking_for
	,bk.detail 
	,DATE_FORMAT(bk.created_date, \"%d/%l/%Y\") as created_date  
	,mc.car_brand
	,mc.car_model
	,mc.body_no

FROM (booking bk 
	inner join membercar mc  on bk.car_id = mc.id) 

WHERE
	bk.status_text ='ส่งมอบรถแล้ว' and bk.cust_id='".$data['cust_id']. "' order by bk.updated_date desc" );
            return $query->result_array() ;
        }
        
        
	function booking($id) {
		$this->db->where('id',$id);
		$query = $this -> db -> get("booking");
		return $query->result_array() ;
	}
	public function booking_insert($data) {
		$this->db->insert('booking',$data);
	}
	public function booking_update($data)
	{
		$this->db->where('id',$data['id']);
		$this->db->update('booking',$data);
	}
	public function booking_del($data) {
		$this->db->where('id', $data);
		$this->db->delete('booking');
	}


}
