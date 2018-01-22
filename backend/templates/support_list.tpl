<div id="tool_search">
    <form action="?mod=category&act=view" method="post">
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
            <td class="fullname">Họ tên</td>
            <td class="address">Email</td>
            <td class="phone">Số điện thoại</td>
            <td class="list_cn">Chức năng</td>
        </tr>
        {foreach from=$list_support key=k item=support}
            <tr class="list_data">
                <td class="check">
                    <input type="checkbox" value="{$support.support_id}" name="checkone" />
                </td>
                <td class="key">{$k+1}</td>
                <td class="fullname">{$support.s_name}</td>
                <td class="address">{$support.s_email}</td>
                <td class="phone">{$support.s_phone_number}</td>
                <td class="list_cn">
                    <ul>
                        <li>
                            <a href="?mod=support&act=edit&id={$support.support_id}">
                                <img src="style/images/icon-16-config.png" title="Sửa"/>
                            </a>
                        </li>
                        <li>
                            <a onclick="javascript:deleteSupport({$support.support_id})" href="javascript: void (0);">
                                <img src="style/images/icon-16-logout.png" title="Xóa"/>
                            </a>
                        </li>
                    </ul>
                </td>
            </tr>
        {/foreach}
        <tr>
            <td class="pagging" colspan="5">{$pagels}</td>
        </tr>
    </table>
</div><!--End #list-->
<div class="clear"></div>