<table width="1000" cellpadding=0 cellspacing=1>
				<tr>
					<td width=50%>
					<? if ($_SESSION['level_code'] >= $board_write_flag) { ?> 	
						<input type=button class='btn1' value='선택삭제' onclick="board_all_delete()">&nbsp;
						<input type=button class='btn1' value='신규등록' onclick="board_input()">&nbsp;	
					<? } ?>
					</td>
					<td width=50% align=right>
					<div class="paginate"> 
					&nbsp;<a href="javascript:page_move('1');" class="pre_end">맨앞</a>
					<?	   If ($page > 1) { ?>
						  &nbsp;<a href="javascript:page_pre();") class="pre">이전</a>  
				<?     }
				       $si = ($max_cnt - ($max_cnt % $s_pagecnt))  /$s_pagecnt;
				       $sj = $max_cnt % $s_pagecnt; 
					   If ($sj > 0) { 
							$si = $si + 1;
						}	
						For ($sj = 1;$sj<=$si;$sj++) {
							If ($page == $sj) { ?> 
				       &nbsp;<strong><? echo $sj; ?></strong> 
				<?          } else { ?>
				       &nbsp;<a href="javascript:page_move('<? echo $sj; ?>');"><span><? echo $sj; ?></span></a>
				<?          }
				       }  
					   If ($page < $si ) { ?>
				       &nbsp;<a href='javascript:page_next();' class="next">이후 </a>			
				<?     }   ?>	
					   &nbsp;<a href="javascript:page_move('<? echo $si; ?>');" class="next_end">맨끝</a></div>
					   </td>
					</tr>
				</table>		