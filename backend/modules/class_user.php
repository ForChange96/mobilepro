<?php
/*
 * Quản lý thông tin user
 * View, thêm, sửa, xoá, đăng nhập
 **/
class User{
    public  function login(){
        Config::$page_title = "Đăng nhập";
        global $smarty;

        if(isset($_POST['btnLogin']) && $_POST['btnLogin']=="Đăng nhập"){
            $username=$_POST['username'];
            $password=$_POST['password'];
            if($username=='' || $password==''){
                $err="Không được để trống";
            }
            else{
                $sql="select * from user where username='".mysql_escape_string($username)."'";
                if(!$result=mysql_query($sql)){
                    $err="Lỗi cơ sở dữ liệu";
                }
                else{
                    if(mysql_num_rows($result)==0){
                        $err="Đăng nhập không thành công";
                    }
                    else{
                        $row=mysql_fetch_array($result);
                        if($row['password']!=md5($password)){
                            $err="Đăng nhập không thành công";
                        }
                    }
                }
            }
            if(!$err && $row){
                $_SESSION['user']=$row;
                //echo "<script>alert('".$row['fullname']."')</script>";
                header("location:?mod=user&act=view");
            }
        }

        $smarty->assign('error',$err);
        $temp=$smarty->fetch('user_login.tpl');
        return $temp;
    }

    public function view(){
        Config::$page_title="Danh sách thành viên";
        global $smarty;

        $search=trim($_REQUEST['search']);
        if($search){
            $where="where username like '%".mysql_escape_string($search)."%' or fullname like '%".mysql_escape_string($search)."%'";
        }

        $p=new Pager;
        $limit=5;
        $start=$p->findStart($limit);
        $count=mysql_num_rows(mysql_query("select * from user {$where}"));
        $pages=$p->findPages($count,$limit);
        $result=mysql_query("select * from user {$where} limit $start,$limit");
        $user=array();
        if(isset($_POST["btnsearch"])){
            header("location:?mod=user&act=view&search={$search}");
        }
        if(mysql_num_rows($result)<>0){
            while($row=mysql_fetch_array($result)){
                $user[]=$row;
            }
        }
        $totalResult=$count;
        $numRowsDisplay=mysql_num_rows($result);
        $pagels=PagingUtils::showpage($_GET['page'],"?mod=user&act=view",$pages,5);

        $smarty->assign('totalResult',$totalResult);
        $smarty->assign('numRowsDisplay',$numRowsDisplay);
        $smarty->assign('pagels',$pagels);
        $smarty->assign('user',$user);
        $smarty->assign('txt_search',$search);
        $temp = $smarty->fetch('user_list.tpl');
        return $temp;
    }

    public function add () {
        Config::$page_title = "Thêm thành viên";
        global $smarty;
        $temp = $smarty ->fetch('user_add.tpl');
        return $temp;
    }

    public function edit () {
        Config::$page_title = "Sửa thành viên";
        global $smarty;
        $id = $_GET['id'];
        if(isset($_POST['Update']) && $_POST['Update'] == 'Sửa'){
            $username = trim($_POST['username']);
            $password = trim(md5($_POST['password']));
            $fullname = trim($_POST['fullname']);
            $error_user=$this->_validateEdituser($_POST,$id);
            if(count($error_user)==0){
                $sql = mysql_query("UPDATE user SET username = '$username', password = '$password', fullname = '$fullname' WHERE user_id = $id");

                if (!($query = $sql)) {
                    $error = "Lỗi cơ sở dữ liệu";
                }
                else{
                    header("location:?mod=user&act=view");
                }
            }
            else{
                $error = join("<br/>",$error_user);
            }
        }
        $sql = mysql_query("SELECT * FROM user WHERE user_id=$id LIMIT 1");
        $aryUser = mysql_fetch_assoc($sql);
        $aryUser['userId'] = $id;

        $smarty -> assign('aryUser', $aryUser);
        $smarty -> assign('error', $error);
        $temp = $smarty -> fetch('user_edit.tpl');
        return $temp;
    }

    /**
     * delete User
     */
    public function delete (){
        $id = $_GET['id'];
        $sql = "DELETE FROM tbl_user WHERE user_id = $id";
        if (!($result = mysql_query($sql))) {
            $error = "Lỗi cơ sở dữ liệu";
        }
        else{
            header("location:?mod=user&act=view");
        }
    }

    public function _validateUser($input){
        $error = array();
        $sql = mysql_query("SELECT user_id FROM user WHERE username = '{$input['username']}'");
        if(empty($input['username'])){
            $error[] = "Chưa nhập tài khoản";
        }
        elseif(mysql_num_rows($sql)>0){
            $error[] = "Đã có tên đăng nhập trên";
        }
        elseif(Validation::checkLogin($input['username'])==false){
            $error[] = "Username không hợp lệ";
        }
        if(empty($input['password'])){
            $error[] = "Chưa nhập mật khẩu";
        }
        if(empty($input['fullname'])){
            $error[] = "Chưa nhập họ tên";
        }
        return $error;
    }
    public function adduser () {
        $username = trim($_POST['username']);
        $password = md5(trim($_POST['password']));
        $fullname = trim($_POST['fullname']);
        $error_user=$this->_validateUser($_POST);
        $isOK = 0;
        $error = "";
        if(count($error_user)==0){
            $sql = "INSERT INTO user(username, password, fullname) VALUES('$username', '$password','$fullname')";
            if (!($result = mysql_query($sql))) {
                $error    = "Lỗi cơ sở dữ liệu";
            }
            else{
                $isOK = 1;
            }
        }
        else{
            $error = join("<br/>",$error_user);
        }
        $result = array("ok" => $isOK, "error"=>$error);
        echo json_encode($result);
        exit();
    }
    public function edituser(){
        $id = $_POST['id'];
        $username = trim($_POST['username']);
        $password = trim(md5($_POST['password']));
        $fullname = trim(stripslashes($_POST['fullname']));
        $error_user=$this->_validateEdituser($_POST,$id);
        $isOk = 0;
        $error = '';
        if(count($error_user)==0){
            $sql = "UPDATE user SET username = '$username', password = '$password', fullname = '$fullname' WHERE user_id = $id";
            if (!($result = mysql_query($sql))) {
                $error = "Lỗi cơ sở dữ liệu";
            }
            else{
                $isOk = 1;
            }
        }
        else{
            $error = join("<br/>",$error_user);
        }
        $result = array('ok'=> $isOk, 'error'=>$error);
        echo json_encode($result);
        exit();
    }

    /**
     * delete User Jquery
     */
    public function deleteuser () {
        $id = trim($_POST['id']);
        $isOk = 0;
        $error = "";
        $sql = "DELETE FROM user WHERE user_id = $id";
        if (!($result = mysql_query($sql))) {
            $error = "Lỗi cơ sở dữ liệu";
        }
        else{
            $isOk = 1;
        }
        $result = array('ok'=>$isOk, 'error'=>$error);
        echo json_encode($result);
        exit();
    }


    /**
     * Thoát User
     */
    public function logout(){

        unset($_SESSION['user']);
        header('location:?mod=user&act=login');
    }
    private function _validateEdituser($input,$id){
        $error = array();

        if(empty($input['fullname'])){
            $error[] = "Chưa nhập họ tên";
        }

        return $error;
    }
}
?>