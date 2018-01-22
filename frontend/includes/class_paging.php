<?php
class Pager{
    //hàm int findstart(int limit)
    //trả về dòng bắt đầu của trang được chọn đưa trên trang lấy được và biến limit
    function findStart($limit){
        if((!isset($_GET['page'])) || ($_GET['page']=="1")){
            $start = 0;
            $_GET['page'] = 1;
        }
        else {
            $start = ($_GET['page']-1)*$limit;
        }
        return $start;
    }

    //hàm int findpages(int count, int limit)
    //trả về số lượng trang cần thiết đưa trên tổng số dòng có trong table và limit
    function findPages($count, $limit){
        $pages = (($count%$limit)==0)?$count/$limit:floor($count/$limit)+1;
        return $pages;
    }

    //hàm string pagelist(int curpage, in pages)
    //trả về danh sách trang theo định dạng "trang đầu tiên<[các trang]> trang cuối cùng"
    function pageList($curpage, $pages, $url){
        $aryUrl = explode("&page", $url);
        $page_list = "";
        //in trang đầu tiên và những link tới trang trước nếu cần

        /*if(($curpage)!=1 && ($curpage)){
			$page_list .= "<a href=\"".$aryUrl[0]."&page=1\" title=\"Trang đầu\">First</a>";
		}*/

        if(($curpage-1)>0){
            $page_list .= "<a style='background:#006699;color:#FFF;padding:5px;border-radius:5px;font-weight:bold;' href=\"".$aryUrl[0]."&page=".($curpage-1)."\" title=\"Về trang
			 trước\">Back</a> ";
        }
        //In ra danh sách các trang và làm cho trang hiện tại đậm hơn và mất link ở chân
        for($i=1;$i<=$pages;$i++){
            if($i==$curpage){
                $page_list .= "<b style='background:#000;color:#FFF;padding:5px;border-radius:5px;font-weight:bold;'>".$i."</b>";
            }
            else {
                $page_list .= "<a style='background:#006699;color:#FFF;padding:5px;border-radius:5px;font-weight:bold;' href=\"".$aryUrl[0]."&page=".$i."\" title=\"Trang ".$i."\">"
                    .$i."</a>";
            }
            $page_list .= "	";
        }
        //in link của trang tiếp theo và trang cuối cùng nếu cần
        if(($curpage+1)<=$pages){
            $page_list .= "<a style='background:#006699;color:#FFF;padding:5px;border-radius:5px;font-weight:bold;' href=\"".$aryUrl[0]."&page=".($curpage+1)."\" title=\"Đến
			trang sau\">Next</a> ";
        }
        /*if(($curpage!=$pages) &&($pages)!=0){
            $page_list .= "<a href=\"".$aryUrl[0]."&page=".$pages."\" title=\"Trang cuối
            \">Last</a> ";
        }*/
        $page_list .= "</td>\n";
        return $page_list;
    }

    //Hàm string nextprev(int curpage, int pages)
    //Returns ("Previous | Next") string for individual pagination (it's a word!)
    function nextPrev($curpage, $pages, $url){
        $aryUrl = explode("&page", $url);
        $next_prev = "";
        if(($curpage-1)<=0){
            $next_prev .= "<img class='prev opacity3' src='style/images/button_prev.png' alt='prev'>";
        }
        else {
            $next_prev .= "<a href=\"".$aryUrl[0]."&page=".($curpage-1)."\"><img class='prev' src='style/images/button_prev.png' alt='prev'>
			</a>";
        }
        $next_prev .= " &nbsp ";
        if(($curpage+1)>$pages){
            $next_prev .= "<img class='next opacity3' src='style/images/button_next.png' alt='next'>";
        }
        else {
            $next_prev .= "<a href=\"".$aryUrl[0]."&page=".($curpage+1)."\"><img class='next' src='style/images/button_next.png' alt='next'>
			</a> ";
        }
        return $next_prev;
    }
}
?>