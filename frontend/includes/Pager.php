<?php
class Pager
{
    var $lang = array(
        "tpl_gotolast" => "Tới trang cuối",
        "tpl_gotofirst" => "Về trang đầu",
        "tpl_next" => "Trang tiếp",
        "tpl_previous" => "Trang trước",
        "tpl_jump" => "Chuyển nhanh",
        "tpl_pages" => "Trang",
    );
    var $limit = 50;
    var $offset = 0;
    var $page = 1;
    var $total = 0;
    var $link = "";
    //var $limit_page_num = 200; // Unlimit if $limit_page_num = "~";
    var $type = null;

    function tep_get_all_get_params($exclude_array = "")
    {
        if (($exclude_array == "") || (!is_array($exclude_array))) $exclude_array = array();
        $get_url = '';
        reset($_GET);
        while (list($key, $value) = each($_GET)) {
            if (($key != "error") && (!in_array($key, $exclude_array))) $get_url .= $key . "=" . $value . "&";
        }
        return $get_url;
    }

    function tep_href_link($page = "", $parameters = "")
    {
        if ($page == "") {
            return false;
        }
        $link = "";
        if ($parameters == '') {
            $link = $link . $page.'?';
        } else {
            $link = $link . $page . '?' . $parameters  ;
        }

        //while ( (substr($link, -1) == '&') || (substr($link, -1) == '?') ) $link = substr($link, 0, -1);
        // $link = substr($link, 0, -1);
        return $link;
    }


