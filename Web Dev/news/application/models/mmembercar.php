<?php if (!defined('BASEPATH'))	exit('No direct script access allowed');

/**
 *
 */
class Mmembercar extends CI_Model {

	function listmembercar() {
                
                $query = $this->db->query("SELECT mc.id,mc.cust_id,mc.car_model,mc.car_brand as brand_name,mc.car_model as `model_name`,ctm.name as cust_name,mc.pic1,date_format(mc.license_plate_date,'%d/%m/%Y') as license_plate_date ,date_format(mc.insurance_date,'%d/%m/%Y') as insureance_date,mc.license_no,mc.body_no FROM membercar mc LEFT JOIN customer ctm ON ctm.id=mc.cust_id ");

		return $query->result_array() ;
		
	}
        
        function listmycar($data){

		$query=$this->db->query("SELECT mc.id,mc.cust_id,mc.car_model,mc.car_brand,mc.car_model as `model_name`,mc.car_brand as brand_name,ctm.name as cust_name,mc.pic1,mc.pic2,mc.pic3,mc.pic4,mc.pic5,date_format(mc.license_plate_date,'%d/%m/%Y') as license_plate_date,mc.body_no ,date_format(mc.insurance_date,'%d/%m/%Y') as insureance_date ,mc.license_no FROM membercar mc JOIN customer ctm ON ctm.id=mc.cust_id  where mc.cust_id='".$data['cust_id']. "' order by mc.updated_date desc" );
      	
	return $query->result_array();
        
            
        }
        
	function membercar($id) {
		$this->db->where('id',$id);
		$query = $this -> db -> get("membercar");
		return $query->result_array() ;
	}
	public function membercar_insert($data) {
		$this->db->insert('news',$data);
	}
	public function membercar_update($data)
	{
		$this->db->where('id',$data['id']);
		$this->db->update('membercar',$data);
	}
	public function membercar_del($data) {
		$this->db->where('id', $data);
		$this->db->delete('membercar');
	}


}
