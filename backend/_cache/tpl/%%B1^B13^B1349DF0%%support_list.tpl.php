<?php /* Smarty version 2.6.13, created on 2018-01-17 04:01:31
         compiled from support_list.tpl */ ?>
<div id="tool_search">
    <form action="?mod=category&act=view" method="post">
                <div style="float:right;"><?php echo $this->_tpl_vars['totalResult']; ?>
 Kết quả, Hiển thị <b style="color: red"><?php echo $this->_tpl_vars['numRowsDisplay']; ?>
</b></div>
            </form>
    <div class="clear"></div>
</div><!--End #tool_search-->
<div id="list">
    <table cellpadding="0" cellspacing="0" style="margin: auto;">
        <tr class="list_title">
            <td class="check"><input type="checkbox" value="checkall" name="checkall" class="checkall" /></td>
            <td class="key">STT</td>
            <td class="fullname">Họ tên</td>
            <td class="address">Email</td>
            <td class="phone">Số điện thoại</td>
            <td class="list_cn">Chức năng</td>
        </tr>
        <?php $_from = $this->_tpl_vars['list_support']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['support']):
?>
            <tr class="list_data">
                <td class="check">
                    <input type="checkbox" value="<?php echo $this->_tpl_vars['support']['support_id']; ?>
" name="checkone" />
                </td>
                <td class="key"><?php echo $this->_tpl_vars['k']+1; ?>
</td>
                <td class="fullname"><?php echo $this->_tpl_vars['support']['s_name']; ?>
</td>
                <td class="address"><?php echo $this->_tpl_vars['support']['s_email']; ?>
</td>
                <td class="phone"><?php echo $this->_tpl_vars['support']['s_phone_number']; ?>
</td>
                <td class="list_cn">
                    <ul>
                        <li>
                            <a href="?mod=support&act=edit&id=<?php echo $this->_tpl_vars['support']['support_id']; ?>
">
                                <img src="style/images/icon-16-config.png" title="Sửa"/>
                            </a>
                        </li>
                        <li>
                            <a onclick="javascript:deleteSupport(<?php echo $this->_tpl_vars['support']['support_id']; ?>
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