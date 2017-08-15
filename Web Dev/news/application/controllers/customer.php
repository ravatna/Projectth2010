<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends CI_Controller {

	public function administration()
	{
		$all_session = $this->session->all_userdata();
		if (isset($all_session['account'])) 
                    {
			
			$this->load->model('mcustomer');
                       
                        
                        $this->load->helper('form');
			$this->load->helper('url');
                        
			 $data['customer']=$this->mcustomer->listcustomer();
                       
                        
			$data['master']= "head";
			$this->load->view('customer/customer',$data);
		}
                else
                    {
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
			$this->load->view('customer/add',$data);		
		}else{
			redirect('customer');	
		}				
	}
        
        
	public function edit()
	{
		$all_session = $this->session->all_userdata();
                
		if (isset($all_session['account'])) {
			$this->load->helper('form');
			$this->load->helper('url');
			$id=$this->uri->segment(3);
			$this->load->model('mcustomer');		
			$data['customer']=$this->mcustomer->customer($id);
			$data['master']= "head";
			$this->load->view('customer/edit',$data);			
		}else{
			redirect('product');	
		}	
	}

        
	public function index()
	{
		redirect('customer/administration');		
	}
	
}
?>