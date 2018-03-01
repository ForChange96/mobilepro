<?php /* Smarty version 2.6.13, created on 2018-02-28 05:08:21
         compiled from ajax_list_button_of_product.tpl */ ?>
<li>
    <a href="chi-tiet-san-pham-<?php echo $this->_tpl_vars['product']['product_id']; ?>
=<?php echo $this->_tpl_vars['product']['p_name_remove_unicode']; ?>
"
       class="link-wishlist" data-toggle="tooltip"
       title=" Xem chi tiết"><i class="fa fa-eye"></i></a>
</li>
<li>
    <button class="link-wishlist" type="button"
            data-toggle="tooltip" title="Thêm so sánh"
            onclick="javascript: void (0)">
        <i class="fa fa-retweet"></i>
    </button>
</li>
<?php if (isset ( $this->_tpl_vars['product']['isFavorite'] ) && $this->_tpl_vars['product']['isFavorite'] == 1): ?>
    <li style="background: #ffcba8" id="favorite_li">
        <button type="button" data-toggle="tooltip" title="Xoá Yêu thích"
                onclick="delete_wishlist(<?php echo $this->_tpl_vars['product']['product_id']; ?>
);reload_list_button_of_product(<?php echo $this->_tpl_vars['product']['product_id']; ?>
);">
            <i class="fa fa-heart" style="color: red" id="favorite_icon"></i>
        </button>
    </li>
<?php else: ?>
    <li>
        <button type="button" data-toggle="tooltip" title="Thêm Yêu thích"
                onclick="add_wishlist(<?php echo $this->_tpl_vars['product']['product_id']; ?>
); reload_list_button_of_product(<?php echo $this->_tpl_vars['product']['product_id']; ?>
);">
            <i class="fa fa-heart"></i>
        </button>
    </li>
<?php endif; ?>