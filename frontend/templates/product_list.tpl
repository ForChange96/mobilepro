<div class="container">
    <div class="row">
        <div id="column-left" class="col-sm-3 col-md-3 col-lg-3 col-xs-12">
            <div class="cate_panel">Danh Mục</div>
            <div class="list-group cate_ul" id="list_category">
                {foreach from=$listCategory item=category}
                    <a href="javascript: void (0)" onclick="load_list_product({$category.category_id})" class="list-group-item {if $smarty.get.id==$category.category_id}active{/if}">{$category.category_name}</a>
                {/foreach}
            </div>
            <input type="hidden" value="{$smarty.get.id}" id="category_selected">
        </div>
        <div id="content" class="col-sm-9 category_page other_page">
            <div class="position-display">
            </div>
            <div class="page-selector">
                <div class="shop-grid-controls">
                    <div class="entry hidden-md hidden-sm hidden-xs">
                        <div class="inline-text">Sắp xếp:</div>
                        <div class="simple-drop-down">
                            <select id="input-sort" onchange="changeFilter()">
                                <option value="default" selected="selected">Mặc định</option>
                                <option value="p_name1">Tên (A - Z)</option>
                                <option value="p_name2">Tên (Z - A)</option>
                                <option value="p_price1">Giá (Thấp &gt; Cao)</option>
                                <option value="p_price2">Giá (Cao &gt; Thấp)</option>
                                <option value="num_star1">Đánh giá (Cao nhất)</option>
                                <option value="num_star2">Đánh giá (Thấp nhất)</option>
                            </select>
                        </div>
                    </div>
                    <div class="entry hidden-md hidden-sm hidden-xs">
                        <button type="button" id="list-view" class="view-button list" data-toggle="tooltip" title="Danh sách"><i class="fa fa-list"></i></button>
                        <button type="button" id="grid-view" class="view-button grid active" data-toggle="tooltip" title="Lưới"><i class="fa fa-th"></i></button>
                    </div>
                    <div class="entry">
                        <div class="inline-text">Hiển thị:</div>
                        <div class="simple-drop-down" style="width: 75px;">
                            <select id="input-limit" onchange="changeFilter()">
                                <option value="15" selected="selected">15</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="75">75</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                        <div class="inline-text">Trang</div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            <br />
            <div class="row" id="list_product">
                {foreach from=$listProduct item=product}
                <div class="product-layout product-grid col-lg-4 col-md-4 col-sm-6 col-xs-12">
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
                                    <div class="description" style="color: #555555">{$product.p_description}</div>
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
            </div>
            <div class="row">
                <div class="col-sm-6 text-left"></div>
            </div>
            <div class="position-display">
            </div>
        </div>
    </div>
</div>