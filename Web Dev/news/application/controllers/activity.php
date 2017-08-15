<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Activity extends CI_Controller {

	public function administration()
	{
		$all_session = $this->session->all_userdata();
		if (isset($all_session['account'])) {
			$this->load->model('mactivity');
			$this->load->helper('form');
			$this->load->helper('url');
			$data['master']= "head";
			$data['activity']=$this->mactivity->listactivity();
			$this->load->view('activity/activity',$data);		
		}else{
			redirect('product');	
		}			
	}
	public function add()
	{
		$all_session = $this->session->all_userdata();
		if (isset($all_session['account'])) {
			$this->load->helper('form');
			$this->load->helper('url');
			$data['master']= "head";
			$this->load->view('activity/add',$data);		
		}else{
			redirect('product');	
		}				
	}
	public function edit()
	{
		$all_session = $this->session->all_userdata();
		if (isset($all_session['account'])) {
			$this->load->helper('form');
			$this->load->helper('url');
			$id=$this->uri->segment(3);
			$this->load->model('mactivity');		
			$data['activity']=$this->mactivity->activity($id);
			$data['master']= "head";
			$this->load->view('activity/edit',$data);			
		}else{
			redirect('product');	
		}	
	}
	public function index()
	{
		redirect('activity/administration');		
	}
	
}
?>