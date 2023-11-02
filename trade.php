<?php
$code_page='second';
include "./head.php";
?>

<script>
  $( function() {
    $( "#datepicker" ).datepicker();
	$( "#datepicker2" ).datepicker();

	var tab = false;
	$(".table_list").click(function(){
		if(tab == false){
			$(".table_hidden").css({display:"table-row"});
			tab = true;
		}else if(tab == 1){
			$(".table_hidden").css({display:"none"});
			tab = false;
		};
	});
 } );
</script>



	<div class="trade_cont">

		<h2 class="sub_tit">코인 <span class="po_b">거래내역</span></h2>

		<div class="trade_top">
			<select class="select">
			  <option value="">ESRC</option>
			  <option value="">BTC</option>
			  <option value="">ESRC</option>
			  <option value="">ESRC</option>
			  <option value="">ESRC</option>
			  <option value="">ESRC</option>
			</select>

			<p class="date">
				<input type="checkbox" name="secure_login" value="Y" checked=""> 기간 검색
				<input class="input2" id="datepicker" type="text" name="날짜 시작"/> ~ <input class="input2" id="datepicker2" type="text" name="날짜 끝"/>
			</p>
			<button class="btnListchk2">검색</button>
		</div>
		<div class="trade_coin">
			<ul>
				<li class="left">
					<h3>전체 ESRC 코인량</h3>
					<p>2,453 ESRC</p>
				</li>
				<li class="right">
					<h3>전체 ESRC 포인트량</h3>
					<p>2,453 P</p>
				</li>
			</ul>
		</div>
		<p class="table_txt">※ 내역 클릭 시 상세 내용을 보실 수 있습니다.</p>
		<div class="trade_table">
			<table>
				<thead>
					<tr>
						<th>일자</th>
						<th>사용한 포인트</th>
						<th>전환한 코인량</th>
					</tr>
				</thead>
				<tbody>
					<tr class="table_list">
						<td>2020-06-09</td>
						<td>8,000P</td>
						<td>40 ESRC</td>
					</tr>
					<tr class="table_hidden">
						<td colspan="3">비고내용이 들어가는 자리입니다.</td>
					</tr>
				</tbody>
			</table>
		</div>

	</div>




<? include "./foot.php"; ?>