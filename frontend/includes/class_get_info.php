<?php
    Class class_get_info{

        public function listFavorite(){
            $list_favorite=array();
            if(isset($_SESSION['customer'])){
                $customer_id = $_SESSION['customer'];
                $sql="select * from favorite WHERE customer_id=$customer_id";
                $tableFavorite=mysql_query($sql);
                $num_favorite=mysql_num_rows($tableFavorite);
                if ($num_favorite!=0){
                    while ($row=mysql_fetch_assoc($tableFavorite)){
                        $list_favorite[]=$row;
                    }
                }
            }
            return $list_favorite;
        }


        public function get_num_cart(){
            $num_cart=0;
            if (isset($_SESSION['cart'])){
                $num_cart=count($_SESSION['cart']);
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
            $sql_get_category="SELECT category_id, category_name FROM category";
            $table_category=mysql_query($sql_get_category);
            $list_category=array();
            if(mysql_num_rows($table_category)!=0){
                while($row=mysql_fetch_assoc($table_category)){
                    $list_category[]=$row;
                }
            }
            return $list_category;
        }
    }
?>