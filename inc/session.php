<?php

ini_set("session.gc_maxlifetime", "3600"); // 2 hour
//ini_set("session.gc_maxlifetime", "120"); // 2 minute
$SESS_LIFE = ini_get("session.gc_maxlifetime");


//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//   DB Session Handler
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

/**/

//--------------------------------------------
//    OPEN
//--------------------------------------------

function sess_open($save_path, $session_name) {
    global $SESS_DBH;
    return true;
}


//--------------------------------------------
//    CLOSE
//--------------------------------------------

function sess_close() {
    return true;
}


//--------------------------------------------
//    READ
//--------------------------------------------

function sess_read($key) {
    global $SESS_LIFE;

    $qry = "SELECT `value` FROM `sessions` WHERE `sessid`='".$key."' AND `ex_time`>" . time();
    $res = @mysql_query($qry);

    if( !$res ) {
        echo "session error: session database does not exists.";
        exit;
    }

    if ( mysql_num_rows($res)>0 ) {
        return mysql_result($res,0,0);
    } else {
		return false;
	}
}


//--------------------------------------------
//    WRITE
//--------------------------------------------

function sess_write($key, $val) {
    global $SESS_LIFE;

    $expiry = time() + $SESS_LIFE;
    $value = mysql_real_escape_string($val);

    $qry = "INSERT INTO `sessions` (`sessid`, `ex_time`, `value`) VALUES ('$key', $expiry, '$value')";
    $res = mysql_query($qry);

    if ( $res ) {
		mysql_query("INSERT INTO `sessions_now` SET `mb_id`='".$_SESSION['id']."', `sessid`='$key', `ex_time`='$expiry' ");
	} else {
		//echo( mysql_error() .' '. __FILE__.':'.__LINE__);

        //$qry = "UPDATE `sessions` SET `ex_time`=$expiry, `value`='$value' WHERE `sessid`='$key' AND `ex_time`>" . time();
        $qry = "UPDATE `sessions` SET `ex_time`=$expiry, `value`='$value' WHERE `sessid`='$key' ";
        $res = mysql_query($qry);
		if(!$res) {
			//echo( mysql_error() .' '. __FILE__.':'.__LINE__);
		}

		//mysql_query("UPDATE `sessions_now` SET `mb_id`='".$_SESSION['mb_id']."' WHERE `sessid`='$key' AND `ex_time`>" . time());
		mysql_query("UPDATE `sessions_now` SET `mb_id`='".$_SESSION['id']."' WHERE `sessid`='$key' ");
	}

	return $res;
}


//--------------------------------------------
//    DESTROY
//--------------------------------------------

function sess_destroy($key) {
	$qry = "DELETE FROM `sessions_now` WHERE `sessid`='$key'";
    $res = mysql_query($qry);

	$qry = "DELETE FROM `sessions` WHERE `sessid`='$key'";
    $res = mysql_query($qry);

    return $res;
}


//--------------------------------------------
//    GC : Garbage Collection
//--------------------------------------------

function sess_gc() {
	$qry = "DELETE FROM `sessions_now` WHERE `ex_time`<" . time();
    $res = mysql_query($qry);

	$qry = "DELETE FROM `sessions` WHERE `ex_time`<" . time();
    $res = mysql_query($qry);

    return true;
}

//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//   DB Session Handler
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++




// 사용자 정의 세션핸들러 :
//
//	URL : http://kr.php.net/manual/en/function.session-set-save-handler.php
//
//	bool session_set_save_handler ( callback $open , callback $close , callback $read , callback $write , callback $destroy , callback $gc )





# end of script.
