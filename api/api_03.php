<?php

header("Content-Type: text/html; charset=UTF-8");
header("Access-Control-Allow-Origin: *");

include_once $_SERVER['DOCUMENT_ROOT'] . "/inc/database.php";

function format_datetime($arg_datetime) {
		
		if (strlen($arg_datetime) > 10) {
			
			$tmp_date = substr($arg_datetime,0,4) . "-" . substr($arg_datetime,4,2) . "-" . substr($arg_datetime,6,2) . " " . substr($arg_datetime,8,2). ":" . substr($arg_datetime,10,2) . ":" . substr($arg_datetime,12,2);
		}else {
			$tmp_date = $arg_datetime;
		}
		
		return $tmp_date;
}

$email = $_REQUEST['email'];
$category = $_REQUEST['category'];

$sFdate = format_datetime($sDate);

$data = array(); 
$data_popup = array(); 

$list_cnt = 0;
$sql = "select * from users where email = '".$email."' ";

$rs = mysqli_query($connect,$sql);
if(mysqli_num_rows($rs) > 0) {
	$info = mysqli_fetch_array($rs);
	
	$now_point = 0;
	switch($category) {
		case "ESRC" : $now_point = $info["esr"];
					  break;
		case "NBC" : $now_point = $info["nb"];
					  break;
		case "BTC" : $now_point = $info["bit"];
					  break;
		case "ETH" : $now_point = $info["eth"];
					  break;
		case "RSX" : $now_point = $info["rsx"];
					  break;
	}
	
	$json1 = json_encode(array("ret"=>"200","email"=>$email, "now_point"=>$now_point), JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);

}else{
	$json1 = json_encode(array("ret"=>"400","email"=>$email, "now_point"=>0), JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);
}
  
echo $json1;

mysqli_close($connect);

?>
