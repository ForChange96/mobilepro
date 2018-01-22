<div id="tool_search">
    <form action="?mod=category&act=view" method="post">
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
            <td class="address">Tên danh mục</td>
            <td class="list_cn">Chức năng</td>
        </tr>
        {foreach from=$category key=k item=listcategory}
            <tr class="list_data">
                <td class="check">
                    <input type="checkbox" value="{$listcategory.category_id}" name="checkone" />
                </td>
                <td class="key">{$k+1}</td>
                <td class="category_name"><a href="?mod=category&act=edit&id={$listcategory.category_id}">{$listcategory.category_name}</a></td>
                <td class="list_cn">
                    <ul>
                        <li>
                            <a href="?mod=category&act=edit&id={$listcategory.category_id}">
                                <img src="style/images/icon-16-config.png" title="Sửa"/>
                            </a>
                        </li>
                        <li>
                            <a onclick="javascript:deletcategory({$listcategory.category_id})" href="javascript: void (0);">
                                <img src="style/images/icon-16-logout.png" title="Xóa"/>
                            </a>
                        </li>
                    </ul>
                </td>
            </tr>
        {/foreach}
        <tr>
            <td class="pagging" colspan="4">{$pagels}</td>
        </tr>
    </table>
</div><!--End #list-->
<div class="clear"></div>

