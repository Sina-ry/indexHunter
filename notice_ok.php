<?php

//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
include_once $_SERVER['DOCUMENT_ROOT'] . "/html_header.php";
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++


$now_date = date("Ymd"); 
$now_time = date("His"); 
$curTime = $now_date . $now_time;

$sidx = $_POST['idx'];
$pg = $_POST['pg'];
$spg = $_POST['spg'];
$shn = $_POST['shn'];
$s_pagecnt = $_POST['s_pagecnt'];

$mode = $_POST['mode'];
$mpage = $_POST['mpage'];
$spage = $_POST['spage'];

$b_title = $_POST['b_title'];
$b_custname = trim($_POST['b_custname']);
$b_memo = trim($_POST['b_memo']);
$b_popup_flag = $_POST['b_popup_flag'];

$path = "./upload/"; 

$filename1 = $_POST['old_b_file01'];
if (strlen($_FILES["b_file01"]["name"]) >  0 ) {							
	if ($_FILES["b_file01"]["error"] < 1)
	{	  					  		
		$filename1=$_FILES["b_file01"]["name"];			
		copy($_FILES["b_file01"]["tmp_name"], $path.$filename1);
	}  								          	        			
}

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
	$sql1 = $sql1 . "'01','". $b_title ."','". $b_memo."','". $b_custname."','0','". $filename1."','". $filename2."','". $filename3."','". $filename4."','". $filename5."','". $filename6."','". $filename7."','". $filename8."','". $filename9 ."','".$filename10."','".$b_popup_flag."','".$curTime . "')";

	if ($connect->query($sql1) === TRUE) {
		$ret_val = "처리가 잘 되었습니다";
	}else{
		$ret_val = "처리에 오류 발생했습니다";		
	}
	
	$aa = "notice.php?pg=" . $pg . "&spg=" . $spg . "&shn=" . $shn . "&mpage=". $mpage ."&spage=" .$spage. "&s_pagecnt=" . $s_pagecnt ;

}elseif($mode == "del") {

	$sql1 = "delete from  tc_board "     ;
	$sql1 =  $sql1 .  " where idx = '" . $sidx . "' ";

	//echo $sql1;
	$aa = "notice.php?pg=" . $pg . "&spg=" . $spg . "&shn=" . $shn . "&mpage=". $mpage ."&spage=" .$spage. "&s_pagecnt=" . $s_pagecnt ;

	if ($connect->query($sql1) === TRUE) {
		$ret_val = "처리가 잘 되었습니다";
	}else{
		$ret_val = "처리에 오류 발생했습니다";
	}

}else{
	
	$sql1 = "update tc_board  set b_popup_flag = '".$b_popup_flag."', b_title = '". $b_title ."', b_memo ='".$b_memo."', b_custname ='".$b_custname."', b_file01 = '" .$filename1. "',b_file02= '".$filename2."',b_file03= '".$filename3."', b_file04 = '".$filename4."', b_file05 = '".$filename5."' "     ;
	$sql1 =  $sql1 .  " where idx = '" . $sidx . "' ";

	//echo $sql1;
	$aa = "notice_write.php?mode=update&idx=" . $sidx . "&pg=" . $pg . "&spg=" . $spg . "&shn=" .$shn . "&mpage=". $mpage ."&spage=" .$spage."&s_pagecnt=" . $s_pagecnt ;

	if ($connect->query($sql1) === TRUE) {
		$ret_val = "처리가 잘 되었습니다";
	}else{
		$ret_val = "처리에 오류 발생했습니다";
	}
}

			
mysqli_close($connect);

?>
<script language="JavaScript">
    alert("<?php echo $ret_val;?>");
	parent.location.href="<?php echo $aa; ?>";
</script> 