    function page_link()
    {
        $total  = (int) $this->total;
        $limit    = max((int) $this->limit, 1);
        $page     = (int) $this->page;

        $page= ($page== "") ? 1 : $page;

        if ( $total > 0 )
        {
            $total = ceil($total/$limit);
        }

        //Limit page number

        //$total = ($this->limit_page_num == "~") ? $total : ((int)($total > $this->limit_page_num) ? $this->limit_page_num : $total);

        $this->offset = ($page - 1) * $limit;

        if ($total <= 1) {
            return "";
        }
        /*$v_f = 3;
        $v_a = 2;
        $v_l = 3;*/

        //Begin hack code by DungNH
        $v_f = 10;
        $v_a = 9;
        $v_l = 0;
        //End

        $max_pages = $v_f + $v_a + $v_l + 5;
        $z_1 = $z_2 = $z_3 = false;

        $link = "";
        $link .= ($this->link=="") ? $this->tep_href_link(basename($_SERVER['PHP_SELF']), $this->tep_get_all_get_params(array('page','offset'))) : $this->link;

        $pg = $this->page ? $this->page : 1;
        $work['B_LINK'] = "";
        $work['F_LINK'] = "";
        $work['P_LINK'] = "";

        $pgt = $pg-1;
        if ($pg != 1)
        {
            $work['F_LINK']	=	$this->pagination_start_dots($link."page=1");
            $work['P_LINK']	=	($this->type=="search")?$this->pagination_previous_link($pgt):$this->pagination_previous_link($link."page=$pgt");
        }
        else
        {
            $work['F_LINK']	=	"<div class=\"button2-right off\"><div class=\"start\"><span>Start</span></div></div>";
            $work['P_LINK']	=	"<div class=\"button2-right off\"><div class=\"prev\"><span>Prev</span></div></div>";
        }
        for($m = 1; $m <= $total; $m++) {
            if ($total > $max_pages) {
                if ((($m < $pg - $v_a) || ($m > $pg + $v_a)) && ($m < $total - $v_l + 1)) {
                    if (!$z_1 && ($m > $v_f)) {
                        $work['B_LINK'] .= "...";
                        $z_1 = true;
                    }
                    elseif (!$z_2 && ($m > $pg + $v_a)) {
                        $work['B_LINK'] .= "...";
                        $z_2 = true;
                    }
                    continue;
                }
            }
            if($m == $pg)
            {
                $work['B_LINK'] .= $this->pagination_current_page($m);
                $work['N_LINK']	=	"<div class=\"button2-right off\"><div class=\"start\"><span>Next</span></div></div>";
            }
            else
            {
                $work['B_LINK'] .= $this->pagination_page_link("{$link}page={$m}", $m);
                $work['L_LINK']	=	"<div class=\"button2-left off\"><div class=\"end\"><span>End</span></div></div>";
            }
        }
        $pgs = $pg + 1;
        if ($pg != $total)
        {
            $work['N_LINK']	=	($this->type=="search")?$this->pagination_next_link($pgs):$this->pagination_next_link($link."page=$pgs");
            $work['L_LINK']	=	($this->type=="search")?$this->pagination_end_dots($total):$this->pagination_end_dots($link."page=$total");
        }

        $strDivStart = "<div class=\"button2-left\"><div class=\"page\">";
        $strDivEnd .= "</div></div>";
        $work['B_LINK'] = $strDivStart.$work['B_LINK'].$strDivEnd;

        $html = $work['F_LINK'].$work['P_LINK'].$work['B_LINK'].(isset($work['N_LINK'])?$work['N_LINK']:'').(isset($work['L_LINK'])?$work['L_LINK']:'');
        return $html;
    }



//===========================================================================
// pagination_current_page
//===========================================================================
    function pagination_current_page($page="") {

        $RBHTML = "";
//--starthtml--//


        $RBHTML .= <<<EOF
	<span>{$page}</span>
EOF;

//--endhtml--//
        return $RBHTML;
    }

//===========================================================================
// pagination_end_dots
//===========================================================================
    function pagination_end_dots($url="") {

        $RBHTML = "";
//--starthtml--//

        if ($this->type=='search'){
            $RBHTML .= <<<EOF
	&nbsp;<a href="javascript:void(0)" onclick="javascript:olala($this->total,$url);window.scrollTo(0,0);" title="{$this->lang['tpl_gotolast']}" class="pagelinklast">&raquo;&raquo;</a>&nbsp;
EOF;
        }
        else{
            $RBHTML .= <<<EOF
	<div class="button2-left">
		<div class="end">
			<a href="$url" title="{$this->lang['tpl_gotolast']}" >End</a>
		</div>
	</div>
EOF;

        }


//--endhtml--//
        return $RBHTML;
    }


//===========================================================================
// pagination_next_link
//===========================================================================
    function pagination_next_link($url="") {

        $RBHTML = "";
//--starthtml--//
        if ($this->type=='search'){
            $RBHTML .= <<<EOF
	&nbsp;<a href="javascript:void(0)" onclick="javascript:olala($this->total,$url);window.scrollTo(0,0);" title="{$this->lang['tpl_next']}" class="pagelink">&gt;</a>
EOF;
        }
        else {
            $RBHTML .= <<<EOF
	<div class="button2-left">
		<div class="next">
			<a href="$url" title="{$this->lang['tpl_next']}">Next</a>
		</div>
	</div>
EOF;
        }

//--endhtml--//
        return $RBHTML;
    }

//===========================================================================
// pagination_page_link
//===========================================================================
    function pagination_page_link($url="",$page="") {

        $RBHTML = "";
//--starthtml--//

        if ($this->type=='search'){
            $RBHTML .= <<<EOF
	<a href="javascript:void(0)" onclick="javascript:olala($this->total,$page);window.scrollTo(0,0);" title="$page" class="pagelink">$page</a>
EOF;
        }
        else {
            $RBHTML .= <<<EOF
	<a href="$url" title="$page">$page</a>
EOF;
        }

//--endhtml--//
        return $RBHTML;
    }

//===========================================================================
// pagination_previous_link
//===========================================================================
    function pagination_previous_link($url="") {

        $RBHTML = "";
//--starthtml--//

        if ($this->type=='search'){
            $RBHTML .= <<<EOF
<a href="javascript:void(0)" onclick="javascript:olala($this->total,$url);window.scrollTo(0,0);" title="{$this->lang['tpl_previous']}"  class="pagelink">&lt;</a>
EOF;
        }
        else {
            $RBHTML .= <<<EOF
	<div class="button2-right">
		<div class="prev">
			<a href="$url" title="{$this->lang['tpl_previous']}"  class="pagelink">Prev</a>
		</div>
	</div>
EOF;
        }

//--endhtml--//
        return $RBHTML;
    }

//===========================================================================
// pagination_start_dots
//===========================================================================
    function pagination_start_dots($url="") {

        $RBHTML = "";
//--starthtml--//

        if ($this->type=='search'){
            $url = $this->convert_url($url);
            $RBHTML .= <<<EOF
<a href="javascript:void(0)" onclick="javascript:olala($this->total);window.scrollTo(0,0);" title="{$this->lang['tpl_gotofirst']}" class="pagelinklast">&laquo;&laquo;</a>&nbsp;
EOF;
        }
        else {
            $RBHTML .= <<<EOF
	<div class="button2-right">
		<div class="start">
			<a href="$url" title="{$this->lang['tpl_gotofirst']}">Start</a>
		</div>
	</div>
EOF;
        }

//--endhtml--//
        return $RBHTML;
    }

    function convert_url($url) {
        if (eregi("ajax_request",$url)){
            $query_string = substr($url, 17);
            $query_array = explode("&",$query_string);
            foreach ($query_array as $row){
                $row_array = explode("=",$row);
                $url_array[] =  $row_array[1];
            }
            $url_string = implode(",",$url_array);
            $url_string = $this->total.",".$url_string;
            return $url_string;
        }
        else{
            return "";
        }
    }

}
?>