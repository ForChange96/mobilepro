<?php
    class Product{
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
                $_SESSION['cart'][$product_id]['img_link_300']=$this->get_img_100($product_id);
                $_SESSION['cart'][$product_id]['number']=1;
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

        public function reload_cart(){
            global $smarty;
            $smarty->assign('total',$this->get_total());
            $smarty->assign('num_cart',$this->get_num_cart());
            $result=$smarty->fetch('cart_in_home.tpl');
            return $result;
        }



        function get_product($product_id){
            $sql="SELECT p_name, p_price FROM product WHERE product_id=$product_id";
            $product=mysql_fetch_assoc(mysql_query($sql));
            return $product;
        }
        function get_img_100($product_id){
            $sql="SELECT img_link_300 FROM images WHERE product_id=$product_id";
            $img_100=mysql_fetch_assoc(mysql_query($sql));
            return $img_100['img_link_300'];
        }

    }
?>