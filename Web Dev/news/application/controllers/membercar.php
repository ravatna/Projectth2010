<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MemberCar extends CI_Controller {

	public function administration()
	{
		$all_session = $this->session->all_userdata();
		if (isset($all_session['account'])) {
			$this->load->model('mmembercar');
			$this->load->helper('form');
			$this->load->helper('url');
			$data['membercar']=$this->mmembercar->listmembercar();
			$data['master']= "head";
			$this->load->view('membercar/membercar',$data);		
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
                        
                        $this->load->model('mcustomer');
                        $this->load->model('mcarbrand');
                        $this->load->model('mcarmodel');
			
                        $data['customer']=$this->mcustomer->listcustomer();
                        $data['carbrand']=$this->mcarbrand->listcarbrand();
                        $data['carmodel']=$this->mcarmodel->listcarmodel();
			$data['master']= "head";
			$this->load->view('membercar/add',$data);		
		}else{
			redirect('membercar');	
		}				
	}
        
        
	public function edit()
	{
		$all_session = $this->session->all_userdata();
		if (isset($all_session['account'])) {
			$this->load->helper('form');
			$this->load->helper('url');
			$id=$this->uri->segment(3);
			$this->load->model('mmembercar');
                        $this->load->model('mcustomer');
                        $this->load->model('mcarbrand');
                        $this->load->model('mcarmodel');
			$data['membercar']=$this->mmembercar->membercar($id);
                        $data['customer']=$this->mcustomer->listcustomer();
                        $data['carbrand']=$this->mcarbrand->listcarbrand();
                        $data['carmodel']=$this->mcarmodel->listcarmodel();
			$data['master']= "head";
			$this->load->view('membercar/edit',$data);			
		}else{
			redirect('product');	
		}	
	}
	public function index()
	{
		redirect('membercar/administration');		
	}
	
}
?>