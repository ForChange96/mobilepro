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
        public function confirm_order(){
            $recipients=trim($_POST['ship_fullname']);
            $shipping_address=trim($_POST['ship_address']);
            $phone_number=trim($_POST['ship_telephone']);
            $isOk=0;
            $err="";
            if ($recipients==""){
                $err="ship_fullname";
            }
            elseif ($shipping_address==""){
                $err="ship_address";
            }
            elseif ($phone_number==""){
                $err="ship_telephone";
            }
            else{
                $customer_id=$_SESSION['customer'];
                $o_total=parent::get_total();
                $o_total*=11/10;//Cộng thêm 10% thuế => phải x 110%

                $sql_set_order="INSERT INTO tbl_order(customer_id,o_total,recipients,phone_number,shipping_address) VALUES ($customer_id,$o_total,'$recipients','$phone_number','$shipping_address')";
                if (mysql_query($sql_set_order)){
                    $isOk=1;

                    //Lấy id của đơn hàng vừa tạo (để insert vào bảng order_detail)
                    $last_insert_id=mysql_fetch_assoc(mysql_query("SELECT LAST_INSERT_ID() as last_id"));
                    $last_insert_id=$last_insert_id['last_id'];

                    //Ghép chuỗi để insert nhiều bản ghi 1 lúc
                    $strData="";
                    foreach ($_SESSION['cart'] as $product_id=>$product){
                        $strData.="($last_insert_id,$product_id,{$product['p_price']},{$product['number']}),";
                    }
                    $strData=substr($strData,0,-1);//Xoá dấu phẩy cuối
                    $err=$strData;
                    //************ Hoàn thành ghép chuỗi ***************

                    $sql_set_order_detail="INSERT INTO order_detail(order_id,product_id,price,order_detail.number) VALUES {$strData}";
                    if (mysql_query($sql_set_order_detail)){
                        $isOk=2;
                        unset($_SESSION['cart']);
                        //$this->send_mail_order();
                    }
                }
            }
            $result=array("ok"=>$isOk,"error"=>$err);
            echo json_encode($result);
            exit();
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
        public function ajax_cart(){//List SP trên trang giỏ hàng
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
        public function use_my_information(){
            $customer_id=$_SESSION['customer'];
            $sql="select fullname, address, phone_number from customer where customer_id=$customer_id";
            $customer=mysql_fetch_assoc(mysql_query($sql));
            echo json_encode($customer);
            exit();
        }
        function send_mail_order(){
            global $smarty;
            $customer_online=parent::get_customer_online();
            $smarty->assign('customer',$customer_online);
            $temp=$smarty->fetch('email_order.tpl');

            $from    = "transon996@gmail.com";
            $to      = $customer_online['email'];
            $subject = 'Đơn hàng đang giao';
            $message = $temp;

            $headers[] = "MIME-Version: 1.0";
            $headers[] = "Content-type: text/html; charset='UTF-8'";
            $headers[] = "From: $from";
            $headers[] = "Reply-To: $from";
            $headers[] = "X-Mailer: PHP/" . phpversion();

            mail($to, $subject, $message, implode("\r\n", $headers));
        }
    }
?>