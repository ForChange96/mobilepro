<?php
class Home{
    public function view(){
        global $smarty;
        $where="where status=1 and is_hot_product=1";
        $limit=8;
        $tableProduct=mysql_query("SELECT product_id, p_name,p_old_price,p_price,num_star FROM product {$where} LIMIT $limit");
        $listProduct=array();
        if (mysql_num_rows($tableProduct)!=0){
            while($row=mysql_fetch_assoc($tableProduct)){
                $row['img_link_350']=$this->getImg($row['product_id']);
                $listProduct[]=$row;
            }
        }

        $list_favorite=array();
        $num_favorite=0;
        if(isset($_SESSION['customer_id'])){
            $customer_id = $_SESSION['customer_id'];
            $sql="select * from favorite WHERE customer_id=$customer_id";
            $tableFavorite=mysql_query($sql);
            $num_favorite=mysql_num_rows($tableFavorite);
            if ($num_favorite!=0){
                while ($row=mysql_fetch_assoc($tableFavorite)){
                    $list_favorite[]=$row;
                }
            }
        }

        $num_cart=0;
        if (isset($_SESSION['cart'])){
            $num_cart=count($num_cart);
        }

        $smarty->assign('listProduct',$listProduct);
        $smarty->assign('num_favorite',$num_favorite);
        $smarty->assign('listFavorite',$list_favorite);
        $smarty->assign('num_cart',$num_cart);
        $temp=$smarty->fetch('home.tpl');
        return $temp;
    }

    function getImg($product_id){
        $sql="select img_link_350 from images WHERE product_id=$product_id";
        $tableImages=mysql_query($sql);
        $img_link_350=mysql_fetch_assoc($tableImages);
        return $img_link_350['img_link_350'];
    }
}
?>