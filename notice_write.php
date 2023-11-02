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
	document.listForm.action ="./notice.php"
	document.listForm.submit();
}

 function board_delete()
{
	document.listForm.mode.value = "del";
	document.listForm.target = "FrmHid"
	document.listForm.action ="./notice_ok.php"
	document.listForm.submit();
}

 function board_save()
{
	if (document.listForm.b_title.value.length < 1)
	{
		alert("제목을 입력해 주세요 ")
		document.listForm.b_title.focus();
		return;
	}
	
	if (document.listForm.b_custname.value.length < 1)
	{
		alert("작성자를 입력해 주세요 ")
		document.listForm.b_custname.focus();
		return;
	}
	document.listForm.target = "FrmHid"
	document.listForm.action ="./notice_ok.php"
	document.listForm.submit();
}


-->
</script>

<div class="notice_cont">

	<h2 class="sub_tit">공지<span class="po_b">사항</span></h2>
	
	<!-- 게시물 시작 -->
	
	  <span style="display:none">
	  <input type="passwd" name="bbs_spam_value" id="bbs_spam_value" value="">
	  </span>

		<form class="form-horizontal" method="post" name="listForm" action="notice_ok.php" enctype=multipart/form-data >
		<input type="hidden" name="idx" value="<?php echo $row['idx']; ?>">
		<input type="hidden" name="pg" value="<?php echo $page ; ?>">
		<input type="hidden" name="spg" value="<?php echo $spg; ?>">
		<input type="hidden" name="shn" value="<?php echo $shn; ?>">
		<input type="hidden" name="s_pagecnt" value="<?php echo $s_pagecnt; ?>">
		<input type="hidden" name="mode" value="<?php echo $sMode; ?>">
		<input type="hidden" name="mpage" value="<?php echo $mpage;?>">
		<input type="hidden" name="spage" value="<?php echo $spage;?>">
		<input type="hidden" name="old_b_file01" value="<?php echo $row['b_file01'];?>">
	 

	  <input type="hidden" name="privacy" value="Y">
	  
	  <div class="bbs_input_ment">
		<font color="#666">*</font> 표시는 필수입력 사항으로<span class="mobile_enter"></span> 글 작성시 반드시 기재해야 하는 항목입니다.
	  </div>

	  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="bbs_input">
	  <caption><div class="hide">글쓰기 및 수정</div></caption>
			<colgroup>
			<col width="15%" />
			<col width="85%" />
		</colgroup>
		<tr>
		<th>이름 *</th>
		<td width=""><input id="b_custname" name="b_custname" value="<?php echo $row['b_custname'];?>" type="text" size="20" class="input" /></td>
	  </tr>
	  <tr>
		<th>제목 *</th>
		<td colspan="3"><input id="b_title" name="b_title" value="<?php echo $row['b_title'];?>" type="text"  size="60" class="input l_input" /></td>
	  </tr>
	  <tr>
		<th>팝업</th>
		<td colspan="3"><input type="checkbox" id="b_popup_flag" name="b_popup_flag" value="Y" <?php if($row['b_popup_flag'] == "Y") { ?>checked<?php } ?> ><span class="txtw">팝업표시</span></td>	
	  </tr>
	  <tr>
		<th>내용 *</th>
		<td colspan="3">
		<textarea class="textarea"  name="b_memo" id="b_memo" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd;"><?php echo $row['b_memo'];?></textarea>
		</td>
	  </tr>
	  <tr>
		<th>파일첨부</th>
		<td colspan="3">
		<input type="file" class="custom-file-input" id="b_file01" name="b_file01">
		<?php if($sMode == "update") { ?>
				<?php echo $row['b_file01'];?>			
		<?php } ?>		
		</td>
	  </tr>
	  
	</table>
	</form>
	<!-- 버튼 -->
	<div class="bbs_btn">
	  <ul>
		<li class="list_btn inner_btn">
			<a href="javascript:board_list();" class="btn_w">리스트</a>
			<a href="javascript:board_save();" class="btn_b">작성하기</a>
		</li>
	  </ul>
	</div>  
	<!-- 버튼 끝 -->
			  
</div>

<? include "./foot.php"; ?>