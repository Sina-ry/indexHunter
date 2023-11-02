<?php

header("Content-Type: text/html; charset=UTF-8");
header("Access-Control-Allow-Origin: *");

include_once $_SERVER['DOCUMENT_ROOT'] . "/inc/database1.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/inc/library.php";


$boGubun = $_REQUEST['boGubun'];
$sPage = $_REQUEST['sPage'];

$sDate = $_REQUEST['sDate'];
$sCode = $_REQUEST['sCode'];
$hCode = "mbc3377!@#";
$sFdate = format_datetime($sDate);

$data = array(); 
$data_popup = array(); 

$list_cnt = 0;
$sql = "select * from tc_board where b_gubun = '".$boGubun."' order by idx desc limit 0, ".$sPage." ";

$rs = mysqli_query($connect1,$sql);
while($info = mysqli_fetch_array($rs)) {	  
	$list_cnt = $list_cnt + 1;
	array_push($data, array('no'=>$list_cnt, 'idx'=>$info["idx"],'b_title'=>$info["b_title"], 'b_custname'=>$info["b_custname"], 'b_readcnt'=>$info["b_readcnt"],  'b_regdate'=>format_sdate($info["b_regdate"]) ));
}


$popup_cnt = 0;
$sql = "select  * from  tc_board  where b_gubun = '01' and b_popup_flag = 'Y' limit 0 , 1  ";
$rs = mysqli_query($connect1,$sql);
while($info = mysqli_fetch_array($rs)) {	
	$popup_cnt = $popup_cnt + 1;
	array_push($data_popup, array('idx'=>$info["idx"],'b_title'=>$info["b_title"], 'b_memo'=>str_replace(chr(13),"<br>",$info['b_memo']), 'b_regdate'=>$info["b_regdate"] ));
}



$json1 = json_encode(array("ret"=>"200","list"=>$data, "list_cnt"=>$list_cnt, "popup"=>$data_popup , "popup_cnt"=>$popup_cnt), JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);

echo $json1;

mysqli_close($connect1);

?>
