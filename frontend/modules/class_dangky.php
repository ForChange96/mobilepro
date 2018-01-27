<?php
    Class Dangky extends Validation{
        public function view(){
            global $smarty;
            $temp=$smarty->fetch("dang-ky.tpl");
            return $temp;
        }
        public function check_email(){
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
        public function check_username(){
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

        public function signup(){
            $username=trim($_POST['username']);
            $email=trim($_POST['email']);
            $password=trim(md5($_POST['password']));
            $fullname=trim($_POST['fullname']);
            $address=trim($_POST['address']);
            $phone_number=trim($_POST['telephone']);
            $confirm=trim($_POST['confirm']);

            if ($password!=$confirm){
                $isOk=2;//Thông báo mật khẩu xác nhận ko khớp
            }
            else{
                $isOk=0;
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
    }

    /**
     * 1. Viết function js saveItem. Và xử lý logic: Dùng cookie để lưu biến id sản phẩm [product_id_saved]
     * 2. Call function js bật form login lên
     * 3. Ở php check login thành công thì get cookie biến [product_id_saved] và lưu vào bảng favorite theo user login và [product_id_saved] lấy được
     * 4. Xoá biến cookie [product_id_saved]
     */
?>