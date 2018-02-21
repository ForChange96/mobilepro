{if empty($listProduct)}
    <div style="height: 300px;">
        <h1 style="color: #888888; text-align: center; line-height: 200px">Không tìm thấy sản phẩm phù phợp</h1>
    </div>
{else}
{foreach from=$listProduct item=product}
    <div class="{$display_type}">
        <div class="row category_product">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="t-all-product-info">
                    <div class="t-product-img">
                        <a href="chi-tiet-san-pham-{$product.product_id}={$product.p_name_remove_unicode}">
                            <img src="{$product.img_link_300}" alt="{$product.p_name}" title="{$product.p_name}" class="img-responsive" />
                        </a>
                    </div>
                    <div class="tab-p-info">
                        <a href="chi-tiet-san-pham-{$product.product_id}={$product.p_name_remove_unicode}">{$product.p_name}</a>
                        <div class="description">{$product.p_description}</div>
                        <div class="price_product">
                            <span class="price-new">{$product.p_price|number_format} VNĐ</span>
                            <div class="clear"></div>
                            {if $product.p_old_price!=""}
                                <span class="price-old">{$product.p_old_price|number_format} VNĐ</span>
                            {/if}
                        </div>
                        <div class="star">
                                        <span class="fa fa-stack">
                                            {if $product.num_star>=1}
                                                <i class="fa fa-star fa-stack-2x"></i>
                                            {else}
                                                <i class="fa fa-star-o fa-stack-2x"></i>
                                            {/if}
                                        </span>
                            <span class="fa fa-stack">
                                            {if $product.num_star>=2}
                                                <i class="fa fa-star fa-stack-2x"></i>
                                            {else}
                                                <i class="fa fa-star-o fa-stack-2x"></i>
                                            {/if}
                                        </span>
                            <span class="fa fa-stack">
                                            {if $product.num_star>=3}
                                                <i class="fa fa-star fa-stack-2x"></i>
                                            {else}
                                                <i class="fa fa-star-o fa-stack-2x"></i>
                                            {/if}
                                        </span>
                            <span class="fa fa-stack">
                                            {if $product.num_star>=4}
                                                <i class="fa fa-star fa-stack-2x"></i>
                                            {else}
                                                <i class="fa fa-star-o fa-stack-2x"></i>
                                            {/if}
                                        </span>
                            <span class="fa fa-stack">
                                            {if $product.num_star>=5}
                                                <i class="fa fa-star fa-stack-2x"></i>
                                            {else}
                                                <i class="fa fa-star-o fa-stack-2x"></i>
                                            {/if}
                                        </span>
                        </div>
                        <div class="al-btns">
                            <button type="button" onclick="add_cart({$product.product_id})" class="button btn-cart"><span><i class="fa fa-shopping-cart"></i> Thêm vào giỏ</span></button>
                            <ul class="add-to-links">
                                <li><a href="chi-tiet-san-pham-{$product.product_id}={$product.p_name_remove_unicode}" class="link-wishlist" data-toggle="tooltip" title=" Xem chi tiết"><i class="fa fa-eye"></i></a></li>
                                <li>
                                    <button class="link-wishlist" type="button" data-toggle="tooltip" title="Thêm so sánh" onclick="">
                                        <i class="fa fa-retweet"></i>
                                    </button>
                                </li>
                                {if isset($product.isFavorite) && $product.isFavorite==1}
                                    <li style="background: #ffcba8">
                                        <button type="button" data-toggle="tooltip" title="Xoá Yêu thích" onclick="delete_wishlist({$product.product_id})">
                                            <i class="fa fa-heart" style="color: red"></i>
                                        </button>
                                    </li>
                                {else}
                                    <li>
                                        <button type="button" data-toggle="tooltip" title="Thêm Yêu thích" onclick="{if isset($smarty.session.customer)} add_wishlist({$product.product_id}) {else} login_and_add_wishlist({$product.product_id}) {/if}">
                                            <i class="fa fa-heart"></i>
                                        </button>
                                    </li>
                                {/if}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{/foreach}
{/if}