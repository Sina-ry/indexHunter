<?php

header("Content-Type: text/html; charset=UTF-8");
header("Access-Control-Allow-Origin: *");

include_once $_SERVER['DOCUMENT_ROOT'] . "/inc/database1.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/inc/library.php";


$s_idx = $_REQUEST['s_idx'];
$sPage = $_REQUEST['sPage'];
$page = $_REQUEST['pg'];	
$uaddr = $_REQUEST['uaddr'];



$sql1 = " SELECT * FROM tc_board where idx = '".$s_idx."' and b_custname = '". $uaddr."'  "	;
$result1 = mysqli_query($connect1, $sql1);
$row = mysqli_fetch_array($result1);




$data = array(); 

$sql1 = " SELECT * FROM tc_board where b_gubun = '02' and b_custname = '". $uaddr."'  and idx > '".$s_idx."' order by idx  limit 0, 1  "	;
$result3 = mysqli_query($connect1, $sql1);
if(mysqli_num_rows($result3) > 0) {
	$row_next = mysqli_fetch_array($result3);
	$pre = "<a href='./notice_view.html?mode=update&idx=" . $row_next["idx"] . "'>" . $row_next["b_title"] . "</a>";
}else{
	$pre = "";
}

$sql1 = " SELECT * FROM tc_board where b_gubun = '02' and b_custname = '". $uaddr."'  and idx < '".$s_idx."' order by idx desc limit 0, 1  "	;
	
$result3 = mysqli_query($connect1, $sql1);
if(mysqli_num_rows($result3) > 0) {

	$row_next = mysqli_fetch_array($result3);
	$next = "<a href='./notice_view.html?mode=update&idx=" . $row_next["idx"] . "'>" . $row_next["b_title"] . "</a>";
}else{
	$next = "";
}


$sql1 = " SELECT * FROM tc_board where idx = '".$s_idx."' "	;
$result1 = mysqli_query($connect1, $sql1);
$row = mysqli_fetch_array($result1);

$b_file01 = "<a href=\"http://115.68.73.175/upload/" . $row['b_file01'] . "\" >" . $row['b_file01'] . "</a>";

//$tmp_memo = str_replace(chr(13),"<br>",$row['b_memo']);

//$tmp_memo = nl2br($row['b_memo']);

array_push($data, array('b_title'=>$row["b_title"],'b_custname'=>$row["b_custname"], 'b_custname'=>$row["b_custname"], 'b_readcnt'=>$row["b_readcnt"],  'b_regdate'=>format_sdate($row["b_regdate"]),'b_memo'=>$row['b_memo'] , 'b_file01'=>$b_file01 , 'pre'=>$pre, 'next'=>$next ));

$json1 = json_encode(array("ret"=>"200","view"=>$data[0] ), JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);

echo $json1;

mysqli_close($connect1);

?>
