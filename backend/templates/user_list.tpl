    <div id="tool_search">
        <form action="?mod=user&act=view" method="post">
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
                <td class="list_cn">Chức năng</td>
            </tr>
            {foreach from=$user key=k item=listuser}
                <tr class="list_data">
                    <td class="check">
                        {if $smarty.session.user.user_id != $listuser.user_id}
                            <input type="checkbox" value="{$listuser.user_id}" name="checkone" />
                        {else}
                            <input type="checkbox" value="{$listuser.user_id}" name="checktwo" disabled="disabled" />
                        {/if}
                    </td>
                    <td class="key">{$k+1}</td>
                    <td class="username"><a href="?mod=user&act=edit&id={$listuser.user_id}">{$listuser.username}</a></td>
                    <td class="fullname">{$listuser.fullname|escape:'html'}</td>
                    <td class="list_cn">
                        <ul>
                            <li>
                                <a href="?mod=user&act=edit&id={$listuser.user_id}">
                                    <img src="style/images/icon-16-config.png" title="Sửa"/>
                                </a>
                            </li>
                        {if $smarty.session.user.user_id != $listuser.user_id}
                            <li>
                                <a onclick="javascript:deleteuser({$listuser.user_id})" href="javascript: void (0);">
                                    <img src="style/images/icon-16-logout.png" title="Xóa"/>
                                </a>
                            </li>
                        {else}
                            <li>
                                <span class="opacity3" href="javascript: void (0);">
                                    <img src="style/images/icon-16-logout.png" title="Xóa"/>
                                </span>
                            </li>
                        {/if}
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

