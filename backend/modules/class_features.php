<?php


class Features{
    public function view(){
        Config::$page_title="Tính năng nổi bật";
        global $smarty;

        $where="";
        $search=trim($_REQUEST['search']);

        if(isset($_POST['btnsearch'])){
            header("location:?mod=features&act=view&search={$search}");
        }

        if($search){
            $where.="WHERE f_name like '%".$search."%'";
        }
        $p=new Pager();
        $limit=5;
        $start=$p->findStart($limit);
        $count=mysql_num_rows(mysql_query("select * from features {$where}"));
        $pages=$p->findPages($count,$limit);
        $result=mysql_query("select * from features {$where} ORDER BY f_name ASC limit $start,$limit");
        $features=array();

        if(mysql_num_rows($result)<>0){
            while ($row=mysql_fetch_assoc($result)){
                $features[]=$row;
            }
        }
        $totalResult=$count;
        $numRowsDisplay=mysql_num_rows($result);
        $pagels=PagingUtils::showpage($_GET['page'],"?mod=features&act=view",$pages,3);

        $smarty->assign('totalResult',$totalResult);
        $smarty->assign('numRowsDisplay',$numRowsDisplay);
        $smarty->assign('pagels',$pagels);
        $smarty->assign('listfeatures',$features);
        $smarty->assign('txt_search',$search);
        $temp = $smarty->fetch('features_list.tpl');
        return $temp;
    }
    public function add(){
        Config::$page_title="Thêm tính năng";
        global $smarty;
        $temp=$smarty->fetch('features_add.tpl');
        return $temp;
    }
    public function doAdd(){
        $f_name=trim($_POST['features']);
        $sql="INSERT INTO features(f_name) VALUES('$f_name')";
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
        Config::$page_title="Sửa tính năng";
        global $smarty;
        $id=$_GET['id'];
        $sql="select * from features where features_id=$id";
        $featuresEdit=mysql_fetch_assoc(mysql_query($sql));
        $smarty->assign("featuresEdit",$featuresEdit);
        $temp=$smarty->fetch('features_edit.tpl');
        return $temp;
    }
    public function doEdit(){
        $id=$_POST['id'];
        $f_name = trim($_POST['features']);
        $sql="UPDATE features SET f_name='$f_name' WHERE features_id=$id";
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

    public function deleteFeatures(){
        $id=$_POST['id'];
        $deleteFromFeatures="DELETE FROM features where features_id=$id";
        $deleteFromFeaturesJoin="DELETE FROM features_join where features_id=$id";
        $isOk=0;
        $err="";
        if(!($result=mysql_query($deleteFromFeatures)) && !($result2=mysql_query($deleteFromFeaturesJoin))){
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