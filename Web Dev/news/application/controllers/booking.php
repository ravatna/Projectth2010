<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Booking extends CI_Controller {

	public function administration()
	{
		$all_session = $this->session->all_userdata();
		if (isset($all_session['account'])) 
                    {
			$this->load->model('mbooking');
			$this->load->model('mcustomer');
                        $this->load->model('mcarbrand');
                        $this->load->model('mcarmodel');
                        
                        $this->load->helper('form');
			$this->load->helper('url');
                        
			$data['booking']=$this->mbooking->listbooking();
                        $data['customer']=$this->mcustomer;
                        $data['carbrand'] = $this->mcarbrand;;
                        $data['carmodel'] = $this->mcarmodel;
                        
			$data['master']= "head";
			$this->load->view('booking/booking',$data);
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
                    
                        $this->load->model('mcustomer');
                        $this->load->model('mcarbrand');
                        $this->load->model('mcarmodel');
			
                        $data['customer']=$this->mcustomer->listcustomer();
                        $data['carbrand']=$this->mcarbrand->listcarbrand();
                        $data['carmodel']=$this->mcarmodel->listcarmodel();
			$this->load->helper('form');
			$this->load->helper('url');
			$data['master']= "head";
			$this->load->view('booking/add',$data);		
		}else{
			redirect('booking');	
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
                        $this->load->model('mcarbrand');
                        $this->load->model('mcarmodel');
			
                        $data['customer']=$this->mcustomer->listcustomer();
                        $data['carbrand']=$this->mcarbrand->listcarbrand();
                        $data['carmodel']=$this->mcarmodel->listcarmodel();
			$this->load->model('mbooking');		
			$data['booking']=$this->mbooking->booking($id);
			$data['master']= "head";
			$this->load->view('booking/edit',$data);			
		}else{
			redirect('product');	
		}	
	}

        
	public function index()
	{
		redirect('booking/administration');		
	}
	
}
?>