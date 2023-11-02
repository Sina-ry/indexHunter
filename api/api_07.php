<?php

header("Content-Type: text/html; charset=UTF-8");
header("Access-Control-Allow-Origin: *");

include_once $_SERVER['DOCUMENT_ROOT'] . "/inc/database1.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/inc/library.php";


$boGubun = $_REQUEST['boGubun'];
$sPage = $_REQUEST['sPage'];
$page = $_REQUEST['pg'];	

$shn = $_REQUEST['shn'];

$sDate = $_REQUEST['sDate'];
$sCode = $_REQUEST['sCode'];
$hCode = "mbc3377!@#";
$sFdate = format_datetime($sDate);



$s_pagecnt = 15;
$stpage = (($page -1)-($page - 1) % 10) / 10;
	
$page = $page - $stpage * 10 ;

$sql1 = " SELECT count(idx) as cntID FROM tc_board where b_gubun = '".$boGubun."' "	;
	
if (strlen($shn) > 0 ) {	 	
	$sql1 = $sql1 . " and (b_title like  '%" . $shn . "%' or b_memo like '%" . $shn . "%' or b_custname like '%" .$shn. "%' ) " ; 	 	
}	

$result1 = mysqli_query($connect1, $sql1);
$row = mysqli_fetch_array($result1);
$max_cnt = $row['cntID']; 



$data = array(); 
$data_popup = array(); 

$list_cnt = $max_cnt;

$row_index = 0;
$row_id = $max_cnt - ($page - 1 ) * $s_pagecnt;

$sql1 = "select  * from  tc_board  where b_gubun = '01' "	;
if (strlen($shn) > 0 ) {	 	
	$sql1 = $sql1 . " and (b_title like  '%" . $shn . "%' or b_memo like '%" . $shn . "%' or b_custname like '%" .$shn. "%' ) " ; 	 	
}	

$sql1 = $sql1 . "  order by idx desc "  ;	

$spage = ($page - 1 + $stpage * 10) * $s_pagecnt;
$epage = $s_pagecnt;
$sql1 = $sql1 . " limit " . $spage . " , " . $epage ;

$rs = mysqli_query($connect1,$sql1);
while($info = mysqli_fetch_array($rs)) {	  
	$list_cnt = $list_cnt + 1;
	array_push($data, array('no'=>$list_cnt, 'idx'=>$info["idx"],'b_title'=>$info["b_title"], 'b_custname'=>$info["b_custname"], 'b_readcnt'=>$info["b_readcnt"],  'b_regdate'=>format_sdate($info["b_regdate"]) ));
}



$tmp_val = "";

if ($max_cnt > 0) {   
$tmp_val = 	"<div class=\"page_num\">";
$tmp_val = $tmp_val . "<ul class=\"pagination\">";
$tmp_val = $tmp_val . "<li><a href=\"javascript:page_move('1');\">&lt;&lt;</a></li>";
   If ($stpage > 0) { 
$tmp_val = $tmp_val . "<li class=\"mobile_no\"><a href=\"javascript:page_pre();\">&lt;</a></li>";
    }
			   $si = ($max_cnt - ($max_cnt % $s_pagecnt))  / $s_pagecnt;
			   
			   if ($max_cnt % $s_pagecnt == 0) {
				 $si = $si -1;
				}
			   $sj =  $stpage * 10 + 1 ; 
			   If ($sj > 0) { 
					$si = $si + 1;
				}	
				
				$row_index = 0;
				$tmp = ( $stpage * 10) + ($page)  ;
				For (;$sj<=$si;$sj++) {
					$row_index ++;
					if($row_index > 10) {
						break;
					}
					
					if ($tmp == $sj) { 
$tmp_val = $tmp_val . "<li><a href=\"javascript:;\" class=\"active\">" . $sj . "</a></li>";										       
			} else { 
$tmp_val = $tmp_val . "<li><a href=\"javascript:page_move('" . $sj . "');\">" . $sj . "</a></li>";					
		}
	}  
    if ($sj <= $si ) { 
$tmp_val = $tmp_val . "<li class=\"mobile_no\"><a href=\"javascript:page_next();\">&gt;</a></li>";					   			   		           }   
$tmp_val = $tmp_val . "<li><a href=\"javascript:page_move('" . $si .  "');\">&gt;&gt;</a></li>";								               
$tmp_val = $tmp_val . "</ul></div>";
} 

$page = $page + $stpage * 10;

$json1 = json_encode(array("ret"=>"200","list"=>$data, "list_cnt"=>$list_cnt, "paging"=>$tmp_val, "stpage"=>$stpage, "page"=>$page  ), JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);

echo $json1;

mysqli_close($connect1);

?>
