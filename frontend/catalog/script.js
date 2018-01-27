

$(document).ready(function () {
    $("#search").hide();
    $("#show_login").click(function () {
        $("#login-modal").modal();
    });
})
function search_toggle() {
    $("#search").toggle(20);
}
function login() {
    $.ajax({
        type: "POST",
        url: "?mod=home&act=login",
        data: jQuery("#form_login").serialize(),
        dataType: "json",
        success: function (data) {
            if (parseInt(data.ok)==1){
                if (!!$.cookie('favorite')) {
                    var product_id= $.cookie("favorite");
                    add_wishlist(product_id);
                    $.removeCookie("favorite");
                }
                $("#login-modal").toggle();
                $("#login_success").modal();
            }
            else {
                $("#check_login").html("Sai username hoặc password");
            }
        }
    })
}

function check_empty_username() {
    if ($("#username_login").val()==""){
        $("#username_login").css("border","1px solid red");
    }
    else {
        $("#username_login").css("border","1px solid #d9d9d9");
    }
}

function check_empty_password() {
    if ($("#password_login").val()==""){
        $("#password_login").css("border","1px solid red");
    }
    else{
        $("#password_login").css("border","1px solid #d9d9d9")
    }
}

function clear_err(input_id) {    //Khi click vào ô input, reset thông báo lỗi, reset border của ô input tương ứng
    $("#check_login").html("");
    $(input_id).css("border","1px solid #d9d9d9");
}

function check_username() {
    var username=$("#input-username").val();
    if (username==""){
        $("#input-username").css("border","1px solid #ccc");
    }
    else{
        var strData="username="+username;
        $.ajax({
            type: "POST",
            url: "?mod=dangky&act=check_username",
            data: strData,
            dataType: "json",
            success: function (data) {
                if (parseInt(data.ok)==1){
                    $("#input-username").css("border","1px solid #8ae48a");
                    $("#err_signup").html("");
                }
                else {
                    $("#input-username").css("border","1px solid #fb060680");
                    $("#err_signup").html("Tên tài khoản bị trùng, vui lòng nhập tên khác");
                }
            }
        });
    }
}

function check_email() {
    var email=$("#input-email").val();
    if(email==""){
        $("#input-email").css("border","1px solid #ccc");
    }
    else{
        var strData="email="+email;
        $.ajax({
            type: "POST",
            url: "?mod=dangky&act=check_email",
            data: strData,
            dataType: "json",
            success: function (data) {
                if (parseInt(data.ok)==1){
                    $("#input-email").css("border","1px solid #8ae48a");
                    $("#err_signup").html("");
                }
                else if (parseInt(data.ok)==2){
                    $("#input-email").css("border","1px solid #fb060680");
                    $("#err_signup").html("Email không đúng định dạng!");
                }
                else {
                    $("#input-email").css("border","1px solid #fb060680");
                    $("#err_signup").html("Email này đã có người sử dụng!");
                }
            }
        });
    }
}
 function confirm_password() {
     var pass_1=$("#input-password").val();
     var pass_2=$("#input-confirm").val();
     if (pass_1!=pass_2){
         $("#input-confirm").css("border","1px solid #fb060680");
         $("#err_signup").html("Mật khẩu xác nhận không khớp");
     }
     else{
         $("#input-confirm").css("border","1px solid #ccc");
         if ($("#err_signup").html()=="Mật khẩu xác nhận không khớp"){
             $("#err_signup").html("");
         }
     }
 }
 function confirm_password2() {
     var pass_2=$("#input-confirm").val();
     if (pass_2!=""){
         var pass_1=$("#input-password").val();
         if (pass_1==pass_2){
             $("#input-confirm").css("border","1px solid #ccc");
             if ($("#err_signup").html()=="Mật khẩu xác nhận không khớp"){
                 $("#err_signup").html("");
             }
         }
         else {
             $("#input-confirm").css("border","1px solid #fb060680");
             $("#err_signup").html("Mật khẩu xác nhận không khớp");
         }
     }
 }

 function sign_up() {
     $.ajax({
         type: "POST",
         url: "?mod=dangky&act=signup",
         data: jQuery("#form_signup").serialize(),
         dataType: "json",
         success: function (data) {
             if(parseInt(data.ok)==1){
                 $("#sign_up_success").modal();
             }
             else if (parseInt(data.ok)==2){
                 $("#input-confirm").css("border","1px solid #fb060680");
                 $("#err_signup").html("Mật khẩu xác nhận không khớp");
             }
             else {
                 $("#sign_up_error").modal();
             }
         }
     })
 }

 function add_wishlist(product_id) {
    var strData="id="+product_id;
     $.ajax({
         type: "POST",
         url: "?mod=product&act=add_wishlist",
         data: strData,
         dataType: "json",
         success: function (data) {
            if(parseInt(data.ok)==1){
                location.reload();
            }
            else {
                alert("Có vẻ như sản phẩm này đã nằm trong danh sách yêu thích");
            }
         }
     })
 }

 function login_and_add_wishlist(product_id) {
     $.cookie("favorite", product_id);
     $("#login-modal").modal();
 }

 function delete_wishlist(product_id) {
    var strData="id="+product_id;
     $.ajax({
         type: "POST",
         url: "?mod=product&act=delete_wishlist",
         data: strData,
         dataType: "json",
         success: function (data) {
             if (parseInt(data.ok)==1){
                 location.reload();
             }
             else {
                 alert("Xảy ra lỗi");
             }
         }
     })
 }

 function add_cart(product_id) {
    var strData="id="+product_id;
     $.ajax({
         type: "POST",
         url: "?mod=product&act=add_cart",
         data: strData,
         dataType: "json",
         success: function () {
             location.reload();
         }
     })
 }

 function remove_from_cart(product_id) {
     var strData="id="+product_id;
     $.ajax({
         type: "POST",
         url: "?mod=product&act=remove_from_cart",
         data: strData,
         dataType: "json",
         success: function () {
             $("#cart").html($.get("?mod=product&act=reload_cart"));
         }
     })
 }