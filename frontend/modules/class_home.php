<?php
class Home extends class_get_info {
    public function view(){
        global $smarty;
        $where="where status=1 and is_hot_product=1";
        $limit=8;
        $order_by="ORDER BY p_price DESC";
        $sql="SELECT product_id, p_name,p_old_price,p_price,num_star FROM product {$where} {$order_by} LIMIT $limit";
        $tableProduct=mysql_query($sql);
        $listProduct=array();
        if (isset($_SESSION['customer'])){
            $customer=$_SESSION['customer'];
            if (mysql_num_rows($tableProduct)!=0){
                while($row=mysql_fetch_assoc($tableProduct)){
                    $row['img_link_350']=$this->getImg($row['product_id']);
                    $row['isFavorite']=parent::checkFavorite($customer,$row['product_id']);
                    $row['p_name_remove_unicode']=remove_unicode($row['p_name']);
                    $listProduct[]=$row;
                }
            }
        }
        else{
            if (mysql_num_rows($tableProduct)!=0){
                while($row=mysql_fetch_assoc($tableProduct)){
                    $row['img_link_350']=$this->getImg($row['product_id']);
                    $row['p_name_remove_unicode']=remove_unicode($row['p_name']);
                    $listProduct[]=$row;
                }
            }
        }

        $smarty->assign('listProduct',$listProduct);
        $temp=$smarty->fetch('home.tpl');


        return $temp;
    }


    function getImg($product_id){
        $sql="select img_link_350 from images WHERE product_id=$product_id";
        $tableImages=mysql_query($sql);
        $img_link_350=mysql_fetch_assoc($tableImages);
        return $img_link_350['img_link_350'];
    }

    public function login(){
        $username=mysql_escape_string($_POST['username']);
        $password=md5(mysql_escape_string($_POST['password']));

        $isOk=0;
        $sql="SELECT * FROM customer WHERE (username='$username' AND password='$password' AND status=1) OR (email='$username' AND password='$password' AND status=1)";
        if (mysql_num_rows(mysql_query($sql))>0){
            //Lấy customer_id để add vào SESSION
            $sql_get_customer="select customer_id from customer WHERE username='$username' OR email='$username'";
            $customer=mysql_fetch_assoc(mysql_query($sql_get_customer));
            $_SESSION['customer']=$customer['customer_id'];
            //************************************
            $isOk=1;
        }
        $result=array("ok"=>$isOk);
        echo json_encode($result);
        exit();
    }
    public function login_fb(){
        $name=$_SESSION['user_fb']['name'];
        $email=$_SESSION['user_fb']['email'];
        $sql_check="SELECT * FROM customer WHERE email='$email'";
        if (mysql_num_rows(mysql_query($sql_check))==0){//Tài khoản chưa sẵn có => Đăng ký
            $sql_insert="INSERT INTO customer(username,email,fullname,status) VALUES ('$email','$email','$name',1)";
            mysql_query($sql_insert);

            //Tạo session để nhắc nhở cập nhật địa chỉ vs SĐT
            $_SESSION['prompt']=1;
            //Lấy customer_id để add vào $_SESSION['customer']
            $sql_get_customer_id="SELECT customer_id FROM customer WHERE email='$email'";
            $customer_id_arr=mysql_fetch_assoc(mysql_query($sql_get_customer_id));
            $customer_id=$customer_id_arr['customer_id'];

            $_SESSION['customer']=$customer_id;
            unset($_SESSION['user_fb']);
            header("location: trang-chu");
        }
        else{
            $sql_get_customer_id="SELECT customer_id FROM customer WHERE email='$email'";
            $customer_id_arr=mysql_fetch_assoc(mysql_query($sql_get_customer_id));
            $customer_id=$customer_id_arr['customer_id'];

            $_SESSION['customer']=$customer_id;
            unset($_SESSION['user_fb']);
            header("location: trang-chu");
        }
        exit();
    }
    function unset_prompt(){//$_SESSION['prompt'] là biến để nhắc nhở cập nhật địa chỉ & SĐT
        unset($_SESSION['prompt']);
        exit();
    }
    public function logout(){
        unset($_SESSION['customer']);
        header("location:trang-chu");
    }
}
?>