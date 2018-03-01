<?php /* Smarty version 2.6.13, created on 2018-02-28 08:23:03
         compiled from product_list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'number_format', 'product_list.tpl', 67, false),)), $this); ?>
<div class="container">
    <div class="row">
        <div id="column-left" class="col-sm-3 col-md-3 col-lg-3 col-xs-12">
            <div class="cate_panel">Danh Mục</div>
            <div class="list-group cate_ul" id="list_category">
                <?php $_from = $this->_tpl_vars['listCategory']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['category']):
?>
                    <a href="javascript: void (0)" onclick="load_list_product(<?php echo $this->_tpl_vars['category']['category_id']; ?>
)" class="list-group-item <?php if ($_GET['id'] == $this->_tpl_vars['category']['category_id']): ?>active<?php endif; ?>"><?php echo $this->_tpl_vars['category']['category_name']; ?>
</a>
                <?php endforeach; endif; unset($_from); ?>
            </div>
            <input type="hidden" value="<?php echo $_GET['id']; ?>
" id="category_selected">
        </div>
        <div id="content" class="col-sm-9 category_page other_page">
            <div class="position-display">
            </div>
            <div class="page-selector">
                <div class="shop-grid-controls">
                    <div class="entry hidden-md hidden-sm hidden-xs">
                        <div class="inline-text">Sắp xếp:</div>
                        <div class="simple-drop-down">
                            <select id="input-sort" onchange="changeFilter()">
                                <option value="default" selected="selected">Mặc định</option>
                                <option value="p_name1">Tên (A - Z)</option>
                                <option value="p_name2">Tên (Z - A)</option>
                                <option value="p_price1">Giá (Thấp &gt; Cao)</option>
                                <option value="p_price2">Giá (Cao &gt; Thấp)</option>
                                <option value="num_star1">Đánh giá (Cao nhất)</option>
                                <option value="num_star2">Đánh giá (Thấp nhất)</option>
                            </select>
                        </div>
                    </div>
                    <div class="entry hidden-md hidden-sm hidden-xs">
                        <button type="button" id="list-view" class="view-button list" data-toggle="tooltip" title="Danh sách"><i class="fa fa-list"></i></button>
                        <button type="button" id="grid-view" class="view-button grid active" data-toggle="tooltip" title="Lưới"><i class="fa fa-th"></i></button>
                    </div>
                    <div class="entry">
                        <div class="inline-text">Hiển thị:</div>
                        <div class="simple-drop-down" style="width: 75px;">
                            <select id="input-limit" onchange="changeFilter()">
                                <option value="15" selected="selected">15</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="75">75</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                        <div class="inline-text">Trang</div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            <br />
            <div class="row" id="list_product">
                <?php $_from = $this->_tpl_vars['listProduct']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['product']):
?>
                <div class="product-layout product-grid col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="row category_product">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="t-all-product-info">
                                <div class="t-product-img">
                                    <a href="chi-tiet-san-pham-<?php echo $this->_tpl_vars['product']['product_id']; ?>
=<?php echo $this->_tpl_vars['product']['p_name_remove_unicode']; ?>
">
                                        <img src="<?php echo $this->_tpl_vars['product']['img_link_300']; ?>
" alt="<?php echo $this->_tpl_vars['product']['p_name']; ?>
" title="<?php echo $this->_tpl_vars['product']['p_name']; ?>
" class="img-responsive" />
                                    </a>
                                </div>
                                <div class="tab-p-info">
                                    <a href="chi-tiet-san-pham-<?php echo $this->_tpl_vars['product']['product_id']; ?>
=<?php echo $this->_tpl_vars['product']['p_name_remove_unicode']; ?>
"><?php echo $this->_tpl_vars['product']['p_name']; ?>
</a>
                                    <div class="description" style="color: #555555"><?php echo $this->_tpl_vars['product']['p_description']; ?>
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
                                        <ul class="add-to-links" id="list_button_of_product<?php echo $this->_tpl_vars['product']['product_id']; ?>
">
                                            <li><a href="chi-tiet-san-pham-<?php echo $this->_tpl_vars['product']['product_id']; ?>
=<?php echo $this->_tpl_vars['product']['p_name_remove_unicode']; ?>
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
            </div>
            <div class="row">
                <div class="col-sm-6 text-left"></div>
            </div>
            <div class="position-display">
            </div>
        </div>
    </div>
</div>