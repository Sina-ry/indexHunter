<?php
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
include_once $_SERVER['DOCUMENT_ROOT'] . "/html_header.php";
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

header("Content-Type: text/html; charset=utf-8");

define("_debug", "");	

$main_id = trim($_POST['main_id']);
$main_pw = trim($_POST['main_pw']);
$cust_ip = $_SERVER["REMOTE_ADDR"];
$ref_url = $_SERVER['HTTP_REFERER']; 


if($main_id == "topadmin" && $main_pw == "hunter!@#") {

	$_SESSION['_user_id']  = "Admin" ; 
	$_SESSION['_sign']  = "ADMIN";
	$_SESSION['_uaddr'] = "Admin" ; 
	$_SESSION['_mobile']  = "Admin" ; 
	$now_date = date("Ymd"); 
	$now_time = date("His"); 
	
	$curTime = $now_date . $now_time;
	$url = "main.php";

}else{
	
	$sql = "select * from users where email = '" . $main_id . "'  ";		

	$rs = mysqli_query($connect,$sql);	

	if(mysqli_num_rows($rs) > 0) {

		$row = mysqli_fetch_array($rs);
		
		if($row["password"] == $main_pw) {
			$_SESSION['_user_id']  = $row["username"] ; 
			$_SESSION['_sign']  = "USER";
			$_SESSION['_uaddr'] = $row["email"];
			$_SESSION['_mobile']  = $row["mobile"];	
			$now_date = date("Ymd"); 
			$now_time = date("His"); 
			
			$curTime = $now_date . $now_time;
			$url = "main.php";
		}else{
			echo "<script>alert( '등록되지 않은 아이디와 암호입니다!!!  확인해 주세요 '); history.back(); </script>";
		}

		mysqli_close($connect);
	}else{
		echo "<script>alert( '등록되지 않은 아이디와 암호입니다!!!  확인해 주세요 '); history.back(); </script>";
	}

}
 ?>
<script language="JavaScript">
	location.href="<?php echo $url;?>"
</script>