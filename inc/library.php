<?php


function XSSfilter($str)
{
$filstr="javascript, vbscript, expression, applet, meta, xml, blink, link, style, script, embed, object, iframe, frame, frameset, ilayer, layer, bgsound, title, base, eval, innerHTML, charset, document, string, create, append, binding, alert, msgbox, refresh, embed, ilayer, applet, cookie, javascript, void, href, onabort, onactivae, onafterprint, onafterupdate, onbefore, onbeforeactivate, onbeforecopy, onbeforecut, onbeforedeactivate, onbeforeeditfocus, onbeforepaste, onbeforeprint, onbeforeunload, onbeforeupdate, onblur, onbounce, oncellchange, onchange, onclick, oncontextmenu, oncontrolselect, oncopy, oncut, ondataavailable, ondatasetchanged, ondatasetcomplete, ondblclick, ondeactivate, ondrag, ondragend, ondragenter, ondragleave, ondragover, ondragstart, ondrop, onerror, onerrorupdate, onfilterchange, onfinish, onfocus, onfocusin, onfocusout, onhelp, onkeydown, onkeypress, onkeyup, onlayoutcomplete, onload, onlosecapture, onmousedown, onmouseenter, onmouseleave, onmousemove, onmouseout, onmouseover, onmouseup, onmousewheel, onmove, onmoveend, onmovestart, onpaste, onpropertychange, onreadystatechange, onreset, onresize, onresizeend, onresizestart, onrowenter, onrowexit, onrowsdelete, onrowsinserted, onscroll, onselect, onselectionchange, onselectstart, onstart, onstop, onsubmit, onunload";   //필터링   할 문자열

if ($filstr != "") { 
    $otag = explode   (", ", $filstr); 

    for ($i = 0;$i<   count($otag);$i++) { 
      $str =   eregi_replace($otag[$i], "_".$otag[$i]."_", $str); 
    } 
  }
  return $str; 
}

function clearXSS($str)
{
  $avatag =   "p, br";
  $str =   eregi_replace("<", "&lt;", $str);
  $str = eregi_replace(">",   "&gt;", $str);
 
  
if ($avatag != "") {
    $otag = explode   (", ", $avatag);

   
    for ($i = 0;$i<   count($otag);$i++) { 
      $str =   eregi_replace("&lt;".$otag[$i]." ",   "<".$otag[$i]." ", $str); 
      $str =   eregi_replace("&lt;".$otag[$i]."&gt;",   "<".$otag[$i].">", $str); 
      $str =   eregi_replace(" "+$otag[$i]."&gt;", "   ".$otag[$i].">", $str); 
      $str =   eregi_replace($otag[$i]."/&gt;", $otag[$i]."/>", $str);   
      $str =   eregi_replace("&lt;/".$otag[$i], "</".$otag[$i],   $str); 
    }
    return $str; 
  }
}


	function format_date($arg_date) {
		if (strlen($arg_date) > 7) {
			$tmp_date = substr($arg_date,0,4) . "-" . substr($arg_date,4,2) . "-" . substr($arg_date,6,2);
		}else{
			$tmp_date = $arg_date;
		}
		return $tmp_date;
	}
	
	function format_sdate($arg_date) {
		if (strlen($arg_date) > 7) {
			$tmp_date = substr($arg_date,2,2) . "-" . substr($arg_date,4,2) . "-" . substr($arg_date,6,2);
		}else{
			$tmp_date = $arg_date;
		}
		return $tmp_date;
	}

	function format_datetime($arg_datetime) {
		
		if (strlen($arg_datetime) > 10) {
			
			$tmp_date = substr($arg_datetime,0,4) . "-" . substr($arg_datetime,4,2) . "-" . substr($arg_datetime,6,2) . " " . substr($arg_datetime,8,2). ":" . substr($arg_datetime,10,2) . ":" . substr($arg_datetime,12,2);
		}else {
			$tmp_date = $arg_datetime;
		}
		
		echo $tmp_date;
	}
	
	function format_datetime_new($arg_datetime) {
		
		if (strlen($arg_datetime) > 10) {
			
			$tmp_date = substr($arg_datetime,0,4) . "-" . substr($arg_datetime,4,2) . "-" . substr($arg_datetime,6,2) . "<br> " . substr($arg_datetime,8,2). ":" . substr($arg_datetime,10,2) . ":" . substr($arg_datetime,12,2);
		}else {
			$tmp_date = $arg_datetime;
		}
		
		echo $tmp_date;
	}

	function format_datetime11($arg_datetime) {
		
		if (strlen($arg_datetime) > 10) {
			
			$tmp_date = substr($arg_datetime,0,4) . "-" . substr($arg_datetime,4,2) . "-" . substr($arg_datetime,6,2) . " " . substr($arg_datetime,8,2). ":" . substr($arg_datetime,10,2) . ":" . substr($arg_datetime,12,2);
		}else {
			$tmp_date = $arg_datetime;
		}
		
		return $tmp_date;
	}
	
	function format_time($arg_time) {
		$tmp_time = substr($arg_time,0,2) . ":" . substr($arg_time,2,2) ;
		echo $tmp_time;
	}
	
	function format_time12($arg_datetime) {
		
		if (strlen($arg_datetime) > 10) {
			
			$tmp_date = substr($arg_datetime,8,2). ":" . substr($arg_datetime,10,2) ;
		}else {
			$tmp_date = $arg_datetime;
		}
		
		return $tmp_date;
	}
	
	function format_telno($arg_tel) {
		
		if (strlen($arg_tel) == 11) {
			$tmp_tel = 	substr($arg_tel,0,3) . "-" . substr($arg_tel,3,4) . "-" . substr($arg_tel,7,4);
		}else{
			if (strlen($arg_tel) == 10) {
				$tmp_tel = 	substr($arg_tel,0,3) . "-" . substr($arg_tel,3,3) . "-" . substr($arg_tel,6,4);
			}else{
				$tmp_tel = 	$arg_tel;
			}
	    }
		
		echo $tmp_tel;
	}
	
	function format_date_yymm($arg_date) {
		$tmp_date =  substr($arg_date,0,4) . "-" . substr($arg_date,4,2);
		echo $tmp_date;
	}
	
	function format_date_mmdd($arg_date) {
		$tmp_date =  substr($arg_date,4,2) . "." . substr($arg_date,6,2);
		echo $tmp_date;
	}
	
	function format_date_mmdd1($arg_date) {
		$tmp_date =  substr($arg_date,4,2) . "-" . substr($arg_date,6,2);
		echo $tmp_date;
	}
	
	function format_date1($arg_date) {
		$tmp_date = substr($arg_date,0,4) . "." . substr($arg_date,4,2) . "." . substr($arg_date,6,2);
		echo $tmp_date;
	}
	
	function format_datetime1($arg_datetime) {
		if (strlen($arg_datetime) < 10) {
			$tmp_date = $arg_datetime;
		}else{
			$tmp_date = substr($arg_datetime,4,2) . "-" . substr($arg_datetime,6,2) . " " . substr($arg_datetime,8,2). ":" . substr($arg_datetime,10,2) ;
		}
		return $tmp_date;
	}

?>