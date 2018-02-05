<?php
class Product{
    public function view(){
        /*$this->resize_image_force("style\images\icon-back.png","style\images\icon-back1.png",32,32);
        die();*/
        Config::$page_title="Danh sách sản phẩm";
        global $smarty;
        $where="where status=1";
        if(isset($_REQUEST['search'])){
            $search = trim($_REQUEST['search']);
            $where="WHERE p_name like N'%".mysql_escape_string($search)."%' AND status=1";
        }
        $p=new Pager;
        $limit=5;
        $start=$p->findStart($limit);
        $count=mysql_num_rows(mysql_query("select * from product {$where}"));
        $pages=$p->findPages($count,$limit);
        $tableProduct=mysql_query("SELECT * FROM product {$where} LIMIT $start,$limit");
        $listProduct=array();

        if(isset($_POST['btnsearch'])){
            header("location:?mod=product&act=view&search={$search}");
        }
        if (mysql_num_rows($tableProduct)!=0){
            while($row=mysql_fetch_assoc($tableProduct)){
                $row['manufacturer']=$this->getManufacturer_name($row['manufacturer_id']);
                $listProduct[]=$row;
            }
        }
        $totalResult=$count;
        $totalRowsDisplay=mysql_num_rows($tableProduct);
        $pagels=PagingUtils::showpage($_GET['page'],"?mod=product&act=view",$pages,3);

        $smarty->assign('totalResult',$totalResult);
        $smarty->assign('numRowsDisplay',$totalRowsDisplay);
        $smarty->assign('pagels',$pagels);
        $smarty->assign('listProduct',$listProduct);
        $smarty->assign('txtSearch',$search);
        $temp=$smarty->fetch('product_list.tpl');
        return $temp;
    }
    public function view2(){
        Config::$page_title="Danh sách sản phẩm";
        global $smarty;
        $where="where status=0";
        if(isset($_REQUEST['search'])){
            $search = trim($_REQUEST['search']);
            $where="WHERE p_name like N'%".mysql_escape_string($search)."%' AND status=0";
        }
        $p=new Pager;
        $limit=5;
        $start=$p->findStart($limit);
        $count=mysql_num_rows(mysql_query("select * from product {$where}"));
        $pages=$p->findPages($count,$limit);
        $tableProduct=mysql_query("SELECT * FROM product {$where} LIMIT $start,$limit");
        $listProduct=array();

        if(isset($_POST['btnsearch'])){
            header("location:?mod=product&act=view2&search={$search}");
        }
        if (mysql_num_rows($tableProduct)!=0){
            while($row=mysql_fetch_assoc($tableProduct)){
                $row['manufacturer']=$this->getManufacturer_name($row['manufacturer_id']);
                $listProduct[]=$row;
            }
        }
        $totalResult=$count;
        $totalRowsDisplay=mysql_num_rows($tableProduct);
        $pagels=PagingUtils::showpage($_GET['page'],"?mod=product&act=view2",$pages,3);

        $smarty->assign('totalResult',$totalResult);
        $smarty->assign('numRowsDisplay',$totalRowsDisplay);
        $smarty->assign('pagels',$pagels);
        $smarty->assign('listProduct',$listProduct);
        $smarty->assign('txtSearch',$search);
        $temp=$smarty->fetch('product_list.tpl');
        return $temp;
    }
    public function delete(){
        $product_id=$_POST['id'];
        $sql_get_product="select * from product where product_id=$product_id";
        $product=mysql_fetch_assoc(mysql_query($sql_get_product));
        if($product['status']==0){
            $sql_delete="delete from product where product_id=$product_id";
        }
        else{
            $sql_delete="update product set status=0 where product_id=$product_id";
        }
        /*$err="$sql_delete";
        $isOk=0;*/
        $sql_delete_features="delete from features_join where product_id=$product_id";//Xoá list tính năng của SP
        $sql_delete_images="delete from images where product_id=$product_id";//xoá link ảnh trong database

        //unlink ảnh
        $table_images=mysql_query("select * from images where product_id=$product_id");
        if(mysql_num_rows($table_images)!=0){
            while($row = mysql_fetch_assoc($table_images)){
                unlink($row['img_link_300']);
                unlink($row['img_link_350']);
                unlink($row['img_link_500']);
            }
        }

        $err="";
        $isOk=0;
        if (!($result1=mysql_query($sql_delete) && $result2=mysql_query($sql_delete_features) && $result3=mysql_query($sql_delete_images))){
            $err="Lỗi cơ sở dữ liệu";
        }
        else{
            $isOk=1;
        }
        $result=array('ok'=>$isOk,'error'=>$err);
        echo json_encode($result);
        exit();
    }

