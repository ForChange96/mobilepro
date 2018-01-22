<?php /* Smarty version 2.6.13, created on 2018-01-22 11:42:37
         compiled from home.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'number_format', 'home.tpl', 27, false),)), $this); ?>
<div class="container">
    <div class="row">
        <div id="content" class="col-sm-12">
            <div class="content_top page_panel">
                <div class="position-display">
                    <div class="h2-arviel-title">
                        <h3>Mới nhất</h3>
                    </div>
                    <div class="row">
                                                <?php $_from = $this->_tpl_vars['listProduct']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['product']):
?>
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="row category_product">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="t-all-product-info">
                                        <div class="p-sign">Mới</div>
                                        <div class="t-product-img">
                                            <a href="product_detail.html">
                                                <img src="<?php echo $this->_tpl_vars['product']['img_link_350']; ?>
"
                                                     alt="<?php echo $this->_tpl_vars['product']['p_name']; ?>
"
                                                     title="<?php echo $this->_tpl_vars['product']['p_name']; ?>
" class="img-responsive"/>
                                            </a>
                                        </div>
                                        <div class="tab-p-info">
                                            <a href="product_detail"><?php echo $this->_tpl_vars['product']['p_name']; ?>
</a>
                                            <div class="price_product">
                                                <span class="price-new"><?php echo ((is_array($_tmp=$this->_tpl_vars['product']['p_price'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
 VNĐ</span>
                                            </div>
                                            <div class="star">
                                                <span class="fa fa-stack">
                                                    <i class="fa fa-star-o fa-stack-2x"></i>
                                                </span>
                                                <span class="fa fa-stack">
                                                    <i class="fa fa-star-o fa-stack-2x"></i>
                                                </span>
                                                <span class="fa fa-stack">
                                                    <i class="fa fa-star-o fa-stack-2x"></i>
                                                </span>
                                                <span class="fa fa-stack">
                                                    <i class="fa fa-star-o fa-stack-2x"></i>
                                                </span>
                                                <span class="fa fa-stack">
                                                    <i class="fa fa-star-o fa-stack-2x"></i>
                                                </span>
                                            </div>
                                            <div class="al-btns">
                                                <button type="button" onclick="cart.add('19');" class="button btn-cart">
                                                    <span><i class="fa fa-shopping-cart"></i> Thêm vào giỏ</span>
                                                </button>
                                                <ul class="add-to-links">
                                                    <li>
                                                        <a href=""
                                                           class="link-wishlist" data-toggle="tooltip"
                                                           title=" Xem chi tiết"><i class="fa fa-eye"></i></a>
                                                    </li>
                                                    <li>
                                                        <button class="link-wishlist" type="button"
                                                                data-toggle="tooltip" title="Thêm so sánh"
                                                                onclick="compare.add('19');">
                                                            <i class="fa fa-retweet"></i>
                                                        </button>
                                                    </li>
                                                    <li>
                                                        <button type="button" data-toggle="tooltip" title="Thêm Yêu thích" onclick="wishlist.add('19');">
                                                            <i class="fa fa-heart"></i>
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; endif; unset($_from); ?>
                    </div>
                    <div id="banner_page_0" class="banner_page">
                        <ul>
                            <li class="item b-stripe oll">
                                <a href="#">
                                    <img src="catalog\view\images\qc2-758x399.jpg"
                                         alt="quảng cáo 1" class="img-responsive"/>
                                </a>
                                <!--<div class="name_banner"><a href="#">quảng cáo 1</a></div>-->
                            </li>
                            <li class="item b-stripe event">
                                <a href="#">
                                    <img src="catalog\view\images\qc2-1-758x399.jpg"
                                         alt="quảng cáo 2" class="img-responsive"/>
                                </a>
                                <!--<div class="name_banner"><a href="#">quảng cáo 2</a></div>-->
                            </li>
                        </ul>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="loginmodal-container">
            <h1>Đăng nhập</h1><br>
            <form>
                <input type="text" name="username" placeholder="Tên đăng nhập">
                <input type="password" name="password" placeholder="Mật khẩu">
                <input type="button" name="login" class="login loginmodal-submit" value="Đăng nhập">
            </form>

            <div class="login-help">
                Chưa có tài khoản?&nbsp;<a href="#">Đăng ký</a>
            </div>
        </div>
    </div>
</div>