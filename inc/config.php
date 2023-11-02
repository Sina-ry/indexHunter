<?php

// config.php


# 호스트이름 고정하기.
// hostname 에 www 가 포함된 경우 : ok.
// hostname 에 www 가 포함되지 않은 경우 : www 로 되돌림.
// 예외 : 로컬(개발용) 호스트이름인 경우는 그냥 둔다.
if($_SERVER['HTTP_HOST']=='') {
	header("Location: http://www.". $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] );
	exit;
}


# 로그인 하지 않은 사용자는 강제로 레벨을 0 으로 설정합니다.
if( !isset($_SESSION['mb_level']) ) {
	$_SESSION['mb_level'] = '0';
	$_SESSION['mb_sid'] = session_id();
}


// 이미지형식을 의미하는 MIME TYPE
// 이 형식의 파일들은 웹브라우저에서 직접 보여줄 수 있다.
$mime['image'] = array( "image/jpg", "image/pjpg", "image/pjpeg", "image/gif", "image/png", "image/x-png", );
$mime['video'] = array( "video/x-ms-wmv", "video/x-ms-asf", "audio/mpeg", "audio/x-ms-wma", );


//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// 회원 정보
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

$qry_level = "SELECT bc_id, bc_name FROM tc_db_boardclass order by bc_id  ";
$res_level = mysql_query($qry_level);

while( $row_level = mysql_fetch_array($res_level, MYSQL_ASSOC) ) {
	$CONFIG['board_name'][ $row_level['bc_id'] ] = $row_level['bc_name'];
}

$qry_level = "SELECT bc_id, read_flag FROM tc_db_boardclass order by bc_id  ";
$res_level = mysql_query($qry_level);

while( $row_level = mysql_fetch_array($res_level, MYSQL_ASSOC) ) {
	$CONFIG['board_read_level'][ $row_level['bc_id'] ] = $row_level['read_flag'];
}

$qry_level = "SELECT bc_id, write_flag FROM tc_db_boardclass order by bc_id  ";
$res_level = mysql_query($qry_level);

while( $row_level = mysql_fetch_array($res_level, MYSQL_ASSOC) ) {
	$CONFIG['board_write_level'][ $row_level['bc_id'] ] = $row_level['write_flag'];
}

$qry_level = "SELECT master_id, ma_name FROM tc_db_master where up_code = 'AA000'  order by dis_order  ";
$res_level = mysql_query($qry_level);

while( $row_level = mysql_fetch_array($res_level, MYSQL_ASSOC) ) {
	$CONFIG['AA000'][ $row_level['master_id'] ] = $row_level['ma_name'];
}

$qry_level = "SELECT master_id, ma_name FROM tc_db_master where up_code = 'AB000'  order by dis_order  ";
$res_level = mysql_query($qry_level);

while( $row_level = mysql_fetch_array($res_level, MYSQL_ASSOC) ) {
	$CONFIG['AB000'][ $row_level['master_id'] ] = $row_level['ma_name'];
}

$CONFIG['i_tax_gubun']['1'] = "과세";
$CONFIG['i_tax_gubun']['2'] = "비과세";
$CONFIG['i_tax_gubun']['3'] = "영세";

$CONFIG['i_stock']['1'] = "재고관리";
$CONFIG['i_stock']['2'] = "재고관리안함";

$CONFIG['i_sgubun']['1'] = "판매";
$CONFIG['i_sgubun']['2'] = "세트";
$CONFIG['i_sgubun']['3'] = "판촉물";

$CONFIG['i_status']['1'] = "사용";
$CONFIG['i_status']['2'] = "단종";

$CONFIG['sc_gubun']['1'] = "1단계";
$CONFIG['sc_gubun']['2'] = "2단계";
$CONFIG['sc_gubun']['3'] = "3단계";
$CONFIG['sc_gubun']['4'] = "4단계";
$CONFIG['sc_gubun']['5'] = "5단계";


$CONFIG['m_status']['1'] = "근무";
$CONFIG['m_status']['2'] = "퇴사";
$CONFIG['m_status']['3'] = "삭제";

//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// 관리자인지 확인
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
if( $_SESSION && $_SESSION['mb_level'] && $_SESSION['mb_level']>=8 ) {
	define("_ADMIN_", true);
}

//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// 회원인지 확인
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
if( $_SESSION && $_SESSION['mb_level'] && $_SESSION['mb_level']>=1 ) {
	define("_MEMBER_", true);
}


//-------------------------------------------------------------------------------------
//   끝... 페이지별 제목 문자열 (네비게이션 표시용)
//-------------------------------------------------------------------------------------


if ($flash_num==""){
     $flash_num="010100";
}



//-------------------------------------------------------------------------------------
// 분류별 코드 (좌측 메뉴)
//-------------------------------------------------------------------------------------
if(defined("_page")) {
	$page_code = _page;
} else {
	$page_code = "0";
}



//-------------------------------------------------------------------------------------
// 페이지별 코드 (메인 타이틀)
//-------------------------------------------------------------------------------------
if(defined("_page_sub")) {
	$page_sub_code = _page_sub;
} else {
	$page_sub_code = "0";
}

if(defined("_page_sub2")) {
	$page_sub_code2 = _page_sub2;
} else {
}



//-------------------------------------------------------------------------------------
// Y , N 으로 구분되는 항목을 위한 배열
//-------------------------------------------------------------------------------------
$array_yn = array('y'=>'예', 'n'=>'아니오');




//-------------------------------------------------------------------------------------
// WaterMark 설정
//-------------------------------------------------------------------------------------
// 게시판 bbs_config.php 수정 필요
// 게시판 write.action.php 변경
// 게시판 modify.action.php 변경
// 게시판 reply.action.php 변경

$CONFIG['is_watermark'] = 'n'; // 워터마크 사용함 y/n
$CONFIG['watermark_type'] = 'img'; // 워터마크 방법 img/txt
//$CONFIG['watermark_type'] = 'txt'; // 워터마크 방법 img/txt

$CONFIG['watermark_image'] = $_SERVER['DOCUMENT_ROOT'] .'/bbs/img/watermark_jangsoft.png'; // 워터마크로 사용할 이미지

$CONFIG['watermark_font'] = $_SERVER['DOCUMENT_ROOT'] .'/bbs/ttf/NanumGothic.otf'; // 워터마크로 사용할 폰트
$CONFIG['watermark_font'] = $_SERVER['DOCUMENT_ROOT'] .'/bbs/ttf/arial.ttf'; // 워터마크로 사용할 폰트

$CONFIG['watermark_text'] = iconv('euc-kr','utf-8','김형오 의장, 설 앞두고 용산노인복지관'); // 텍스트(한글은 iconv)
$CONFIG['watermark_text'] = $_SERVER['HTTP_HOST']; // 텍스트




//-------------------------------------------------------------------------------------
// 회원 가입 허용/불가
//-------------------------------------------------------------------------------------
$CONFIG['is_member_join'] = 'y'; // 회원 가입을 허용함 y/n



//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// 기타 텍스트 변수의 선언
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

// <title> 제목
$CONFIG['title'] = "어플개발";

// 쇼핑몰 주소
$CONFIG['mall_url'] = "http:// /\" target=\"blank";


// 가맹점 서비스 항목 ( shop_list.s_memo* )
/*
$CONFIG['shop_service'] = array(
			1=>'홈페이지',
			2=>'서비스범위',
			3=>'업무시간',
			4=>'출장정비',
			5=>'경정비',
			6=>'신용카드',
		);
*/
$CONFIG['shop_service'] = array(
			1=>'설명 키워드',
		);








# end of script.