<?php /* Smarty version 2.6.13, created on 2018-01-30 04:01:25
         compiled from ajax_product_list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'number_format', 'ajax_product_list.tpl', 15, false),)), $this); ?>
<?php $_from = $this->_tpl_vars['listProduct']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['product']):
?>
    <div class="product-layout product-grid col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <div class="row category_product">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="t-all-product-info">
                    <div class="t-product-img">
                        <a href="?mod=product&act=detail&id=<?php echo $this->_tpl_vars['product']['product_id']; ?>
">
                            <img src="<?php echo $this->_tpl_vars['product']['img_link_300']; ?>
" alt="<?php echo $this->_tpl_vars['product']['p_name']; ?>
" title="<?php echo $this->_tpl_vars['product']['p_name']; ?>
" class="img-responsive" />
                        </a>
                    </div>
                    <div class="tab-p-info">
                        <a href="?mod=product&act=detail&id=<?php echo $this->_tpl_vars['product']['product_id']; ?>
"><?php echo $this->_tpl_vars['product']['p_name']; ?>
</a>
                        <div class="description"><?php echo $this->_tpl_vars['product']['p_description']; ?>
</div>
                        <div class="price_product">
                            <span class="price-new"><?php echo ((is_array($_tmp=$this->_tpl_vars['product']['p_price'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
 VNĐ</span>
                            <div class="clear"></div>
                            <?php if ($this->_tpl_vars['product']['p_old_price'] != ""): ?>
                                <span class="price-old"><?php echo ((is_array($_tmp=$this->_tpl_vars['product']['p_old_price'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
 VNĐ</span>
                            <?php endif; ?>
                        </div>
                        <div class="star">
                                        <span class="fa fa-stack">
                                            <?php if ($this->_tpl_vars['product']['num_star'] >= 1): ?>
                                                <i class="fa fa-star fa-stack-2x"></i>
                                            <?php else: ?>
                                                <i class="fa fa-star-o fa-stack-2x"></i>
                                            <?php endif; ?>
                                        </span>
                            <span class="fa fa-stack">
                                            <?php if ($this->_tpl_vars['product']['num_star'] >= 2): ?>
                                                <i class="fa fa-star fa-stack-2x"></i>
                                            <?php else: ?>
                                                <i class="fa fa-star-o fa-stack-2x"></i>
                                            <?php endif; ?>
                                        </span>
                            <span class="fa fa-stack">
                                            <?php if ($this->_tpl_vars['product']['num_star'] >= 3): ?>
                                                <i class="fa fa-star fa-stack-2x"></i>
                                            <?php else: ?>
                                                <i class="fa fa-star-o fa-stack-2x"></i>
                                            <?php endif; ?>
                                        </span>
                            <span class="fa fa-stack">
                                            <?php if ($this->_tpl_vars['product']['num_star'] >= 4): ?>
                                                <i class="fa fa-star fa-stack-2x"></i>
                                            <?php else: ?>
                                                <i class="fa fa-star-o fa-stack-2x"></i>
                                            <?php endif; ?>
                                        </span>
                            <span class="fa fa-stack">
                                            <?php if ($this->_tpl_vars['product']['num_star'] >= 5): ?>
                                                <i class="fa fa-star fa-stack-2x"></i>
                                            <?php else: ?>
                                                <i class="fa fa-star-o fa-stack-2x"></i>
                                            <?php endif; ?>
                                        </span>
                        </div>
                        <div class="al-btns">
                            <button type="button" onclick="add_cart(<?php echo $this->_tpl_vars['product']['product_id']; ?>
)" class="button btn-cart"><span><i class="fa fa-shopping-cart"></i> Thêm vào giỏ</span></button>
                            <ul class="add-to-links">
                                <li><a href="?mod=product&act=detail&id=<?php echo $this->_tpl_vars['product']['product_id']; ?>
" class="link-wishlist" data-toggle="tooltip" title=" Xem chi tiết"><i class="fa fa-eye"></i></a></li>
                                <li>
                                    <button class="link-wishlist" type="button" data-toggle="tooltip" title="Thêm so sánh" onclick="">
                                        <i class="fa fa-retweet"></i>
                                    </button>
                                </li>
                                <?php if (isset ( $this->_tpl_vars['product']['isFavorite'] ) && $this->_tpl_vars['product']['isFavorite'] == 1): ?>
                                    <li style="background: #ffcba8">
                                        <button type="button" data-toggle="tooltip" title="Xoá Yêu thích" onclick="delete_wishlist(<?php echo $this->_tpl_vars['product']['product_id']; ?>
)">
                                            <i class="fa fa-heart" style="color: red"></i>
                                        </button>
                                    </li>
                                <?php else: ?>
                                    <li>
                                        <button type="button" data-toggle="tooltip" title="Thêm Yêu thích" onclick="<?php if (isset ( $_SESSION['customer'] )): ?> add_wishlist(<?php echo $this->_tpl_vars['product']['product_id']; ?>
) <?php else: ?> login_and_add_wishlist(<?php echo $this->_tpl_vars['product']['product_id']; ?>
) <?php endif; ?>">
                                            <i class="fa fa-heart"></i>
                                        </button>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; endif; unset($_from); ?>