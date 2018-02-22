<?php
Class Customer{
    public function view(){
        Config::$page_title="Tài khoản khách hàng";
        global $smarty;

        $search=trim($_REQUEST['search']);
        if(isset($_POST['btnsearch'])){
            header("location:?mod=customer&act=view&search={$search}");
        }

        $where="";
        if ($search){
            $where.="where email LIKE '%".mysqli_escape_string($search)."%' OR fullname LIKE '%".mysqli_escape_string($search)."%' OR username like '%".mysqli_escape_string($search)."%'";
        }
        if(isset($_GET['customer_id'])){
            $where.="where customer_id=".trim($_GET['customer_id']);
        }

        $p=new Pager();

        $limit=5;
        $start=$p->findStart($limit);
        $count=Database::con()->num_rows(Database::con()->query("select * from customer {$where}"));
        $pages=$p->findPages($count,$limit);

        $result=Database::con()->query("select * from customer {$where} limit $start,$limit");
        $countpage=Database::con()->num_rows($result);
        $countrows=$count;
        $pagels=PagingUtils::showpage($_GET['page'],"?mod=customer&act=view",$pages,3);
        $customer=array();

        if(Database::con()->num_rows($result)<>0){
            while ($row=Database::con()->fetch_assoc($result)){
                $customer[]=$row;
            }
        }


        $smarty->assign('countrows',$countrows);
        $smarty->assign('countpage',$countpage);
        $smarty->assign('pagels',$pagels);
        $smarty->assign('customer',$customer);
        $smarty->assign('txt_search',$search);
        $temp = $smarty->fetch('customer_list.tpl');
        return $temp;
    }

    public function add () {
        Config::$page_title = "Thêm khách hàng";
        global $smarty;
        $temp = $smarty ->fetch('customer_add.tpl');
        return $temp;
    }

    /**
     * edit customer
     */
    public function edit () {
        Config::$page_title = "Sửa khách hàng";
        global $smarty;
        $id = $_GET['id'];
        $sql = Database::con()->query("SELECT * FROM customer WHERE customer_id=$id LIMIT 1");
        $aryCustomer = Database::con()->fetch_assoc($sql);
        $smarty -> assign('aryCustomer', $aryCustomer);
        $temp = $smarty -> fetch('customer_edit.tpl');
        return $temp;
    }

    /**
     * delete Customer
     */
    public function delete (){
        $id = $_GET['id'];
        $sql = "DELETE FROM customer WHERE customer_id = $id";
        if (!($result = Database::con()->query($sql))) {
            $error = "Lỗi cơ sở dữ liệu";
        }
        else{
            header("location:?mod=customer&act=view");
        }
    }

    /*****End php*****/



    /********Dung ajax*********/
    /**
     * Add new Customer using Jquery
     */
    public function addcustomer () {
        $username = trim($_POST['username']);
        $password = trim(md5($_POST['password']));
        $email = trim($_POST['email']);
        $fullname = trim(stripslashes($_POST['fullname']));
        $address = trim($_POST['address']);
        $phone = (double)$_POST['phone'];
        $error_customer=$this->_validateCustomer($_POST);
        $isOK = 0;
        $error = "";
        if(count($error_customer)==0){
            $sql = "INSERT INTO customer (username, password, email, fullname, address, phone_number,status) VALUES('$username', '$password','$email','$fullname','$address', $phone,1)";
            if (!($result = Database::con()->query($sql))) {
                $error    = "Lỗi cơ sở dữ liệu";
            }
            else{
                $isOK = 1;
            }
        }
        else{
            $error = join("<br/>",$error_customer);
        }
        $result = array("ok" => $isOK, "error"=>$error);
        echo json_encode($result);
        exit();
    }

    /**
     * Edit Customer using Jquery
     */
    public function editcustomer(){
        $id = $_POST['id'];
        $username = trim($_POST['username']);
        $password = trim(md5($_POST['password']));
        $email = trim($_POST['email']);
        $fullname = trim(stripslashes($_POST['fullname']));
        $address = trim($_POST['address']);
        $phone = (double)$_POST['phone'];
        $error_customer=$this->_validateEditcustomer($_POST,$id);
        $isOk = 0;
        $error = '';
        if(count($error_customer)==0){
            $sql = "UPDATE customer SET username = '$username', password = '$password', fullname = '$fullname', email = '$email', phone_number = $phone, address='$address' WHERE customer_id = $id";
            if (!($result = Database::con()->query($sql))) {
                $error = "Lỗi cơ sở dữ liệu";
            }
            else{
                $isOk = 1;
            }
        }
        else{
            $error = join("<br/>",$error_customer);
        }
        $result = array("ok"=> $isOk, "error"=>$error);
        echo json_encode($result);
        exit();
    }

    /**
     * delete Customer Jquery
     */
    public function deletecustomer () {
        $id = $_POST['id'];
        $isOk = 0;
        $error = "";
        $sql = "DELETE FROM customer WHERE customer_id = $id";
        if (!($result = Database::con()->query($sql))) {
            $error = "Lỗi cơ sở dữ liệu";
        }
        else{
            $isOk = 1;
        }
        $result = array('ok'=>$isOk, 'error'=>$error);
        echo json_encode($result);
        exit();
    }

    private function _validateCustomer($input){
        $error = array();
        $sql = Database::con()->query("SELECT customer_id FROM customer WHERE username = '{$input['username']}'");
        $resultem = Database::con()->query("SELECT customer_id FROM customer WHERE email = '{$input['email']}'");
        if(empty($input['username'])){
            $error[] = "Chưa nhập tài khoản";
        }
        elseif(Database::con()->num_rows($sql)>0){
            $error[] = "Tên đăng nhập đã có người sử dụng";
        }
        elseif(Validation::checkLogin($input['username'])==false){
            $error[] = "Tên đăng nhập không hợp lệ";
        }
        if(empty($input['password'])){
            $error[] = "Chưa nhập mật khẩu";
        }
        if(empty($input['fullname'])){
            $error[] = "Chưa nhập họ tên";
        }
        if(empty($input['email'])){
            $error[] = "Chưa nhập email";
        }
        else if(Validation::checkMail($input['email'])=='false'){
            $error[] = "Email không đúng định dạng";
        }
        else if(Database::con()->num_rows($resultem)>0){
            $error[] = "Email đã có người sử dụng!";
        }
        if(empty($input['phone'])){
            $error[] = "Chưa nhập Số điện thoại";
        }
        elseif(!is_numeric($input['phone'])){
            $error[] = "Số điện thoại phải là dạng số";
        }
        return $error;
    }

    private function _validateEditcustomer($input,$id){
        $error = array();
        $sql = Database::con()->query("SELECT customer_id FROM customer WHERE email = '{$input['email']}' AND customer_id <>{$id}");

        if(empty($input['fullname'])){
            $error[] = "Chưa nhập họ tên";
        }
        if(empty($input['email'])){
            $error[] = "Chưa nhập email";
        }
        else if(Validation::checkMail($input['email'])=='false'){
            $error[] = "Email không đúng định dạng";
        }
        else if(Database::con()->num_rows($sql)>0){
            $error[] = "Email đã có người sử dụng!";
        }
        if(empty($input['phone'])){
            $error[] = "Chưa nhập Số điện thoại";
        }
        elseif(!is_numeric($input['phone'])){
            $error[] = "Số điện thoại phải là dạng số";
        }
        return $error;
    }

}
?>