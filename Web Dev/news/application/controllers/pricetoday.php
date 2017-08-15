<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pricetoday extends CI_Controller {
	public function send_notifications()
{
    $this->load->library('apn');
    $this->apn->payloadMethod = 'enhance'; // включите этот метод для отладки
    $this->apn->connectToPush();
    
//    $this -> load -> model('mpricetoday');
//    $prices = $this -> mpricetoday -> getdata();
//    
//    $price = $prices[0];
    
    $this -> load -> model('mdevice');
    $devices = $this -> mdevice -> get_device();
    foreach ($devices as $key => $value) {
    $send_result = $this->apn->sendMessage($value['token'], "msg", /*badge*/ 1, /*sound*/ 'default'  );

    }

    // adding custom variables to the notification
    //$this->apn->setData(array( 'someKey' => true ));

    
	//echo $send_result;
    if($send_result)
        log_message('debug','send complete');
    else
        log_message('error',$this->apn->error);


    $this->apn->disconnectPush();
}
// designed for retreiving devices, on which app not installed anymore




public function apn_feedback()
{
    $this->load->library('apn');

    $unactive = $this->apn->getFeedbackTokens();

    if (!count($unactive))
    {
        log_message('info','Feedback: No devices found. Stopping.');
        return false;
    }

    foreach($unactive as $u)
    {
        $devices_tokens[] = $u['devtoken'];
    }

    /*
    print_r($unactive) -> Array ( [0] => Array ( [timestamp] => 1340270617 [length] => 32 [devtoken] => 002bdf9985984f0b774e78f256eb6e6c6e5c576d3a0c8f1fd8ef9eb2c4499cb4 ) ) 
    */
}
	function getdata()
	{
		# Use the Curl extension to query Google and get back a page of results
		$url = "http://www.goldtraders.or.th/Default.aspx";
		$ch = curl_init();
		$timeout = 5;
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		$html = curl_exec($ch);
		curl_close($ch);

		# Create a DOM parser object
		$dom = new DOMDocument();
		# Parse the HTML from Google.
		# The @ before the method call suppresses any warnings that
		# loadHTML might throw because of invalid HTML in the page.
		@$dom->loadHTML($html);

		# Iterate over all the <a> tags
		foreach($dom->getElementsByTagName('span') as $link) {

			if($link->getAttribute('id')=='DetailPlace_uc_goldprices1_lblBLBuy'){
				 $goldprices1_lblBLBuy= $link->textContent;
			}
			else if($link->getAttribute('id')=='DetailPlace_uc_goldprices1_lblBLSell'){
				 $goldprices1_lblBLSell= $link->textContent;
			}
			else if($link->getAttribute('id')=='DetailPlace_uc_goldprices1_lblOMBuy'){
				 $goldprices1_lblOMBuy= $link->textContent;
			}
			else if($link->getAttribute('id')=='DetailPlace_uc_goldprices1_lblOMSell'){
				 $goldprices1_lblOMSell= $link->textContent;
			}
		}
			$this->load->model('mpricetoday');	
			$pricetoday=$this->mpricetoday->getdata();
			if ($pricetoday==null) {
				$price = array(
					'date' => date('Y-m-d H:i:s'),
					'prices1_lblBLBuy' =>$goldprices1_lblBLBuy,
					'prices1_lblBLSell' =>$goldprices1_lblBLSell,
					'prices1_lblOMBuy' =>$goldprices1_lblOMBuy,
					'prices1_lblOMSell' =>$goldprices1_lblOMSell,
				);
				$this->db->insert('pricetoday',$price);
			}else{
				if (($pricetoday[0]['prices1_lblBLBuy']!=$goldprices1_lblBLBuy)||($pricetoday[0]['prices1_lblBLSell']!=$goldprices1_lblBLSell)||($pricetoday[0]['prices1_lblOMBuy']!=$goldprices1_lblOMBuy)||($pricetoday[0]['prices1_lblOMSell']!=$goldprices1_lblOMSell)) {
					$price = array(
						'id' => $pricetoday[0]['id'],
						'date' => date('Y-m-d H:i:s'),
						'prices1_lblBLBuy' =>$goldprices1_lblBLBuy,
						'prices1_lblBLSell' =>$goldprices1_lblBLSell,
						'prices1_lblOMBuy' =>$goldprices1_lblOMBuy,
						'prices1_lblOMSell' =>$goldprices1_lblOMSell,
					);
					$this->mpricetoday->updatedata($price);
	
					$this->send_notifications();
				}
			}		
	}
	public function message()
	{
		$all_session = $this->session->all_userdata();
		if (isset($all_session['account'])) {
			$data['master']= "head";
			$this->load->view('pricetoday/message',$data);		
		}else{
			redirect('product');	
		}		
		
	}
	public function notification()
	{
		$all_session = $this->session->all_userdata();
		if (isset($all_session['account'])) {
			$data['master']= "head";
			$this->load->view('pricetoday/notification');
		}else{
			redirect('product');	
		}	
		
	}
	public function getformnotification()
	{
		
	}
}