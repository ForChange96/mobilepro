<?php /* Smarty version 2.6.13, created on 2018-01-16 10:13:45
         compiled from report_list.tpl */ ?>
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
            <td class="address">Email</td>
            <td class="address">Nội dung</td>
            <td class="list_cn">Chức năng</td>
        </tr>
        <?php $_from = $this->_tpl_vars['list_report']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['report']):
?>
            <tr class="list_data">
                <td class="check">
                    <input type="checkbox" value="<?php echo $this->_tpl_vars['report']['report_id']; ?>
" name="checkone" />
                </td>
                <td class="key"><?php echo $this->_tpl_vars['k']+1; ?>
</td>
                <td class="email"><?php echo $this->_tpl_vars['report']['email']; ?>
</td>
                <td class="report_content"><?php echo $this->_tpl_vars['report']['content']; ?>
</td>
                <td class="list_cn">
                    <ul>
                        <li>
                            <a onclick="javascript:deletReport(<?php echo $this->_tpl_vars['report']['report_id']; ?>
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