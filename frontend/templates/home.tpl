<div class="container">
    <div class="row">
        <div id="content" class="col-sm-12">
            <div class="content_top page_panel">
                <div class="position-display">
                    <div class="h2-arviel-title">
                        <h3>SẢN PHẨM NỔI BẬT</h3>
                    </div>
                    <div class="row">
                        {**** list sản phẩm ****}
                        {foreach from=$listProduct item=product}
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="row category_product">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="t-all-product-info">
                                        <div class="p-sign">Mới</div>
                                        <div class="t-product-img">
                                            <a href="?mod=product&act=detail&id={$product.product_id}">
                                                <img src="{$product.img_link_350}"
                                                     alt="{$product.p_name}"
                                                     title="{$product.p_name}" class="img-responsive"/>
                                            </a>
                                        </div>
                                        <div class="tab-p-info">
                                            <a href="product_detail">{$product.p_name}</a>
                                            <div class="price_product">
                                                <span class="price-new">{$product.p_price|number_format} VNĐ</span>
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
                                                <button type="button" onclick="add_cart({$product.product_id})" class="button btn-cart">
                                                    <span><i class="fa fa-shopping-cart"></i> Thêm vào giỏ</span>
                                                </button>
                                                <ul class="add-to-links">
                                                    <li>
                                                        <a href="?mod=product&act=detail&id={$product.product_id}"
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
                                                                    onclick="delete_wishlist({$product.product_id})">
                                                                <i class="fa fa-heart" style="color: red" id="favorite_icon"></i>
                                                            </button>
                                                        </li>
                                                    {else}
                                                        <li>
                                                            <button type="button" data-toggle="tooltip" title="Thêm Yêu thích"
                                                                    onclick="{if isset($smarty.session.customer)} add_wishlist({$product.product_id}) {else} login_and_add_wishlist({$product.product_id}) {/if}">
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
                    </div>
                    <div id="banner_page_0" class="banner_page">
                        <ul>
                            <li class="item b-stripe oll">
                                <a href="?mod=product&act=show_by_category&id=2">
                                    <img src="catalog\view\images\qc2-2-758x399.jpg"
                                         alt="quảng cáo 1" class="img-responsive"/>
                                </a>
                                <!--<div class="name_banner"><a href="#">quảng cáo 1</a></div>-->
                            </li>
                            <li class="item b-stripe event">
                                <a href="?mod=product&act=show_by_category&id=1">
                                    <img src="catalog\view\images\qc2-1-758x399.jpg"
                                         alt="quảng cáo 2" class="img-responsive"/>
                                </a>
                                <!--<div class="name_banner"><a href="#">quảng cáo 2</a></div>-->
                            </li>
                        </ul>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>