<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Webservice extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -  
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {
        header("contentType:text/json; charset=utf8");
        $a['x'] = array('x', 'y');
        echo json_encode($a);
    }

    public function __construct() {
        parent::__construct();
        $this->m_currentDate = date("Y-m-d H:i:s");
        $this->m_currentUser = $this->input->get('cust_id');
        $this->m_currentUsername = $this->input->get('cust_name');
    }

    public function list_product() {
        header("content-Type:application/json; charset=utf8");
        $this->load->model('mproducts');
        $new_product = $this->mproducts->list_new_products();
        $used_car_product = $this->mproducts->list_used_car_products();
        $group_product['new'] = array('item_count' => count($new_product), 'items' => $new_product);
        $group_product['used_car'] = array('item_count' => count($used_car_product), 'items' => $used_car_product);
        $data['result'] = $group_product;
        echo json_encode($data);
    }

    public function list_car_brand() {
        header("content-Type:application/json; charset=utf8");
        $this->load->model('mcarbrand');
        $this->load->model('mcarmodel');
        $car_brand = $this->mcarbrand->listcarbrand();
        $brand = array();

        foreach ($car_brand as $k => $v) {

            $car_model = $this->mcarmodel->listcarmodel_byid($v['id']);
            $model = array();

            $car_brand[$k]['car_model'] = $car_model;
            $brand[] = array('item_count' => count($car_brand), 'items' => $car_brand);
        }

        $data['result'] = array('item_count' => count($car_brand), 'items' => $car_brand);
        echo json_encode($data);
    }

    public function list_mycar() {
        header("content-Type:application/json; charset=utf8");
        $this->load->model('mmembercar');
        $m = $this->mmembercar->listmycar(array('cust_id' => $this->input->get('cust_id')));
        $group_product['mycar'] = array('item_count' => count($m), 'items' => $m);
        $data['result'] = $group_product;
        echo json_encode($data);
    }

    public function list_mybooking() {
        header("content-Type:application/json; charset=utf8");
        $this->load->model('mbooking');
        $m = $this->mbooking->listmybooking(array('cust_id' => $this->input->get('cust_id')));
        $group_product['mybooking'] = array('item_count' => count($m), 'items' => $m);
        $data['result'] = $group_product;
        echo json_encode($data);
    }

    public function logincheck() {
        header("content-Type:application/json; charset=utf8");
        $this->load->helper('url');

        $this->load->model('mcustomer');
        $member = $this->mcustomer->checklogin(array(
            'email' => $this->input->get('email'),
            'password' => md5($this->input->get('password')),
        ));
		$member = $member[0];
        echo json_encode($member);
    }

    /**
     * Add myCar
     */
    public function update_mycar() {
        header("content-Type:application/json; charset=utf8");
        $newimage = "";
        $this->load->helper('url');
        $this->load->model('mmembercar'); 
        $lc_date = explode(" ", $this->input->post('license_plate_date'));
        $insure_date = explode(" ", $this->input->post('insureance_date'));
        $datelc = date("Y-m-d", strtotime($lc_date[0]));
        $dateinsure = date("Y-m-d", strtotime($insure_date[0]));
		
		if($this->input->post('car_id')== ""){
			
			
		
        $data = array(
            'car_model' => $this->input->post('car_model'),
            'car_brand' => $this->input->post('car_brand'),
            'license_no' => $this->input->post('license_no'),
            'body_no' => $this->input->post('body_no'),
            'cust_id' => $this->input->post('cust_id'),
            
            'insurance_date' => $dateinsure,
            'license_plate_date' => $datelc,
            'detail' => "",
            'created_date' => $this->m_currentDate,
            'updated_date' => $this->m_currentDate,
            'created_by' => $this->m_currentUsername,
            'updated_by' => $this->m_currentUsername
        );
		}else{
		
        $data = array(
            'id' => $this->input->post('car_id'),
            'car_model' => $this->input->post('car_model'),
            'car_brand' => $this->input->post('car_brand'),
            'license_no' => $this->input->post('license_no'),
            'body_no' => $this->input->post('body_no'),
            'cust_id' => $this->input->post('cust_id'),
            
            'insurance_date' => $dateinsure,
            'license_plate_date' => $datelc,
            
            'updated_date' => $this->m_currentDate,
            'updated_by' => $this->m_currentUsername
        );
	}


        if (@$_FILES['pic1']["name"] != "") {
            $imageupload = $_FILES['pic1']['tmp_name'];
            $imageupload_name = $_FILES['pic1']['name'];
            $arraypic = explode(".", $imageupload_name);
            $filename = date('YmdHis') . "_pic1";
            $filetype = @$arraypic[1];

            if ($filetype == "jpg" || $filetype == "JPG" || $filetype == "jpeg" || $filetype == "JPEG" || $filetype == "png" || $filetype == "PNG" || $filetype == "gif") {
                $newimage = $filename . "." . $filetype;
                move_uploaded_file($imageupload, "uploads_mycar/" . $newimage);
                $data['pic1'] = $newimage;
            }
        }


        if (@$_FILES['pic2']["name"] != "") {
            $imageupload = $_FILES['pic2']['tmp_name'];
            $imageupload_name = $_FILES['pic2']['name'];
            $arraypic = explode(".", $imageupload_name);
            $filename = date('YmdHis') . "_pic2";
            $filetype = @$arraypic[1];

            if ($filetype == "jpg" || $filetype == "JPG" || $filetype == "jpeg" || $filetype == "JPEG" || $filetype == "png" || $filetype == "PNG" || $filetype == "gif") {
                $newimage = $filename . "." . $filetype;
                move_uploaded_file($imageupload, "uploads_mycar/" . $newimage);
                $data['pic2'] = $newimage;
            }
        }



        if (@$_FILES['pic3']["name"] != "") {
            $imageupload = $_FILES['pic3']['tmp_name'];
            $imageupload_name = $_FILES['pic3']['name'];
            $arraypic = explode(".", $imageupload_name);
            $filename = date('YmdHis') . "_pic3";
            $filetype = @$arraypic[1];

            if ($filetype == "jpg" || $filetype == "JPG" || $filetype == "jpeg" || $filetype == "JPEG" || $filetype == "png" || $filetype == "PNG" || $filetype == "gif") {
                $newimage = $filename . "." . $filetype;
                move_uploaded_file($imageupload, "uploads_mycar/" . $newimage);
                $data['pic3'] = $newimage;
            }
        }

        if (@$_FILES['pic4']["name"] != "") {
            $imageupload = $_FILES['pic4']['tmp_name'];
            $imageupload_name = $_FILES['pic4']['name4'];
            $arraypic = explode(".", $imageupload_name);
            $filename = date('YmdHis') . "_pic4";
            $filetype = @$arraypic[1];

            if ($filetype == "jpg" || $filetype == "JPG" || $filetype == "jpeg" || $filetype == "JPEG" || $filetype == "png" || $filetype == "PNG" || $filetype == "gif") {
                $newimage = $filename . "." . $filetype;
                move_uploaded_file($imageupload, "uploads_mycar/" . $newimage);
                $data['pic4'] = $newimage;
            }
        }

        if (@$_FILES['pic5']["name"] != "") {
            $imageupload = $_FILES['pic5']['tmp_name'];
            $imageupload_name = $_FILES['pic5']['name'];
            $arraypic = explode(".", $imageupload_name);
            $filename = date('YmdHis') . "_pic5";
            $filetype = @$arraypic[1];

            if ($filetype == "jpg" || $filetype == "JPG" || $filetype == "jpeg" || $filetype == "JPEG" || $filetype == "png" || $filetype == "PNG" || $filetype == "gif") {
                $newimage = $filename . "." . $filetype;
                move_uploaded_file($imageupload, "uploads_mycar/" . $newimage);
                $data['pic5'] = $newimage;
            }
        }

        
		if($this->input->post("car_id") ==""){
         $this->db->insert('membercar', $data);
	 }else{
		 $this->mmembercar->membercar_update($data);
		
	 }
		 
        echo json_encode( array("result" => "success",'dat'=>$_POST));
    } // end add mycar


    /**
     * Remove picture from myCar
     */
    public function remove_picture_mycar() {
        header("content-Type:application/json; charset=utf8");
        $this->load->helper('url');
        $this->load->model('mmembercar'); 
  
        $data = array(
            'id' => $this->input->get('car_id'),
			'pic'.$this->input->get('position') => "",
            'updated_date' => $this->m_currentDate,
            'updated_by' => $this->m_currentUsername
        );
		
		 $this->mmembercar->membercar_update($data);

		 @unlink("uploads_mycar/".$this->input->get('pic_name'));

        echo json_encode( array("result" => "success"));
    } // end remove picture my car



    function add_booking() {
        header("content-Type:application/json; charset=utf8");
        $this->load->helper('url');
        $this->load->model('mbooking');
        $booking_date = $this->input->get('booking_date');
        $data = array(
            'cust_id' => $this->input->get('cust_id'),
            'car_id' => $this->input->get('car_id'),
            'booking_for' => $this->input->get('booking_for'),
            'booking_date' => date("Y-m-d H:i:s"),
            'status_text' => "ลูกค้าจอง service",
            'detail' => $this->input->get('detail'),
            'created_date' => $this->m_currentDate,
            'updated_date' => $this->m_currentDate,
            'created_by' => $this->input->get('cust_id'),
            'updated_by' => $this->input->get('cust_id')
        );
 
        $this->db->insert('booking', $data);

        echo json_encode(array("result" => "success"));
    }

    public function del_mycar() {
        header("content-Type:application/json; charset=utf8");
        $this->load->model('mmembercar');
        $this->load->helper('url');
        $this->mmembercar->membercar_del($this->input->get('car_id'));
        echo json_encode(array("result" => "success"));
    }

    function add_customer() {
        header("content-Type:application/json; charset=utf8");
        $this->load->helper('url');
        $this->load->model('mcustomer');

        if (count($this->mcustomer->customer_by_email($this->input->get('email')))) {

            echo json_encode(array("result" => "fail", "message" => "You can not use this " . $this->input->get('email') . " for register."));
        } else {

            $data = array(
                'name' => $this->input->get('name'),
                'email' => $this->input->get('email'),
                'password' => md5($this->input->get('password')),
                'address' => $this->input->get('address'),
                'phone_no' => $this->input->get('mobile'),
                'created_date' => $this->m_currentDate,
                'updated_date' => $this->m_currentDate,
                'created_by' => "mobile_register",
                'updated_by' => "mobile_register"
            );

            $this->db->insert('customer', $data);
            $this->logincheck();
        }
    }

    
    /****************** Add Data Device *****************/
	public function insertDevice_get() {
		$this -> load -> model('mdevice');
		$data = array(
			'udid' => $this -> get('udid'), 
			'token' => $this -> get('token'), 
			'platform' => $this -> get('platform')
		);
		$checkud=$this->mdevice->get_udid($data['udid']);
		if ($checkud) {
			$udid = $this -> mdevice -> update($data);
    		$this->response(array('udid'=>$data['udid'],'message'=>"Successfully updated."),201);
		} else {
			$udid = $this -> mdevice -> device_insert($data);
    		$this->response(array('udid'=>$data['udid'],'message'=>"Successfully created."),201);
		}
	}
	
	public function insertDevice_post() {
		$this -> load -> model('mdevice');
		$data = array(
			'udid' => $this -> post('udid'), 
			'token' => $this -> post('token'), 
			'platform' => $this -> post('platform')
		);
		$checkud=$this->mdevice->get_udid($data['udid']);
		if ($checkud) {
			$udid = $this -> mdevice -> update($data);
    		$this->response(array('udid'=>$data['udid'],'message'=>"Successfully updated."),201);
		} else {
			$udid = $this -> mdevice -> device_insert($data);
    		$this->response(array('udid'=>$data['udid'],'message'=>"Successfully created."),201);
		}
	}
    
    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
//Taze2060