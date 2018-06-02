<div id="form" class="product_display table-responsive" id="product_display">
    <div style="float: left; width: 900px; margin-bottom: 10px;">
        <h4 class="bold_center">
            {if $product.category_name=="Điện thoại"}
                <span class="glyphicon glyphicon-phone" style="color: #555555"></span>&nbsp;
            {/if}
            {if $product.category_name=="Phụ kiện"}
                <span class="glyphicon glyphicon-headphones" style="color: #555555"></span>&nbsp;
            {/if}
            {$product.p_name}
        </h4>
    </div>
    <div style="width: 20px;float: right; margin-top: -10px;" class="btn">
        <span class="glyphicon glyphicon-pencil" title="Chỉnh sửa" id="edit_product"></span>
    </div>
    <table class="table" style="width: 80%; margin: auto;">
        <tr>
            <td style="padding-left: 50px;width: 210px;">
                <img src="style\images\icon-summary1.png">&nbsp;
                <label>Mô tả</label>
            </td>
            <td style="padding-left: 50px;">{$product.p_description}</td>
        </tr>
        <tr>
            <td style="padding-left: 50px;width: 210px;">
                <img src="style\images\icon-content1.png">&nbsp;
                <label>Đánh giá chi tiết</label>
            </td>
            <td style="padding-left: 50px;">
                <div id="p_content" style="height: 60px; overflow: hidden;">
                    {if $product.p_content==""}
                        <span style="color: #888888">Chưa có đánh giá chi tiết</span>
                    {else}
                        {$product.p_content}
                    {/if}
                </div>
                <div id="btn_show_p_content" class="btn">
                    <span id="icon_show_hide" class="glyphicon glyphicon-triangle-bottom"></span>
                </div>
            </td>
        </tr>
        <tr>
            <td style="padding-left: 50px;width: 210px;">
                <img src="style\images\icon-price2.png">&nbsp;
                <label>Giá cũ</label>
            </td>
            <td style="padding-left: 50px;color: #888888">
                {if $product.p_old_price==""}
                    Chưa thay đổi giá lần nào
                {else}
                    {$product.p_old_price|number_format}
                {/if}
            </td>
        </tr>
        <tr>
            <td style="padding-left: 50px;width: 210px;">
                <img src="style\images\icon-price1.png">&nbsp;
                <label>Giá mới</label>
            </td>
            <td style="padding-left: 50px;">{$product.p_price|number_format}</td>
        </tr>
        <tr>
            <td style="padding-left: 48px;width: 210px;">
                <img src="style\images\icon-star1.png">&nbsp;
                <label>Sản phẩm nổi bật</label>
            </td>
            <td style="padding-left: 50px;">
                {if $product.is_hot_product==0}
                    <img width="25px" src="style\images\icon-uncheck1.png">
                {else}
                    <img width="22px" src="style\images\icon-check1.png">
                {/if}
            </td>
        </tr>
        <tr>
            <td style="padding-left: 50px;width: 210px;">
                <img src="style\images\icon-status1.png">&nbsp;
                <label>Còn kinh doanh</label>
            </td>
            <td style="padding-left: 50px;">
                {if $product.status==0}
                    <img width="25px" src="style\images\icon-uncheck1.png">
                {else}
                    <img width="22px" src="style\images\icon-check1.png">
                {/if}
            </td>
        </tr>
    </table>
</div>
<div id="form" class="product_edit" style="display: none">
    <div class="line" style="margin-top: -20px"></div>
    <div id="alertBox">
        <i id="errorEditProduct">

        </i>
    </div>
    <h4 style="text-align: center; font-weight: bold">Sửa thông tin sản phẩm</h4>
    <form id="frmEditProduct" method="POST" class="table-responsive" enctype="multipart/form-data">
        <table id="tableAddProduct">
            <tr>
                <td style="width: 200px;">Thuộc danh mục</td>
                <td>
                    <select class="form-control" name="category">
                        {foreach from=$listCategory item=category}
                            <option value="{$category.category_id}" {if $category.category_id==$product.category_id} selected="selected"{/if}>{$category.category_name}</option>
                        {/foreach}
                    </select>
                </td>
            </tr>
            <tr>
                <td>Hãng sản xuất</td>
                <td>
                    <select class="form-control" name="manufacturer">
                        {foreach from=$listManufacturer item=manufacturer}
                            <option value="{$manufacturer.manufacturer_id}" {if $manufacturer.manufacturer_id==$product.manufacturer_id} selected="selected"{/if}>{$manufacturer.m_name}</option>
                        {/foreach}
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tên sản phẩm</td>
                <td>
                    <input type="text" name="p_name" value="{$product.p_name}" class="form-control" placeholder="Nhập tên sản phẩm..." required>
                </td>
            </tr>
            <tr>
                <td>Mô tả</td>
                <td>
                    <textarea name="p_description" class="form-control" placeholder="Mô tả ngắn về sản phẩm..." required>{$product.p_description}</textarea>
                </td>
            </tr>
            <tr>
                <td>Đánh giá chi tiết</td>
                <td>
                    <textarea name="p_content" class="tinymce">{$product.p_content}</textarea>
                </td>
            </tr>
            <tr>
                <td>Giá</td>
                <td>
                    <input type="number" name="p_price" value="{$product.p_price}" class="form-control" placeholder="Nhập giá..." step="10000" min="0" max="100000000" required>
                </td>
            </tr>
            <tr>
                <td>Ưu tiên hiển thị</td>
                <td style="text-align: left"><input type="checkbox" {if $product.is_hot_product==1}checked{/if} name="isHotProduct" style="width: 25px; height: 25px;"></td>
            </tr>
            <tr>
                <td>Tình trạng (còn kinh doanh)</td>
                <td style="text-align: left"><input type="checkbox" {if $product.status==1}checked{/if} name="status" style="width: 25px; height: 25px;"></td>
            </tr>
            <tr style="height: 50px;">
                <td colspan="2">
                    <input type="button" value="Lưu" class="btn btn-success" onclick="editProduct()">
                    <input type="hidden" value="{$product.product_id}" name="id">
                    <input type="hidden" value="{$product.p_price}" name="p_price_default">
                    <input type="reset" class="btn btn-danger" value="Huỷ" onclick="editToggle()">
                </td>
            </tr>
        </table>
    </form>
