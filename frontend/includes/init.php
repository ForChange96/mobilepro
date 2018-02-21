<?php
/*
 * 1. Include các file trong thư mục includes
 * 2. Get param từ request url
 * 3. Phân tích param để gọi module và action tương ứng
 * 4. Lấy thông tin category, contact, cart,...trong class_get_info để show ra template
 * 5. View template
 */
@define ('DS', DIRECTORY_SEPARATOR);
// 1. Include các file trong thư mục includes
include "class_config.php";
include "class_database.php";
include "class_paging.php";
include "PagingUtils.php";
include "class_validation.php";
include "smarty/Smarty.class.php";
include "class_get_info.php";
include "remove_unicode.php";

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

// 4. Lấy thông tin category, contact, cart,...
$info=new class_get_info();
$vars['contact']=$info->get_contact();
$vars['listFavorite']=$info->listFavorite();
$vars['num_favorite']=count($vars['listFavorite']);
$vars['num_cart']=$info->get_num_cart();
$vars['total']=$info->get_total();
$vars['listCategory']=$info->get_category();
$vars['product_name']=$info->get_product_name();
$_SESSION['loginURL']=$info->get_login_FB_URL();
if (isset($_SESSION['customer']))
    $vars['user_online']=$info->get_customer_name($_SESSION['customer']);

// 5. View ra template (website)
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