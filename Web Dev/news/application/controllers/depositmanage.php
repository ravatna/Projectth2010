<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Depositmanage extends CI_Controller {
        private $m_currentDate = ""; //date("Y-m-d H:i:s");
        private $m_currentUser = array();
    
        public function __construct(){
            parent::__construct();
            $this->m_currentDate = date("Y-m-d H:i:s");
            $this->m_currentUser = $this->session->all_userdata();
        }
        
	public function depositadd() {
		$this -> load -> helper('url');
		$this -> load -> model('mdeposit');
		$data = array(
                    'dep_fname' =>$this->input->post('dep_fname'),
                    'dep_uname' =>$this->input->post('dep_uname'),
                    'dep_bank_name' =>$this->input->post('dep_bank_name'),
                    'dep_amount' =>$this->input->post('dep_amount'),
                    'dep_time' =>$this->input->post('dep_time'),
                    'dep_status_text' =>$this->input->post('dep_status_text'),
                    'dep_remark' =>$this->input->post('dep_remark'),
                    'who_updated' =>$this->m_currentUser["account"]["username"],
                    'process_status' =>$this->input->post('process_status'),
                    'created_date' =>$this->m_currentDate,
                    'updated_date' =>$this->m_currentDate
		);
		$this -> db -> insert('deposit', $data);
		redirect('deposit/administration');
	}

	public function depositedit() {
		
		$this -> load -> helper('url');
		$this -> load -> model('mdeposit');

                
                
		$data = array(
                   
                    'dep_remark' =>$this->input->post('dep_remark'),
                    'who_updated' =>$this->m_currentUser["account"]["username"],
                    'process_status' =>$this->input->post('process_status'),
                    'updated_date' => $this->m_currentDate
		);
		 
                
		$this -> db ->where(array("id" => $this->input->post('id'))) -> update('deposit', $data);
                
		redirect('deposit/administration');
	}

	public function del() {
		$this -> load -> model('mdeposit');
		$this -> load -> helper('url');
		$this -> mdeposit -> deposit_del($this -> input -> post('id'));
		redirect('deposit/administration');
	}

}
