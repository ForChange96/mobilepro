<?php
    class Product extends class_get_info {
        public function add_wishlist(){
            $customer_id=$_SESSION['customer'];
            $product_id=$_POST['id'];

            $isOk=0;
            $sql_insert_favorite="INSERT INTO favorite VALUES ($customer_id,$product_id)";
            if(mysql_query($sql_insert_favorite)){
                $isOk=1;
            }
            $result=array("ok"=>$isOk);
            echo json_encode($result);
            exit();
        }

        public function delete_wishlist(){
            $customer_id=trim($_SESSION['customer']);
            $product_id=trim($_POST['id']);

            $isOk=0;
            $sql_delete_favorite="DELETE FROM favorite WHERE customer_id=$customer_id AND product_id=$product_id";
            if(mysql_query($sql_delete_favorite)){
                $isOk=1;
            }
            $result=array("ok"=>$isOk, "customer"=>$customer_id,"product"=>$product_id);
            echo json_encode($result);
            exit();
        }

        public function add_cart(){
            $product_id=$_POST['id'];
            if (!isset($_SESSION['cart'])) $_SESSION['cart']=array();
            if (isset($_SESSION['cart'][$product_id])){
                $_SESSION['cart'][$product_id]['number']++;
                $status=1;
            }
            else{
                $status=2;
                $_SESSION['cart'][$product_id]=$this->get_product($product_id);
                $_SESSION['cart'][$product_id]['img_link_300']=$this->get_img_300($product_id);
                $_SESSION['cart'][$product_id]['manufacturer']=$this->get_manufacturer($_SESSION['cart'][$product_id]['manufacturer_id']);
                $_SESSION['cart'][$product_id]['number']=1;
            }
            $result=array("status"=>$status);
            echo json_encode($result);
            exit();
        }
        public function add_cart_with_number(){//add 1 SP vào giỏ nhưng với số lượng được nhập vào
            $product_id=$_POST['id'];
            $number=$_POST['number'];
            if (!isset($_SESSION['cart'])) $_SESSION['cart']=array();
            if (isset($_SESSION['cart'][$product_id])){
                $_SESSION['cart'][$product_id]['number']+=$number;
                $status=1;
            }
            else{
                $status=2;
                $_SESSION['cart'][$product_id]=$this->get_product($product_id);
                $_SESSION['cart'][$product_id]['img_link_300']=$this->get_img_300($product_id);
                $_SESSION['cart'][$product_id]['manufacturer']=$this->get_manufacturer($_SESSION['cart'][$product_id]['manufacturer_id']);
                $_SESSION['cart'][$product_id]['number']=$number;
            }
            $result=array("status"=>$status);
            echo json_encode($result);
            exit();
        }

        public function remove_from_cart(){
            $product_id=$_POST['id'];
            if ($_SESSION['cart'][$product_id]['number']>1){
                $_SESSION['cart'][$product_id]['number']--;
                $status=1;
            }
            else{
                $status=2;
                unset($_SESSION['cart'][$product_id]);
            }
            $result=array("status"=>$status);
            echo json_encode($result);
            exit();
        }
        public function remove_from_cart2(){//Xoá hẳn SP khỏi giỏ hàng mà ko cần kiểm tra số lượng
            $product_id=$_POST['id'];
            unset($_SESSION['cart'][$product_id]);
            exit();
        }

        public function reload_cart(){
            global $smarty;
            $smarty->assign('total',$this->get_total());
            $result=$smarty->fetch('ajax_cart_in_home.tpl');
            echo $result;
            exit();
        }
        public function reload_num_cart_and_total(){
            $total=number_format($this->get_total());
            $total.=" VNĐ";
            $result=array("total"=>$total,"num_cart"=>parent::get_num_cart());
            echo json_encode($result);
            exit();
        }

        public function detail(){
            global $smarty;
            $product_id=isset($_GET['id'])?trim($_GET['id']):"";
            $isFavorite=0;
            if (isset($_SESSION['customer'])){
                $isFavorite=parent::checkFavorite($_SESSION['customer'],$product_id);
            }
            $smarty->assign('isFavorite',$isFavorite);
            $smarty->assign('list_img',$this->get_img_500_700($product_id));
            $smarty->assign('product',$this->get_product_detail($product_id));
            $result = $smarty->fetch('chi-tiet-san-pham.tpl');
            return $result;
        }

        public function show_by_category(){
            global $smarty;
            $category_id=isset($_GET['id'])?$_GET['id']:1;

            $where="where status=1 and category_id=$category_id";
            $limit=isset($_GET['limit'])?trim($_GET['limit']):15;
            $tableProduct=mysql_query("SELECT product_id, p_name,p_old_price,p_price,num_star,p_description FROM product {$where} LIMIT $limit");
            $listProduct=array();
            if (isset($_SESSION['customer'])){
                $customer=$_SESSION['customer'];
                if (mysql_num_rows($tableProduct)!=0){
                    while($row=mysql_fetch_assoc($tableProduct)){
                        $row['img_link_300']=$this->get_img_300($row['product_id']);
                        $row['isFavorite']=parent::checkFavorite($customer,$row['product_id']);
                        $listProduct[]=$row;
                    }
                }
            }
            else{
                if (mysql_num_rows($tableProduct)!=0){
                    while($row=mysql_fetch_assoc($tableProduct)){
                        $row['img_link_300']=$this->get_img_300($row['product_id']);
                        $listProduct[]=$row;
                    }
                }
            }

            $smarty->assign('listProduct',$listProduct);
            $smarty->assign('listCategory',parent::get_category());
            $temp=$smarty->fetch('product_list.tpl');
            return $temp;
        }
        public function show_by_category_ajax(){
            global $smarty;
            $category_id=isset($_GET['id'])?$_GET['id']:1;
            $order_by=isset($_GET['order_by'])?trim($_GET['order_by']):"";
            $limit=isset($_GET['limit'])?trim($_GET['limit']):"LIMIT 15";
            $where="where status=1 and category_id=$category_id";

            $sql_select="SELECT product_id, p_name,p_old_price,p_price,num_star,p_description FROM product {$where} {$order_by} {$limit}";
            $tableProduct=mysql_query($sql_select);
            $listProduct=array();
            if (isset($_SESSION['customer'])){
                $customer=$_SESSION['customer'];
                if (mysql_num_rows($tableProduct)!=0){
                    while($row=mysql_fetch_assoc($tableProduct)){
                        $row['img_link_300']=$this->get_img_300($row['product_id']);
                        $row['isFavorite']=parent::checkFavorite($customer,$row['product_id']);
                        $listProduct[]=$row;
                    }
                }
            }
            else{
                if (mysql_num_rows($tableProduct)!=0){
                    while($row=mysql_fetch_assoc($tableProduct)){
                        $row['img_link_300']=$this->get_img_300($row['product_id']);
                        $listProduct[]=$row;
                    }
                }
            }

            $smarty->assign('listProduct',$listProduct);
            $temp=$smarty->fetch('ajax_product_list.tpl');
            echo $temp;
            exit();
        }
        public function list_category_ajax(){
            global $smarty;
            $category_id=$_POST['id'];

            $smarty->assign('listCategory',parent::get_category());
            $smarty->assign('selected',$category_id);
            $temp=$smarty->fetch('ajax_list_category.tpl');
            echo $temp;
            exit();
        }

        public function search_product(){
            global $smarty;
            $search=isset($_POST['txt_search'])?trim($_POST['txt_search']):"";
            $where_search=" AND p_name like N'%".mysql_escape_string($search)."%'";

            //Kiểu hiển thị
            $display_type="product-layout product-grid col-lg-3 col-md-3 col-sm-6 col-xs-12";
            //Sắp xếp theo
            $order_by="ORDER BY is_hot_product DESC, p_price DESC";

            $where="where status=1{$where_search}";
            $limit=isset($_POST['limit'])?trim($_POST['limit']):15;
            $tableProduct=mysql_query("SELECT product_id, p_name,p_old_price,p_price,num_star,p_description FROM product {$where} {$order_by} LIMIT $limit");
            $listProduct=array();
            if (isset($_SESSION['customer'])){
                $customer=$_SESSION['customer'];
                if (mysql_num_rows($tableProduct)!=0){
                    while($row=mysql_fetch_assoc($tableProduct)){
                        $row['img_link_300']=$this->get_img_300($row['product_id']);
                        $row['isFavorite']=parent::checkFavorite($customer,$row['product_id']);
                        $listProduct[]=$row;
                    }
                }
            }
            else{
                if (mysql_num_rows($tableProduct)!=0){
                    while($row=mysql_fetch_assoc($tableProduct)){
                        $row['img_link_300']=$this->get_img_300($row['product_id']);
                        $listProduct[]=$row;
                    }
                }
            }


            $smarty->assign('txt_search',$search);
            $smarty->assign('listProduct',$listProduct);
            $smarty->assign('listCategory',parent::get_category());
            $smarty->assign('display_type',$display_type);
            $temp=$smarty->fetch('product_search.tpl');
            return $temp;
        }

        public function ajax_search_product(){
            global $smarty;
            $search=isset($_POST['txt_search'])?trim($_POST['txt_search']):"";
            $where_search=" AND p_name like N'%".mysql_escape_string($search)."%'";
            $where_category="";
            if (isset($_POST['category']) && $_POST['category']!=0)
                $where_category=" AND (category_id=".$_POST['category'].")";
            $where_price="";
            if (isset($_POST['price_from']) && isset($_POST['price_to'])){
                $price_from=$_POST['price_from']*1000000;
                $price_to=$_POST['price_to']*1000000;
                $where_price=" AND (p_price BETWEEN $price_from AND $price_to)";
            }

            //Kiểu hiển thị
            if (isset($_POST['display_type']) && $_POST['display_type']=="list"){
                $display_type="product-layout product-list col-xs-12";
            }
            else{
                $display_type="product-layout product-grid col-lg-3 col-md-3 col-sm-6 col-xs-12";
            }
            //Sắp xếp theo
            $order_by=trim($_POST['order_by']);

            $where="where status=1{$where_search}{$where_category}{$where_price}";
            $limit=isset($_POST['limit'])?trim($_POST['limit']):15;
            $sql="SELECT product_id, p_name,p_old_price,p_price,num_star,p_description FROM product {$where} {$order_by} LIMIT $limit";
            $tableProduct=mysql_query($sql);
            $listProduct=array();
            if (isset($_SESSION['customer'])){
                $customer=$_SESSION['customer'];
                if (mysql_num_rows($tableProduct)!=0){
                    while($row=mysql_fetch_assoc($tableProduct)){
                        $row['img_link_300']=$this->get_img_300($row['product_id']);
                        $row['isFavorite']=parent::checkFavorite($customer,$row['product_id']);
                        $listProduct[]=$row;
                    }
                }
            }
            else{
                if (mysql_num_rows($tableProduct)!=0){
                    while($row=mysql_fetch_assoc($tableProduct)){
                        $row['img_link_300']=$this->get_img_300($row['product_id']);
                        $listProduct[]=$row;
                    }
                }
            }


            $smarty->assign('txt_search',$search);
            $smarty->assign('listProduct',$listProduct);
            $smarty->assign('listCategory',parent::get_category());
            $smarty->assign('display_type',$display_type);
            $temp=$smarty->fetch('ajax_product_search.tpl');
            echo $temp;
            exit();
        }









//********************** Get info **************************************
        function get_product($product_id){
            $sql="SELECT p_name, p_price, manufacturer_id FROM product WHERE product_id=$product_id";
            $product=mysql_fetch_assoc(mysql_query($sql));
            return $product;
        }
        function get_img_300($product_id){
            $sql="SELECT img_link_300 FROM images WHERE product_id=$product_id";
            $img_100=mysql_fetch_assoc(mysql_query($sql));
            return $img_100['img_link_300'];
        }
        function get_product_detail($product_id){
            $sql="SELECT * FROM product WHERE product_id=$product_id";
            $product=mysql_fetch_assoc(mysql_query($sql));
            $product['manufacturer']=$this->get_manufacturer($product['manufacturer_id']);
            $product['category']=$this->get_category_name($product['category_id']);
            return $product;
        }
        function get_img_500_700($product_id){
            $sql="SELECT img_link_500,img_link_700 FROM images WHERE product_id=$product_id";
            $table_images=mysql_query($sql);
            $list_img_500=array();
            if (mysql_num_rows($table_images)!=0){
                while ($row = mysql_fetch_assoc($table_images)){
                    $list_img_500[]=$row;
                }
            }
            return $list_img_500;
        }
        function get_manufacturer($manufacturer_id){
            $sql="SELECT m_name FROM manufacturer WHERE manufacturer_id=$manufacturer_id";
            $manufacturer=mysql_fetch_assoc(mysql_query($sql));
            return $manufacturer['m_name'];
        }
        function get_category_name($category_id){
            $sql="SELECT category_name FROM category WHERE category_id=$category_id";
            $category=mysql_fetch_assoc(mysql_query($sql));
            return $category['category_name'];
        }
    }
?>