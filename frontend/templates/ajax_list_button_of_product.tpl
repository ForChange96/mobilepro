<li>
    <a href="chi-tiet-san-pham-{$product.product_id}={$product.p_name_remove_unicode}"
       class="link-wishlist" data-toggle="tooltip"
       title=" Xem chi tiết"><i class="fa fa-eye"></i></a>
</li>
<li>
    <button class="link-wishlist" type="button"
            data-toggle="tooltip" title="Thêm so sánh"
            onclick="javascript: void (0)">
        <i class="fa fa-retweet"></i>
    </button>
</li>
{if isset($product.isFavorite) && $product.isFavorite==1}
    <li style="background: #ffcba8" id="favorite_li">
        <button type="button" data-toggle="tooltip" title="Xoá Yêu thích"
                onclick="delete_wishlist({$product.product_id});reload_list_button_of_product({$product.product_id});">
            <i class="fa fa-heart" style="color: red" id="favorite_icon"></i>
        </button>
    </li>
{else}
    <li>
        <button type="button" data-toggle="tooltip" title="Thêm Yêu thích"
                onclick="add_wishlist({$product.product_id}); reload_list_button_of_product({$product.product_id});">
            <i class="fa fa-heart"></i>
        </button>
    </li>
{/if}