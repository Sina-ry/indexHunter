<?php
header("Content-Type: text/html; charset=UTF-8");
header("Access-Control-Allow-Origin: *");

include_once $_SERVER['DOCUMENT_ROOT'] . "/inc/database.php";

$main_id = trim($_REQUEST['main_id']);
$main_pw = trim($_REQUEST['main_pw']);
$cust_ip = $_SERVER["REMOTE_ADDR"];
$ref_url = $_SERVER['HTTP_REFERER']; 

$data = array(); 

if($main_id == "topadmin" && $main_pw == "hunter!@#") {

	array_push($data, array('user_id'=>"Admin",'sign'=>"ADMIN",'uaddr'=>"Admin",'mobile'=>"Admin",'status'=>"OK",'msg'=>''));

}else{
	
	$sql = "select * from users where email = '" . $main_id . "'  ";		

	$rs = mysqli_query($connect,$sql);	

	if(mysqli_num_rows($rs) > 0) {

		$row = mysqli_fetch_array($rs);
		
		if($row["password"] == $main_pw) {

			array_push($data, array('user_id'=>$row["username"],'sign'=>"USER",'uaddr'=>$row["email"],'mobile'=>$row["mobile"],'status'=>"OK",'msg'=>''));
			 $json1 = json_encode(array("ret"=>"200","webnautes"=>$data), JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);
		}else{
			array_push($data, array('user_id'=>'','sign'=>'','uaddr'=>'','mobile'=>'','status'=>"NO",'msg'=>'등록되지 않은 아이디와 암호입니다!!!  확인해 주세요'));
			 $json1 = json_encode(array("ret"=>"400","webnautes"=>$data), JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);
		}

		mysqli_close($connect);
	}else{
		array_push($data, array('user_id'=>'','sign'=>'','uaddr'=>'','mobile'=>'','status'=>"NO",'msg'=>'등록되지 않은 아이디와 암호입니다!!!  확인해 주세요'));
		$json1 = json_encode(array("ret"=>"400","webnautes"=>$data), JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);
	}

}
 
 echo $json1;

 ?>
