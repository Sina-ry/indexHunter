<?php
	session_start();
	
	$_SESSION['_user_id']  = "" ; 
	$_SESSION['_sign']  = "" ;
	$_SESSION['_uaddr'] = "" ;
	$_SESSION['_mobile']  = "" ;
  setcookie("member_ip","",time()-100,"/");

	
?>
<script language="JavaScript">
	location.href="/admin/index.php";
</script>

