<?php
/*Class database thực hiện các thao tác liên quan đến CSDL*/
Class Database{
    public function connect(){
        $connect=mysqli_connect(Config::$db['host'],Config::$db['name'],Config::$db['pass']);
        if(@!mysqli_connect(Config::$db['host'],Config::$db['name'],Config::$db['pass'])){
            exit("Không kết nối được với cơ sở dữ liệu");
        }
        if(@!mysqli_select_db(Config::$db['dbname'])){
            exit("Không tồn tại CSDL: ".Config::$db['dbname']);
        }
        mysqli_set_charset($connect, 'UTF8');
        Database::con()->query("SET NAMES utf8");
    }

    static function con() {
        $connect=mysqli_connect(Config::$db['host'],Config::$db['name'],Config::$db['pass']);
        return $connect;
    }
}
?>