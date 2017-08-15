<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Bookingmanage extends CI_Controller {
        private $m_currentDate = ""; //date("Y-m-d H:i:s");
        private $m_currentUser = array();
    
        public function __construct(){
            parent::__construct();
            $this->m_currentDate = date("Y-m-d H:i:s");
            $this->m_currentUser = $this->session->all_userdata();
        }
        
	public function bookingadd() {
		$this -> load -> helper('url');
		$this -> load -> model('mbooking');

//                $d = explode("/",$this->input->post('booking_date'));
//                $booking_date = $d[2] ."-". $d[1]."-".$d[0];
                $booking_date = $this->input->post('booking_date');
		$data = array(
                    'cust_id' =>$this->input->post('cust_id'),
                    //'body_no' =>$this->input->post('body_no'),
                    'booking_for' =>$this->input->post('booking_for'),
                    'booking_date' =>$booking_date,
                    'status_text' =>$this->input->post('status_text'),
                    'car_brand_id' =>$this->input->post('car_brand_id'),
                     'car_model_id' =>$this->input->post('car_model_id'),
                    'detail' =>$this->input->post('detail'),
                    'created_date' =>$this->m_currentDate,
                    'updated_date' =>$this->m_currentDate,
                    'created_by' =>$this->m_currentUser["account"]["username"],
                    'updated_by' =>$this->m_currentUser["account"]["username"]
		);
		$this -> db -> insert('booking', $data);
		redirect('booking/administration');
	}

	public function bookingedit() {
		
		$this -> load -> helper('url');
		$this -> load -> model('mbooking');

		$data = array(
                   'id' =>$this->input->post('id'),
                     
                   'cust_id' =>$this->input->post('cust_id'),
                    //'body_no' =>$this->input->post('body_no'),
                    'booking_for' =>$this->input->post('booking_for'),
                    'booking_date' =>$this->input->post('booking_date'),
                    'status_text' =>$this->input->post('status_text'),
                    'car_brand_id' =>$this->input->post('car_brand_id'),
                     'car_model_id' =>$this->input->post('car_model_id'),
                    'detail' =>$this->input->post('detail'),
                    'updated_date' => $this->m_currentDate,
                    'updated_by' =>$this->m_currentUser["account"]["username"]
		);
		 
                
		$this -> db ->where(array("id" => $this->input->post('id'))) -> update('booking', $data);
                
		redirect('booking/administration');
	}

	public function del() {
		$this -> load -> model('mbooking');
		$this -> load -> helper('url');
		$this -> mbooking -> booking_del($this -> input -> post('ID'));
		redirect('booking/administration');
	}

}
