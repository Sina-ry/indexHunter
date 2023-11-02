<?php
	function format_date($arg_date) {
		$tmp_date = substr($arg_date,0,4) . "-" . substr($arg_date,4,2) . "-" . substr($arg_date,6,2);
		echo $tmp_date;
	}
	
	function format_datetime($arg_datetime) {
		
		if (strlen($arg_datetime) > 10) {
			
			$tmp_date = substr($arg_datetime,0,4) . "-" . substr($arg_datetime,4,2) . "-" . substr($arg_datetime,6,2) . " " . substr($arg_datetime,8,2). ":" . substr($arg_datetime,10,2) . ":" . substr($arg_datetime,12,2);
		}else {
			$tmp_date = $arg_datetime;
		}
		
		echo $tmp_date;
	}
	
	function format_time($arg_time) {
		$tmp_time = substr($arg_time,0,2) . ":" . substr($arg_time,2,2) ;
		echo $tmp_time;
	}
	
	function format_telno($arg_tel) {
		
		if (strlen($arg_tel) == 11) {
			$tmp_tel = 	substr($arg_tel,0,3) . "-" . substr($arg_tel,3,4) . "-" . substr($arg_tel,7,4);
		}else{
			if (strlen($arg_tel) == 10) {
				$tmp_tel = 	substr($arg_tel,0,3) . "-" . substr($arg_tel,3,3) . "-" . substr($arg_tel,6,4);
			}else{
				$tmp_tel = 	$arg_tel;
			}
	    }
		
		echo $tmp_tel;
	}
	
	
	function create_select( $array, $sel, $key_on=false ) {
	$return = "";
	foreach($array as $key=>$val) {
		if($key==$sel) $selected = " selected";
		else $selected = "";
		if($key_on==true) {
			$return.= "<option value='".$key."'".$selected.">".$key." ".$val."</option>";
		} else {
			$return.= "<option value='".$key."'".$selected.">".$val."</option>";
		}
	}

	return $return;
}

	function format_date_mmdd($arg_date) {
		$tmp_date =  substr($arg_date,4,2) . "." . substr($arg_date,6,2);
		echo $tmp_date;
	}
	
	function format_date_mmdd1($arg_date) {
		$tmp_date =  substr($arg_date,4,2) . "-" . substr($arg_date,6,2);
		echo $tmp_date;
	}
	
	function format_date1($arg_date) {
		$tmp_date = substr($arg_date,0,4) . "." . substr($arg_date,4,2) . "." . substr($arg_date,6,2);
		echo $tmp_date;
	}
	
	function format_datetime1($arg_datetime) {
		$tmp_date = substr($arg_datetime,4,2) . "-" . substr($arg_datetime,6,2) . " " . substr($arg_datetime,8,2). ":" . substr($arg_datetime,10,2) ;
		echo $tmp_date;
	}

	function cint($num, $d = 0)
	{
	 return sgn($num)*cfloor(abs($num), $d);
	}
	function cfloor( $val, $d )
	{
	 return floor($val * pow (10, $d) )/ pow (10, $d) ;
	}
	function sgn($x)
	{
	 return $x ? ($x>0 ? 1 : -1) : 0;
	}
	


?>	