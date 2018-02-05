<?php
    class Cart extends class_get_info {
        public function view(){
            global $smarty;
            $smarty->assign('total',parent::get_total());
            return $smarty->fetch('gio-hang.tpl');
        }
        public function pay(){
            global $smarty;
            $smarty->assign('total',parent::get_total());
            return $smarty->fetch('thanhToan.tpl');
        }




        public function ajax_cart_in_pay(){
            global $smarty;
            $product_id=$_POST['id'];
            $number=$_POST['number'];
            $_SESSION["cart"]["$product_id"]["number"]=$number;
            $temp=$smarty->fetch("ajax_cart_in_pay.tpl");
            echo $temp;
            exit();
        }
        public function ajax_amount(){
            global $smarty;
            $smarty->assign('total',parent::get_total());
            echo $smarty->fetch('ajax_amount_in_pay.tpl');
            exit();
        }
        public function ajax_cart(){
            global $smarty;
            echo $smarty->fetch('ajax_cart.tpl');
            exit();
        }
        public function update_number(){
            $product_id=trim($_POST['id'])+0;
            $number=trim($_POST['number'])+0;
            $_SESSION["cart"]["$product_id"]["number"]=$number;
            $total=number_format(($this->get_total())*11/10);
            $total.=" VNĐ";
            $result=array("total"=>$total,"num_cart"=>parent::get_num_cart());
            echo json_encode($result);
            exit();
        }
    }
?>