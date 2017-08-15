<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

	public function administration()
	{
		$all_session = $this->session->all_userdata();
		if (isset($all_session['account'])) {
			$this->load->model('mregister');
			$this->load->helper('form');
			$this->load->helper('url');
			$data['reg']=$this->mregister->listregister();
			$data['master']= "head";
			$this->load->view('register/register',$data);		
		}else{
			redirect('member');
		}			
	}
	public function add()
	{
		$all_session = $this->session->all_userdata();
		if (isset($all_session['account'])) {
			$this->load->helper('form');
			$this->load->helper('url');
			$data['master']= "head";
			$this->load->view('register/add',$data);		
		}else{
			redirect('member');	
		}				
	}
        
	public function edit()
	{
		$all_session = $this->session->all_userdata();
		if (isset($all_session['account'])) {
			$this->load->helper('form');
			$this->load->helper('url');
			$id=$this->uri->segment(3);
			$this->load->model('mregister');		
			$data['reg']=$this->mregister->register($id);
			$data['master']= "head";
			$this->load->view('register/edit',$data);			
		}else{
			redirect('member');	
		}	
	}
        
	public function index()
	{
		redirect('register/administration');		
	}
	
}
?>