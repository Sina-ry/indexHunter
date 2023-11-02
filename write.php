<?php
$code_page='third';
include "./head.php";
?>


<div class="notice_cont">

	<h2 class="sub_tit">공지<span class="po_b">사항</span></h2>
	
	<!-- 게시물 시작 -->
	<form name="bbsFrm" action="" method="post" enctype="multipart/form-data" onSubmit="return bbsCheck(this)"> 

	  <span style="display:none">
	  <input type="passwd" name="bbs_spam_value" id="bbs_spam_value" value="">
	  </span>


	  <div class="input_notice">
		<h4>글 작성시 <span>저작권 주의사항</span></h4>
		<p class="txt">
		1. 인터넷 기사 원문(글, 사진포함)을 복사해서 그대로 업로드 하실 수 없습니다.<br/>
		2. 홈페이지에 기본적으로 사용하는 폰트 이외에 저작권에 위반되는 폰트는 사용하실수 없습니다.<br/>
		3. 이미지는 저작권이 확인된 이미지만 사용바랍니다.<br/>
		<p class="point">※ 저작권 위반이 적발될 경우 형사처벌 및 손해배상의 피해를 입으실 수 있습니다.</p>
		</p>
	  </div>


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
		<td width=""><input name="name" value="이름" type="text" size="20" class="input" /></td>
	  </tr>
	  <tr>
		<th>이메일</th>
		<td><input name="email" value="이메일" type="text" size="30" class="input" /></td>
	  </tr>

	  <tr>
		<th>작성일</th>
		<td><input name="wdate" value="작성일" type="text" size="20" class="input" /></td>
	  </tr>
	  <tr>
		<th>조회수</th>
		<td align="left" style="padding-left:10px;"><input name="count" value="조회수" type="text" size="20" class="input" /></td>
	  </tr>
	  <tr>
		<th>비밀번호 *</th>
		<td><input name="passwd" value="비밀번호" type="password" size="20" class="input" />
		  <span class="mobile_enter">* 글 수정 삭제시 필요하시 꼭 기재해 주시기 바랍니다.</span></td>
	  </tr>
	  <tr>
		<th>제목 *</th>
		<td colspan="3"><input name="subject" value="제목" type="text" size="60" class="input l_input" /></td>
	  </tr>


	  <tr>
		<td colspan="2">
		<script language="JavaScript">
		$(function() {
			$(window).resize(function() {
				check_size();
			});
		});

		function check_size(){
				//인터넷창의 가로값
			var winWidth = $(window).width();
			//인터넷창의 가로값이 981보다 작을경우 cbox2 안나오게
			if(winWidth >= 981) {
			$('.cbox1').css('display', 'block');
			$('.cbox2').css('display', 'none');
			$('.cbox2 textarea').attr('name','nocontent');
			$('.cbox1 textarea').eq(0).attr('name','content');
				
			}
			
			//인터넷창의 가로값이 980보다 클경우 cbox1 안나오게
			else if(winWidth < 981) {
			$('.cbox1').css('display', 'none');
			$('.cbox2').css('display', 'block');
			$('.cbox2 textarea').attr('name','content');
			$('.cbox1 textarea').eq(0).attr('name','nocontent');
			$('.cbox1 textarea').eq(0).attr('id','nocontent');
			}
		}

		$(document).ready(function(){
			check_size();
		});

		</script>
		
		<input type="checkbox" name="privacy" value="Y" <?=$privacy_checked?>>
				<span class="txtw">비밀글</span>
				<input type="checkbox" name="notice" value="Y" <?=$notice_checked?>>
				<span class="txtw">공지글</span>
				
				<!-- 해상도 981 이상 일때 -->
				<div class="cbox1">
				   <?
					//if($bbs_info[editor] == "Y"){
						$edit_content = $content;
						include "./webedit/WIZEditor.html";
					//}else{
					?>
				<?
				//}
				?>
			   </div>
			   <!-- // 해상도 981 이상 일때 -->
			   
			   <!-- 해상도 980 이하 일때 -->
			   <div class="cbox2">
				<textarea name="nocontent" cols="85" rows="13" class="textarea" style="width:98%;word-break:break-all;" ><?=$content?></textarea>
			   </div>
			   <!-- // 해상도 980 이하 일때 -->
		</td>
		


		
	  </tr>


	  <?
	  for($ii=1;$ii<=5;$ii++){
		echo ${"hide_upfile".$ii."_start"};
	  ?>
	  <tr>
		<th>첨부파일
		  <?=$ii?></th>
		<td><input type="file" name="upfile<?=$ii?>" size="20" class="input" />
		  <?=${"upfile".$ii}?></td>
	  </tr>
	  <?
			echo ${"hide_upfile".$ii."_end"};
		}
		?>
	  <?
	  for($ii=1;$ii<=3;$ii++){
		echo ${"hide_movie".$ii."_start"};
		if($ii == 1) $input_type = "file";
		else $input_type = "text";
	  ?>
	  <tr>
		<th>동영상
		  <?=$ii?></th>
		<td><input type="<?=$input_type?>" name="movie<?=$ii?>" size="20" class="input" />
		  <?=${"movie".$ii}?></td>
	  </tr>
	  <?
			echo ${"hide_movie".$ii."_end"};
		}
		?>


	</table>

	<div class="pri_box">
	<p class="pri_tit">개인정보 수집·이용에 대한 동의</p>
	<textarea style="width:98%; height:100px;" class="textarea" readonly>
	■ 수집하는 개인정보 항목 
	회사는 회원가입, 상담, 서비스 신청 등을 위해 아래와 같은 개인정보를 수집하고 있습니다.
	ο 수집항목 : 이름, 이메일
	ο 개인정보 수집방법 : 홈페이지(게시물 작성)

	■ 개인정보의 수집 및 이용목적 
	회사는 수집한 개인정보를 다음의 목적을 위해 활용합니다.

	- 홈페이지 게시판 관리, 민원 처리

	■ 개인정보의 보유 및 이용기간 
	원칙적으로, 개인정보 수집 및 이용목적이 달성된 후에는 해당 정보를 지체 없이 파기합니다. 단, 관계법령의 규정에 의하여 보존할 필요가 있는 경우 회사는 아래와 같이 관계법령에서 정한 일정한 기간 동안 회원정보를 보관합니다.

	- 보존 항목 : 이름, 로그인ID
	- 보존 근거 : 서비스 이용의 혼선 방지
	- 보존 기간 : 5년 상법, 전자상거래 등에서의 소비자보호에 관한 법률 등 관계법령의 규정에 의하여 보존할 필요가 있는 경우 회사는 관계법령에서 정한 일정한 기간 동안 회원정보를 보관합니다. 이 경우 회사는 보관하는 정보를 그 보관의 목적으로만 이용하며 보존기간은 아래와 같습니다.

	- 계약 또는 청약철회 등에 관한 기록 : 5년 (전자상거래등에서의 소비자보호에 관한 법률)
	- 대금결제 및 재화 등의 공급에 관한 기록 : 5년 (전자상거래등에서의 소비자보호에 관한 법률)
	- 소비자의 불만 또는 분쟁처리에 관한 기록 : 3년 (전자상거래등에서의 소비자보호에 관한 법률)
	- 신용정보의 수집/처리 및 이용 등에 관한 기록 : 3년 (신용정보의 이용 및 보호에 관한 법률)
	</textarea>
		<div class="pri_message">
			개인정보 수집·이용에 대해 동의하십니까?<br>
			<input name="agree2" type="radio" value="Y" >  동의함&nbsp;
			 <input name="agree2" type="radio" value="N" checked> 동의안함
		</div>	

	</div>



	<!-- 버튼 -->
	<div class="bbs_btn">
	  <ul>
		<li class="list_btn inner_btn">
			<a href="/admin/notice.php" class="btn_w">리스트</a>
			<a href="/admin/write.php" class="btn_b">작성하기</a>
		</li>
	  </ul>
	</div>  
	<!-- 버튼 끝 -->
			  



</div>






<? include "./foot.php"; ?>