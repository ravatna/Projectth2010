<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends CI_Controller {

	public function index()
	{
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->view('login');		
	}
        
	public function logincheck()
	{
		$this->load->helper('url');
		$data = array(
			'username' =>$this->input->post('username'),
			'password' =>md5($this->input->post('password')),
		 );
		 $this->load->model('mmember');
		 $member = $this->mmember->memberlogin($data);
		 foreach ($member as $value['account']);
		 $this->session->set_userdata($value);
		 redirect('news/administration');
	}
        
	public function logout() {
		$this -> session -> sess_destroy();
		redirect('member');
	}
}
?>