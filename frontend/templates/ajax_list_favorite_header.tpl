{if !empty($listFavorite)}
    <li class="table-responsive">
        <table style="width: 400px;">
            <tbody>
            {foreach from=$listFavorite key=k item=product}
                <tr>
                    <td class="text-center" style="border-bottom: 0">
                        <a href="chi-tiet-san-pham-{$product.product_id}={$product.p_name_remove_unicode}">
                            <img src="{$product.img_link_300}" alt="{$product.p_name}" title="{$product.p_name}" width="100" style="border-radius: 10px">
                        </a>
                    </td>
                    <td class="text-left" style="padding-top: 25px;">
                        <a href="chi-tiet-san-pham-{$product.product_id}={$product.p_name_remove_unicode}">{$product.p_name}</a>
                    </td>
                    <td class="text-right" style="padding-top: 25px;">{$product.p_price|number_format}</td>
                    <td class="text-center" style="padding-top: 25px; border: 0">
                        <button type="button" onclick="delete_wishlist({$product.product_id})" title="Loại bỏ" class="btn btn-danger btn-xs"><i class="fa fa-times"></i></button>
                    </td>
                </tr>
            {/foreach}
            </tbody>
        </table>
    </li>
{else}
    <li class="text-center" style="width: 125px;line-height: 30px;padding: 0 5px;">Danh sách trống</li>
{/if}