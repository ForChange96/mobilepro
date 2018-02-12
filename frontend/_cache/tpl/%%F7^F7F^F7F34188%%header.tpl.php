<?php /* Smarty version 2.6.13, created on 2018-02-12 11:22:48
         compiled from header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'number_format', 'header.tpl', 64, false),)), $this); ?>
<header>
    <!-- header top area start -->
    <div class="header-top" id="header-top">
        <div class="header-top-top">
            <div class="container">
                <div class="row">
                    <div class=" hidden-xs col-xs-12 col-sm-7 col-md-7 col-lg-7 header_top_left">
                        <column class="position-display">
                            <div>
                                <div style="width: 200px; float: left">
                                    <p><i class="fa fa-phone"></i> hotline: <?php echo $this->_tpl_vars['contact']['hotline']; ?>
</p>
                                </div>
                                <?php if (isset ( $_SESSION['customer'] )): ?>
                                <div class="welcome">
                                    &#9679;&nbsp;
                                    <b>Chào mừng: <?php echo $this->_tpl_vars['user_online']; ?>
</b>
                                </div>
                                <?php endif; ?>
                            </div>
                        </column>
                    </div>
                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 log_index">
                        <div class="right-menu-areas">
                            <div class="right-menus hm-1">
                                <ul>
                                    <li class="dropdown">
                                        <a href="#" title="Tài Khoản" class="dropdown-toggle" data-toggle="dropdown">
                                            <i class="fa fa-user"></i>
                                            <span class="hidden-xs hidden-sm hidden-md">Tài Khoản</span>
                                            <span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-right account_header">
                                            <li>
                                                <?php if (isset ( $_SESSION['customer'] )): ?>
                                                    <a href="?mod=home&act=logout" id="btn-logout">Đăng Xuất</a>
                                                    <a href="?mod=dangky&act=edit_customer">Tài khoản của tôi</a>
                                                <?php else: ?>
                                                    <a href="#" data-toggle="modal" data-target="#login-modal">Đăng nhập</a>
                                                    <a href="?mod=dangky&act=view">Đăng ký</a>
                                                <?php endif; ?>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="favorite_li">
                                        <a href="javascript: void (0)" id="wishlist-total" id="btn_favorite">
                                            <i class="fa fa-heart"></i>
                                            <span class="hidden-xs hidden-sm hidden-md">Yêu thích (<span id="num_favorite"><?php echo $this->_tpl_vars['num_favorite']; ?>
</span>)</span>
                                        </a>
                                        <ul class="favorite_ul">
                                            <?php if (! empty ( $this->_tpl_vars['listFavorite'] )): ?>
                                                <li class="table-responsive">
                                                    <table style="width: 400px;">
                                                        <tbody>
                                                        <?php $_from = $this->_tpl_vars['listFavorite']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['product']):
?>
                                                            <tr>
                                                                <td class="text-center" style="border-bottom: 0">
                                                                    <a href="?mod=product&act=detail&id=<?php echo $this->_tpl_vars['product']['product_id']; ?>
">
                                                                        <img src="<?php echo $this->_tpl_vars['product']['img_link_300']; ?>
" alt="<?php echo $this->_tpl_vars['product']['p_name']; ?>
" title="<?php echo $this->_tpl_vars['product']['p_name']; ?>
" width="100" style="border-radius: 10px">
                                                                    </a>
                                                                </td>
                                                                <td class="text-left" style="padding-top: 25px;">
                                                                    <a href="?mod=product&act=detail&id=<?php echo $this->_tpl_vars['product']['product_id']; ?>
"><?php echo $this->_tpl_vars['product']['p_name']; ?>
</a>
                                                                </td>
                                                                <td class="text-right" style="padding-top: 25px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['product']['p_price'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
</td>
                                                                <td class="text-center" style="padding-top: 25px; border: 0">
                                                                    <button type="button" onclick="delete_wishlist(<?php echo $this->_tpl_vars['product']['product_id']; ?>
)" title="Loại bỏ" class="btn btn-danger btn-xs"><i class="fa fa-times"></i></button>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; endif; unset($_from); ?>
                                                        </tbody>
                                                    </table>
                                                </li>
                                            <?php else: ?>
                                                <li class="text-center" style="width: 125px;line-height: 30px;padding: 0 5px;">Danh sách trống</li>
                                            <?php endif; ?>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="javascript: pay_click()" title="Thanh toán">
                                            <i class="fa fa-share"></i>
                                            <span class="hidden-xs hidden-sm hidden-md">Thanh toán</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" onclick="search_toggle()">
                                            <i class="fa fa-search"></i>
                                        </a>
                                        <div id="search" class="search-area">
                                            <form action="?mod=product&act=search_product" method="post">
                                                <input type="text" name="txt_search" placeholder="Tìm kiếm sản phẩm"/>
                                                <span class="button">
                                                    <button type="submit" class="btn btn-default btn-lg">
                                                        <span><i class="fa fa-search"></i></span>
                                                    </button>
                                                </span>
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- header main area start -->
        <div class="header_main_area" id="sticker">
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <column class="position-display">
                            <div>
                                <div class="dv-builder-full">
                                    <div class="dv-builder  ">
                                        <div class="dv-module-content">
                                            <div class="row">
                                                <div class="col-sm-3 col-md-3 col-lg-3 col-xs-12">
                                                    <div class="dv-item-module ">
                                                        <div id="logo" class="logo-area">
                                                            <a>
                                                                <img src="catalog/view/images/logo-mobilepro.png"
                                                                     alt="Mobilepro - smartphone giá rẻ"
                                                                     class="img-responsive pull-left"/>
                                                                <div class="logo-des"></div>
                                                                <div class="clearfix"></div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-9 col-md-9 col-lg-9 col-xs-12">
                                                    <div class="dv-item-module ">
                                                        <div class="navbar navbar-inverse yamm menu_horizontal"
                                                             id="menu_id_MB01">
                                                            <div class="navbar-header">
                                                                <div class="text_title_nav">Danh mục</div>
                                                                <button type="button" data-toggle="collapse"
                                                                        data-target="#navbar-collapse-MB01"
                                                                        class="navbar-toggle">
                                                                    <span class="icon-bar"></span>
                                                                    <span class="icon-bar"></span>
                                                                    <span class="icon-bar"></span>
                                                                </button>
                                                            </div>
                                                            <div id="navbar-collapse-MB01"
                                                                 class="navbar-collapse collapse">
                                                                <ul class="nav navbar-nav">
                                                                    <li>
                                                                        <a href="?mod=home&act=view">Trang chủ</a>
                                                                    </li>

                                                                    <li>
                                                                        <a href="?mod=gioithieu&act=view">Giới thiệu</a>
                                                                    </li>
                                                                    <li class="dropdown">
                                                                        <a href="#" data-toggle="dropdown"
                                                                           class="dropdown-toggle"
                                                                           aria-expanded="false">Sản Phẩm <b class="caret"></b>
                                                                        </a>
                                                                        <ul role="menu"
                                                                            class="dropdown-menu multi-level"
                                                                            role="menu" aria-labelledby="dropdownMenu" style="margin-top: -15px !important;">
                                                                            <?php $_from = $this->_tpl_vars['listCategory']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['category']):
?>
                                                                                <li>
                                                                                    <a href="?mod=product&act=show_by_category&id=<?php echo $this->_tpl_vars['category']['category_id']; ?>
"><?php echo $this->_tpl_vars['category']['category_name']; ?>
</a>
                                                                                </li>
                                                                            <?php endforeach; endif; unset($_from); ?>
                                                                            <li>
                                                                                <a href="?mod=product&act=search_product">Tìm kiếm</a>
                                                                            </li>
                                                                        </ul>
                                                                    </li>
                                                                    <li>
                                                                        <a href="?mod=huongdan&act=view">Hướng Dẫn</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="?mod=lienhe&act=view">Liên Hệ</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <!-- MOBILE MENU START -->
                                                            <div class="col-sm-12 mobile-menu-area">
                                                                <div class="mobile-menu hidden-md hidden-lg"
                                                                     id="mob-menu">
                                                                    <span class="mobile-menu-title">Danh Mục</span>
                                                                    <nav>
                                                                        <ul>
                                                                            <li>
                                                                                <a href="?mod=home&act=view">Trang chủ</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="?mod=gioithieu&act=view">Giới thiệu</a>
                                                                            </li>
                                                                            <li class="dropdown open">
                                                                                <a href="#" data-toggle="dropdown" class="dropdown-toggle" aria-expanded="true">Sản Phẩm <b class="caret"></b></a>
                                                                                <ul role="menu" class="dropdown-menu multi-level" aria-labelledby="dropdownMenu">
                                                                                    <?php $_from = $this->_tpl_vars['listCategory']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['category']):
?>
                                                                                        <li>
                                                                                            <a href="?mod=product&act=show_by_category&id=<?php echo $this->_tpl_vars['category']['category_id']; ?>
"><?php echo $this->_tpl_vars['category']['category_name']; ?>
</a>
                                                                                        </li>
                                                                                    <?php endforeach; endif; unset($_from); ?>
                                                                                    <li>
                                                                                        <a href="?mod=product&act=search_product">Tìm kiếm</a>
                                                                                    </li>
                                                                                </ul>
                                                                            </li>
                                                                            <li>
                                                                                <a href="?mod=huongdan&act=view">Hướng Dẫn</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="?mod=lienhe&act=view">Liên Hệ</a>
                                                                            </li>
                                                                        </ul>
                                                                    </nav>
                                                                </div>
                                                            </div>
                                                            <!-- MOBILE MENU END -->
                                                        </div>
                                                                                                            </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </column>
                    </div>
                    <div class="col-sm-3">
                        <div id="cart" class="main-cart-area cart_panel">
                            <button type="button" data-toggle="dropdown" data-loading-text="Đang Xử lý..."
                                    class="cart-icon dropdown-toggle" id="btn_cart">
                                <i class="fa fa-shopping-cart"></i>
                                <span id="cart-total"><span class="num_product" id="num_cart"> <?php echo $this->_tpl_vars['num_cart']; ?>
</span> <span class="text-cart">sản phẩm -</span> <span
                                            class="price" id="total"><?php echo ((is_array($_tmp=$this->_tpl_vars['total']*11/10)) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
 VNĐ</span></span>
                            </button>
                            <ul class="dropdown-menu pull-right cart_dropdown" id="cart_content">
                                <?php if (isset ( $_SESSION['cart'] ) && ! empty ( $_SESSION['cart'] )): ?>
                                <li class="table-responsive">
                                    <table class="table" style="width: 400px">
                                        <tbody>
                                        <?php $_from = $_SESSION['cart']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['product_id'] => $this->_tpl_vars['product']):
?>
                                            <tr>
                                                <td class="text-center">
                                                    <a href="?mod=product&act=detail&id=<?php echo $this->_tpl_vars['product_id']; ?>
">
                                                        <img src="<?php echo $this->_tpl_vars['product']['img_link_300']; ?>
" alt="<?php echo $this->_tpl_vars['product']['p_name']; ?>
" title="<?php echo $this->_tpl_vars['product']['p_name']; ?>
" width="100">
                                                    </a>
                                                </td>
                                                <td class="text-left" style="padding-top: 30px;">
                                                    <a href="?mod=product&act=detail&id=<?php echo $this->_tpl_vars['product_id']; ?>
"><?php echo $this->_tpl_vars['product']['p_name']; ?>
</a>
                                                </td>
                                                <td class="text-right" style="padding-top: 30px;">x <?php echo $this->_tpl_vars['product']['number']; ?>
</td>
                                                <td class="text-right" style="padding-top: 30px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['product']['p_price'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
</td>
                                                <td class="text-center" style="padding-top: 30px;">
                                                    <button type="button" onclick="remove_from_cart(<?php echo $this->_tpl_vars['product_id']; ?>
)" title="Loại bỏ" class="btn btn-danger btn-xs"><i class="fa fa-times"></i></button>
                                                </td>
                                            </tr>
                                        <?php endforeach; endif; unset($_from); ?>
                                        </tbody>
                                    </table>
                                </li>
                                <li>
                                    <div>
                                        <table class="table table-bordered">
                                            <tbody>
                                            <tr>
                                                <td class="text-right"><strong>Thành tiền</strong></td>
                                                <td class="text-right"><?php echo ((is_array($_tmp=$this->_tpl_vars['total'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
 VNĐ</td>
                                            </tr>
                                            <tr>
                                                <td class="text-right"><strong>Sản phẩm tính thuế</strong></td>
                                                <td class="text-right"><?php echo ((is_array($_tmp=$this->_tpl_vars['total']/10)) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
 VNĐ</td>
                                            </tr>
                                            <tr>
                                                <td class="text-right"><strong>Tổng cộng </strong></td>
                                                <td class="text-right"><?php echo ((is_array($_tmp=$this->_tpl_vars['total']+$this->_tpl_vars['total']/10)) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
 VNĐ</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <p class="text-right">
                                            <a href="?mod=cart&act=view"><strong><i class="fa fa-shopping-cart"></i> Xem Giỏ Hàng</strong></a>&nbsp;&nbsp;&nbsp;
                                            <a href="?mod=cart&act=pay"><strong><i class="fa fa-share"></i> Thanh Toán</strong></a>
                                        </p>
                                    </div>
                                </li>
                                <?php else: ?>
                                <li class="text-center">Giỏ hàng trống</li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- header main area end -->
    </div>
</header>


<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="loginmodal-container">
            <h1>Đăng nhập</h1><br>
            <div id="alert">
                <i id="check_login"></i>
            </div>
            <form id="form_login" action="" method="post">
                <input type="text" name="username" placeholder="Tên đăng nhập hoặc email" onblur="check_empty_username()" id="username_login" onclick="clear_err('#username_login')">
                <input type="password" name="password" placeholder="Mật khẩu" onblur="check_empty_password()" id="password_login" onclick="clear_err('#password_login')">
                <input type="button" class="login loginmodal-submit" onclick="login()" value="Đăng nhập">
            </form>
            <a href="<?php echo $this->_tpl_vars['loginURL']; ?>
">
                <div class="login_fb">
                    <div class="login_fb_img">
                        <img src="catalog\view\images\icon-fb.png">
                    </div>
                    <div class="login_fb_text">Đăng nhập bằng Facebook</div>
                </div>
            </a>
            <div style="clear: both"></div>
            <div class="login-help">
                Chưa có tài khoản?&nbsp;&nbsp;&nbsp;<a href="?mod=dangky&act=view">Đăng ký</a>
            </div>
        </div>
    </div>
</div>

<div id="login_success" class="modal fade" role="dialog">
    <div class="modal-dialog" style="width: 300px;">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="text-align: center; line-height: 60px;">
                    <span class="glyphicon glyphicon-ok-sign" style="color: green"></span>&nbsp;
                    Đăng nhập thành công
                </h4>
                <div style="text-align: center">
                    <button type="button" class="btn btn-default" data-dismiss="modal" onclick="window.location.reload()">ok</button>
                </div>
            </div>
        </div>

    </div>
</div>