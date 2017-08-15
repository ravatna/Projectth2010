<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Customermanage extends CI_Controller {
        private $m_currentDate = ""; //date("Y-m-d H:i:s");
        private $m_currentUser = array();
    
        public function __construct(){
            parent::__construct();
            $this->m_currentDate = date("Y-m-d H:i:s");
            $this->m_currentUser = $this->session->all_userdata();
        }
	public function customeradd() {
		$this -> load -> helper('url');
		$this -> load -> model('mcustomer');
		

		
		$data = array(
			'name' =>$this->input->post('name'),
                    'phone_no' =>$this->input->post('phone_no'),
                    'email' =>$this->input->post('email'),
			'address' =>$this->input->post('address'),
			'created_date' =>$this->m_currentDate,
                    'updated_date' =>$this->m_currentDate,
                    'created_by' =>$this->m_currentUser["account"]["username"],
                    'updated_by' =>$this->m_currentUser["account"]["username"]
		);
		$this -> db -> insert('customer', $data);
		redirect('customer/administration');
	}

	public function customeredit() {
		
		$this -> load -> helper('url');
		$this -> load -> model('mcustomer');
		

		$data = array(
                    'id' =>$this->input->post('id'),
                    'name' =>$this->input->post('name'),
                    'phone_no' =>$this->input->post('phone_no'),
                    'email' =>$this->input->post('email'),
                    'address' =>$this->input->post('address'),
                    'updated_date' =>$this->m_currentDate,
                    'updated_by' =>$this->m_currentUser["account"]["username"]
		);
		$this -> mcustomer -> customer_update($data);

		redirect('customer/administration');
	}

	public function del() {
		$this -> load -> model('mcustomer');
		$this -> load -> helper('url');
		$this -> mcustomer -> customer_del($this -> input -> post('ID'));
		redirect('customer/administration');
	}

}
