/**
 * Created by JetBrains PhpStorm.
 * User: MT844
 * Date: 3/28/12
 * Time: 3:25 PM
 * To change this template use File | Settings | File Templates.
 */
$(document).ready(function () {
    $("#alertBox").hide();
    $("#BoxFeaturesError").hide();
    $("#BoxFeaturesSuccess").hide();
    $("#BoxImageError").hide();
    $("#BoxImageSuccess").hide();
    $(".product_edit").hide();

    if ($("#show_tool_search").html()=="search_name"){
        $("#div_search_with_name").show();
        $("#div_search_with_date").hide();
    }
    if ($("#show_tool_search").html()=="search_date"){
        $("#div_search_with_name").hide();
        $("#div_search_with_date").show();
    }
    if ($("#show_tool_search").html()==""){
        $("#div_search_with_name").hide();
        $("#div_search_with_date").hide();
    }


    $("#edit_product").click(function () {
        $(".product_edit").slideToggle(500);
    });
    $("#search_with_name_select").click(function () {
        $("#div_search_with_date").hide();
        $("#div_search_with_name").show();
        $("#search_title").html('Tìm theo tên khách hàng');
    });
    $("#search_with_date_select").click(function () {
        $("#div_search_with_name").hide();
        $("#div_search_with_date").show();
        $("#search_title").html('Tìm theo ngày giao hàng');
    });
    $("#btn_show_p_content").click(function () {
        if ($("#p_content").css("height")=="60px"){
            $("#p_content").css("height","300px");
            $("#icon_show_hide").attr("class","glyphicon glyphicon-triangle-top");
        }
        else {
            $("#p_content").css("height","60px");
            $("#icon_show_hide").attr("class","glyphicon glyphicon-triangle-bottom");
        }
        if($("#p_content").css("overflow")=="hidden"){
            $("#p_content").css("overflow","scroll");
        }
        else {
            $("#p_content").css("overflow","hidden");
        }
    });
    $("#btn_order_confirm").click(function () {
        $("#modal_order_confirm").modal();
    })
    /*$("#errImg1").hide();
    $("#errImg2").hide();
    $("#errImg3").hide();
    $("#errImg4").hide();

    $('input[name=img1]').change(function(ev) {
        $.ajax({
            type: "POST",
            url: "?mod=product&act=checkImage",
            data: jQuery('#frmAddProduct').serialize(),
            dataType: "json",
            success: function(data){
                if(parseInt(data.ok)!=1){
                    $("#errImg1").show();
                }
            }
        });
    });*/
    //********* Edit product_image ***********
    var i=0;
    for(;i<=4; i++){
        var input_id="#img_"+i;
        $(input_id).change(function(){
            var file_data = this.files[0];
            var formData = new FormData();
            formData.append("file", file_data);
            formData.append("link_id", $("#link_id").val());
            $.ajax({
                type: "POST",
                url: "?mod=product&act=editImage",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                dataType: "json",
                success: function (data) {
                    if (parseInt(data.ok)==1){
                        location.reload();
                    }
                    else {
                        $("#BoxImageError").fadeIn(500);
                        $("#editImageError").html(data.error);
                        $("#BoxImageError").fadeOut(3000);
                    }
                }
            })
        });
    }
    //********* End edit product_image ***********
})

