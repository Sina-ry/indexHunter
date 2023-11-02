<?php
$code_page='third';
include "./head.php";


$shn = $_REQUEST['shn'];
$idx = $_REQUEST['idx'];

if(isset($_REQUEST['pg'])) {
	$page = $_REQUEST['pg'];	
}else{
	$page = 1;
}

if(isset($_REQUEST['s_pagecnt'])) {
	$s_pagecnt = $_REQUEST['s_pagecnt'];	
}else{
	$s_pagecnt = 15;
}

if(isset($_REQUEST['spg'])) {
	$spg = $_REQUEST['spg'];	
}else{
	$spg = 15;
}


$sMode= $_REQUEST['mode'];

if($sMode == "update") {

	$sql1 = "update tc_board  set b_readcnt = b_readcnt + 1 where idx = '" . $idx . "' ";
	$connect->query($sql1) ;

	$sql1 = " SELECT * FROM tc_board where idx = '".$idx."'  "	;
	
	
	$result1 = mysqli_query($connect, $sql1);
	$row = mysqli_fetch_array($result1);
}

?>


<script language="javascript">
<!--

 function board_list()
{
	document.listForm.target = ""
	document.listForm.action ="./qna.php"
	document.listForm.submit();
}

 function board_del()
{
	document.listForm.mode.value = "del";
	document.listForm.target = "FrmHid"
	document.listForm.action ="./qna_ok.php"
	document.listForm.submit();
}

 function board_update()
{
	document.listForm.target = ""
	document.listForm.action ="./qna_write.php"
	document.listForm.mode.value = "update"
	document.listForm.submit();
}

-->
</script>
<div class="notice_cont">

	<h2 class="sub_tit">1:1<span class="po_b">문의게시판</span></h2>
	
	<form class="form-horizontal" method="post" name="listForm" action="" >
	<input type="hidden" name="idx" value="<?php echo $row['idx']; ?>">
	<input type="hidden" name="pg" value="<?php echo $page ; ?>">
	<input type="hidden" name="spg" value="<?php echo $spg; ?>">
	<input type="hidden" name="shn" value="<?php echo $shn; ?>">
	<input type="hidden" name="s_pagecnt" value="<?php echo $s_pagecnt; ?>">
	<input type="hidden" name="mode" value="<?php echo $sMode; ?>">
	
	
	<!-- 게시물 시작 -->
	<table class="bbs_view">
	  <tr>
		<th colspan="2" class="tit"><?php echo $row['b_title'];?></th>
	  </tr>
	  <tr>
		<td class="view_detail" colspan="2">
		작성자 : <?php echo $row['b_custname'];?> <span class="mobile_enter"></span>작성일 : <?php echo format_datetime($row["b_regdate"]);?>&nbsp; 조회수 : <?php echo $row["b_readcnt"];?>
		</td>
	  </tr>

	  <tr>
		<td colspan="2" class="view_content_con">
		<div class="view_content">
			<?php echo str_replace(chr(13),"<br>",$row['b_memo'])?>
		</div>
		</td>
	  </tr>
  <?php if($row['b_file01'] <> "") { ?>	
	  <tr>
		  <td class="tit pc_c" width="15%">파일첨부</td>
		  <td class="txt pc_c"><a href="./upload/<?php echo $row['b_file01'];?>" ><?php echo $row['b_file01'];?> </a></td>
		</tr>
  <?php } ?>
	  <tr>
		<td class="tit pc_c" width="15%">이전글</td>		
<?php 
			$sql1 = " SELECT * FROM tc_board where b_gubun = '02' and idx > '".$idx."' order by idx  limit 0, 1  "	;
	
			$result3 = mysqli_query($connect, $sql1);
			if(mysqli_num_rows($result3) > 0) {
	
				$row_next = mysqli_fetch_array($result3);
		?>
						<td class="txt pc_c"><a href='./qna_view.php?mode=update&idx=<?php echo $row_next["idx"]?>'><?php echo $row_next["b_title"]?></a></td>
		<?php }else{ ?>
						<td class="txt pc_c"></td>
		<?php } ?>
	  </tr>
	  <tr>
		<td class="tit pc_c">다음글</td>
<?php 
			$sql1 = " SELECT * FROM tc_board where b_gubun = '02' and idx < '".$idx."' order by idx desc limit 0, 1  "	;
	
			$result3 = mysqli_query($connect, $sql1);
			if(mysqli_num_rows($result3) > 0) {
	
				$row_next = mysqli_fetch_array($result3);
		?>
						<td class="txt pc_c"><a href='./qna_view.php?mode=update&idx=<?php echo $row_next["idx"]?>'><?php echo $row_next["b_title"]?></a></td>
		<?php }else{ ?>
						<td class="txt pc_c"></td>
		<?php } ?>
	  </tr>
	</table>
   </form>

	<!-- 버튼 -->
	<div class="bbs_btn">
	  <ul>
		<li class="sel_btn">
<?php if($_SESSION['_sign']  == "ADMIN") { ?>		
			<a href="javascript:board_del();" class="btn_w">삭제하기</a>		
<?php  } ?>
		</li>
		<li class="list_btn inner_btn">
			<a href="./qna.php" class="btn_w">리스트</a>
<?php if($_SESSION['_sign']  == "ADMIN") { ?>	
			<a href="javascript:board_update();" class="btn_b">수정하기</a>
<?php  } ?>
		</li>
	  </ul>
	</div>  
	<!-- 버튼 끝 -->
			  



</div>






<? include "./foot.php"; ?>