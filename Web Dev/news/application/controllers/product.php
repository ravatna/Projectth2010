<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {

	public function administration()
	{
		$all_session = $this->session->all_userdata();
		if (isset($all_session['account'])) {
			$this->load->model('mproducts');
			$this->load->helper('form');
			$this->load->helper('url');
			$data['master']= "head";
			$data['products']=$this->mproducts->listproducts();
			$this->load->view('products/product',$data);	
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
			$this->load->model('mproducts');
			$data['type']=$this->mproducts->typeproducts();
			$data['master']= "head";
			$this->load->view('products/add',$data);	
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
			$this->load->model('mproducts');		
			$data['type']=$this->mproducts->typeproducts();
			$data['products']=$this->mproducts->products($id);
			$data['master']= "head";
			$this->load->view('products/edit',$data);
		}else{
			redirect('product');	
		}
				
	}
	public function index()
	{
		$all_session = $this->session->all_userdata();
		if (isset($all_session['account'])) {
			redirect('product/administration');	
		}else{
			$this->load->helper('form');
			$this->load->helper('url');
			$this->load->view('login');	
		}
				
	}
}
?>