<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no,maximum-scale=1.0,minimum-scale=1.0" />
<title>인덱스헌터 관리자 페이지</title>
<link href="index_style.css" rel="stylesheet" type="text/css" />
<link href="wiz_style.css" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="covervid.js"></script>
<style>


.index_bg { background:rgba(0,0,0,0.3); width:100%; height:100%; position:absolute; z-index:99999;}

.index_inner { width:1180px; left:50%; margin-left:-590px; position:fixed; z-index:999999; }
.index_txt {}
.index_txt h1 { color:rgba(255,255,255,0.7); font-size:35px; font-family: 'Roboto', sans-serif; line-height:40px; font-weight:100; text-align:center;}
.index_txt h1 p { }
.index_txt h1 span.one { font-weight:700; display:block; font-size:65px; line-height:50px; color:#fff;}
.index_txt h1 span.two {  }

.covervid-wrapper {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}

</style>


</head>

<body class="extinguisher-transition">

	<main class="cd-main-content">
		<!-- Video Markup -->
		<section class="masthead center">
			<video class="masthead-video" autoplay="" loop="" muted="" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
				<source src="image/background1.mp4" type="video/mp4">
				<source src="image/background1.webm" type="video/webm">
			</video>
			<div class="masthead-overlay"></div>
			<div class="masthead-arrow" style="opacity: 0.212;"></div>
			<div class="index_mem">
				<div class="index_phone">
					<a href="#modal-1">
						<img src="image/index_phone.png" alt="인덱스헌터 모바일이미지">
						<div class="hidden_padding">
							<img src="image/hidden_padding.png">
							<p class="index_button cd-modal-trigger">
								<img src="image/button_hidden.png" alt="로그인">
								<span>로그인</span>
							</p>
						</div>
					</a>
				</div>
				<h1 style="opacity: 0.928; transform: translateY(10.2857%);">INDEX HUNTER<span>The Global Leading Cryptocurrency Exchange</span></h1>
			</div>
		</section>
	</main>

	<div class="cd-modal" id="modal-1">
		<div class="modal-content">
			<div class="admin_login">
				<div class="admin_login_cover">
					<div class="admin_login_in">
					  <h1>INDEX <span class="po_b">HUNTER</span></h1>
					  <p class="stit">아이디와 패스워드를 입력하여 주시기 바랍니다.</p>
					  <dl>
					  <form method=post name=loginfrm action="">
						<dd><input type="text" id="main_id" name="main_id" value="" class="admin_login_input" placeholder="아이디"></dd>
						<dd><input type="password" id="main_pw" name="main_pw" value="" class="admin_login_input" placeholder="비밀번호" onKeyDown="EnterCheck();"></dd>
					  </form>
						<dt><button type="button" class="login_button" onclick="location.href='main.php'">로그인</button></dt>
					<!--	<dd class="secure"><input type="checkbox" name="secure_login" value="Y" checked>보안접속
						</dd>  -->
					 
					  </dl>
					</div>
					<div class="admin_login_line"></div>
					</div>
				</div>
		</div> <!-- .modal-content -->

		<a href="#0" class="modal-close">Close</a>
	</div> <!-- .cd-modal -->

	<div class="cd-transition-layer" data-frame="25"> 
		<div class="bg-layer"></div>
	</div> <!-- .cd-transition-layer -->
	

	<!-- Load Scripts -->
	<script src="scripts.js"></script>
	<script src="modernizr.js"></script> <!-- Modernizr -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script>
		if( !window.jQuery ) document.write('<script src="js/jquery-2.2.1-min.js"><\/script>');
	</script>
	<script src="main.js"></script> <!-- Resource jQuery -->

	<!-- Call CoverVid -->
	<script type="text/javascript">
		// If using jQuery
			// $('.masthead-video').coverVid(1920, 1080);
		// If not using jQuery (Native Javascript)
			coverVid(document.querySelector('.masthead-video'), 1920, 1080);
	</script>


</body>


</html>