<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {

	public function administration()
	{
		$all_session = $this->session->all_userdata();
		if (isset($all_session['account'])) {
			$this->load->model('mnews');
			$this->load->helper('form');
			$this->load->helper('url');
			$data['news']=$this->mnews->listnews();
			$data['master']= "head";
			$this->load->view('news/news',$data);		
		}else{
			redirect('member');	
		}			
	}
	
	
	public function news_no_login()
	{
		$all_session = $this->session->all_userdata();
		
			$this->load->model('mnews');
			
			$data['news']=$this->mnews->listnews();
			$data['master']= "head_no_login";
			$this->load->view('news/news_no_login',$data);		
					
	}

	
	public function add()
	{
		$all_session = $this->session->all_userdata();
		if (isset($all_session['account'])) {
			$this->load->helper('form');
			$this->load->helper('url');
			$data['master']= "head";
			$this->load->view('news/add',$data);		
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
			$this->load->model('mnews');		
			$data['news']=$this->mnews->news($id);
			$data['master']= "head";
			$this->load->view('news/edit',$data);			
		}else{
			redirect('member');	
		}	
	}
	
	
	public function news_detail()
	{
		
		
			$this->load->helper('form');
			$this->load->helper('url');
			$id=$this->uri->segment(3);
			$this->load->model('mnews');		
			$data['news']=$this->mnews->news($id);
			$data['_mnews']=$this->mnews;
			$data['master']= "head_no_login";
			$this->load->view('news/news_detail',$data);			
			
	}
	
	public function index()
	{
		redirect('news/news_no_login/');		
	}
	
	
	
}
?>