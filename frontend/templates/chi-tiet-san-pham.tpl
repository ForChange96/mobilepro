<div class="container">
    <div class="row">
        <div id="content" class="col-sm-12 other_page" style="margin-bottom: 30px;">
            <div class="allert"></div>
            <div class="position-display">
            </div>
            <div class="row">
                <div class="col-sm-5">
                    <div class="product-view">
                        <div class="full-product-img">
                            <div class="tab-content">
                                {foreach from=$list_img key=k item=img}
                                    {if $k==0}
                                        <div id="home" class="tab-pane fade in active">
                                            <div class="simpleLens-big-image-container">
                                                <a class="simpleLens-lens-image" data-lens-image="{$img.img_link_700}">
                                                    <img alt="{$product.p_name}" src="{$img.img_link_500}" class="simpleLens-big-image">
                                                </a>
                                            </div>
                                        </div>
                                    {else}
                                        <div id="menu{$k}" class="tab-pane fade">
                                            <div class="simpleLens-big-image-container">
                                                <a class="simpleLens-lens-image" data-lens-image="{$img.img_link_700}">
                                                    <img alt="{$product.p_name}" src="{$img.img_link_500}" class="simpleLens-big-image">
                                                </a>
                                            </div>
                                        </div>
                                    {/if}
                                {/foreach}
                            </div>
                        </div>
                        <div class="small-products">
                            <ul class="nav nav-tabs">
                                {foreach from=$list_img key=k item=img}
                                    {if $k==0}
                                        <li class="active"><a data-toggle="tab" href="#home">
                                                <img src="{$img.img_link_500}" alt="{$product.p_name}">
                                            </a>
                                        </li>
                                    {else}
                                        <li><a data-toggle="tab" href="#menu{$k}">
                                                <img src="{$img.img_link_500}" alt="{$product.p_name}">
                                            </a>
                                        </li>
                                    {/if}
                                {/foreach}
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-7 product_details">
                    <h1>{$product.p_name}</h1>
                    <ul class="list-unstyled" style="color: #666666">
                        <li><b>Danh mục</b>: {$product.category}</li>
                        <li><b>Hãng sản xuất</b>: {$product.manufacturer}</li>
                        {if isset($product.p_old_price)}
                            <li>
                                <span style="text-decoration: line-through;">{$product.p_old_price|number_format} VNĐ</span>
                            </li>
                        {/if}
                    </ul>
                    <ul class="list-unstyled">
                        <li>
                            <h2 class="new_price_details">{$product.p_price|number_format} VNĐ</h2>
                        </li>
                    </ul>
                    <div id="product">
                        <div class="product_details_cart">
                            <div class="product-quantity">
                                <div class="numbers-row">
                                    <input type="text" name="quantity" value="1" id="input-quantity" />
                                    <input type="hidden" name="product_id" value="19" />
                                </div>
                                <div class="fv-comp-button">
                                    <ul class="add-to-links">
                                        <li><button type="button" data-toggle="tooltip" class="link-wishlist" title="Thêm so sánh" onclick=""><i class="fa fa-retweet"></i></button></li>
                                        {if $isFavorite==1}
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
                                    </ul>
                                </div>
                            </div>
                            <div class="single-poraduct-botton">
                                <button type="button" id="button-cart" data-loading-text="Đang Xử lý..." class="button btn-cart shopng-btn" onclick="add_cart_with_number({$product.product_id})">Thêm vào giỏ</button>
                            </div>
                        </div>
                    </div>
                    <div class="rating">
                        <p>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                        </p>
                        <hr>
                        <!-- AddThis Button BEGIN -->
                        <div class="addthis_toolbox addthis_default_style"><a class="addthis_button_facebook_like" fb:like:layout="button_count"></a> <a class="addthis_button_tweet"></a> <a class="addthis_button_pinterest_pinit"></a> <a class="addthis_counter addthis_pill_style"></a></div>
                        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-515eeaf54693130e"></script>
                        <!-- AddThis Button END -->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 product_info">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab-review" data-toggle="tab">Đánh giá chi tiết</a></li>
                        <li><a href="#tab-description" data-toggle="tab">Mô tả</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane" id="tab-description">
                            {if $product.p_description==""}
                                <i style="color: #777777">Nội dung đang được cập nhật...</i>
                            {else}
                                {$product.p_description}
                            {/if}
                        </div>
                        <div class="tab-pane active" id="tab-review">
                            {if $product.p_content==""}
                                <i style="color: #777777">Nội dung đang được cập nhật...</i>
                            {else}
                                {$product.p_content}
                            {/if}
                        </div>
                    </div>
                </div>
            </div>
            <div class="position-display"></div>
        </div>
    </div>
</div>