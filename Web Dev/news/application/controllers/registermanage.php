<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Registermanage extends CI_Controller {

        private $m_currentDate = ""; //date("Y-m-d H:i:s");
        private $m_currentUser = array();
    
        public function __construct(){
            parent::__construct();
            $this->m_currentDate = date("Y-m-d H:i:s");
            $this->m_currentUser = $this->session->all_userdata();
        }
    
	public function registeradd() {
		$this -> load -> helper('url');
		$this -> load -> model('mregister');
		$data = array(
                    'reg_fname' =>$this->input->post('reg_fname'),
                    'reg_bank_number' =>$this->input->post('reg_bank_number'),
                    'reg_bank_name' =>$this->input->post('reg_bank_name'),
                    'reg_phone_no' =>$this->input->post('reg_phone_no'),
                    'reg_status_text' =>$this->input->post('reg_status_text'),
                    'reg_remark' =>$this->input->post('reg_remark'),
                    'who_updated' =>$this->m_currentUser["account"]["username"],
                    'process_status' =>$this->input->post('process_status'),
                    'created_date' =>$this->m_currentDate,
                    'updated_date' =>$this->m_currentDate
		);
		$this -> db -> insert('register', $data);
		redirect('register/administration');
	}

	public function registeredit() {
		
		$this -> load -> helper('url');
		$this -> load -> model('mregister');

		$data = array(    
                    'reg_remark' =>$this->input->post('reg_remark'),
                    'who_updated' =>$this->m_currentUser["account"]["username"],
                    'process_status' =>$this->input->post('process_status'),
                    'updated_date' => $this->m_currentDate
		);
                
		$this -> db ->where(array("id" => $this->input->post('id'))) -> update('register', $data);
                
		redirect('register/administration');
	}

	public function del() {
		$this -> load -> model('mregister');
		$this -> load -> helper('url');
		$this -> mregister -> register_del($this -> input -> post('id'));
		redirect('register/administration');
	}

}
