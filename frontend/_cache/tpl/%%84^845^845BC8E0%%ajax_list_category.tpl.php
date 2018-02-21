<?php /* Smarty version 2.6.13, created on 2018-02-19 15:22:14
         compiled from ajax_list_category.tpl */ ?>
<?php $_from = $this->_tpl_vars['listCategory']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['category']):
?>
    <a href="javascript: void (0)" onclick="load_list_product(<?php echo $this->_tpl_vars['category']['category_id']; ?>
)" class="list-group-item <?php if ($this->_tpl_vars['selected'] == $this->_tpl_vars['category']['category_id']): ?>active<?php endif; ?>"><?php echo $this->_tpl_vars['category']['category_name']; ?>
</a>
<?php endforeach; endif; unset($_from); ?>