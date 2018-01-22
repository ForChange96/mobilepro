<?php


class contact{
    public function view(){
        Config::$page_title="Liên hệ";
        global $smarty;
        
        $p=new Pager();
        $limit=5;
        $start=$p->findStart($limit);
        $count=mysql_num_rows(mysql_query("select * from contact"));
        $pages=$p->findPages($count,$limit);
        $result=mysql_query("select * from contact limit $start,$limit");
        $contact=array();
        if(mysql_num_rows($result)<>0){
            while ($row=mysql_fetch_assoc($result)){
                $contact[]=$row;
            }
        }
        $countrows=$count;
        $countpage=mysql_num_rows($result);
        $pagels=PagingUtils::showpage($_GET['page'],"?mod=contact&act=view",$pages,3);

        $smarty->assign('countrows',$countrows);
        $smarty->assign('countpage',$countpage);
        $smarty->assign('pagels',$pagels);
        $smarty->assign('list_contact',$contact);
        $temp = $smarty->fetch('contact_list.tpl');
        return $temp;
    }
    public function add(){
        Config::$page_title="Thêm liên hệ";
        global $smarty;
        $temp=$smarty->fetch('contact_add.tpl');
        return $temp;
    }
    public function doAdd(){
        $hotline=trim($_POST['hotline']);
        $address=trim($_POST['address']);
        $sql="INSERT INTO contact(hotline,address) VALUES('$hotline','$address')";
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
        Config::$page_title="Sửa liên hệ";
        global $smarty;
        $id=trim($_GET['id']);
        $sql="select * from contact where contact_id=$id";
        $contactEdit=mysql_fetch_assoc(mysql_query($sql));
        $smarty->assign("contactEdit",$contactEdit);
        $temp=$smarty->fetch('contact_edit.tpl');
        return $temp;
    }
    public function doEdit(){
        $id=$_POST['id'];
        $hotline=trim($_POST['hotline']);
        $address=trim($_POST['address']);
        $sql="UPDATE contact SET hotline='$hotline',address='$address' WHERE contact_id=$id";
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

    public function deleteContact(){
        $id=$_POST['id'];
        $deleteFromcontact="delete from contact where contact_id=$id";
        $isOk=0;
        $err="";
        if(!mysql_query($deleteFromcontact)){
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