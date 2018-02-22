<?php
/*Class database thực hiện các thao tác liên quan đến CSDL*/
Class Database{
    public function connect(){
        $connect=mysql_connect(Config::$db['host'],Config::$db['name'],Config::$db['pass']);
        if(@!mysql_connect(Config::$db['host'],Config::$db['name'],Config::$db['pass'])){
            exit("Không kết nối được với cơ sở dữ liệu");
        }
        if(@!mysql_select_db(Config::$db['dbname'])){
            exit("Không tồn tại CSDL: ".Config::$db['dbname']);
        }
        mysql_set_charset('UTF8');
        mysql_query("SET NAMES utf8");
    }

    static function con() {
        $connect=mysql_connect(Config::$db['host'],Config::$db['name'],Config::$db['pass']);
        return $connect;
    }
}
?>