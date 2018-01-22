<?php
/*
 * 1. Include các file trong thư mục includes
 * 2. Get param từ request url
 * 3. Phân tích param để gọi module và action tương ứng
 * 4. View template
 */
@define ('DS', DIRECTORY_SEPARATOR);
// 1. Include các file trong thư mục includes
include "class_config.php";
include "class_database.php";
include "class_paging.php";
include "PagingUtils.php";
include "class_validation.php";
include "smarty/Smarty.class.php";

$database=new Database();
$database->connect();

$smarty=new Smarty();
$smarty->template_dir='templates/';
$smarty->compile_dir='_cache/tpl';

// 2. Get param từ request url
$mod=trim($_GET['mod']);
$act=trim($_GET['act']);

//3. Phân tích param để gọi module và action tương ứng
if (empty($mod)) $mod="home";
if (empty($act)) $act="view";

include "modules/class_{$mod}.php";
$class=ucfirst($mod);
$objMod=new $class();
$vars['tmp_module'] = $objMod->$act();
$vars['mod']=$mod;

// 4. View ra template (website)
$home='index.tpl';
if(!isset($vars)){
    $smarty->display($home);
}
elseif(is_array($vars)){
    foreach ($vars as $key => $value){
        $smarty->assign($key,$value);
    }
    $smarty->display($home);
}
else{
    throw new Exception("[viewpart] \$vars must be an array");
}
?>