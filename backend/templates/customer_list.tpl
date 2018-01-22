<div id="tool_search">
    <form action="?mod=customer&act=view" method="post">
        <div class="btn_search1"></div>
        <div class="btn_search2">
            <input type="text" name="search" class="input_search" value="{$txt_search|escape:'html'}">
        </div>
        <input class="btn_search3" type="submit" name="btnsearch" value=""/>
        {*{if $search|escape:'html'}*}
        <div style="float:right;">{$countrows} Kết quả, Hiển thị <b style="color: red">{$countpage}</b></div>
        {*{/if}*}
    </form>
    <div class="clear"></div>
</div><!--End #tool_search-->
<div id="list">
    <table cellpadding="0" cellspacing="0" style="margin: auto;">
        <tr class="list_title">
            <td class="check"><input type="checkbox" value="checkall" name="checkall" class="checkall" /></td>
            <td class="key">STT</td>
            <td class="username">Tên đăng nhập</td>
            <td class="fullname">Họ tên</td>
            <td class="email">Email</td>
            <td class="phone">Số điện thoại</td>
            <td class="list_cn">Chức năng</td>
        </tr>
        {foreach from=$customer key=k item=listcustomer}
            <tr class="list_data">
                <td class="check">
                    <input type="checkbox" value="{$listcustomer.customer_id}" name="checkone" />
                </td>
                <td class="key">{$k+1}</td>
                <td class="username"><a href="?mod=customer&act=edit&id={$listcustomer.customer_id}">{$listcustomer.username}</a></td>
                <td class="fullname">{$listcustomer.fullname|escape:'html'}</td>
                <td class="email">{$listcustomer.email|escape:'html'}</td>
                <td class="phone">{$listcustomer.phone_number|escape:'html'}</td>
                <td class="list_cn">
                    <ul>
                        <li>
                            <a href="?mod=customer&act=edit&id={$listcustomer.customer_id}">
                                <img src="style/images/icon-16-config.png" title="Sửa"/>
                            </a>
                        </li>
                        <li>
                            <a onclick="javascript:deletecustomer({$listcustomer.customer_id})" href="javascript: void (0);">
                                <img src="style/images/icon-16-logout.png" title="Xóa"/>
                            </a>
                        </li>
                    </ul>
                </td>
            </tr>
        {/foreach}
        <tr>
            <td class="pagging" colspan="7">{$pagels}</td>
        </tr>
    </table>
</div><!--End #list-->
<div class="clear"></div>