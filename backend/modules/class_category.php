<?php


class Category{
    public function view(){
        Config::$page_title="Danh mục sản phẩm";
        global $smarty;

        $where="WHERE status=1";
        $search=trim($_REQUEST['search']);
        if($search){
            $where.=" AND category_name like '%".$search."%'";
        }
        $p=new Pager();
        $limit=5;
            $start=$p->findStart($limit);
        $count=Database::con()->num_rows(Database::con()->query("select * from category {$where}"));
        $pages=$p->findPages($count,$limit);
        $result=Database::con()->query("select * from category {$where} limit $start,$limit");
        $category=array();

        if(isset($_POST['btnsearch'])){
            header("location:?mod=category&act=view&search={$search}");
        }
        if(Database::con()->num_rows($result)<>0){
            while ($row=Database::con()->fetch_assoc($result)){
                $category[]=$row;
            }
        }
        $countrows=$count;
        $countpage=Database::con()->num_rows($result);
        $pagels=PagingUtils::showpage($_GET['page'],"?mod=category&act=view",$pages,3);

        $smarty->assign('countrows',$countrows);
        $smarty->assign('countpage',$countpage);
        $smarty->assign('pagels',$pagels);
        $smarty->assign('category',$category);
        $smarty->assign('txt_search',$search);
        $temp = $smarty->fetch('category_list.tpl');
        return $temp;
    }
    public function add(){
        Config::$page_title="Thêm danh mục";
        global $smarty;
        $temp=$smarty->fetch('category_add.tpl');
        return $temp;
    }
    public function doAdd(){
        $category_name=trim($_POST['category']);
        $sql="INSERT INTO category(category_name) VALUES('$category_name')";
        $isOk=0;
        $err="";
        if (!($result=Database::con()->query($sql))){
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
        Config::$page_title="Sửa danh mục";
        global $smarty;
        $id=$_GET['id'];
        $sql="select * from category where category_id=$id";
        $categoryEdit=Database::con()->fetch_assoc(Database::con()->query($sql));
        $smarty->assign("categoryEdit",$categoryEdit);
        $temp=$smarty->fetch('category_edit.tpl');
        return $temp;
    }
    public function doEdit(){
        $id=$_POST['id'];
        $category_name = trim($_POST['category']);
        $sql="UPDATE category SET category_name='$category_name' WHERE category_id=$id";
        $isOk=0;
        $err="";
        if (!($result=Database::con()->query($sql))){
            $err="Lỗi cơ sở dữ liệu";
        }
        else{
            $isOk=1;
        }
        $result=array("ok"=>$isOk,"error"=>$err);
        echo json_encode($result);
        exit();
    }

    public function deleteCategory(){
        $id=$_POST['id'];
        $deleteFromCategory="update category set status=0 where category_id=$id";
        $deleteFromProduct="update product set status=0 where category_id=$id";
        $isOk=0;
        $err="";
        if(!($result=Database::con()->query($deleteFromCategory)) && !($result2=Database::con()->query($deleteFromProduct))){
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