<div id="tool_search">
    <form action="?mod=category&act=view" method="post">
        {*{if $search|escape:'html'}*}
        <div style="float:right;">{$totalResult} Kết quả, Hiển thị <b style="color: red">{$numRowsDisplay}</b></div>
        {*{/if}*}
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
        {foreach from=$list_contact key=k item=contact}
            <tr class="list_data">
                <td class="check">
                    <input type="checkbox" value="{$contact.contact_id}" name="checkone" />
                </td>
                <td class="key">{$k+1}</td>
                <td class="category_name">{$contact.hotline}</td>
                <td class="address2">{$contact.address}</td>
                <td class="list_cn">
                    <ul>
                        <li>
                            <a href="?mod=contact&act=edit&id={$contact.contact_id}">
                                <img src="style/images/icon-16-config.png" title="Sửa"/>
                            </a>
                        </li>
                        <li>
                            <a onclick="javascript:deletContact({$contact.contact_id})" href="javascript: void (0);">
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