<?php
class CenterFunc {
	  function get_now(){
	    $format = 'DATE_W3C';
  		$time = time();
        return standard_date($format, $time);	 
   }
}
?>