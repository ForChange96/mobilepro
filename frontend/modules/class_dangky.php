<?php
    Class Dangky extends Validation{
        public function view(){
            global $smarty;
            $temp=$smarty->fetch("dang-ky.tpl");
            return $temp;
        }
        function check_email(){
            $email=trim($_POST['email']);
            $isOk=0;
            $sql="SELECT * FROM customer WHERE email='$email'";
            if (mysql_num_rows(mysql_query($sql))==0){
                $isOk=1;
            }
            if (parent::checkMail($email)==false){
                $isOk=2;
            }
            $result=array("ok"=>$isOk);
            echo json_encode($result);
            exit();
        }
        function check_username(){
            $username=trim($_POST['username']);
            $isOk=0;
            $sql="SELECT * FROM customer WHERE username='$username'";
            if (mysql_num_rows(mysql_query($sql))==0){
                $isOk=1;
            }
            $result=array("ok"=>$isOk);
            echo json_encode($result);
            exit();
        }

        function signup(){
            $username=trim($_POST['username']);
            $email=trim($_POST['email']);
            $password=trim($_POST['password']);
            $fullname=trim($_POST['fullname']);
            $address=trim($_POST['address']);
            $phone_number=trim($_POST['telephone']);
            $confirm=trim($_POST['confirm']);

            if ($username==""||$email==""||$password==""||$fullname==""||$phone_number==""){
                $isOk=3;
            }
            elseif ($password!=$confirm){
                $isOk=2;//Thông báo mật khẩu xác nhận ko khớp
            }
            else{
                $isOk=0;
                $password=md5($password);
                //INSERT TO DATABASE
                $sql_insert="INSERT INTO customer(username,password,email,fullname,address,phone_number) VALUES ('$username','$password','$email','$fullname','$address','$phone_number')";
                if(mysql_query($sql_insert)){
                    $isOk=1;
                }
            }
            $result=array("ok"=>$isOk);
            echo json_encode($result);
            exit();
        }

        function edit_customer(){
            global $smarty;
            $customer_id=$_SESSION['customer'];
            $sql_get_customer="SELECT * FROM customer WHERE customer_id=$customer_id";
            $customer=mysql_fetch_assoc(mysql_query($sql_get_customer));
            $smarty->assign('customer',$customer);
            return $smarty->fetch('edit_customer.tpl');
        }
        function do_edit(){
            $customer_id=$_SESSION['customer'];
            $fullname=trim($_POST['fullname']);
            $address=trim($_POST['address']);
            $phone_number=trim($_POST['telephone']);

            $sql_update="";
            if (isset($_POST['cb_change_password'])){
                $old_password=md5(trim($_POST['old_password']));
                $password=md5(trim($_POST['password']));
                $confirm=md5(trim($_POST['confirm']));

                $sql_check_pass="SELECT customer_id FROM customer WHERE customer_id=$customer_id AND password='$old_password'";
                if (mysql_num_rows(mysql_query($sql_check_pass))==0){
                    $isOk=2;//error password
                }
                else{
                    if ($password!=$confirm){
                        $isOk=3;//error password_confirm
                    }
                    else{
                        $isOk=1;
                        $sql_update="UPDATE customer SET fullname='$fullname',address='$address',phone_number='$phone_number',password='$password' WHERE customer_id=$customer_id";
                    }
                }
            }
            else{
                $isOk=1;
                $sql_update="UPDATE customer SET fullname='$fullname',address='$address',phone_number='$phone_number' WHERE customer_id=$customer_id";
            }

            if ($sql_update!=""){
                if (!mysql_query($sql_update)){
                    $isOk=0;//error sql command
                }
            }

            $result=array("ok"=>$isOk);
            echo json_encode($result);
            exit();
        }
        function check_old_pass(){
            $customer_id=$_POST['id'];
            $old_pass=md5(trim($_POST['old_pass']));

            $sql_check="SELECT customer_id FROM customer WHERE customer_id=$customer_id AND password='$old_pass'";
            $check=mysql_num_rows(mysql_query($sql_check));

            $isOk=0;
            if($check==1){
                $isOk=1;
            }

            $result=array("ok"=>$isOk);
            echo json_encode($result);
            exit();
        }
        function confirm_account(){
            $customer_id_md5=trim($_GET['id']);

            $sql="update customer set status=1 where md5(customer_id)=$customer_id_md5";
        }
    }

    /**
     * 1. Viết function js saveItem. Và xử lý logic: Dùng cookie để lưu biến id sản phẩm [product_id_saved]
     * 2. Call function js bật form login lên
     * 3. Ở php check login thành công thì get cookie biến [product_id_saved] và lưu vào bảng favorite theo user login và [product_id_saved] lấy được
     * 4. Xoá biến cookie [product_id_saved]
     */
?>