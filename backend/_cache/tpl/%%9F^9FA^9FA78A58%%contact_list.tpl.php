<?php /* Smarty version 2.6.13, created on 2018-01-17 02:57:16
         compiled from contact_list.tpl */ ?>
<div id="tool_search">
    <form action="?mod=category&act=view" method="post">
                <div style="float:right;"><?php echo $this->_tpl_vars['countrows']; ?>
 Kết quả, Hiển thị <b style="color: red"><?php echo $this->_tpl_vars['countpage']; ?>
</b></div>
            </form>
    <div class="clear"></div>
</div><!--End #tool_search-->
<div id="list">
    <table cellpadding="0" cellspacing="0" style="margin: auto;">
        <tr class="list_title">
            <td class="check"><input type="checkbox" value="checkall" name="checkall" class="checkall" /></td>
            <td class="key">STT</td>
            <td class="address">Hotline</td>
            <td class="address2">Địa chỉ</td>
            <td class="list_cn">Chức năng</td>
        </tr>
        <?php $_from = $this->_tpl_vars['list_contact']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['contact']):
?>
            <tr class="list_data">
                <td class="check">
                    <input type="checkbox" value="<?php echo $this->_tpl_vars['contact']['contact_id']; ?>
" name="checkone" />
                </td>
                <td class="key"><?php echo $this->_tpl_vars['k']+1; ?>
</td>
                <td class="category_name"><?php echo $this->_tpl_vars['contact']['hotline']; ?>
</td>
                <td class="address2"><?php echo $this->_tpl_vars['contact']['address']; ?>
</td>
                <td class="list_cn">
                    <ul>
                        <li>
                            <a href="?mod=contact&act=edit&id=<?php echo $this->_tpl_vars['contact']['contact_id']; ?>
">
                                <img src="style/images/icon-16-config.png" title="Sửa"/>
                            </a>
                        </li>
                        <li>
                            <a onclick="javascript:deletContact(<?php echo $this->_tpl_vars['contact']['contact_id']; ?>
)" href="javascript: void (0);">
                                <img src="style/images/icon-16-logout.png" title="Xóa"/>
                            </a>
                        </li>
                    </ul>
                </td>
            </tr>
        <?php endforeach; endif; unset($_from); ?>
        <tr>
            <td class="pagging" colspan="5"><?php echo $this->_tpl_vars['pagels']; ?>
</td>
        </tr>
    </table>
</div><!--End #list-->
<div class="clear"></div>