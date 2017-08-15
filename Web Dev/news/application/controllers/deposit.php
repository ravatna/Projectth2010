<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Deposit extends CI_Controller {

	public function administration()
	{
		$all_session = $this->session->all_userdata();
		if (isset($all_session['account'])) {
			$this->load->model('mdeposit');
			$this->load->helper('form');
			$this->load->helper('url');
			$data['dep']=$this->mdeposit->listdeposit();
			$data['master']= "head";
			$this->load->view('deposit/deposit',$data);		
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
			$this->load->view('deposit/add',$data);		
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
			$this->load->model('mdeposit');		
			$data['dep']=$this->mdeposit->deposit($id);
			$data['master']= "head";
			$this->load->view('deposit/edit',$data);			
		}else{
			redirect('member');	
		}	
	}
        
	public function index()
	{
		redirect('deposit/administration');		
	}
	
}
?>