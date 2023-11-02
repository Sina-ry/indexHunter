<?php
$code_page='third';
include "./head.php";



?>




<div class="notice_cont">

	<h2 class="sub_tit">공지<span class="po_b">사항</span></h2>
	
	<!-- 게시물 시작 -->
	<table class="bbs_con"  summary="게시물 목록">
	  <caption class="hide">게시물 목록</caption>
	  <thead>
	  <tr>

		<th width="10%" scope="col">번호</th>
		<th scope="col">제목</th>
		<th width="12%" scope="col">팝업표시</th>
		<th width="12%" scope="col">작성자</th>
		<th width="12%" scope="col">작성일</th>
		<th width="10%" scope="col">조회</th>
	  </tr>
	  </thead>
	  <tfoot></tfoot>
	  <tbody>

		<!-- <tr>
			  <td class="no" colspan="6">No Data</td>
			</tr>  -->  

                    <tr  onclick="location.href='notice_view.php'" style="cursor:pointer">
					  <td class="no">1</td>	 
					  <td class="left">
						<div class="t_overflow">
							<div class="t_overflow_space">
								<p class="t_value_text">공지사항 테스트입니다.</p>
							</div>
						</div>
					  </td>
					  <td class="name">N</td>		
					  <td class="name">ADMIN</td>					  
					  <td class="wdate">2020-08-30</td>
					  <td class="count">5</td>
					</tr>   

	  		
	  </tbody>
	</table>
	<!-- 게시물 끝 -->   
	  
	<!-- 페이지 번호 -->

	<div class="page_num">
		<ul class="pagination">
			<li><a href="javascript:page_move('1');">&lt;&lt;</a></li>

            <li class="mobile_no"><a href="javascript:page_pre();">&lt;</a></li>


					<li><a href="javascript:;" class="active">1</a></li>										       

					<!-- <li><a href="javascript:page_move('<?php echo $sj; ?>');"><?php echo $sj; ?></a></li>	 -->				


					<li class="mobile_no"><a href="javascript:page_next();">&gt;</a></li>					   			   				      	

					<li><a href="javascript:page_move('<?php echo $si; ?>');">&gt;&gt;</a></li>								               
	        </ul>
	</div>

	<!-- 페이지 번호끝 -->


	<!-- 검색 -->
	<fieldset class="board_search">
		
		<input type="hidden" name="code" value="news">
		<input type="hidden" name="category" value="">
		<label for="SearchCriteria" class="hide">검색조건 선택</label>
		<select name="searchopt" class="select2" style="width:130px;">
			<option value="subcon">제목 + 내용</option>
		</select>	
		<input id="shn" name="shn" type="text" class="search_input" value="<?php echo $shn;?>">
		<input type="button" value="검색" align="absmiddle" title="검색" class="btn_b_s" onclick="javascript:board_list();">
		
	</fieldset>
	<!-- 검색 끝 -->

	<!-- 버튼 -->
	<div class="bbs_btn">
	  <ul>
		
		<li class="list_btn">
			<a href="#" class="btn_w">리스트</a>

			<a href="notice_view.php" class="btn_b">글쓰기</a>

		</li>
	  </ul>
	</div>  
	<!-- 버튼 끝 -->
</div>
</form>

<? include "./foot.php"; ?>