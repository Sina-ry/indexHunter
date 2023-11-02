<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no,maximum-scale=1.0,minimum-scale=1.0" />
<title>인덱스헌터 관리자 페이지</title>
<link href="./wiz_style.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

 
</head>


<body>
	<!-- wrap-->
	<div class="wrap">

		<div class="wrap_inner">
			
			
			<!-- header-->
			<div class="admin_header">
				<div class="top_01">
				<h1><a href="main.php">INDEX <span>HUNTER</span></a></h1>
					<ul>
						<li class="logout"><a href="./login_out.php">로그아웃</a></li>
					</ul>
				</div>
				<!-- @ Menu : Start @ -->
				<div id="quick_area">
					<div class="quick_cont">
						<div class="zzim_area" id="zzim_area">
							<div class="topmenu">
								<div class="top_02">
									<ul class="leftMenu">
										<li <? if(strpos($code_page, 'first') !== false) echo "class='clickover'"?>><a href="coin.php" class="menu">코인 환전</a></li>
										<li <? if(strpos($code_page, 'second') !== false) echo "class='clickover'"?>><a href="trade.php" class="menu">코인 거래내역</a></li>
										<li <? if(strpos($code_page, 'third') !== false) echo "class='clickover'"?>><a href="notice.php" class="menu">공지사항</a></li>
										<li <? if(strpos($code_page, 'fourth') !== false) echo "class='clickover'"?>><a href="qna.php" class="menu">1:1 문의게시판</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
			<!-- //header-->