$(function()
{
    $(".checkall").click(function(){
        var checked_status = this.checked;
        $("input[name=checkone]").each(function()
        {
            this.checked = checked_status;
        });
    });
    
    /************************* User ***********************************************/
    $("#user_edit").click(function(){
        $("input[name=checkone]").each(function()
        {
            if($(this).is(':checked')){
                str = $(this).val();
                location.href = "?mod=user&act=edit&id="+str;
            }
        });
    });
    
    $("#user_delete").click(function(){
        if (!confirm("Xóa tất cả những thành viên được chọn?")) {
            return;
        }
        else{
            $("input[name=checkone]").each(function()
            {
                if($(this).is(':checked')){
                    var valId = $(this).val();
                    var strData = "id="+valId;
                    $.ajax({
                        type: "POST",
                        url: "?mod=user&act=deleteuser",
                        data: strData
                    });
                }
            });

            location.reload();
        }
    });
    /************************* End User ***********************************************/

    /************************* Customer ***********************************************/
    $("#customer_edit").click(function(){
        $("input[name=checkone]").each(function()
        {
            if($(this).is(':checked')){
                str = $(this).val();
                document.location = "?mod=customer&act=edit&id="+str;
            }
        });
    });

    $("#customer_delete").click(function(){
        if (!confirm("Xóa tất cả những khách hàng được chọn?")) {
            return;
        }
        else{
            $("input[name=checkone]").each(function()
            {
                if($(this).is(':checked')){
                    var valId = $(this).val();
                    var strData = "id="+valId;
                    $.ajax({
                        type: "POST",
                        url: "?mod=customer&act=deleteCustomer",
                        data: strData
                    });
                }
            });
            location.reload();
        }
    });
    /************************* End Customer ***********************************************/


    /************************* Category ***********************************************/
    $("#category_edit").click(function(){
        $("input[name=checkone]").each(function()
        {
            if($(this).is(':checked')){
                str = $(this).val();
                document.location = "?mod=category&act=edit&id="+str;
            }
        });
    });

    $("#category_delete").click(function(){
        if (!confirm("Xóa tất cả những danh mục được chọn?")) {
            return;
        }
        else{
            $("input[name=checkone]").each(function()
            {
                if($(this).is(':checked')){
                    var valId = $(this).val();
                    var strData = "id="+valId;
                    $.ajax({
                        type: "POST",
                        url: "?mod=category&act=deleteCategory",
                        data: strData
                    });
                }
            });
            location.reload();
        }
    });
    /************************* End Category ***********************************************/


    /************************* Product ***********************************************/
    $("#product_edit").click(function(){
        $("input[name=checkone]").each(function()
        {
            if($(this).is(':checked')){
                str = $(this).val();
                document.location = "?mod=product&act=edit&id="+str;
            }
        });
    });

    $("#product_delete").click(function(){
        if (!confirm("Xóa tất cả những sản phẩm được chọn?")) {
            return;
        }
        else{
            $("input[name=checkone]").each(function()
            {
                if($(this).is(':checked')){
                    var valId = $(this).val();
                    var strData = "id="+valId;
                    $.ajax({
                        type: "POST",
                        url: "?mod=product&act=deleteProduct",
                        data: strData
                    });
                }
            });
            location.reload();
        }
    });
    /************************* End Product ***********************************************/

    /************************* Manufacturer ***********************************************/
    $("#manufacturer_edit").click(function(){
        $("input[name=checkone]").each(function()
        {
            if($(this).is(':checked')){
                str = $(this).val();
                document.location = "?mod=manufacturer&act=edit&id="+str;
            }
        });
    });

    $("#manufacturer_delete").click(function(){
        if (!confirm("Xóa tất cả những hãng được chọn?")) {
            return;
        }
        else{
            var result=0;
            $("input[name=checkone]").each(function()
            {
                if($(this).is(':checked')){
                    var valId = $(this).val();
                    var strData = "id="+valId;
                    $.ajax({
                        type: "POST",
                        url: "?mod=manufacturer&act=deleteManufacturer",
                        data: strData,
                        dataType: "json"
                    });
                }
            });
            location.reload();
        }
    });
    /************************* End Manufacturer ***********************************************/


    /************************* Features ***********************************************/
    $("#features_edit").click(function(){
        $("input[name=checkone]").each(function()
        {
            if($(this).is(':checked')){
                str = $(this).val();
                document.location = "?mod=features&act=edit&id="+str;
            }
        });
    });

    $("#features_delete").click(function(){
        if (!confirm("Xóa tất cả những tính năng được chọn?")) {
            return;
        }
        else{
            var result=0;
            $("input[name=checkone]").each(function()
            {
                if($(this).is(':checked')){
                    var valId = $(this).val();
                    var strData = "id="+valId;
                    $.ajax({
                        type: "POST",
                        url: "?mod=features&act=deleteFeatures",
                        data: strData,
                        dataType: "json"
                    });
                }
            });
            location.reload();
        }
    });
    /************************* End Features ***********************************************/
    
});


