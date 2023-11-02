<?php
$code_page='third';
include "./head.php";


?>

<div class="notice_cont">

	<h2 class="sub_tit">공지<span class="po_b">사항</span></h2>
	

	
	<!-- 게시물 시작 -->
	<table class="bbs_view">
	  <tr>
		<th colspan="2" class="tit">공지사항 테스트입니다.</th>
	  </tr>
	  <tr>
		<td class="view_detail" colspan="2">
		작성자 : ADMIN <span class="mobile_enter"></span>작성일 : 2020-08-30&nbsp; 조회수 : 5
		</td>
	  </tr>

	  <tr>
		<td colspan="2" class="view_content_con">
		<div class="view_content">
			테스트중입니다.
		</div>
		</td>
	  </tr>

	  <tr>
		  <td class="tit pc_c" width="15%">파일첨부</td>
		  <td class="txt pc_c"><a href="#" >파일첨부테스트.txt </a></td>
		</tr>

	  <tr>
		<td class="tit pc_c" width="15%">이전글</td>		

						<td class="txt pc_c"><!-- <a href=''></a> -->이전글이 없습니다.</td>


	  </tr>
	  <tr>
		<td class="tit pc_c">다음글</td>

						<td class="txt pc_c"><!-- <a href=''></a> -->다음글이 없습니다.</td>


	  </tr>
	</table>
   </form>

	<!-- 버튼 -->
	<div class="bbs_btn">
	  <ul>
		<li class="sel_btn">

			<a href="javascript:board_del();" class="btn_w">삭제하기</a>		

		</li>
		<li class="list_btn inner_btn">
			<a href="./notice.php" class="btn_w">리스트</a>

			<a href="notice_write.php" class="btn_b">수정하기</a>

		</li>
	  </ul>
	</div>  
	<!-- 버튼 끝 -->
			  



</div>






<? include "./foot.php"; ?>