    public function detail(){
        Config::$page_title="Chi tiết sản phẩm";
        global $smarty;
        $product_id=trim($_GET['id']);
        $tableProduct="SELECT * FROM product WHERE product_id={$product_id}";
        $product=mysql_fetch_assoc(mysql_query($tableProduct));
        $product["category_name"]=$this->getCategory_name($product['category_id']);
        $smarty->assign('product',$product);
        $smarty->assign('listCategory',$this->getAllCategory());
        $smarty->assign('listManufacturer',$this->getAllManufacturer());
        $smarty->assign('allFeatures',$this->getAllFeatures());
        $smarty->assign('listFeatures',$this->getListFeatures_id($product['product_id']));
        $smarty->assign('listImages',$this->getListImages($product['product_id']));
        $temp=$smarty->fetch('product_detail.tpl');
        return $temp;
    }

    public function add(){
        Config::$page_title="Thêm sản phẩm";
        global $smarty;
        $smarty->assign('listCategory',$this->getAllCategory());
        $smarty->assign('listManufacturer',$this->getAllManufacturer());
        $smarty->assign('listFeatures',$this->getAllFeatures());
        $temp=$smarty->fetch('product_add.tpl');
        return $temp;
    }
    public function doAdd(){
        $category_id=trim($_POST['category']);
        $manufacturer_id=trim($_POST['manufacturer']);
        $p_name=mysql_escape_string(trim($_POST['p_name']));
        $p_description=mysql_escape_string(trim($_POST['p_description']));
        $p_content=mysql_escape_string(trim($_POST['p_content']));
        $p_price=trim($_POST['p_price']) + 0;
        $is_hot_product=0;
        $status=0;

    //Lấy danh sách features_id đã được chọn để insert vào bảng features
        $listFeatures=$this->getAllFeatures();
        $feature_POST=array();
        foreach ($listFeatures as $features){//Duyệt toàn bộ bảng features
            $features_id=$features['features_id'];
            if (isset($_POST["features_{$features_id}"])){ //Kiểm tra xem features nào đã đc chọn
                $feature_POST[]=$features_id;   //Gán features_id đã đc chọn vào mảng $feature_POST
            }
        }
    //***************
        if (isset($_POST['isHotProduct'])){
            $is_hot_product=1;
        }
        if (isset($_POST['status'])){
            $status=1;
        }
        $sql_insert_product="INSERT INTO product(category_id,manufacturer_id,p_name,p_description,p_content,p_price,is_hot_product,status) VALUES ($category_id,$manufacturer_id,'$p_name','$p_description','$p_content',$p_price,$is_hot_product,$status)";
        $err="";
        if(!($result=mysql_query($sql_insert_product))){
            $err="Xảy ra lỗi";
        }
        else{
            $last_insert_id=mysql_fetch_assoc(mysql_query("select LAST_INSERT_ID() as last_id"));
            $last_insert_id=$last_insert_id['last_id'];
            //******** Insert bảng features_join *************//
            $category_name=$this->getCategory_name($category_id);
            if ((!empty($feature_POST)) && $category_name=="Điện thoại"){
                $features_to_insert="";
                foreach ($feature_POST as $row){//Duyệt danh sách các tính năng đã đc chọn để ghép id lại thành chuỗi
                    $features_to_insert.="($row,$last_insert_id),"; //Ghép chuỗi để insert nhiều bản ghi 1 lúc
                }
                $features_to_insert=substr($features_to_insert,0,-1);//Xoá dấu phẩy cuối
                $sql_insert_features="INSERT INTO features_join VALUES {$features_to_insert}"; //INSERT INTO features_join VALUES (2,LAST_INSERT_ID()),(4,LAST_INSERT_ID()),(5,LAST_INSERT_ID())
                if(!($insert_features=mysql_query($sql_insert_features))){
                    $err="Xảy ra lỗi!";
                }
            }
            //******** Kết thúc insert bảng features_join *************//



            //******** Insert bảng images và add file image vào thư mục chứa *************//
            $count_img=4; //Số ảnh cho mỗi sản phẩm
            for ($i=1; $i<=$count_img;$i++){
                $allowedExts = array("jpeg", "jpg", "png", "gif","bmp");
                $extension=end(explode(".",$_FILES["img{$i}"]["name"]));
                if (in_array($extension, $allowedExts)){
                    if($_FILES["img{$i}"]["name"]!=""){
                        $img=time().$_FILES["img{$i}"]["name"];
                        $img_link_700="../product/700/$img";//link lưu ảnh 700x700
                        $img_link_500="../product/500/$img";//link lưu ảnh 500x500
                        $img_link_350="../product/350/$img";//link lưu ảnh 350x350
                        $img_link_300="../product/300/$img";//link lưu ảnh 300x300
                        $img_link_original="../product/original/$img";//link lưu ảnh nguyên bản
                        move_uploaded_file($_FILES["img{$i}"]["tmp_name"],"$img_link_original");//Lưu ảnh nguyên bản
                        $this->resize_image_force($img_link_original,$img_link_300,300,300);//resize và lưu vào mục ảnh 300
                        $this->resize_image_force($img_link_original,$img_link_350,350,350);//resize và lưu vào mục ảnh 350
                        $this->resize_image_force($img_link_original,$img_link_500,500,500);//resize và lưu vào mục ảnh 500
                        $this->resize_image_force($img_link_original,$img_link_700,700,700);//resize và lưu vào mục ảnh 700
                        $sql_insert_images="INSERT INTO images(product_id,img_link_300,img_link_350,img_link_500,img_link_700,img_link_original) VALUES ($last_insert_id,'$img_link_300','$img_link_350','$img_link_500','$img_link_700','$img_link_original')";
                        if (!($result=mysql_query($sql_insert_images))){
                            $err="Lỗi insert link hình ảnh";
                        }
                    }
                    else $err="Phải nhập đủ ảnh";
                }

            }
            //******** Kết thúc insert bảng images *************//
            if($err==""){
                if(isset($_POST['status'])){
                    header("location:?mod=product&act=view");
                }
                else{
                    header("location:?mod=product&act=view2");
                }
            }
            else{
                echo "<script>alert('$err');</script>";
                echo "<script type=\"text/javascript\">window.history.back();</script>";
            }
        }
    }
    public function editProduct(){
        $product_id=$_POST['id'];
        $category_id=trim($_POST['category']);
        $manufacturer_id=trim($_POST['manufacturer']);
        $p_name=mysql_escape_string(trim($_POST['p_name']));
        $p_description=mysql_escape_string(trim($_POST['p_description']));
        $p_content=mysql_escape_string(trim($_POST['p_content']));
        $p_price=trim($_POST['p_price']) + 0;//Giá nhập vào
        $p_price_default=trim($_POST['p_price_default']) + 0;//Giá hiện tại trong database để so sánh xem có sự thay đổi giá ko.
        $is_hot_product=0;
        $status=0;
        if (isset($_POST['isHotProduct'])){
            $is_hot_product=1;
        }
        if (isset($_POST['status'])){
            $status=1;
        }
        if ($p_price!=$p_price_default){ //Nếu có sự thay đổi giá thì chuyển p_price_default vào $p_old_price và update giá mới
            $sql_update_product="UPDATE product SET category_id=$category_id,manufacturer_id=$manufacturer_id,p_name='$p_name',p_description='$p_description',p_content='$p_content',p_price=$p_price,p_old_price=$p_price_default,is_hot_product=$is_hot_product,status=$status WHERE product_id=$product_id";
        }
        else{
            $sql_update_product="UPDATE product SET category_id=$category_id,manufacturer_id=$manufacturer_id,p_name='$p_name',p_description='$p_description',p_content='$p_content',is_hot_product=$is_hot_product,status=$status WHERE product_id=$product_id";
        }
        $err="";
        $isOk=0;
        if(!($result=mysql_query($sql_update_product))){
            $err="Xảy ra lỗi";
        }
        else{
            $isOk=1;
        }
        $result=array("ok"=>$isOk,"error"=>$err);
        echo json_encode($result);
        exit();
    }
    public function editFeatures(){
        $product_id=$_POST['product_id'];
        //Lấy danh sách features_id đã được chọn để insert vào bảng features
        $listFeatures=$this->getAllFeatures();
        $feature_POST=array();
        foreach ($listFeatures as $features){//Duyệt toàn bộ bảng features
            $features_id=$features['features_id'];
            if (isset($_POST["features_{$features_id}"])){ //Kiểm tra xem features nào đã đc chọn
                $feature_POST[]=$features_id;   //Gán features_id đã đc chọn vào mảng $feature_POST
            }
        }
        //***************
        $err="";
        $isOk=0;
        //Xoá các bản ghi cũ trong bảng features_join
        $sql_delete_features="delete from features_join where product_id=$product_id";
        if(!($delete=mysql_query($sql_delete_features))){
            $err="Không thể xoá dữ liệu cũ";
        }
        else{
            //******** Insert bảng features_join *************//
            if (!empty($feature_POST)){
                $features_to_insert="";
                foreach ($feature_POST as $row){//Duyệt danh sách các tính năng đã đc chọn để ghép id lại thành chuỗi
                    $features_to_insert.="($row,$product_id),"; //Ghép chuỗi để insert nhiều bản ghi 1 lúc
                }
                $features_to_insert=substr($features_to_insert,0,-1);//Xoá dấu phẩy cuối
                $sql_insert_features="INSERT INTO features_join VALUES {$features_to_insert}"; //INSERT INTO features_join VALUES (2,LAST_INSERT_ID()),(4,LAST_INSERT_ID()),(5,LAST_INSERT_ID())
                if(!($insert_features=mysql_query($sql_insert_features))){
                    $err="Xảy ra lỗi!";
                }
                else{
                    $isOk=1;
                }
            }
            else{
                $isOk=1;
            }
            //******** Kết thúc insert bảng features_join *************//
        }
        $result=array("ok"=>$isOk,"error"=>$err);
        echo json_encode($result);
        exit();
    }
    public function editImage(){
    //***** Lấy id hình ảnh để unlink ********************************
        $link_id=$_POST['link_id'];
        $sql_get_img_link="SELECT * FROM images WHERE link_id=$link_id";
        $table_img=mysql_query($sql_get_img_link);
        $img=mysql_fetch_assoc($table_img);
        $img_link_300=$img['img_link_300'];
        $img_link_350=$img['img_link_350'];
        $img_link_500=$img['img_link_500'];
        $img_link_700=$img['img_link_700'];
        $img_link_original=$img['img_link_original'];
    //***************************************************************
        $allowedExts = array("jpeg", "jpg", "png", "gif","bmp");
        $extension=end(explode(".",$_FILES["file"]["name"]));
        $isOk=0;
        $err="";
        if (in_array($extension, $allowedExts)){
            if($_FILES["file"]["name"]!=""){
                $img=time().$_FILES["file"]["name"];
                $new_img_link_300="../product/300/$img";
                $new_img_link_350="../product/350/$img";
                $new_img_link_500="../product/500/$img";
                $new_img_link_700="../product/700/$img";
                $new_img_link_original="../product/original/$img";//link lưu ảnh nguyên bản
                move_uploaded_file($_FILES["file"]["tmp_name"],"$new_img_link_original");//Lưu ảnh nguyên bản
                $this->resize_image_force($new_img_link_original,$new_img_link_300,300,300);//resize và lưu vào mục 300
                $this->resize_image_force($new_img_link_original,$new_img_link_350,350,350);//resize và lưu vào mục 350
                $this->resize_image_force($new_img_link_original,$new_img_link_500,500,500);//resize và lưu vào mục 500
                $this->resize_image_force($new_img_link_original,$new_img_link_700,700,700);//resize và lưu vào mục 700
                $sql_update_images="UPDATE images SET img_link_300='$new_img_link_300',img_link_350='$new_img_link_350',img_link_500='$new_img_link_500',img_link_700='$new_img_link_700',img_link_original='$new_img_link_original' WHERE link_id=$link_id";
                if (!($result=mysql_query($sql_update_images))){
                    $err="Lỗi update link hình ảnh";
                }
                else{
                    unlink($img_link_300);
                    unlink($img_link_350);
                    unlink($img_link_500);
                    unlink($img_link_700);
                    unlink($img_link_original);
                    $isOk=1;
                }
            }
            else $err="Chưa chọn ảnh!";
        }
        else{
            $err="Ảnh không đúng định dạng!";
        }
        $result=array("ok"=>$isOk,"error"=>$err);
        echo json_encode($result);
        exit();
    }


