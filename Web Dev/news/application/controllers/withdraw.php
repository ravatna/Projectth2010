<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Withdraw extends CI_Controller {

	public function administration()
	{
		$all_session = $this->session->all_userdata();
		if (isset($all_session['account'])) {
			$this->load->model('mwithdraw');
			$this->load->helper('form');
			$this->load->helper('url');
			$data['with']=$this->mwithdraw->listwithdraw();
			$data['master']= "head";
			$this->load->view('withdraw/withdraw',$data);		
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
			$this->load->view('withdraw/add',$data);		
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
			$this->load->model('mwithdraw');		
			$data['with']=$this->mwithdraw->withdraw($id);
			$data['master']= "head";
			$this->load->view('withdraw/edit',$data);			
		}else{
			redirect('member');	
		}	
	}
        
	public function index()
	{
		redirect('withdraw/administration');		
	}
	
}
?>