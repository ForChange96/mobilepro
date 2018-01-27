<?php
class Lienhe extends class_get_info {
    public function view(){
        global $smarty;
        $smarty->assign('contact',parent::get_contact());
        $temp = $smarty->fetch('lien-he.tpl');
        return $temp;
    }
}
?>