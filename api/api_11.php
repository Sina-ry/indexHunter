<?php

header("Content-Type: text/html; charset=UTF-8");
header("Access-Control-Allow-Origin: *");

include_once $_SERVER['DOCUMENT_ROOT'] . "/inc/database1.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/inc/library.php";

$now_date = date("Ymd"); 
$now_time = date("His"); 
$curTime = $now_date . $now_time;

$mode = $_REQUEST['mode'];
$b_title = $_REQUEST['b_title'];
$b_custname = $_REQUEST['uaddr'];;
$b_memo = $_REQUEST['b_memo'];


$b_popup_flag = "N";

$filename1 = "";
$filename2 = "";
$filename3 = "";
$filename4 = "";
$filename5 = "";
$filename6 = "";
$filename7 = "";
$filename8 = "";
$filename9 = "";
$filename10 = "";

if($mode == "insert") {

	$sql1 = "INSERT INTO tc_board (b_gubun, b_title, b_memo, b_custname, b_readcnt, b_file01, b_file02, b_file03, b_file04, b_file05, b_file06, b_file07, b_file08, b_file09, b_file10, b_popup_flag, b_regdate) VALUES ( " ;
	$sql1 = $sql1 . "'02','". $b_title ."','". $b_memo."','". $b_custname."','0','". $filename1."','". $filename2."','". $filename3."','". $filename4."','". $filename5."','". $filename6."','". $filename7."','". $filename8."','". $filename9 ."','".$filename10."','".$b_popup_flag."','".$curTime . "')";

	if ($connect1->query($sql1) === TRUE) {
		$json1 = json_encode(array("ret"=>"200","msg"=>"success"), JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);
	}else{
		$json1 = json_encode(array("ret"=>"400","msg"=>"DB Error" ), JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);
	}
}


echo $json1;

mysqli_close($connect1);

?>
