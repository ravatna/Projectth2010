<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Membercarmanage extends CI_Controller {
        private $m_currentDate = ""; //date("Y-m-d H:i:s");
        private $m_currentUser = array();
    
        public function __construct(){
            parent::__construct();
            $this->m_currentDate = date("Y-m-d H:i:s");
            $this->m_currentUser = $this->session->all_userdata();
        }
        
	public function membercaradd() {
            
                $newimage = "";
		$this -> load -> helper('url');
		$this -> load -> model('mmembercar');
		$this -> input -> post('daterange');
		$date = explode(" ", $this -> input -> post('daterange'));
                $use_date = explode(" ", $this -> input -> post('daterange'));
                $lc_date = explode(" ", $this -> input -> post('daterange'));
                $insure_date = explode(" ", $this -> input -> post('daterange'));
                
		$datestart = date("Y-m-d", strtotime($date[0]));
                
                $dateuse = date("Y-m-d", strtotime($use_date[0]));
                $datelc = date("Y-m-d", strtotime($lc_date[0]));
                $dateinsure = date("Y-m-d", strtotime($insure_date[0]));
                
		
$data = array(
			'car_model_id' =>$this->input->post('car_model_id'),
                        'car_brand_id' =>$this->input->post('car_brand_id'),
                        'license_no' =>$this->input->post('license_no'),
                        'body_no' =>$this->input->post('body_no'),
                        'cust_id' =>$this->input->post('cust_id'),
                        'car_use_date' =>$dateuse,
                        'insurance_date' =>$dateinsure,
                        'license_plate_date' =>$datelc,
			'detail' =>$this->input->post('detail'),
			
                    'created_date' =>$this->m_currentDate,
                    'updated_date' =>$this->m_currentDate,
                    'created_by' =>$this->m_currentUser["account"]["username"],
                    'updated_by' =>$this->m_currentUser["account"]["username"]
		);
                
                
		if ($_FILES['pic1']["name"] != "") {
			$imageupload = $_FILES['pic1']['tmp_name'];
			$imageupload_name = $_FILES['pic1']['name'];
			$arraypic = explode(".", $imageupload_name);
			$filename = date('YmdHis')."_pic1";
			$filetype = @$arraypic[1];

			if ($filetype == "jpg" || $filetype == "JPG" || $filetype == "jpeg" || $filetype == "JPEG" || $filetype == "png" || $filetype == "PNG" || $filetype == "gif") {
				$newimage = $filename . "." . $filetype;
				move_uploaded_file($imageupload,"uploads_mycar/".$newimage);
                                $data['pic1'] = $newimage;
			}
			
		}
                
                
		if ($_FILES['pic2']["name"] != "") {
			$imageupload = $_FILES['pic2']['tmp_name'];
			$imageupload_name = $_FILES['pic2']['name'];
			$arraypic = explode(".", $imageupload_name);
			$filename = date('YmdHis')."_pic2";
			$filetype = @$arraypic[1];

			if ($filetype == "jpg" || $filetype == "JPG" || $filetype == "jpeg" || $filetype == "JPEG" || $filetype == "png" || $filetype == "PNG" || $filetype == "gif") {
				$newimage = $filename . "." . $filetype;
				move_uploaded_file($imageupload,"uploads_mycar/".$newimage);
                                $data['pic2'] = $newimage;
			}	
		}
                
                
                
		if ($_FILES['pic3']["name"] != "") {
			$imageupload = $_FILES['pic3']['tmp_name'];
			$imageupload_name = $_FILES['pic3']['name'];
			$arraypic = explode(".", $imageupload_name);
			$filename = date('YmdHis')."_pic3";
			$filetype = @$arraypic[1];

			if ($filetype == "jpg" || $filetype == "JPG" || $filetype == "jpeg" || $filetype == "JPEG" || $filetype == "png" || $filetype == "PNG" || $filetype == "gif") {
				$newimage = $filename . "." . $filetype;
				move_uploaded_file($imageupload,"uploads_mycar/".$newimage);
                                $data['pic3'] = $newimage;
			}
			
		}
                
                
                
		if ($_FILES['pic4']["name"] != "") {
			$imageupload = $_FILES['pic4']['tmp_name'];
			$imageupload_name = $_FILES['pic4']['name4'];
			$arraypic = explode(".", $imageupload_name);
			$filename = date('YmdHis')."_pic4";
			$filetype = @$arraypic[1];

			if ($filetype == "jpg" || $filetype == "JPG" || $filetype == "jpeg" || $filetype == "JPEG" || $filetype == "png" || $filetype == "PNG" || $filetype == "gif") {
				$newimage = $filename . "." . $filetype;
				move_uploaded_file($imageupload,"uploads_mycar/".$newimage);
                                $data['pic4'] = $newimage;
			}
			
		}
                
                
		if ($_FILES['pic5']["name"] != "") {
			$imageupload = $_FILES['pic5']['tmp_name'];
			$imageupload_name = $_FILES['pic5']['name'];
			$arraypic = explode(".", $imageupload_name);
			$filename = date('YmdHis')."_pic5";
			$filetype = @$arraypic[1];

			if ($filetype == "jpg" || $filetype == "JPG" || $filetype == "jpeg" || $filetype == "JPEG" || $filetype == "png" || $filetype == "PNG" || $filetype == "gif") {
				$newimage = $filename . "." . $filetype;
				move_uploaded_file($imageupload,"uploads_mycar/".$newimage);
                                $data['pic5'] = $newimage;
			}
			
		}
                
		
		$this -> db -> insert('membercar', $data);
		redirect('membercar/administration');
	}

	public function membercaredit() {
            $newimage = "";
		$newimage2 = "";
            $newimage3 = "";
            $newimage4 = "";
            $newimage5 = "";
            
		$this -> load -> helper('url');
		$this -> load -> model('mmembercar');
		$this -> input -> post('start');
		
		$date = explode(" ", $this -> input -> post('daterange'));
                $use_date = explode(" ", $this -> input -> post('use_date'));
                $lc_date = explode(" ", $this -> input -> post('lc_date'));
                $insure_date = explode(" ", $this -> input -> post('insurance_date'));
                
		$datestart = date("Y-m-d", strtotime($date[0]));
                $dateuse = date("Y-m-d", strtotime($use_date[0]));
                $datelc = date("Y-m-d", strtotime($lc_date[0]));
                $dateinsure = date("Y-m-d", strtotime($insure_date[0]));
                
                
                
		$data = array(
			'id' =>$this->input->post('id'),
			'car_model_id' =>$this->input->post('car_model_id'),
                        'car_brand_id' =>$this->input->post('car_brand_id'),
                        'license_no' =>$this->input->post('license_no'),
                    'body_no' =>$this->input->post('body_no'),
                        'cust_id' =>$this->input->post('cust_id'),
                        'car_use_date' =>$dateuse,
                        'insurance_date' =>$dateinsure,
                        'license_plate_date' =>$datelc,
			'detail' =>$this->input->post('detail'),
			
                        'updated_date' =>$this->m_currentDate,
                        'updated_by' =>$this->m_currentUser["account"]["username"]
		);
                
		if ($_FILES['pic1']["name"] != "") {
			$imageupload = $_FILES['pic1']['tmp_name'];
			$imageupload_name = $_FILES['pic1']['name'];
			$arraypic = explode(".", $imageupload_name);
			$filename = date('YmdHis')."_pic1";
			$filetype = @$arraypic[1];

			if ($filetype == "jpg" || $filetype == "JPG" || $filetype == "jpeg" || $filetype == "JPEG" || $filetype == "png" || $filetype == "PNG" || $filetype == "gif") {
				$newimage = $filename . "." . $filetype;
				move_uploaded_file($imageupload,"uploads_mycar/".$newimage);
                                $data['pic1'] = $newimage;
			}
			
		}
                
                
		if ($_FILES['pic2']["name"] != "") {
			$imageupload = $_FILES['pic2']['tmp_name'];
			$imageupload_name = $_FILES['pic2']['name'];
			$arraypic = explode(".", $imageupload_name);
			$filename = date('YmdHis')."_pic2";
			$filetype = @$arraypic[1];

			if ($filetype == "jpg" || $filetype == "JPG" || $filetype == "jpeg" || $filetype == "JPEG" || $filetype == "png" || $filetype == "PNG" || $filetype == "gif") {
				$newimage = $filename . "." . $filetype;
				move_uploaded_file($imageupload,"uploads_mycar/".$newimage);
                                $data['pic2'] = $newimage;
			}	
		}
                
                
                
		if ($_FILES['pic3']["name"] != "") {
			$imageupload = $_FILES['pic3']['tmp_name'];
			$imageupload_name = $_FILES['pic3']['name'];
			$arraypic = explode(".", $imageupload_name);
			$filename = date('YmdHis')."_pic3";
			$filetype = @$arraypic[1];

			if ($filetype == "jpg" || $filetype == "JPG" || $filetype == "jpeg" || $filetype == "JPEG" || $filetype == "png" || $filetype == "PNG" || $filetype == "gif") {
				$newimage = $filename . "." . $filetype;
				move_uploaded_file($imageupload,"uploads_mycar/".$newimage);
                                $data['pic3'] = $newimage;
			}
			
		}
                
                
                
		if ($_FILES['pic4']["name"] != "") {
			$imageupload = $_FILES['pic4']['tmp_name'];
			$imageupload_name = $_FILES['pic4']['name4'];
			$arraypic = explode(".", $imageupload_name);
			$filename = date('YmdHis')."_pic4";
			$filetype = @$arraypic[1];

			if ($filetype == "jpg" || $filetype == "JPG" || $filetype == "jpeg" || $filetype == "JPEG" || $filetype == "png" || $filetype == "PNG" || $filetype == "gif") {
				$newimage = $filename . "." . $filetype;
				move_uploaded_file($imageupload,"uploads_mycar/".$newimage);
                                $data['pic4'] = $newimage;
			}
			
		}
                
                
		if ($_FILES['pic5']["name"] != "") {
			$imageupload = $_FILES['pic5']['tmp_name'];
			$imageupload_name = $_FILES['pic5']['name'];
			$arraypic = explode(".", $imageupload_name);
			$filename = date('YmdHis')."_pic5";
			$filetype = @$arraypic[1];

			if ($filetype == "jpg" || $filetype == "JPG" || $filetype == "jpeg" || $filetype == "JPEG" || $filetype == "png" || $filetype == "PNG" || $filetype == "gif") {
				$newimage = $filename . "." . $filetype;
				move_uploaded_file($imageupload,"uploads_mycar/".$newimage);
                                $data['pic5'] = $newimage;
			}
			
		}
                
                
		$this -> mmembercar -> membercar_update($data);
		redirect('membercar/administration');
	}

	public function del() {
		$this -> load -> model('mmembercar');
		$this -> load -> helper('url');
		$this -> mmembercar -> membercar_del($this -> input -> post('ID'));
		redirect('membercar/administration');
	}

}
