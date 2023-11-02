<?php

header("Content-Type: text/html; charset=UTF-8");
header("Access-Control-Allow-Origin: *");

include_once $_SERVER['DOCUMENT_ROOT'] . "/inc/database1.php";

function format_fromdate($arg_datetime) {
		
		if (strlen($arg_datetime) == 10) {			
			$tmp_date =  substr($arg_datetime,6,4) . substr($arg_datetime,0,2) .  substr($arg_datetime,3,2) . "000000"; 
		}else {
			$tmp_date = "";
		}
		
		return $tmp_date;
}

function format_todate($arg_datetime) {
		
		if (strlen($arg_datetime) == 10) {			
			$tmp_date =  substr($arg_datetime,6,4) . substr($arg_datetime,0,2) .  substr($arg_datetime,3,2) . "999999"; 
		}else {
			$tmp_date = "";
		}
		
		return $tmp_date;
}

function format_date($arg_date) {
		$tmp_date = substr($arg_date,4,2) . "-" . substr($arg_date,6,2) . " " . substr($arg_date,8,2). ":" . substr($arg_date,10,2) ;
		return $tmp_date;
}

$email = $_REQUEST['email'];
$category = $_REQUEST['category'];
$from_date = $_REQUEST['from_date'];
$to_date = $_REQUEST['to_date'];

$data = array(); 


$sql = "select * from exchange   where u_email = '".$email."' " ;
if(format_fromdate($from_date) <> "") {
	$sql = $sql . " and ex_date >= '".format_fromdate($from_date)."'";
}

if(format_todate($to_date) <> "") {
	$sql = $sql . " and ex_date <= '".format_todate($to_date)."'";
}

$sql = $sql . " order by idx desc  ";

$rs = mysqli_query($connect1,$sql);
while($info = mysqli_fetch_array($rs)) {	

	array_push($data, array('ex_date'=>format_date($info["ex_date"]),'amount'=>$info["amount"],'change_coin'=>$info["change_coin"],"msg"=>"Send Success" ));
}


$json1 = json_encode(array("ret"=>"200","list"=>$data, "now_point"=>0), JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);

echo $json1;

mysqli_close($connect1);
?>
