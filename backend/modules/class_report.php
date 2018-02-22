<?php


class Report{
    public function view(){
        Config::$page_title="Phản hồi của khách hàng";
        global $smarty;
        
        $p=new Pager();
        $limit=5;
        $start=$p->findStart($limit);
        $count=Database::con()->num_rows(Database::con()->query("select * from report"));
        $pages=$p->findPages($count,$limit);
        $result=Database::con()->query("select * from report limit $start,$limit");
        $report=array();

        if(Database::con()->num_rows($result)<>0){
            while ($row=Database::con()->fetch_assoc($result)){
                $report[]=$row;
            }
        }
        $countrows=$count;
        $countpage=Database::con()->num_rows($result);
        $pagels=PagingUtils::showpage($_GET['page'],"?mod=report&act=view",$pages,3);

        $smarty->assign('countrows',$countrows);
        $smarty->assign('countpage',$countpage);
        $smarty->assign('pagels',$pagels);
        $smarty->assign('list_report',$report);
        $temp = $smarty->fetch('report_list.tpl');
        return $temp;
    }

    public function deleteReport(){
        $id=$_POST['id'];
        $deleteFromreport="delete from report where report_id=$id";
        $isOk=0;
        $err="";
        if(!Database::con()->query($deleteFromreport)){
            $err="Lỗi cơ sở dữ liệu";
        }
        else{
            $isOk=1;
        }
        $result=array("ok"=>$isOk,"error"=>$err);
        echo json_encode($result);
        exit();
    }
}


?>