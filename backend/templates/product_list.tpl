<div id="tool_search">
    <form action="?mod=product&act={$smarty.get.act}" method="post">
        <div class="btn_search1"></div>
        <div class="btn_search2">
            <input type="text" name="search" class="input_search" value="{$txt_search|escape:'html'}">
        </div>
        <input class="btn_search3" type="submit" name="btnsearch" value=""/>
        <div class="btn_select_menu">
            <a class="btn btn btn-default btn_view" style="color: #444444; {if $smarty.get.act==view}background: #d6e3e2{/if}" href="?mod=product&act=view">
                Còn kinh doanh
            </a>&nbsp;
            <a class="btn btn btn-default btn_view" style="color: #444444;{if $smarty.get.act==view2}background: #d6e3e2{/if}" href="?mod=product&act=view2">
                Ngừng kinh doanh
            </a>
        </div>
        {*{if $search|escape:'html'}*}
        <div style="float:right;">{$totalResult} Kết quả, Hiển thị <b style="color: red">{$numRowsDisplay}</b></div>
        {*{/if}*}
    </form>
    <div class="clear"></div>
</div><!--End #tool_search-->
<div id="list">
    <table cellpadding="0" cellspacing="0" style="margin: auto;" >
        <tr class="list_title">
            <td class="check"><input type="checkbox" value="checkall" name="checkall" class="checkall" /></td>
            <td class="key">STT</td>
            <td class="productname">Tên sản phẩm</td>
            <td class="manufacturer">Hãng sản xuất</td>
            <td class="price">Giá</td>
            <td class="hotProduct">SP nổi bật</td>
            <td class="list_cn">Chức năng</td>
        </tr>
        {foreach from=$listProduct key=k item=product}
            <tr class="list_data">
                <td class="check">
                    <input type="checkbox" value="{$product.product_id}" name="checkone" />
                </td>
                <td class="key">{$k+1}</td>
                <td class="productname"><a href="?mod=product&act=detail&id={$product.product_id}">{$product.p_name}</a></td>
                <td class="manufacturer">{$product.manufacturer|escape:'html'}</td>
                <td class="price">{$product.p_price|number_format}</td>
                <td class="hotProduct">
                    {if $product.is_hot_product == 1}
                    <img src="style\images\icon-hot.png">
                    {/if}
                </td>
                <td class="list_cn">
                    <ul>
                        <li>
                            <a href="?mod=product&act=detail&id={$product.product_id}">
                                <img src="style/images/icon-16-detail.png" title="Xem chi tiết"/>
                            </a>
                        </li>
                        {if $smarty.get.act==view2}
                        <li>
                            <a onclick="javascript:restore_product({$product.product_id})" href="javascript: void (0);">
                                <img src="style/images/icon_restore.png" title="Chuyển sang 'còn kinh doanh'"/>
                            </a>
                        </li>
                        {/if}
                        <li>
                            <a onclick="javascript:deleteproduct({$product.product_id})" href="javascript: void (0);">
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

