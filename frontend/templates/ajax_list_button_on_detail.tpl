<li><button type="button" data-toggle="tooltip" class="link-wishlist" title="Thêm so sánh" onclick=""><i class="fa fa-retweet"></i></button></li>
{if $product.isFavorite==1}
    <li style="background: #ffcba8; width: 39px;">
        <button type="button" data-toggle="tooltip" class="link-wishlist" title="Xoá Yêu thích" onclick="delete_wishlist({$product.product_id})">
            <i class="fa fa-heart" style="color: red"></i>
        </button>
    </li>
{else}
    <li>
        <button type="button" data-toggle="tooltip" class="link-wishlist" title="Thêm Yêu thích" onclick="{if isset($smarty.session.customer)} add_wishlist({$product.product_id}) {else} login_and_add_wishlist({$product.product_id}) {/if}">
            <i class="fa fa-heart-o"></i>
        </button>
    </li>
{/if}