<?php
/**
 * class Paging
 * @author HieuTV
 * @date created 2009/04/15
 */

class PagingUtils {

    private function __construct() {}

    /*
     * show paging area
     * @author HieuTV
     * @date 2009/04/15
     *
     * @param integer $page : current page clicked
     * @param string $url : current url of page
     * @param integer $total : total page of query
     * @param integer $maxpage : number of page show on screen [3, 4, 5, ...]
     * @param string $page_param : param is value of current page [page, ...]
     * @param integer $type : value of each category [1, 2, ...]
     * @param boolean $ajax : paging from ajax or submit form [true: ajax, false:submit]
     * @param integer $type_url : type paging from seo [NULL: http://server/a1/b1/c1, 1,2, ...:http://server/?a=a1&b=b1&c=c1]
     *
     * return string paging [<< < 1 2 3 ... > >>]
     */
    static public function showpage($page, $url, $total, $maxpage, $ajax=false, $aryModule=null, $type_url=NULL) {
        $strUrl = $url;

        if ($page > $maxpage) {
            $num_page = ceil($page / $maxpage);
            $showpage = ($num_page - 1) * $maxpage;
            $end = $showpage + $maxpage;
            $showpage ++;
        }
        else {
            $thispage = 1;
            $showpage = 1;
            $end = $maxpage;
        }
        $startpage = $showpage;

        if (!$ajax) {
            if ($total > 1) {
                for ($showpage; $showpage < $end + 1; $showpage ++) {
                    if ($showpage <= $total) {
                        if ($page == $showpage) {
                            $list_page .= "<span style='background:#000;color:#FFF;padding:5px;border-radius:5px;font-weight:bold;'>" . $showpage . "</span> ";
                        }
                        else {
                            if (!$type_url)
                                $list_page .= "<a style='background:#006699;color:#FFF;padding:5px;border-radius:5px;font-weight:bold;' href='$strUrl&page=$showpage'>" . $showpage . "</a> ";
                            else
                                $list_page .= "<a style='background:#006699;color:#FFF;padding:5px;border-radius:5px;font-weight:bold;' href='$strUrl/page/$showpage'>" . $showpage . "</a> ";
                        }
                    }
                }
            }
            if ($num_page > 1) {
                $back = $startpage - 1;
//				if ($num_page > 2) {
//					if (!$type_url)
//						$list_page1 .= "<a href='$strUrl&page=1'><<</a> ";
//					else
//						$list_page1 = "<a href='$strUrl/page/1'><<</a> ";
//				}
                if (!$type_url)
                    $list_page1 .= "<a style='background:#006699;color:#FFF;padding:5px;border-radius:5px;font-weight:bold;' href='$strUrl&page=$back'>Prev</a> ";
                else
                    $list_page1 .= "<a style='background:#006699;color:#FFF;padding:5px;border-radius:5px;font-weight:bold;' href='$strUrl/page/$back'>Prev</a> ";

            }
            if ($num_page < ceil($total / $maxpage) && ($total > $maxpage)) {
                $next = $showpage;
                if (!$type_url){
                    $list_page2 .= "<a style='background:#006699;color:#FFF;padding:5px;border-radius:5px;font-weight:bold;' href='$strUrl&page=$next'>Next</a> ";
//					$list_page2 .= "<a href='$strUrl&page=$total'>>></a> ";
                }
                else {
                    $list_page2 .= "<a style='background:#006699;color:#FFF;padding:5px;border-radius:5px;font-weight:bold;' href='$strUrl/page/$next'>Next</a> ";
//					$list_page2 .= "<a href='$strUrl/page/$total'>>></a> ";
                }
            }
        }
        else {
            if ($total > 1) {
                for ($showpage; $showpage < $end + 1; $showpage ++) {
                    if ($showpage <= $total) {
                        if ($page == $showpage) {
                            $list_page .= "<span>" . $showpage . "</span> ";
                        }
                        else {
                            $list_page .= "<a onclick='{$aryModule['object_name']}.{$aryModule['function_name']}({$showpage});'>" . $showpage . "</a> ";
                        }
                    }
                }
            }
            if ($num_page > 1) {
                $back = $startpage - 1;
                if ($num_page > 2) {
                    $list_page1 = "<a onclick='{$aryModule['object_name']}.{$aryModule['function_name']}(1);'><<</a> ";
                }
                $list_page1 .= "<a onclick='{$aryModule['object_name']}.{$aryModule['function_name']}({$back});'><</a> ";

            }
            if ($num_page < ceil($total / $maxpage) && ($total > $maxpage)) {
                $next = $showpage;
                $list_page2 .= "<a onclick='{$aryModule['object_name']}.{$aryModule['function_name']}({$next});'>></a> ";
                $list_page2 .= "<a onclick='{$aryModule['object_name']}.{$aryModule['function_name']}({$total});'>>></a> ";
            }
        }
        $list_page = "<div class='paging'>".$list_page1 . $list_page . $list_page2."</div>";

        return $list_page;
    }
}
?>
