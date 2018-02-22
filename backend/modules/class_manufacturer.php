<?php
class Manufacturer{
    public function view(){
        Config::$page_title="Hãng sản xuất";
        global $smarty;
        $search=trim($_REQUEST['search']);
        if (isset($_POST['btnsearch'])){
            header("location:?mod=manufactures&act=view&search={$search}");
        }
        if ($search){
            $where="where m_name like '%".mysql_escape_string($search)."%'";
        }

        $p=new Pager();
        $limit=5;
        $start=$p->findStart($limit);

        $count=mysql_num_rows(mysql_query("select * from manufacturer {$where}"));
        $pages=$p->findPages($count,$limit);
        $pagels=PagingUtils::showpage($_GET['page'],"?mod=manufacturer&act=view",$pages,3);
        $manufacturer=array();
        $result=mysql_query("select * from manufacturer {$where} limit $start,$limit");
        if(mysql_num_rows($result)<>0){
            while ($row=mysql_fetch_assoc($result)){
                $manufacturer[]=$row;
            }
        }
        $smarty->assign('listManufacturer',$manufacturer);
        $smarty->assign('pagels',$pagels);
        $smarty->assign('txtSearch',$search);
        $smarty->assign('totalResult',$count);
        $smarty->assign('numRowsDisplay',mysql_num_rows($result));
        $temp=$smarty->fetch('manufacturer_list.tpl');
        return $temp;
    }

    public function add(){
        Config::$page_title='Thêm hãng sản xuất';
        global $smarty;
        $temp=$smarty->fetch('manufacturer_add.tpl');
        return $temp;
    }
    public function doAdd(){
        $m_name=trim($_POST['manufacturer']);
        $sql="INSERT INTO manufacturer(m_name) VALUES ('".mysql_escape_string($m_name)."')";
        $err="";
        $isOk=0;
        if ($m_name==""){
            $err="Không được để trống";
        }
        else{
            if(!($result=mysql_query($sql))){
                $err="Lỗi cơ sở dữ liệu!";
            }
            else{
                $isOk=1;
            }
        }
        $result=array('ok'=>$isOk,'error'=>$err);
        echo json_encode($result);
        exit();
    }

    public function edit(){
        Config::$page_title="Sửa hãng sản xuất";
        global $smarty;

        $id=trim($_GET['id']);
        $tableManufacturer=mysql_query("SELECT * FROM manufacturer WHERE manufacturer_id={$id}");
        $listManufacturer=mysql_fetch_assoc($tableManufacturer);
        $smarty->assign('listManufacturer',$listManufacturer);
        $temp=$smarty->fetch("manufacturer_edit.tpl");
        return $temp;
    }
    public function doEdit(){
        $id=$_POST['id'];
        $m_name=$_POST['manufacturer'];
        $err="Xảy ra lỗi";
        $isOk=0;
        if ($m_name==""){
            $err="Không được để trống";
        }
        else{
            $sql="update manufacturer set m_name='".mysql_escape_string($m_name)."' where manufacturer_id=$id";
            if(mysql_query($sql)){
                $isOk=1;
            }
            else{
                $err="Lỗi cơ sở dữ liệu";
            }
        }

        $result=array('ok'=>$isOk, 'error'=>$err);
        echo json_encode($result);
        exit();
    }
    public function deleteManufacturer(){
        $id=$_POST['id'];
        $sql="DELETE FROM manufacturer WHERE manufacturer_id=$id";
        $isOk=0;
        if(mysql_query($sql)){
           $isOk=1;
        }
        $result=array('ok'=>$isOk);
        echo json_encode($result);
        exit();
    }
}
?>