<?php
    Class class_get_info{

        public function listFavorite(){
            $list_favorite=array();
            if(isset($_SESSION['customer'])){
                $customer_id = $_SESSION['customer'];
                $sql="select product_id from favorite WHERE customer_id=$customer_id";
                $tableFavorite=mysql_query($sql);
                $num_favorite=mysql_num_rows($tableFavorite);
                if ($num_favorite!=0){
                    while ($row=mysql_fetch_assoc($tableFavorite)){
                        $list_favorite[]=$this->get_product_for_favorite($row['product_id']);
                    }
                }
            }
            return $list_favorite;
        }
        function get_product_for_favorite($product_id){
            $sql="select product_id, p_name, p_price from product WHERE product_id=$product_id";
            $product=mysql_fetch_assoc(mysql_query($sql));
            //Lấy ảnh trong bảng images (Chỉ lấy 1 ảnh)
            $sql_get_img="select img_link_300 from images WHERE product_id=$product_id";
            $img=mysql_fetch_assoc(mysql_query($sql_get_img));
            $img_link_300=$img['img_link_300'];
            //Add ảnh vào array product
            $product['img_link_300']=$img_link_300;
            return $product;

        }


        public function get_num_cart(){
            $num_cart=0;
            if (isset($_SESSION['cart'])){
                foreach($_SESSION['cart'] as $product){
                    $num_cart+=$product['number'];
                }
            }
            return $num_cart;
        }

        public function get_total(){
            $total=0;
            if (isset($_SESSION['cart'])){
                foreach($_SESSION['cart'] as $product){
                    $total+=$product['p_price']*$product['number'];
                }
            }
            return $total;
        }

        public function get_contact(){
            $sql_get_contact="SELECT * FROM contact";
            $contact=mysql_fetch_assoc(mysql_query($sql_get_contact));
            return $contact;
        }

        public function get_category(){
            $sql_get_category="SELECT category_id, category_name FROM category ORDER BY category_id DESC";
            $table_category=mysql_query($sql_get_category);
            $list_category=array();
            if(mysql_num_rows($table_category)!=0){
                while($row=mysql_fetch_assoc($table_category)){
                    $list_category[]=$row;
                }
            }
            return $list_category;
        }

        public function checkFavorite($customer_id,$product_id){
            $sql="select * from favorite where customer_id=$customer_id AND product_id=$product_id";
            if (mysql_num_rows(mysql_query($sql))!=0)
                return 1;
            return 0;
        }

        public function get_product_name(){
            if ($_GET['act']=="detail" && isset($_GET['id'])){
                $id=trim($_GET['id']);
                $sql="select p_name from product WHERE product_id=$id";
                $product=mysql_fetch_assoc(mysql_query($sql));
                return $product['p_name'];
            }
            return "";
        }

        function get_customer_name($customer_id){
            $sql="select fullname from customer where customer_id=$customer_id";
            $customer=mysql_fetch_assoc(mysql_query($sql));
            return $customer['fullname'];
        }

        function get_customer_online(){
            if (isset($_SESSION['customer'])){
                $customer_id=$_SESSION['customer'];
                $sql="select fullname,email,address,phone_number from customer where customer_id=$customer_id";
                $customer=mysql_fetch_assoc(mysql_query($sql));
                return $customer;
            }
            return false;
        }

        function get_login_FB_URL(){
            include_once "fbLogin/config.php";
            $redirectURL = "http://localhost:81/mobilepro/frontend/includes/fbLogin/fb-callback.php";
            $permissions = ["email"];
            $loginURL = $helper->getLoginUrl($redirectURL,$permissions);
            return $loginURL;
        }
    }
?>