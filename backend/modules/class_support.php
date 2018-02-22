<?php


class support{
    public function view(){
        Config::$page_title="Thông tin người hỗ trợ";
        global $smarty;

        $p=new Pager();
        $limit=5;
        $start=$p->findStart($limit);
        $count=mysql_num_rows(mysql_query("select * from support"));
        $pages=$p->findPages($count,$limit);
        $result=mysql_query("select * from support limit $start,$limit");
        $support=array();
        if(mysql_num_rows($result)<>0){
            while ($row=mysql_fetch_assoc($result)){
                $support[]=$row;
            }
        }
        $countrows=$count;
        $countpage=mysql_num_rows($result);
        $pagels=PagingUtils::showpage($_GET['page'],"?mod=support&act=view",$pages,3);

        $smarty->assign('countrows',$countrows);
        $smarty->assign('countpage',$countpage);
        $smarty->assign('pagels',$pagels);
        $smarty->assign('list_support',$support);
        $temp = $smarty->fetch('support_list.tpl');
        return $temp;
    }
    public function add(){
        Config::$page_title="Thêm support";
        global $smarty;
        $temp=$smarty->fetch('support_add.tpl');
        return $temp;
    }
    public function doAdd(){
        $s_name=trim($_POST['s_name']);
        $s_email=trim($_POST['s_email']);
        $s_phone_number=trim($_POST['s_phone_number']);
        $sql="INSERT INTO support(s_name,s_email,s_phone_number) VALUES('$s_name','$s_email','$s_phone_number')";
        $isOk=0;
        $err="";
        if (!($result=mysql_query($sql))){
            $err="Lỗi cơ sở dữ liệu";
        }
        else{
            $isOk=1;
        }
        $result=array("ok"=>$isOk,"error"=>$err);
        echo json_encode($result);
        exit();
    }
    public function edit(){
        Config::$page_title="Sửa support";
        global $smarty;
        $id=trim($_GET['id']);
        $sql="select * from support where support_id=$id";
        $supportEdit=mysql_fetch_assoc(mysql_query($sql));
        $smarty->assign("supportEdit",$supportEdit);
        $temp=$smarty->fetch('support_edit.tpl');
        return $temp;
    }
    public function doEdit(){
        $id=$_POST['id'];
        $s_name=trim($_POST['s_name']);
        $s_email=trim($_POST['s_email']);
        $s_phone_number=trim($_POST['s_phone_number']);
        $sql="UPDATE support SET s_name='$s_name',s_email='$s_email',s_phone_number='$s_phone_number' WHERE support_id=$id";
        $isOk=0;
        $err="";
        if (!($result=mysql_query($sql))){
            $err="Lỗi cơ sở dữ liệu";
        }
        else{
            $isOk=1;
        }
        $result=array("ok"=>$isOk,"error"=>$err);
        echo json_encode($result);
        exit();
    }

    public function deleteSupport(){
        $id=$_POST['id'];
        $deleteFromsupport="delete from support where support_id=$id";
        $isOk=0;
        $err="";
        if(!mysql_query($deleteFromsupport)){
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