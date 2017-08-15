<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Promotetextmanage extends CI_Controller {

        private $m_currentDate = ""; //date("Y-m-d H:i:s");
        private $m_currentUser = array();
    
        public function __construct(){
            parent::__construct();
            $this->m_currentDate = date("Y-m-d H:i:s");
            $this->m_currentUser = $this->session->all_userdata();
        }
    
	public function promotetextupdate() {
		$this -> load -> helper('url');
		$this -> load -> model('mpromotetext');
		$data = array(
                    'id' =>$this->input->post('id'),
                    'detail' =>$this->input->post('detail'),
                    'who_updated' =>$this->m_currentUser["account"]["username"],
                    'updated_date' =>$this->m_currentDate
		);
		$this -> db -> update('promotion_text', $data);
		redirect('promotetext/edit/'.$this->input->post('id'));
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