</div>
<div class="line"></div>
{if $product.category_name=="Điện thoại"}
<div id="form" class="list_img">
    <h4 style="text-align: center; font-weight: bold">Danh sách tính năng nổi bật</h4>
    <div style="height: 18px; margin-top: -10px; width: 100%">
        <div id="BoxFeaturesError" style="padding-left: 130px; color: red; width: 420px; margin: auto; display: none">
            <img src="style\images\icon-error.png" width="18px">&nbsp;<i id="editFeaturesError"></i>
        </div>
        <div id="BoxFeaturesSuccess" style="padding-left: 130px; color: green; width: 420px; margin: auto; display: none">
            <img src="style\images\icon-check1.png" width="16px">&nbsp;<i id="editFeaturesSuccess">Sửa thành công</i>
        </div>
    </div>
    <form id="frmEditFeatures" method="post" action="">
        <div style="float: left; width: 50%; padding-left: 150px;">
            {foreach from=$allFeatures key=k item="features"}
                {if $k%2==0}
                    <label class="checkbox">
                        <input type="checkbox" name="features_{$features.features_id}" {if in_array($features.features_id, $listFeatures)}checked{/if} value="{$features.features_id}">
                        {$features.f_name}
                    </label>
                {/if}
            {/foreach}
        </div>
        <div style="float: left; width: 50%; padding-left: 150px;">
            {foreach from=$allFeatures key=k item="features"}
                {if $k%2!=0}
                    <label class="checkbox">
                        <input type="checkbox" name="features_{$features.features_id}" {if in_array($features.features_id, $listFeatures)}checked{/if} value="{$features.features_id}">
                        {$features.f_name}
                    </label>
                {/if}
            {/foreach}
        </div>
        <div style="clear: both; text-align: center">
            <input type="button" value="Lưu" class="btn btn-success" onclick="editListFeatures()">
            <input type="hidden" value="{$product.product_id}" name="product_id">
        </div>
    </form>
</div>
<div class="line"></div>
{/if}
<div id="form" class="list_img">
    <h4 style="text-align: center; font-weight: bold">Hình ảnh</h4>
    <div style="height: 18px; margin-top: -10px; width: 100%">
        <div id="BoxImageError" style="padding-left: 130px; color: red; width: 420px; margin: auto;display: none">
            <img src="style\images\icon-error.png" width="18px">&nbsp;<i id="editImageError"></i>
        </div>
        <div id="BoxImageSuccess" style="padding-left: 130px; color: green; width: 420px; margin: auto; display: none">
            <img src="style\images\icon-check1.png" width="16px">&nbsp;<i id="editImageSuccess">Sửa thành công</i>
        </div>
    </div>
    <div style="margin-top: 5px" id="list_image_to_edit">
        <form id="frmEditImages" method="post" action="" enctype="multipart/form-data">
            <table style="width: 70%; margin: auto;">
                <tr style="height: 120px">
                    {foreach from=$listImages key=k item=img}
                        <td>
                            <div style="width: 132px; height: 132px;padding-left: 30px">
                                <img width="130px;" src="{$img.img_link_300}" title="click để đổi ảnh" class="img_for_product_detail" onclick="edit_img_product_detail({$k})"/>
                                <input type="file" name="img_{$k}" id="img_{$k}" onclick="set_link_id({$img.link_id},{$k})" {*onchange="upload_img({$k})"*} style="display: none">
                            </div>
                        </td>
                    {/foreach}
                </tr>
                <tr>
                    <td colspan="4" style="text-align: center; height: 60px">
                        <input type="hidden" id="link_id" name="link_id">{*Để get id của ảnh được click*}
                        <input type="hidden" id="input_name" name="input_name">{*Dùng để get name của thẻ input được click*}
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <div id="editImgIsSuccess" style="display: none"></div>
</div>