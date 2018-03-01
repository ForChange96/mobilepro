<?php /* Smarty version 2.6.13, created on 2018-02-27 11:26:23
         compiled from ajax_list_favorite_header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'number_format', 'ajax_list_favorite_header.tpl', 15, false),)), $this); ?>
<?php if (! empty ( $this->_tpl_vars['listFavorite'] )): ?>
    <li class="table-responsive">
        <table style="width: 400px;">
            <tbody>
            <?php $_from = $this->_tpl_vars['listFavorite']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['product']):
?>
                <tr>
                    <td class="text-center" style="border-bottom: 0">
                        <a href="chi-tiet-san-pham-<?php echo $this->_tpl_vars['product']['product_id']; ?>
=<?php echo $this->_tpl_vars['product']['p_name_remove_unicode']; ?>
">
                            <img src="<?php echo $this->_tpl_vars['product']['img_link_300']; ?>
" alt="<?php echo $this->_tpl_vars['product']['p_name']; ?>
" title="<?php echo $this->_tpl_vars['product']['p_name']; ?>
" width="100" style="border-radius: 10px">
                        </a>
                    </td>
                    <td class="text-left" style="padding-top: 25px;">
                        <a href="chi-tiet-san-pham-<?php echo $this->_tpl_vars['product']['product_id']; ?>
=<?php echo $this->_tpl_vars['product']['p_name_remove_unicode']; ?>
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