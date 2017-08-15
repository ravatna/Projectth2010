<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Withdrawmanage extends CI_Controller {
        private $m_currentDate = ""; //date("Y-m-d H:i:s");
        private $m_currentUser = array();
    
        public function __construct(){
            parent::__construct();
            $this->m_currentDate = date("Y-m-d H:i:s");
            $this->m_currentUser = $this->session->all_userdata();
        }
        
	public function withdrawadd() {
		$this -> load -> helper('url');
		$this -> load -> model('mwithdraw');
		$data = array(
                    'with_fname' =>$this->input->post('with_fname'),
                    'with_uname' =>$this->input->post('with_uname'),
                    'with_bank_name' =>$this->input->post('with_bank_name'),
                    'with_amount' =>$this->input->post('with_amount'),
                    'with_status_text' =>$this->input->post('with_status_text'),
                    'with_remark' =>$this->input->post('with_remark'),
                    'who_updated' =>$this->m_currentUser["account"]["username"],
                    'process_status' =>$this->input->post('process_status'),
                    'created_date' =>$this->m_currentDate,
                    'updated_date' =>$this->m_currentDate
		);
		$this -> db -> insert('withdraw', $data);
		redirect('withdraw/administration');
	}

	public function withdrawedit() {
		
		$this -> load -> helper('url');
		$this -> load -> model('mwithdraw');

                
                
		$data = array(
                   
                    'with_remark' =>$this->input->post('with_remark'),
                    'who_updated' =>$this->m_currentUser["account"]["username"],
                    'process_status' =>$this->input->post('process_status'),
                    'updated_date' =>$this->m_currentDate
		);
		 
                
		$this -> db ->where(array("id" => $this->input->post('id'))) -> update('withdraw', $data);
		redirect('withdraw/administration');
	}

	public function del() {
		$this -> load -> model('mwithdraw');
		$this -> load -> helper('url');
		$this -> mwithdraw -> withdraw_del($this -> input -> post('id'));
		redirect('withdraw/administration');
	}

}
