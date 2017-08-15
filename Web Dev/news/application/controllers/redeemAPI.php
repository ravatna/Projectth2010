<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class RedeemAPI  extends CI_Controller {
	
	function redeem() {
		$this->load->model('mpricetoday');
       	$stmt = $this->mpricetoday->prepare();
        $stmt->execute();
        $stmt->bind_result($id, $code, $unlock_code, $uses_remaining);
        while ($stmt->fetch()) {
            echo "$code has $uses_remaining uses remaining!";
        }
        $stmt->close();
    }
}
