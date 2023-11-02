<?php
/*
	출처 : http://www.phpschool.com/gnuboard4/bbs/board.php?bo_table=tipntech&wr_id=65067

*/


class pageSet {
    var $total,$page,$size,$scale;
    var $start_page,$page_max,$offset,$block,$tails;
	var $self;

	//$self = $_SERVER['PHP_SELF'];

    function pageSet($total, $page, $arr="", $size='10', $scale='10', $self) {
		if($self=='') {
			$this->self = $_SERVER['PHP_SELF'];
		} else {
			$this->self = $self;					// 출력될 페이지의 호출이름
		}
        $this->total = $total;					// 게시물 전체수
        $this->page = $page;					// 현재 페이지 번호
        $this->size = $size;					// 목록 개수
        $this->scale = $scale;					// 페이지 개수
        $this->start_page = $start_page;		// 페이지 시작번호
        $this->page_max = ceil($total / $size); // 총 페이지 개수
        $this->offset = ($page - 1) * $size;	// 해당 페이지에서 시작하는 목록번호
        $this->block = floor(($page-1) / $scale); // 페이지를 10개씩 보여준다면 1~10 페이지까지는 0블럭..
        $this->no = $this->total - $this->offset; // 목록에서 번호 나열할 때 필요.. (하단 사용법 참조)

		// 링크 URL 만들기
        if (is_array($arr)) {
			$tails_anchor = ""; // <a name>에 대응하는 페이지 내부 링크
			foreach ( $arr as $key=>$val ) {
				if($key=='#') {
					$tails_anchor = "#".$val;
					continue;
				}
				$tails.="$key=$val&";
			}
			$this->tails = substr($tails, 0,-1);
			$this->tails .= $tails_anchor;
		}
		/*
		// 검색의 마지막 페이지에서는 LIMIT offset,size 에서 size 가 맞질 않는다.
		if( $this->page==$this->page_max ) {
			$this->size = $this->total % $this->size;
		}
		*/
    }

    function getPage() {
		$op = "<!-- BEGIN:PAGE -->\n";
		$op .= "<div>\n";

		if($this->total > $this->size) {

			// prev block
            if($this->block > 0) {
                $prev_block = ($this->block - 1) * $this->scale + 1;
                $op .= "<a href='".$this->self."?" . "page=".$prev_block. "&" . $this->tails."'>[이전 ".$this->scale."개]</a>\n";
            } else $op .= "[이전 ".$this->scale."개]\n";

			// page number
            $this->start_page = $this->block * $this->scale + 1;
            for($i = 1; $i <= $this->scale && $this->start_page <= $this->page_max; $i++, $this->start_page++) {
                if($this->start_page == $this->page)
                    $op .= "[<span style='font-weight:bold; color:tomato;'>".$this->start_page."</span>] \n";
                else
                    $op .= "<a class='page' href='".$this->self."?"."page=".$this->start_page. "&" .$this->tails."'>[".$this->start_page."]</a> \n";
            }

			// next block
            if($this->page_max > ($this->block + 1) * $this->scale) {
                $next_block = ($this->block + 1) * $this->scale + 1;
                $op .= "<a href='".$this->self."?"."page=".$next_block. "&" . $this->tails."'>[다음 ".$this->scale."개]</a> \n";
            } else $op .= "[다음 ".$this->scale."개]\n";
        }

		$op .= "</div>\n";
		$op .= "<!-- END:PAGE -->\n";

		return $op;
    }

    function getImgPage() {
		$op = "<!-- BEGIN:PAGE -->\n";
		$op .= "<div>\n";

		if($this->total > $this->size) {

			// first block
            if($this->block > 0) {
                $prev_block = 1;
                $op .= "<a href='".$this->self."?" . "page=".$prev_block. "&" . $this->tails."'><img src='/images/sub/left.gif' align='absmiddle' border='0' title='처음 ".$this->scale."페이지'></a>\n";
            } else {
				$op .= "<img src='/images/sub/left.gif' align='absmiddle' border='0' title='처음 ".$this->scale."페이지'>\n";
			}

			// prev block
            if($this->block > 0) {
                $prev_block = ($this->block - 1) * $this->scale + 1;
                $op .= "<a href='".$this->self."?" . "page=".$prev_block. "&" . $this->tails."'><img src='/images/sub/prev.gif' align='absmiddle' border='0' title='이전 ".$this->scale."페이지'></a>\n";
            } else {
				$op .= "<img src='/images/sub/prev.gif' align='absmiddle' border='0' title='이전 ".$this->scale."페이지'>\n";
			}

			// page number
            $this->start_page = $this->block * $this->scale + 1;
            for($i = 1; $i <= $this->scale && $this->start_page <= $this->page_max; $i++, $this->start_page++) {
                if($this->start_page == $this->page)
                    $op .= "<span style='font-weight:bold; color:tomato;'>".$this->start_page."</span> \n";
                else
                    $op .= "<a class='page' href='".$this->self."?"."page=".$this->start_page. "&" .$this->tails."'>".$this->start_page."</a> \n";
            }

			// next block
            if($this->page_max > ($this->block + 1) * $this->scale) {
                $next_block = ($this->block + 1) * $this->scale + 1;
                $op .= "<a href='".$this->self."?"."page=".$next_block. "&" . $this->tails."'><img src='/images/sub/next.gif' align='absmiddle' border='0' title='다음 ".$this->scale."페이지'></a> \n";
            } else {
				$op .= "<img src='/images/sub/next.gif' align='absmiddle' border='0' title='다음 ".$this->scale."페이지'>\n";
			}

			// last block
            if($this->page_max > ($this->block + 1) * $this->scale) {
                $next_block = $this->page_max;
                $op .= "<a href='".$this->self."?"."page=".$next_block. "&" . $this->tails."'><img src='/images/sub/right.gif' align='absmiddle' border='0' title='마지막 ".$this->scale."페이지'></a> \n";
            } else {
				$op .= "<img src='/images/sub/right.gif' align='absmiddle' border='0' title='마지막 ".$this->scale."페이지'>\n";
			}
		}

		$op .= "</div>\n";
		$op .= "<!-- END:PAGE -->\n";

		return $op;
    }

} //class end


/*
#####################################################################################################
# 사용방법

아래코드를 게시물 쿼리되는 코드 위쪽에 적당히 집어넣으세요..
-----------------------------------------------------------------------------------------
$page_array = array("code"=>$code, "search"=>$search, ... );
- 페이지에 따라다닐변수..(꼭 연관배열로 만드세요)

$pg = new pageSet($total, $page, $page_array, $size, $scale);
- 필요한 변수를 받아서 객체를 만듭니다. 변수의 의미는 주석참고..

$no = $pg->no;
- 요녀석은 게시판 목록에서 게시물 번호를 생성해 줍니다..
  상단코드들과 함께 먼저 꺼내놓고 목록처리되는 부분에서 아래처럼 사용하세요
while{...
    echo "<tr><td>".$no."</td></tr>";
    ...
    ..

    $no=$no-1;  <-- 루프문 하단에 요녀석 넣어주어야 번호가 하나씩 차감됩니다.
}

mysql_query(select * from.. where... limit $pg->offset, $pg->size)
- 게시물 출력할때 위처럼 쿼리할텐데 limit 범위는 위 코드처럼..
-----------------------------------------------------------------------------------------

다 끝났고 페이지 만들고자 하는 부분에 아래 코드처럼 콜하면 끝!

echo $pg->getPage();
*/

?>