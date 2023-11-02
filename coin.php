<?php
$code_page='first';
include "./head.php";
?>

<script>
  $( function() {
    $( "#datepicker" ).datepicker();
	$( "#datepicker2" ).datepicker();
  } );
</script>

<style>
body { background:#f5f5f5; }
</style>


	<div class="coin_cont">

		<div class="coin_inner">

			<h2 class="sub_tit">코인 <span class="po_b">환전</span></h2>

			<div class="coin_bottom">
				<dl>
					<dt>코인 선택</dt>
					<dd>
						<div class="coin_top">
							<select class="select">
							  <option value="">ESRC</option>
							  <option value="">BTC</option>
							  <option value="">ESRC</option>
							  <option value="">ESRC</option>
							  <option value="">ESRC</option>
							  <option value="">ESRC</option>
							</select>

							<p class="date">
								<button class="btnListchk2">검색</button>
							</p>
						</div>
					</dd>
				</dl>
				<dl>
					<dt>현재 포인트</dt>
					<dd><input class="input" type="text" readonly="" value="O" name=""/> <span>P</span></dd>
				</dl>
				<dl>
					<dt>코인전환 포인트</dt>
					<dd><input class="input" type="text" placeholder="" name=""/>  <span>P</span></dd>
				</dl>
				<dl>
					<dt>코인 받을 주소</dt>
					<dd><input class="input add" type="text" placeholder="" name=""/></dd>
				</dl>
				<dl>
					<dt>QR 코드</dt>
					<dd>
						<p class="qr_code">
							<img src="./image/qr.jpg" alt="인덱스 QR">
						</p>
					</dd>
				</dl>
			</div>
			<div class="coin_last">
				<button class="btnListchk">포인트 전환</button>
			</div>
		</div>
		<div class="admin_login_line"></div>
	</div>



<? include "./foot.php"; ?>