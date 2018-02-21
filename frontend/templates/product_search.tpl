<div class="container">
    <div class="row">
        <div id="content" class="col-sm-12 category_page search_page other_page">
            <div id="tool_search_bar">
                <div class="position-display"></div>
                <form method="post" action="" id="frm_search">
                    <label class="control-label" for="input-search">Nhập nội dung để tìm</label>
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-sm-4">
                            <input type="text" name="txt_search" value="{$txt_search}" placeholder="Từ khóa" id="input-search" class="form-control" />
                        </div>
                        <div class="col-sm-3">
                            <select name="category" class="form-control">
                                <option value="0">Tất cả danh mục</option>
                                {foreach from=$listCategory item=category}
                                    <option value="{$category.category_id}">{$category.category_name}</option>
                                {/foreach}
                            </select>
                        </div>
                        <div class="col-sm-5">
                            <div class="col-sm-1 col-sm-offset-1 line-height34">Giá:</div>
                            <div class="col-sm-10">
                                <div class="col-sm-5">
                                    <input type="number" min="0" max="100" step="1" value="0" name="price_from" data-toggle="tooltip" title="Đơn vị: Triệu đồng" class="form-control">
                                </div>
                                <div class="col-sm-1 text-center line-height34">-</div>
                                <div class="col-sm-5">
                                    <input type="number" min="0" max="50" step="1" value="50" name="price_to" data-toggle="tooltip" title="Đơn vị: Triệu đồng" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="button" value="Tìm kiếm" onclick="search()" class="btn btn-primary" />
                    <input type="hidden" name="limit" value="15" id="limit">
                    <input type="hidden" name="display_type" value="grid" id="display_type">
                    <input type="hidden" name="order_by" value="ORDER BY is_hot_product DESC, p_price DESC" id="order_by">
                </form>
            </div>
            <h3 class="text_search_title" style="color:#ed703a">Kết quả:</h3>
            <div class="page-selector">
                <div class="shop-grid-controls">
                    <div class="entry hidden-md hidden-sm hidden-xs">
                        <div class="inline-text">Sắp xếp theo:</div>
                        <div class="simple-drop-down">
                            <select id="input-sort-search">
                                <option value="ORDER BY is_hot_product DESC, p_price DESC" selected="selected">Mặc định</option>
                                <option value="ORDER BY p_name ASC">Tên (A - Z)</option>
                                <option value="ORDER BY p_name DESC">Tên (Z - A)</option>
                                <option value="ORDER BY p_price ASC">Giá (Thấp &gt; Cao)</option>
                                <option value="ORDER BY p_price DESC">Giá (Cao &gt; Thấp)</option>
                                <option value="ORDER BY num_star DESC">Đánh giá (Cao nhất)</option>
                                <option value="ORDER BY num_star ASC">Đánh giá (Thấp nhất)</option>
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
                            <select id="input-limit-search">
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
            </div>
            <div class="row">
                <div class="col-sm-6 text-left"></div>
            </div>
            <div class="position-display">
            </div>
        </div>
    </div>
</div>