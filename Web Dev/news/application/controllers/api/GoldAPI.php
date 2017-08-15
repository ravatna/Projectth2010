<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class GoldAPI extends REST_Controller {
	/***************** List all product ****************/
	public function listProduct_post() {
		$response = $this -> mproduct -> listproducts();
		if ($response) {
			//$this->response->set_header('Content-Type','application/json');
			$this -> response($response, 200);
			// 200 being the HTTP response code
		} else {
			$this -> response(array('error' => 'Product list could not be found'), 404);
		}
	}

	public function listProduct_get() {
		$this -> load -> model('mproducts');
		$response = $this -> mproducts -> listproducts();
		if ($response) {
			//$this->response->set_header('Content-Type','application/json');
			$this -> response($response, 200);
			// 200 being the HTTP response code
		} else {
			$this -> response(array('error' => 'Product list could not be found'), 404);
		}
	}

	/*********** Product detail ************/
	public function productDetail_post() {
		$id=$this-> post('productID', TRUE);
		if(!$id)
        {
        	$data = array('Message' => 'Product id is null' );
        	$this->response($data, 400);
			return;
        }
		
		$this->load->model('mproducts');
		$response = $this ->mproducts->products($id);
		$imgs = $this->mproducts->getImageArray($id);
        if($response)
        {
        	//$this->response->set_header('Content-Type','application/json');
            $this->response(array('product' =>$response[0],'album'=>$imgs), 200); // 200 being the HTTP response code
        }

        else
        {
            $this->response(array('error' => 'Product detail could not be found'), 404);
        }
	}

	public function productDetail_get() {
		$id=$this-> get('productID', TRUE);
		if(!$id)
        {
        	$data = array('Message' => 'Product id is null' );
        	$this->response($data, 400);
			return;
        }
		$this->load->model('mproducts');
		$response = $this ->mproducts->products($id);
		$imgs = $this->mproducts->getImageArray($id);
        if($response)
        {
        	//$this->response->set_header('Content-Type','application/json');
            //$this->response($response, 200); // 200 being the HTTP response code
            $this->response(array('product' =>$response[0],'album'=>$imgs), 200); // 200 being the HTTP response code
        }

        else
        {
            $this->response(array('error' => 'Product detail could not be found'), 404);
        }
	}

	/***************** List News ****************/
	public function listNews_post() {
		$this -> load -> model('mnews');
		$response = $this -> mnews -> listnews();
		if ($response) {
			//$this->response->set_header('Content-Type','application/json');
			$this -> response($response, 200);
			// 200 being the HTTP response code
		} else {
			$this -> response(array('error' => 'News list could not be found'), 404);
		}
	}

	public function listNews_get() {
		$this -> load -> model('mnews');
		$response = $this -> mnews -> listnews();
		if ($response) {
			//$this->response->set_header('Content-Type','application/json');
			$this -> response($response, 200);
			// 200 being the HTTP response code
		} else {
			$this -> response(array('error' => 'News list could not be found'), 404);
		}
	}

	/*********************** News detail **********************/
	public function newsDetail_post() {
		$id = $this -> post('newsID', TRUE);
		if (!$id) {
			$data = array('Message' => 'News id is null');
			$this -> response($data, 400);
			return;
		}

		$this -> load -> model('mnews');
		$response = $this -> mnews -> news($id);
		if ($response) {
			//$this->response->set_header('Content-Type','application/json');
			$this -> response($response, 200);
			// 200 being the HTTP response code
		} else {
			$this -> response(array('error' => 'News detail could not be found'), 404);
		}
	}

	public function newsDetail_get() {
		$id = $this -> get('newsID', TRUE);
		if (!$id) {
			$data = array('Message' => 'News id is null');
			$this -> response($data, 400);
			return;
		}
		$this -> load -> model('mnews');
		$response = $this -> mnews -> news($id);
		if ($response) {
			//$this->response->set_header('Content-Type','application/json');
			$this -> response($response, 200);
			// 200 being the HTTP response code
		} else {
			$this -> response(array('error' => 'News detail could not be found'), 404);
		}
	}




	//
	/***************** List Activity ****************/
	public function listActivity_post() {
		$this -> load -> model('mactivity');
		$response = $this -> mactivity -> listactivity();
		if ($response) {
			//$this->response->set_header('Content-Type','application/json');
			$this -> response($response, 200);
			// 200 being the HTTP response code
		} else {
			$this -> response(array('error' => 'Activity list could not be found'), 404);
		}
	}

	public function listActivity_get() {
		$this -> load -> model('mactivity');
		$response = $this -> mactivity -> listactivity();
		if ($response) {
			//$this->response->set_header('Content-Type','application/json');
			$this -> response($response, 200);
			// 200 being the HTTP response code
		} else {
			$this -> response(array('error' => 'Activity list could not be found'), 404);
		}
	}

	/*********************** Activity detail **********************/
	public function ActivityDetail_post() {
		$id = $this -> post('activityID', TRUE);
		if (!$id) {
			$data = array('Message' => 'Activity id is null');
			$this -> response($data, 400);
			return;
		}

		$this -> load -> model('mactivity');
		$response = $this -> mactivity -> activity($id);
		if ($response) {
			//$this->response->set_header('Content-Type','application/json');
			$this -> response($response, 200);
			// 200 being the HTTP response code
		} else {
			$this -> response(array('error' => 'Activity detail could not be found'), 404);
		}
	}

	public function activityDetail_get() {
		$id = $this -> get('activityID', TRUE);
		if (!$id) {
			$data = array('Message' => 'Activity id is null');
			$this -> response($data, 400);
			return;
		}
		$this -> load -> model('mactivity');
		$response = $this -> mactivity -> activity($id);
		if ($response) {
			//$this->response->set_header('Content-Type','application/json');
			$this -> response($response, 200);
			// 200 being the HTTP response code
		} else {
			$this -> response(array('error' => 'Product detail could not be found'), 404);
		}
	}

	public function activityDate_post() {
		$date = $this -> post('start', TRUE);
		if (!$date) {
			$data = array('Message' => 'Activity id is null');
			$this -> response($data, 400);
			return;
		}

		$this -> load -> model('mactivity');
		$response = $this -> mactivity -> activitydate($date);
		if ($response) {
			//$this->response->set_header('Content-Type','application/json');
			$this -> response($response, 200);
			// 200 being the HTTP response code
		} else {
			$this -> response(array('error' => 'Activity detail could not be found'), 404);
		}
	}

	public function activityDate_get() {
		$date = $this -> get('start', TRUE);
		if (!$date) {
			$data = array('Message' => 'Activity id is null');
			$this -> response($data, 400);
			return;
		}
		$this -> load -> model('mactivity');
		$response = $this -> mactivity -> activitydate($date);
		if ($response) {
			//$this->response->set_header('Content-Type','application/json');
			$this -> response($response, 200);
			// 200 being the HTTP response code
		} else {
			$this -> response(array('error' => 'Activity detail could not be found'), 404);
		}
	}

	/****************************** price gold ***********************/
	public function priceToday_post() {
		$this -> load -> model('mpricetoday');
		$response = $this -> mpricetoday -> getdata();
		if ($response) {
			//$this->response->set_header('Content-Type','application/json');
			$this -> response($response, 200);
			// 200 being the HTTP response code
		} else {
			$this -> response(array('error' => 'Activity list could not be found'), 404);
		}
	}

	public function priceToday_get() {
		$this -> load -> model('mpricetoday');
		$response = $this -> mpricetoday -> getdata();
		if ($response) {
			//$this->response->set_header('Content-Type','application/json');
			$this -> response($response, 200);
			// 200 being the HTTP response code
		} else {
			$this -> response(array('error' => 'Activity list could not be found'), 404);
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
