<?php
    class Huongdan{
        public function view(){
            global $smarty;
            $temp = $smarty->fetch('huongdan.tpl');
            return $temp;
        }
    }
?>