<?php /* Smarty version 2.6.13, created on 2018-01-19 08:03:06
         compiled from product_detail.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'number_format', 'product_detail.tpl', 51, false),)), $this); ?>
<div id="form" class="product_display table-responsive" id="product_display">
    <div style="float: left; width: 900px; margin-bottom: 10px;">
        <h4 class="bold_center">
            <?php if ($this->_tpl_vars['product']['category_name'] == "Điện thoại"): ?>
                <span class="glyphicon glyphicon-phone" style="color: #555555"></span>&nbsp;
            <?php endif; ?>
            <?php if ($this->_tpl_vars['product']['category_name'] == "Phụ kiện"): ?>
                <span class="glyphicon glyphicon-headphones" style="color: #555555"></span>&nbsp;
            <?php endif; ?>
            <?php echo $this->_tpl_vars['product']['p_name']; ?>

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
            <td style="padding-left: 50px;"><?php echo $this->_tpl_vars['product']['p_description']; ?>
</td>
        </tr>
        <tr>
            <td style="padding-left: 50px;width: 210px;">
                <img src="style\images\icon-content1.png">&nbsp;
                <label>Đánh giá chi tiết</label>
            </td>
            <td style="padding-left: 50px;">
                <div id="p_content" style="height: 60px; overflow: hidden;">
                    <?php if ($this->_tpl_vars['product']['p_content'] == ""): ?>
                        <span style="color: #888888">Chưa có đánh giá chi tiết</span>
                    <?php else: ?>
                        <?php echo $this->_tpl_vars['product']['p_content']; ?>

                    <?php endif; ?>
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
                <?php if ($this->_tpl_vars['product']['p_old_price'] == ""): ?>
                    Chưa thay đổi giá lần nào
                <?php else: ?>
                    <?php echo ((is_array($_tmp=$this->_tpl_vars['product']['p_old_price'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>

                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <td style="padding-left: 50px;width: 210px;">
                <img src="style\images\icon-price1.png">&nbsp;
                <label>Giá mới</label>
            </td>
            <td style="padding-left: 50px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['product']['p_price'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
</td>
        </tr>
        <tr>
            <td style="padding-left: 50px;width: 210px;">
                <img src="style\images\icon-star1.png">&nbsp;
                <label>Sản phẩm nổi bật</label>
            </td>
            <td style="padding-left: 50px;">
                <?php if ($this->_tpl_vars['product']['is_hot_product'] == 0): ?>
                    <img width="25px" src="style\images\icon-uncheck1.png">
                <?php else: ?>
                    <img width="22px" src="style\images\icon-check1.png">
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <td style="padding-left: 50px;width: 210px;">
                <img src="style\images\icon-status1.png">&nbsp;
                <label>Còn kinh doanh</label>
            </td>
            <td style="padding-left: 50px;">
                <?php if ($this->_tpl_vars['product']['status'] == 0): ?>
                    <img width="25px" src="style\images\icon-uncheck1.png">
                <?php else: ?>
                    <img width="22px" src="style\images\icon-check1.png">
                <?php endif; ?>
            </td>
        </tr>
    </table>
</div>
<div id="form" class="product_edit">
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
                        <?php $_from = $this->_tpl_vars['listCategory']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['category']):
?>
                            <option value="<?php echo $this->_tpl_vars['category']['category_id']; ?>
" <?php if ($this->_tpl_vars['category']['category_id'] == $this->_tpl_vars['product']['category_id']): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['category']['category_name']; ?>
</option>
                        <?php endforeach; endif; unset($_from); ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Hãng sản xuất</td>
                <td>
                    <select class="form-control" name="manufacturer">
                        <?php $_from = $this->_tpl_vars['listManufacturer']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['manufacturer']):
?>
                            <option value="<?php echo $this->_tpl_vars['manufacturer']['manufacturer_id']; ?>
" <?php if ($this->_tpl_vars['manufacturer']['manufacturer_id'] == $this->_tpl_vars['product']['manufacturer_id']): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['manufacturer']['m_name']; ?>
</option>
                        <?php endforeach; endif; unset($_from); ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tên sản phẩm</td>
                <td>
                    <input type="text" name="p_name" value="<?php echo $this->_tpl_vars['product']['p_name']; ?>
" class="form-control" placeholder="Nhập tên sản phẩm..." required>
                </td>
            </tr>
            <tr>
                <td>Mô tả</td>
                <td>
                    <textarea name="p_description" class="form-control" placeholder="Mô tả ngắn về sản phẩm..." required><?php echo $this->_tpl_vars['product']['p_description']; ?>
</textarea>
                </td>
            </tr>
            <tr>
                <td>Đánh giá chi tiết</td>
                <td>
                    <textarea name="p_content" class="tinymce"><?php echo $this->_tpl_vars['product']['p_content']; ?>
</textarea>
                </td>
            </tr>
            <tr>
                <td>Giá</td>
                <td>
                    <input type="number" name="p_price" value="<?php echo $this->_tpl_vars['product']['p_price']; ?>
" class="form-control" placeholder="Nhập giá..." step="10000" min="0" max="100000000" required>
                </td>
            </tr>
            <tr>
                <td>Ưu tiên hiển thị</td>
                <td style="text-align: left"><input type="checkbox" <?php if ($this->_tpl_vars['product']['is_hot_product'] == 1): ?>checked<?php endif; ?> name="isHotProduct" style="width: 25px; height: 25px;"></td>
            </tr>
            <tr>
                <td>Tình trạng (còn kinh doanh)</td>
                <td style="text-align: left"><input type="checkbox" <?php if ($this->_tpl_vars['product']['status'] == 1): ?>checked<?php endif; ?> name="status" style="width: 25px; height: 25px;"></td>
            </tr>
            <tr style="height: 50px;">
                <td colspan="2">
                    <input type="button" value="Lưu" class="btn btn-success" onclick="editProduct()">
                    <input type="hidden" value="<?php echo $this->_tpl_vars['product']['product_id']; ?>
" name="id">
                    <input type="hidden" value="<?php echo $this->_tpl_vars['product']['p_price']; ?>
" name="p_price_default">
                    <input type="reset" class="btn btn-danger" value="Huỷ" onclick="editToggle()">
                </td>
            </tr>
        </table>
    </form>
</div>
<div class="line"></div>
<?php if ($this->_tpl_vars['product']['category_name'] == "Điện thoại"): ?>
<div id="form" class="list_img">
    <h4 style="text-align: center; font-weight: bold">Danh sách tính năng nổi bật</h4>
    <div style="height: 18px; margin-top: -10px; width: 100%">
        <div id="BoxFeaturesError" style="padding-left: 130px; color: red; width: 420px; margin: auto">
            <img src="style\images\icon-error.png" width="18px">&nbsp;<i id="editFeaturesError"></i>
        </div>
        <div id="BoxFeaturesSuccess" style="padding-left: 130px; color: green; width: 420px; margin: auto">
            <img src="style\images\icon-check1.png" width="16px">&nbsp;<i id="editFeaturesSuccess">Sửa thành công</i>
        </div>
    </div>
    <form id="frmEditFeatures" method="post" action="">
        <div style="float: left; width: 50%; padding-left: 150px;">
            <?php $_from = $this->_tpl_vars['allFeatures']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['features']):
?>
                <?php if ($this->_tpl_vars['k']%2 == 0): ?>
                    <label class="checkbox">
                        <input type="checkbox" name="features_<?php echo $this->_tpl_vars['features']['features_id']; ?>
" <?php if (in_array ( $this->_tpl_vars['features']['features_id'] , $this->_tpl_vars['listFeatures'] )): ?>checked<?php endif; ?> value="<?php echo $this->_tpl_vars['features']['features_id']; ?>
">
                        <?php echo $this->_tpl_vars['features']['f_name']; ?>

                    </label>
                <?php endif; ?>
            <?php endforeach; endif; unset($_from); ?>
        </div>
        <div style="float: left; width: 50%; padding-left: 150px;">
            <?php $_from = $this->_tpl_vars['allFeatures']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['features']):
?>
                <?php if ($this->_tpl_vars['k']%2 != 0): ?>
                    <label class="checkbox">
                        <input type="checkbox" name="features_<?php echo $this->_tpl_vars['features']['features_id']; ?>
" <?php if (in_array ( $this->_tpl_vars['features']['features_id'] , $this->_tpl_vars['listFeatures'] )): ?>checked<?php endif; ?> value="<?php echo $this->_tpl_vars['features']['features_id']; ?>
">
                        <?php echo $this->_tpl_vars['features']['f_name']; ?>

                    </label>
                <?php endif; ?>
            <?php endforeach; endif; unset($_from); ?>
        </div>
        <div style="clear: both; text-align: center">
            <input type="button" value="Lưu" class="btn btn-success" onclick="editListFeatures()">
            <input type="hidden" value="<?php echo $this->_tpl_vars['product']['product_id']; ?>
" name="product_id">
        </div>
    </form>
</div>
<div class="line"></div>
<?php endif; ?>
<div id="form" class="list_img">
    <h4 style="text-align: center; font-weight: bold">Hình ảnh</h4>
    <div style="height: 18px; margin-top: -10px; width: 100%">
        <div id="BoxImageError" style="padding-left: 130px; color: red; width: 420px; margin: auto">
            <img src="style\images\icon-error.png" width="18px">&nbsp;<i id="editImageError"></i>
        </div>
        <div id="BoxImageSuccess" style="padding-left: 130px; color: green; width: 420px; margin: auto">
            <img src="style\images\icon-check1.png" width="16px">&nbsp;<i id="editImageSuccess">Sửa thành công</i>
        </div>
    </div>
    <div style="margin-top: 5px" id="list_image_to_edit">
        <form id="frmEditImages" method="post" action="" enctype="multipart/form-data">
            <table style="width: 70%; margin: auto;">
                <tr style="height: 120px">
                    <?php $_from = $this->_tpl_vars['listImages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['img']):
?>
                        <td>
                            <div style="width: 132px; height: 132px;padding-left: 30px">
                                <img width="130px;" src="<?php echo $this->_tpl_vars['img']['img_link_300']; ?>
" title="click để đổi ảnh" class="img_for_product_detail" onclick="edit_img_product_detail(<?php echo $this->_tpl_vars['k']; ?>
)"/>
                                <input type="file" name="img_<?php echo $this->_tpl_vars['k']; ?>
" id="img_<?php echo $this->_tpl_vars['k']; ?>
" onclick="set_link_id(<?php echo $this->_tpl_vars['img']['link_id']; ?>
,<?php echo $this->_tpl_vars['k']; ?>
)"  style="display: none">
                            </div>
                        </td>
                    <?php endforeach; endif; unset($_from); ?>
                </tr>
                <tr>
                    <td colspan="4" style="text-align: center; height: 60px">
                        <input type="hidden" id="link_id" name="link_id">                        <input type="hidden" id="input_name" name="input_name">                    </td>
                </tr>
            </table>
        </form>
    </div>
    <div id="editImgIsSuccess" style="display: none"></div>
</div>