    public function restore(){
        $id=$_POST['id'];
        $sql_update="update product set status=1 where product_id=$id";
        $isOk=0;
        $err="";
        if (!($result=mysql_query($sql_update))){
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
        global $smarty;
        Config::$page_title="Sửa thông tin sản phẩm";
    }

    /*public function validateProduct(){
        $input=$_POST['input'];
        $err="";
        if (empty($input)){
            $err="Bạn chưa nhập trường này";
        }
        $result=array('error'=>$err);
        echo json_encode($result);
        exit();
    }*/


    function getManufacturer_name($manufacturer_id){
        $sql="select * from manufacturer WHERE manufacturer_id=".mysql_escape_string($manufacturer_id);
        $manufacturer=mysql_fetch_assoc(mysql_query($sql));
        return $manufacturer['m_name'];
    }
    function getCategory_name($category_id){
        $sql="select * from category WHERE category_id=".mysql_escape_string($category_id);
        $category=mysql_fetch_assoc(mysql_query($sql));
        return $category['category_name'];
    }
    function getListFeatures_id($product_id){
        $sql="SELECT * FROM features_join INNER JOIN features ON features.features_id=features_join.features_id WHERE product_id={$product_id}";
        $tableFeatures=mysql_query($sql);
        $listFeatures=array();
        if (mysql_num_rows($tableFeatures)<>0){
            while($row=mysql_fetch_assoc($tableFeatures)){
                $listFeatures[]=$row['features_id'];
            }
        }
        return $listFeatures;
    }
    function getListImages($product_id){
        $sql="SELECT * FROM images WHERE product_id={$product_id}";
        $listImages=array();
        $tableImages=mysql_query($sql);
        if(mysql_num_rows($tableImages)<>0){
            while ($row=mysql_fetch_assoc($tableImages)){
                $listImages[]=$row;
            }
        }
        return $listImages;
    }
    function getAllCategory(){
        $sql="SELECT * FROM category order by category_name DESC";
        $tableCategory=mysql_query($sql);
        $listCategory=array();
        if(mysql_num_rows($tableCategory)<>0){
            while ($row=mysql_fetch_assoc($tableCategory)){
                $listCategory[]=$row;
            }
        }
        return $listCategory;
    }
    function getAllManufacturer(){
        $sql="SELECT * FROM manufacturer ORDER BY m_name ASC";
        $tableManufacturer=mysql_query($sql);
        $listManufacturer=array();
        if(mysql_num_rows($tableManufacturer)<>0){
            while ($row=mysql_fetch_assoc($tableManufacturer)){
                $listManufacturer[]=$row;
            }
        }
        return $listManufacturer;
    }
    function getAllFeatures(){
        $sql="SELECT * FROM features ORDER BY f_name ASC";
        $tableFeatures=mysql_query($sql);
        $listFeatures=array();
        if(mysql_num_rows($tableFeatures)<>0){
            while ($row=mysql_fetch_assoc($tableFeatures)){
                $listFeatures[]=$row;
            }
        }
        return $listFeatures;
    }

    public function resize_image_force($image_link,$new_link,$newwidth,$newheight){
        $extension = strtolower(strrchr($image_link, '.'));
        switch ($extension) {
            case '.jpg' || '.jpeg':
                // Content type
                header('Content-Type: image/jpeg');
                // Get new sizes
                list($width, $height) = getimagesize($image_link);
                // Load
                $thumb = imagecreatetruecolor($newwidth, $newheight);
                $source = imagecreatefromjpeg($image_link);
                // Resize
                imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
                // Output
                imagejpeg($thumb, $new_link);
                break;
            case '.gif':
                // Content type
                header('Content-Type: image/gif');
                // Get new sizes
                list($width, $height) = getimagesize($image_link);
                // Load
                $thumb = imagecreatetruecolor($newwidth, $newheight);
                $source = imagecreatefromgif($image_link);
                // Resize
                imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
                // Output
                imagegif($thumb, $new_link);
                break;
            case '.png':
                // Content type
                header('Content-Type: image/png');
                // Get new sizes
                list($width, $height) = getimagesize($image_link);
                // Load
                $thumb = imagecreatetruecolor($newwidth, $newheight);
                imagealphablending($thumb, false);
                imagesavealpha($thumb, true);
                imagecolorallocatealpha($thumb, 255, 255, 255, 127);
                $source = imagecreatefrompng($image_link);
                // Resize
                imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
                // Output
                imagepng($thumb, $new_link);
                break;
            case '.bmp':
                // Content type
                header('Content-Type: image/bmp');
                // Get new sizes
                list($width, $height) = getimagesize($image_link);
                // Load
                $thumb = imagecreatetruecolor($newwidth, $newheight);
                $source = imagecreatefromwbmp($image_link);
                // Resize
                imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
                // Output
                imagewbmp($thumb, $new_link);
                break;
        }
    }
    /*function checkImage(){
        $allowedExts = array("jpeg", "jpg", "png", "gif","bmp","tiff");
        $extension=end(explode(".",$_FILES["img1"]["name"]));
        $isOk=0;
        if (in_array($extension, $allowedExts) && $_FILES["img1"]["size"]<1024000){
            $isOk=1;
        }
        $result=array("ok"=>$isOk,"extension"=>$extension);
        echo json_encode($result);
        exit();
    }*/
}
?>