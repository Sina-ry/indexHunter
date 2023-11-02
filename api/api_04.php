<?php

header("Content-Type: text/html; charset=UTF-8");
header("Access-Control-Allow-Origin: *");

include_once $_SERVER['DOCUMENT_ROOT'] . "/inc/database.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/inc/database1.php";

function format_datetime($arg_datetime) {
		
		if (strlen($arg_datetime) > 10) {
			
			$tmp_date = substr($arg_datetime,0,4) . "-" . substr($arg_datetime,4,2) . "-" . substr($arg_datetime,6,2) . " " . substr($arg_datetime,8,2). ":" . substr($arg_datetime,10,2) . ":" . substr($arg_datetime,12,2);
		}else {
			$tmp_date = $arg_datetime;
		}
		
		return $tmp_date;
}

function callAPI($arg_amount, $arg_account, $arg_addr ){

	$ch = curl_init();  

	$url = "http://115.68.73.176/ESR/index.php?METHOD=WITHDRAWAL&amount=" . $arg_amount . "&account=" . $arg_account . "&to_address=" . $arg_addr;

    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    
	$output=curl_exec($ch);
	//var_dump($output);

	$object = json_decode($output);
	
    curl_close($ch);
	return $object;
}

$email = $_REQUEST['email'];
$category = $_REQUEST['category'];
$now_point = $_REQUEST['now_point'];
$amount = $_REQUEST['amount'];
$wallet = $_REQUEST['wallet'];

$change_coin = $amount * 1;

$now_date = date("Ymd"); 
$now_time = date("His"); 
$curTime = $now_date . $now_time;

$sFdate = format_datetime($sDate);

$data = array(); 
$data_popup = array(); 

$list_cnt = 0;
$sql = "select * from users where email = '".$email."' ";

$rs = mysqli_query($connect,$sql);
if(mysqli_num_rows($rs) > 0) {
	$info = mysqli_fetch_array($rs);
	
	$tmp_now_point = 0;
	switch($category) {
		case "ESRC" : $tmp_now_point = $info["esr"];
					  break;
		case "NBC" : $tmp_now_point = $info["nb"];
					  break;
		case "BTC" : $tmp_now_point = $info["bit"];
					  break;
		case "ETH" : $tmp_now_point = $info["eth"];
					  break;
		case "RSX" : $tmp_now_point = $info["rsx"];
					  break;
	}
	
	if($tmp_now_point < $amount) {
		$json1 = json_encode(array("ret"=>"400","email"=>$email,  "msg"=>"전환금액 오류 입니다"), JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);
	}else{

		$ret_val = callAPI($change_coin , "esrhunter", $wallet);

		$s_now_point = $now_point;
		if($now_point > $tmp_now_point) {
			$s_now_point = $tmp_now_point;
		}

		if($ret_val->result == "ok" && $ret_val->msg == "Success" && $ret_val->txid <> "") {

			$sql = "INSERT INTO exchange(userID, wallet, u_email, category, amount, now_point, change_coin,  ex_date, tx_id, ex_status, comment, admin_msg, admin_date) ";
			$sql = $sql . " VALUES ( '" . $info["id"] . "','" . $wallet ."','" . $email . "','" . $category . "','" .$amount. "','" . $s_now_point . "','". $change_coin . "','"$curTime ."','".$ret_val->txid."','B','','','')" ;

			if ($connect1->query($sql) === TRUE) {
					$s_final = $tmp_now_point - $amount;
					$sql = "update users set  ";

					switch($category) {
						case "ESRC" : $sql = $sql . " esr = '".$s_final."' ";
									  break;
					}
					$sql = $sql . " where email = '".$email."' ";

					if ($connect->query($sql) === TRUE) {
							$json1 = json_encode(array("ret"=>"200","email"=>$email, "msg"=>"전환신청이 잘 되었습니다"), JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);
					} else {
							$json1 = json_encode(array("ret"=>"401","email"=>$email, "msg"=>$connect->error), JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);
					}
			} else {
					$json1 = json_encode(array("ret"=>"401","email"=>$email, "msg"=>$connect->error), JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);
			}

			

		}else{
			$json1 = json_encode(array("ret"=>"402","email"=>$email, "msg"=>"사용량이 많습니다 잠시후에 사용해 주세요"), JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);
		}
	}

}else{
	$json1 = json_encode(array("ret"=>"403","email"=>$email, "msg"=>"사용량이 많습니다 잠시후에 사용해 주세요"), JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);
}
  
echo $json1;

mysqli_close($connect);
mysqli_close($connect1);
?>
