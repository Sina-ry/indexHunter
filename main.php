<?php include "./head.php"; ?>


<script language="Javascript">
<!--
function setCookie( name, value, expirehours ) { 
var todayDate = new Date(); 
todayDate.setHours( todayDate.getHours() + expirehours ); 
document.cookie = name + "=" + escape( value ) + "; path=/; expires=" + todayDate.toGMTString() + ";" 
} 
function closeWin() { 
document.getElementById('popup').style.display = "none";
}
function todaycloseWin() { 
setCookie( "ncookie", "done" , 1 ); 
document.getElementById('popup').style.display = "none";
}
-->
</script>


<div id="popup" class="pop_layer">
    <table border="0" class="pop_layer_table" cellspacing="0" cellpadding="0">
    <tr>
        <td valign="top" align="center" height="40">
        
          <table border="0" cellpadding="0" cellspacing="0" id="popSubject" >
          <tr><td>팝업 제목 테스트입니다.</td></tr>
          </table>
          </td>
      </tr>
      <tr>
        <td valign="top" align="center">
        
          <table border="0" cellpadding="0" cellspacing="0" >
          <tr><td id="popContent" >팝업 내용 테스트입니다.</td></tr>
          </table>
          </td>
      </tr>
      <tr>
        <td height="25">
        <table width="100%" height="25" bgcolor="#353944" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td align="left" style=" padding-left:10px;"><input type="checkbox" onClick="todaycloseWin();"> <font color=#cbced2 >오늘하루 열지않음</font></td>
              <td align="right" style="padding-right:10px;"><font color=#cbced2 >창 닫기</font> <input type="image" onClick="closeWin();" src="./image/popup_close.gif" align="absmiddle"> </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
</div>

<script language="Javascript">
<!--
cookiedata = document.cookie; 
if ( cookiedata.indexOf("ncookie=done") < 0 ){ 
document.getElementById('popup').style.display = "block";
} else {
document.getElementById('popup').style.display = "none"; 
}


-->
</script>


<!-- wrap_cont-->
<div class="wrap_cont">

    <div class="left_cont">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td>
                     <h3 class="main_tit">최근게시물 <span class="more"><a href="notice.php">+ More</a></span></h3>
                </td>
            </tr>
            <tr>
                <td height="14"></td>
            </tr>
            <tr>
                <td>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">

                        <!-- <tr>
                            <td height="28" align="center" colspan=3>공지사항이 없습니다</td>
                        </tr> -->

                        <tr  style="cursor:pointer">
                            <td height="28" align="center" width="12"><img src="./image/left_s_arrow.gif" /></td>
                            <td><a href="./notice_view.php?mode=update&idx=">[공지사항]</a> <img src="./image/new.gif" /></td>
                            <td align="right">[2020-08-30]</td>
                        </tr>  
                        <tr>
                            <td colspan="3" height="1" background="./image/dot_bg.gif"></td>
                        </tr>

                    
                    </table>
                </td>
            </tr>
        </table>
    </div><!--left_cont -->

    <div class="right_cont">

        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td>
                     <h3 class="main_tit">최근거래내역 <span class="more"><a href="trade.php">+ More</a></span></h3>
                </td>
            </tr>
            <tr>
                <td height="14"></td>
            </tr>
            <tr>
                <td>
                
                    <table width="100%" border="0" cellpadding="0" cellspacing="1" class="t_style">
                        <colgroup>
                            <col width="40" />
                            <col width="40" />
                            <col width="*" />
                        </colgroup>
                        <tr>
                            <td colspan='3' class="t_value_main_pay">획득한 포인트</td>
                        </tr>
                        <tr>
                            <td class="t_value_main_pay">일자</td>
                            <td class="t_value_main_pay">포인트</td>
                            <td class="t_value_main_pay">비고</td>
                        </tr>
                        
                        <tr>
                            <td class="t_value_main_L">20-06-08</td>
                            <td class="t_value_main_L">0 P</td>
                            <td class="t_value_main_L">
                                <div class="t_overflow">
                                    <div class="t_overflow_space">
                                        <p class="t_value_text">-</p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan='3' class="t_value_main_can">환전한 포인트</td>
                        </tr>
                        <tr>
                            <td class="t_value_main_can">일자</td>
                            <td class="t_value_main_can">포인트</td>
                            <td class="t_value_main_can">비고</td>
                        </tr>
                        <tr>
                            <td class="t_value_main_L2">20-06-08</td>
                            <td class="t_value_main_L2">0 P</td>
                            <td class="t_value_main_L2">
                                <div class="t_overflow">
                                    <div class="t_overflow_space">
                                        <p class="t_value_text">-</p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div><!-- //right_cont-->
</div> <!-- //wrap_cont-->



<?php include "./foot.php"; ?>