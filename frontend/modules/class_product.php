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
            $num_star_voted=0;
            if (isset($_SESSION['customer'])){
                $isFavorite=parent::checkFavorite($_SESSION['customer'],$product_id);
                //Lấy số sao mà khách hàng này đã từng vote
                $num_star_voted=$this->get_num_star_voted($_SESSION['customer'],$product_id);
            }
            $smarty->assign('isFavorite',$isFavorite);
            $smarty->assign('num_star_voted',$num_star_voted);
            $smarty->assign('list_img',$this->get_img_500_700($product_id));
            $smarty->assign('product',$this->get_product_detail($product_id));
            $smarty->assign('check_order_for_vote',$this->check_order_for_vote($product_id));

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
                        $row['p_name_remove_unicode']=remove_unicode($row['p_name']);
                        $row['isFavorite']=parent::checkFavorite($customer,$row['product_id']);
                        $listProduct[]=$row;
                    }
                }
            }
            else{
                if (mysql_num_rows($tableProduct)!=0){
                    while($row=mysql_fetch_assoc($tableProduct)){
                        $row['img_link_300']=$this->get_img_300($row['product_id']);
                        $row['p_name_remove_unicode']=remove_unicode($row['p_name']);
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
            $category_id=isset($_POST['id'])?$_POST['id']:1;

            $orderBy=isset($_POST['order_by'])?trim($_POST['order_by']):"";
            $order_by="";
            switch ($orderBy){
                case "default":
                    $order_by="ORDER BY is_hot_product DESC, p_price DESC";
                    break;
                case "p_name1":
                    $order_by="ORDER BY p_name ASC";
                    break;
                case "p_name2":
                    $order_by="ORDER BY p_name DESC";
                    break;
                case "p_price1":
                    $order_by="ORDER BY p_price ASC";
                    break;
                case "p_price2":
                    $order_by="ORDER BY p_price DESC";
                    break;
                case "num_star1":
                    $order_by="ORDER BY num_star DESC";
                    break;
                case "num_star2":
                    $order_by="ORDER BY num_star ASC";
                    break;
            }

            $limit=isset($_POST['limit'])?trim($_POST['limit']):"15";
            $limit="LIMIT ".$limit;

            $where="where status=1 and category_id=$category_id";

            $sql_select="SELECT product_id, p_name,p_old_price,p_price,num_star,p_description FROM product {$where} {$order_by} {$limit}";
            $tableProduct=mysql_query($sql_select);
            $listProduct=array();
            if (isset($_SESSION['customer'])){
                $customer=$_SESSION['customer'];
                if (mysql_num_rows($tableProduct)!=0){
                    while($row=mysql_fetch_assoc($tableProduct)){
                        $row['img_link_300']=$this->get_img_300($row['product_id']);
                        $row['p_name_remove_unicode']=remove_unicode($row['p_name']);
                        $row['isFavorite']=parent::checkFavorite($customer,$row['product_id']);
                        $listProduct[]=$row;
                    }
                }
            }
            else{
                if (mysql_num_rows($tableProduct)!=0){
                    while($row=mysql_fetch_assoc($tableProduct)){
                        $row['img_link_300']=$this->get_img_300($row['product_id']);
                        $row['p_name_remove_unicode']=remove_unicode($row['p_name']);
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
            //Search tên SP
            $search=isset($_POST['txt_search'])?trim($_POST['txt_search']):"";
            $where_search=" AND p_name like N'%".mysql_escape_string($search)."%'";
            $where="where status=1{$where_search}";

            //Kiểu hiển thị
            $display_type="product-layout product-grid col-lg-3 col-md-3 col-sm-6 col-xs-12";
            //Sắp xếp theo
            $order_by="ORDER BY is_hot_product DESC, p_price DESC";

            $limit=isset($_POST['limit'])?trim($_POST['limit']):15;
            $tableProduct=mysql_query("SELECT product_id, p_name,p_old_price,p_price,num_star,p_description FROM product {$where} {$order_by} LIMIT $limit");
            $listProduct=array();
            if (isset($_SESSION['customer'])){
                $customer=$_SESSION['customer'];
                if (mysql_num_rows($tableProduct)!=0){
                    while($row=mysql_fetch_assoc($tableProduct)){
                        $row['img_link_300']=$this->get_img_300($row['product_id']);
                        $row['p_name_remove_unicode']=remove_unicode($row['p_name']);
                        $row['isFavorite']=parent::checkFavorite($customer,$row['product_id']);
                        $listProduct[]=$row;
                    }
                }
            }
            else{
                if (mysql_num_rows($tableProduct)!=0){
                    while($row=mysql_fetch_assoc($tableProduct)){
                        $row['img_link_300']=$this->get_img_300($row['product_id']);
                        $row['p_name_remove_unicode']=remove_unicode($row['p_name']);
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
            //Search by category
            $where_category="";
            if (isset($_POST['category']) && $_POST['category']!=0)
                $where_category=" AND (category_id=".$_POST['category'].")";
            //Search by price from a to b
            $where_price="";
            if (isset($_POST['price_from']) && isset($_POST['price_to'])){
                $price_from=$_POST['price_from']*1000000;// Nhân 1 tr vì bên giao diện để đơn vị là triệu đồng
                $price_to=$_POST['price_to']*1000000;// Nhân 1 tr vì bên giao diện để đơn vị là triệu đồng
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
                        $row['p_name_remove_unicode']=remove_unicode($row['p_name']);
                        $row['isFavorite']=parent::checkFavorite($customer,$row['product_id']);
                        $listProduct[]=$row;
                    }
                }
            }
            else{
                if (mysql_num_rows($tableProduct)!=0){
                    while($row=mysql_fetch_assoc($tableProduct)){
                        $row['img_link_300']=$this->get_img_300($row['product_id']);
                        $row['p_name_remove_unicode']=remove_unicode($row['p_name']);
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


        public function do_vote(){
            $num_star=$_POST['num_star'];
            $product_id=$_POST['product_id'];
            $customer_id=$_SESSION['customer'];
            $status=$_POST['status'];//Nếu status=-1 (Chưa tồn tại đánh giá) thì cho câu lệnh sql là insert, ngược lại sql=update

            $isOk=0;
            $err="";
            if ($status==-1){
                $sql="INSERT INTO vote_product(customer_id,product_id,num_star) VALUES ($customer_id,$product_id,$num_star)";
            }
            else{
                $sql="UPDATE vote_product SET num_star=$num_star WHERE customer_id=$customer_id AND product_id=$product_id";
            }
            if (!mysql_query($sql)){
                $err="Không thể thêm đánh giá";
            }
            else{
                //Tính lại số sao trung bình cho sản phẩm
                $sum=0;
                $count=0;
                $sql_get_all_vote="SELECT num_star FROM vote_product WHERE product_id=$product_id";
                $table_vote=mysql_query($sql_get_all_vote);
                if (mysql_num_rows($table_vote)!=0){
                    while ($row=mysql_fetch_assoc($table_vote)){
                        $sum+=$row['num_star'];
                        $count++;
                    }
                }
                $avg=round($sum/$count);
                //update số sao mới vào bảng product
                $sql_update="UPDATE product SET num_star=$avg WHERE product_id=$product_id";
                if (!mysql_query($sql_update)){
                    $err="Lỗi cập nhật số sao trung bình";
                }
                else{
                    $isOk=1;
                }
            }
            $result=array("ok"=>$isOk,"err"=>$err);
            echo json_encode($result);
            exit();
        }
        public function ajax_star(){
            $product_id=$_POST['product_id'];
            $num_star_voted=$_POST['num_star_voted'];

            global $smarty;
            $smarty->assign("product_id",$product_id);
            $smarty->assign("num_star_voted",$num_star_voted);
            echo $smarty->fetch('ajax_star_after_vote.tpl');
            exit();
        }








//********************** Get info **************************************
        function get_product($product_id){
            $sql="SELECT p_name, p_price, manufacturer_id FROM product WHERE product_id=$product_id";
            $product=mysql_fetch_assoc(mysql_query($sql));
            $product['p_name_remove_unicode']=remove_unicode($product['p_name']);
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
        function get_num_star_voted($customer_id,$product_id){
            $sql="SELECT num_star FROM vote_product WHERE customer_id=$customer_id AND product_id=$product_id";
            if (mysql_num_rows(mysql_query($sql))==0)
                return -1;
            $num_star_arr=mysql_fetch_assoc(mysql_query($sql));
            $num_star=$num_star_arr['num_star']+0;
            return $num_star;
        }
        function check_order_for_vote($product_id){//Check trong bảng order, đã mua hàng thì mới được vote
            if (!isset($_SESSION['customer'])){
                return 0;//Chưa đăng nhập => ko đc vote
            }
            $customer_id=$_SESSION['customer'];
            $sql_check="SELECT * FROM tbl_order INNER JOIN order_detail ON tbl_order.order_id=order_detail.order_id WHERE customer_id=$customer_id AND product_id=$product_id";
            if (mysql_num_rows(mysql_query($sql_check))==0){
                return 0;
            }
            return 1;
        }
    }
?>