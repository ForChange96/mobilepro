<?php /* Smarty version 2.6.13, created on 2018-02-28 05:56:36
         compiled from ajax_list_button_on_detail.tpl */ ?>
<li><button type="button" data-toggle="tooltip" class="link-wishlist" title="Thêm so sánh" onclick=""><i class="fa fa-retweet"></i></button></li>
<?php if ($this->_tpl_vars['product']['isFavorite'] == 1): ?>
    <li style="background: #ffcba8; width: 39px;">
        <button type="button" data-toggle="tooltip" class="link-wishlist" title="Xoá Yêu thích" onclick="delete_wishlist(<?php echo $this->_tpl_vars['product']['product_id']; ?>
)">
            <i class="fa fa-heart" style="color: red"></i>
        </button>
    </li>
<?php else: ?>
    <li>
        <button type="button" data-toggle="tooltip" class="link-wishlist" title="Thêm Yêu thích" onclick="<?php if (isset ( $_SESSION['customer'] )): ?> add_wishlist(<?php echo $this->_tpl_vars['product']['product_id']; ?>
) <?php else: ?> login_and_add_wishlist(<?php echo $this->_tpl_vars['product']['product_id']; ?>
) <?php endif; ?>">
            <i class="fa fa-heart-o"></i>
        </button>
    </li>
<?php endif; ?>