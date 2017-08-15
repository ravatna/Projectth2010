<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Promotetext extends CI_Controller {

	public function administration()
	{
		$all_session = $this->session->all_userdata();
		if (isset($all_session['account'])) {
			$this->load->model('mpromotetext');
			$this->load->helper('form');
			$this->load->helper('url');
			$data['master']= "head";
			$data['promotetext']=$this->mpromotetext->listpromotetext();
			$this->load->view('promotetext/promotetext',$data);		
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
			$this->load->view('promotetext/add',$data);		
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
			$this->load->model('mpromotetext');		
			$data['promotetext']=$this->mpromotetext->promotetext($id);
			$data['master']= "head";
			$this->load->view('promotetext/edit',$data);			
		}else{
			redirect('product');	
		}	
	}
	public function index()
	{
		redirect('promotetext/administration');		
	}
	
}
?>