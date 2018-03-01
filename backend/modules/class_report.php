<?php


class Report{
    public function view(){
        Config::$page_title="Phản hồi của khách hàng";
        global $smarty;
        
        $p=new Pager();
        $limit=5;
        $start=$p->findStart($limit);
        $count=mysql_num_rows(mysql_query("select * from report"));
        $pages=$p->findPages($count,$limit);
        $result=mysql_query("select * from report limit $start,$limit");
        $report=array();

        if(mysql_num_rows($result)<>0){
            while ($row=mysql_fetch_assoc($result)){
                $report[]=$row;
            }
        }
        $totalResult=$count;
        $numRowsDisplay=mysql_num_rows($result);
        $pagels=PagingUtils::showpage($_GET['page'],"?mod=report&act=view",$pages,3);

        $smarty->assign('totalResult',$totalResult);
        $smarty->assign('numRowsDisplay',$numRowsDisplay);
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
        if(!mysql_query($deleteFromreport)){
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