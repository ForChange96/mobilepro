<?php
    Class Gioithieu{
        public function view(){
            global $smarty;
            $temp=$smarty->fetch("gioi-thieu.tpl");
            return $temp;
        }
    }
?>