function goBack() {
    window.history.back();
}
    /*************User**********/

    function adduser() {
        $.ajax({
            type: "POST",
            url: "?mod=user&act=adduser",
            data: $("#frmaddUser").serialize(), // SET FORM ĐỂ GỬI DỮ LIỆU TỚI SERVER
            dataType: "json",
            success: function(data){
                if (parseInt(data.ok)==1) {
                    alert("Thêm thành công");
                    document.location = "?mod=user&act=view";
                }
                else{
                    $("#alertBox").show();
                    $("#errorAddUser").html(data.error);
                }
            }
        });
        return false;
    }

    function edituser(){
        $.ajax({
            type: "POST",
            url: "?mod=user&act=edituser",
            data: jQuery('#frmaddUser').serialize(),
            dataType: "json",
            success: function(data){
                if(parseInt(data.ok)==1){
                    alert('Sửa thành công');
                    document.location = "?mod=user&act=view";
                }else{
                    $("#alertBox").show();
                    $("#errorEditUser").html(data.error);
                }
            }
        });
    }

    function deleteuser(id) {

        if (!confirm("Bạn có chắc chắn xóa thành viên này không?")) {
            return;
        }
        else{
            var strData = "id="+id;
            $.ajax({
                type: "POST",
                url: "?mod=user&act=deleteuser",
                data: strData,
                dataType: "json",
                success: function(data){
                    if (parseInt(data.ok) == 1) {
                        location.reload();
                    }
                    else
                        alert("Loi khong xoa duoc du lieu");
                        $(".error").html(data.error);
                }
            });
        }
    }


    /***********End User*************/



    /************Customer*************/

    function addcustomer() {
        $.ajax({
            type: "POST",
            url: "?mod=customer&act=addcustomer",
            data: jQuery("#frmaddCustomer").serialize(), // SET FORM ĐỂ GỬI DỮ LIỆU TỚI SERVER
            dataType: "json",
            success: function(data){
                if (parseInt(data.ok) == 1) {
                    alert("Thêm thành công!");
                    document.location = "?mod=customer&act=view";
                }
                else {
                    $("#alertBox").show();
                    $("#errorAddCustomer").html(data.error);
                }
            }
        });
        return false;
    }

    function editcustomer(){
        $.ajax({
            type: "POST",
            url: "?mod=customer&act=editcustomer",
            data: jQuery('#frmEditCustomer').serialize(),
            dataType: "json",
            success: function(data){
                if(parseInt(data.ok)==1){
                    document.location = "?mod=customer&act=view";
                }else{
                    $("#alertBox").show();
                    $('#errorEditCustomer').html(data.error);
                }
            }
        });
        return false;
    }

    function deletecustomer(id) {

        if (!confirm("Bạn có chắc chắn xóa khách hàng này không?")) {
            return;
        }
        else {
            var strData = 'id='+id;
            $.ajax({
                type: "POST",
                url: "?mod=customer&act=deleteCustomer",
                data: strData,
                dataType: "json",
                success: function(data){
                    if (parseInt(data.ok)==1) {
                        location.reload();
                    }
                    else{
                        $('.error').html(data.error);
                    }
                }
            });
        }
    }
    /***********End Customer*************/



    /************Category*************/
    function addcategory() {
        $.ajax({
            type: "POST",
            url: "?mod=category&act=doAdd",
            data: jQuery("#frmaddCategory").serialize(),
            dataType: "json",
            success: function (data) {
                if (parseInt(data.ok)==1){
                    document.location = "?mod=category&act=view";
                }
                else {
                    $("#alertBox").show();
                    $("#errorAddCategory").html(data.error);
                }
            }
        });
        return false;
    }
    
    function editcategory() {
        $.ajax({
            type: "POST",
            url: "?mod=category&act=doEdit",
            data: jQuery("#frmEditCategory").serialize(),
            dataType: "json",
            success: function (data) {
                if(parseInt(data.ok)==1){
                    document.location="?mod=category&act=view";
                }
                else{
                    $("#alertBox").show();
                    $("#errorEditCategory").html(data.error);
                }
            }
        })
    }
    
    function deletcategory(id) {
        if (!confirm("Bạn có chắc chắn xoá danh mục này?")){
            return;
        }
        else {
            if(!confirm("Cảnh báo! Xoá mục này sẽ ảnh hưởng đến tất cả các sản phẩm liên quan!\nChắc chắn xoá?")){
                return;
            }
            else {
                var strData="id="+id;
                $.ajax({
                    type: "POST",
                    url: "?mod=category&act=deleteCategory",
                    data: strData,
                    dataType: "json",
                    success: function (data) {
                        if (parseInt(data.ok)==1){
                            location.reload();
                        }
                        else{
                            alert(data.error);
                        }
                    }
                });
            }
        }
    }
    /***********End Category*************/

    /************Manufacturer*************/
    function addManufacturer() {
        $.ajax({
            type: "POST",
            url: "?mod=manufacturer&act=doAdd",
            data: jQuery("#frmaddManufacturer").serialize(),
            dataType: "json",
            success: function (data) {
                if(parseInt(data.ok)==1){
                    document.location="?mod=manufacturer&act=view";
                }
                else{
                    $("#alertBox").show();
                    $("#errorAddManufacturer").html(data.error);
                }
            }
        });
    }
    function editManufacturer() {
        $.ajax({
            type: "POST",
            url: "?mod=manufacturer&act=doEdit",
            data: jQuery("#frmEditManufacturer").serialize(),
            dataType: "json",
            success: function (data) {
                if(parseInt(data.ok)==1){
                    document.location="?mod=manufacturer&act=view";
                }
                else{
                    $("#alertBox").show();
                    $("#errorEditManufacturer").html(data.error);
                }
            }
        });
    }
    function deleteManufacturer(id) {
        if(!confirm('Bạn có chắc chắn xoá hãng này?')){
            return;
        }
        else {
            var strData="id="+id;
            $.ajax({
                type: "POST",
                url: "?mod=manufacturer&act=deleteManufacturer",
                data: strData,
                dataType: "json",
                success: function (data) {
                    if (parseInt(data.ok)==1){
                        location.reload();
                    }
                    else{
                        alert('Xảy ra lỗi!');
                    }
                }
            });
        }
    }
    /************End Manufacturer*************/

    /************Product*************/
    function editToggle() {
        $(".product_edit").slideToggle(500);
    }
    function editProduct() {
        tinyMCE.triggerSave();
        $.ajax({
            type: "POST",
            url: "?mod=product&act=editProduct",
            data: jQuery("#frmEditProduct").serialize(),
            dataType: "json",
            success: function (data) {
                if (parseInt(data.ok)==1){
                    document.location.reload();
                }
                else {
                    $("#alertBox").show();
                    $("#errorEditProduct").html(data.error);
                }
            }
        })
    }
    function editListFeatures() {
        $.ajax({
            type: "POST",
            url: "?mod=product&act=editFeatures",
            data: jQuery("#frmEditFeatures").serialize(),
            dataType: "json",
            success: function (data) {
                if (parseInt(data.ok)==1){
                    $("#BoxFeaturesSuccess").show().delay(1000);
                    $("#BoxFeaturesSuccess").fadeOut(1500);
                }
                else {
                    $("#editFeaturesError").html(data.error);
                    $("#BoxFeaturesError").show().delay(1000);
                    $("#BoxFeaturesError").fadeOut(1500);
                }
            }
        })
    }
    function edit_img_product_detail(key) {//Khi click vào 1 ảnh, show cửa sổ chọn ảnh của ô input tương ứng
        var strKey="#img_"+key;
        $(strKey).click();
    }
    function set_link_id(id,name) {//Lấy ra id ảnh (dùng để unlink) và tên thẻ input được click
        var strName="img_"+name;
        $("#link_id").val(id);
        $("#input_name").val(strName);
    }
    function upload_img(key) {//Hàm này đc chạy khi ô input onchange()
        var id_input="#img_"+key;
        var file_data = $(id_input).prop('files');
        var formData = new FormData();
        formData.append("file", file_data);
        formData.append("link_id", $("#link_id").val());
        $.ajax({
            type: "POST",
            url: "?mod=product&act=editImage",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function (data) {
                if (parseInt(data.ok)==1){
                    $("#BoxImageSuccess").fadeIn(500);
                    $("#BoxImageSuccess").fadeOut(3000);
                }
                else {
                    $("#BoxImageError").fadeIn(500);
                    $("#editImageError").html(data.error);
                    $("#BoxImageError").fadeOut(3000);
                }
            }
        })
    }
    function deleteproduct(id) {
        if (!confirm("Bạn có chắc chắn xoá mục này?")){
            return;
        }
        else {
            var strData="id="+id;
            $.ajax({
                type: "POST",
                url: "?mod=product&act=delete",
                data: strData,
                dataType: "json",
                success: function (data) {
                    if (parseInt(data.ok)==1){
                        location.reload();
                    }
                    else{
                        alert(data.error);
                    }
                }
            });
        }
    }
    function restore_product(id) {
        if (!confirm("Chuyển sang 'còn kinh doanh'?")){
            return;
        }
        else {
            var strData="id="+id;
            $.ajax({
                type: "POST",
                url: "?mod=product&act=restore",
                data: strData,
                dataType: "json",
                success: function (data) {
                    if(parseInt(data.ok)==1){
                        document.location="?mod=product&act=view";
                    }
                    else {
                        alert(data.error);
                    }
                }
            });
        }
    }
    function show_hide_features(category_name) {
        if (category_name=="Điện thoại"){
            $("#features_add").css("color","#999999");
        }
        else {
            $("#features_add").css("color","#323232");
        }
    }
    /*function addProduct() {
        $.ajax({
            type: "POST",
            url: "?mod=product&act=doAdd",
            data: "",
            dataType: "json",
            success: function (data) {
                if (parseInt(data.ok)==1){
                    alert('Thêm thành công!');
                    document.location="?mod=product&act=view";
                }
                else{
                    $("#alertBox").show();
                    $("#errorAddProduct").html(data.error);
                }
            }
        })
    }
    function checkP_name(name) {
        var p_name="input="+name;
        $.ajax({
            type: "POST",
            url: "?mod=product&act=validateProduct",
            data: p_name,
            dataType: "json",
            success: function (data) {

            }
        })
    }*/
    /************End Product*************/

    /************End Order*************/
    function confirmOrder(order_id) {
        $("#order_id").val(order_id);
        $("#modal_order_confirm2").modal();
    }
    function deleteOrder(order_id) {
        if (!confirm('Huỷ đơn hàng này?')){
            return;
        }
        else {
            var strData="id="+order_id;
            $.ajax({
                type: "POST",
                url: "?mod=order&act=delete",
                data: strData,
                dataType: "json",
                success: function (data) {
                    if (parseInt(data.ok)==1){
                        location.reload();
                    }
                    else {
                        alert('Xảy ra lỗi!');
                    }
                }
            });
        }
    }
    /************End Order*************/

    /************Report*************/
    function deletReport(id){
        if (!confirm("Bạn có chắc chắn xoá mục này?")){
            return;
        }
        else {
            var strData="id="+id;
            $.ajax({
                type: "POST",
                url: "?mod=report&act=deleteReport",
                data: strData,
                dataType: "json",
                success: function (data) {
                    if (parseInt(data.ok)==1){
                        location.reload();
                    }
                    else{
                        alert(data.error);
                    }
                }
            });
        }
    }
    /************End Report*************/

    /************End Contact*************/
    function addcontact() {
        $.ajax({
            type: "POST",
            url: "?mod=contact&act=doAdd",
            data: jQuery("#frmaddContact").serialize(),
            dataType: "json",
            success: function (data) {
                if (parseInt(data.ok)==1){
                    document.location = "?mod=contact&act=view";
                }
                else {
                    $("#alertBox").show();
                    $("#errorAddcontact").html(data.error);
                }
            }
        });
        return false;
    }

    function editcontact() {
        $.ajax({
            type: "POST",
            url: "?mod=contact&act=doEdit",
            data: jQuery("#frmEditContact").serialize(),
            dataType: "json",
            success: function (data) {
                if(parseInt(data.ok)==1){
                    document.location="?mod=contact&act=view";
                }
                else{
                    $("#alertBox").show();
                    $("#errorEditcontact").html(data.error);
                }
            }
        })
    }
    
    function deletContact(id){
        if (!confirm("Bạn có chắc chắn xoá mục này?")){
            return;
        }
        else {
            var strData="id="+id;
            $.ajax({
                type: "POST",
                url: "?mod=contact&act=deleteContact",
                data: strData,
                dataType: "json",
                success: function (data) {
                    if (parseInt(data.ok)==1){
                        location.reload();
                    }
                    else{
                        alert(data.error);
                    }
                }
            });
        }
    }
    /************End Contact*************/

    /************End Support*************/
    function addsupport() {
        $.ajax({
            type: "POST",
            url: "?mod=support&act=doAdd",
            data: jQuery("#frmaddSupport").serialize(),
            dataType: "json",
            success: function (data) {
                if (parseInt(data.ok)==1){
                    document.location = "?mod=support&act=view";
                }
                else {
                    $("#alertBox").show();
                    $("#errorAddsupport").html(data.error);
                }
            }
        });
        return false;
    }
    
    function editsupport() {
        $.ajax({
            type: "POST",
            url: "?mod=support&act=doEdit",
            data: jQuery("#frmEditSupport").serialize(),
            dataType: "json",
            success: function (data) {
                if(parseInt(data.ok)==1){
                    document.location="?mod=support&act=view";
                }
                else{
                    $("#alertBox").show();
                    $("#errorEditsupport").html(data.error);
                }
            }
        })
    }
    
    function deleteSupport(id){
        if (!confirm("Bạn có chắc chắn xoá mục này?")){
            return;
        }
        else {
            var strData="id="+id;
            $.ajax({
                type: "POST",
                url: "?mod=support&act=deleteSupport",
                data: strData,
                dataType: "json",
                success: function (data) {
                    if (parseInt(data.ok)==1){
                        location.reload();
                    }
                    else{
                        alert(data.error);
                    }
                }
            });
        }
    }
    /************End Support*************/

    /************Features*************/
    function addfeatures() {
        $.ajax({
            type: "POST",
            url: "?mod=features&act=doAdd",
            data: jQuery("#frmaddFeatures").serialize(),
            dataType: "json",
            success: function (data) {
                if (parseInt(data.ok)==1){
                    document.location = "?mod=features&act=view";
                }
                else {
                    $("#alertBox").show();
                    $("#errorAddFeatures").html(data.error);
                }
            }
        });
        return false;
    }
    
    function editfeatures() {
        $.ajax({
            type: "POST",
            url: "?mod=features&act=doEdit",
            data: jQuery("#frmEditFeatures").serialize(),
            dataType: "json",
            success: function (data) {
                if(parseInt(data.ok)==1){
                    document.location="?mod=features&act=view";
                }
                else{
                    $("#alertBox").show();
                    $("#errorEditFeatures").html(data.error);
                }
            }
        })
    }
    
    function deletefeatures(id) {
        if (!confirm("Bạn có chắc chắn xoá mục này?")){
            return;
        }
        else {
            if(!confirm("Cảnh báo: Tính năng cũng sẽ bị gỡ bỏ trên tất cả các sản phẩm!\n\nChắc chắn xoá?")){
                return;
            }
            else {
                var strData="id="+id;
                $.ajax({
                    type: "POST",
                    url: "?mod=features&act=deleteFeatures",
                    data: strData,
                    dataType: "json",
                    success: function (data) {
                        if (parseInt(data.ok)==1){
                            location.reload();
                        }
                        else{
                            alert(data.error);
                        }
                    }
                });
            }
        }
    }
    /***********End Features*************/
