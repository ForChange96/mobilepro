

$(document).ready(function () {
    $("#search").hide();
    $("#step_5_panel").css("height", $("#step_4").height());
    $("#alert_change_cart").hide();
    $("#btn_favorite").click(function () {
        $("#favorite_content").toggle(200);
    });

    $("#show_login").click(function () {
        $("#login-modal").modal();
    });
    $("#list-view").click(function () {
        $("#display_type").val("list");
    });
    $("#grid-view").click(function () {
        $("#display_type").val("grid");
    });
    $("#cb_change_password").click(function () {
        $("#frm_change_password").toggle(500);
    });
    $("#input-limit-search").on("change",function () {
        limit=$("#input-limit-search").val();
        $("#limit").val(limit);
        search();
    });
    $("#input-sort-search").on("change",function () {
        sort=$("#input-sort-search").val();
        $("#order_by").val(sort);
        search();
    });



    $(".icon-close-modal").click(function () {
        $("#modal_order_success").toggle();
        window.location.href = "?mod=home&act=view";
    });

    /*$("#text-notification-success").html("<h4>Thêm thành công!</h4>");
    $("#notification-success").fadeIn(100).delay(1000).fadeOut(1000);*/


    //*************************
        /*$('[data-toggle="tooltip"]').tooltip({
            trigger : 'hover'
        })*/
    //**************************
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
                    $("#err_signup").html("Tên tài khoản bị trùng");
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
             else if (parseInt(data.ok)==3){
                 $("#err_signup").html("Vui lòng nhập đủ thông tin");
             }
             else {
                 $("#text-notification-error").html("<h4>Xảy ra lỗi!</h4>")
                 $("#notification-error").fadeIn(100).delay(1000).fadeOut(1000);
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
             $.ajax({
                 url: "?mod=product&act=reload_cart",
                 dataType: "html",
                 success: function (data) {
                     $("#cart_content").html(data);
                 }
             });

             //Load num_cart and total
             $.ajax({
                 url: "?mod=product&act=reload_num_cart_and_total",
                 dataType: "json",
                 success: function (data) {
                     $("#num_cart").html(data.num_cart);
                     $("#total").html(data.total);
                 }
             });

             //Show notification
             $("#text-notification-success").html("<h4>Thêm thành công!</h4>");
             $("#notification-success").fadeIn(100).delay(1000).fadeOut(1000);
         }
     })
 }
function add_cart_with_number(product_id) {
    number=parseInt($("#input-quantity").val());
    var strData="id="+product_id+"&number="+number;
    $.ajax({
        type: "POST",
        url: "?mod=product&act=add_cart_with_number",
        data: strData,
        dataType: "json",
        success: function () {
            $.ajax({
                url: "?mod=product&act=reload_cart",
                dataType: "html",
                success: function (data) {
                    $("#cart_content").html(data);
                }
            });

            //Load num_cart and total
            $.ajax({
                url: "?mod=product&act=reload_num_cart_and_total",
                dataType: "json",
                success: function (data) {
                    $("#num_cart").html(data.num_cart);
                    $("#total").html(data.total);
                }
            });

            //Show notification
            $("#text-notification-success").html("<h4>Thêm thành công!</h4>");
            $("#notification-success").fadeIn(100).delay(1000).fadeOut(1000);
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
             $.ajax({
                 url: "?mod=product&act=reload_cart",
                 dataType: "html",
                 success: function (data) {
                     $("#cart_content").html(data);
                 }
             });
             $("#btn_cart").click();

             //Load num_cart and total
             $.ajax({
                 url: "?mod=product&act=reload_num_cart_and_total",
                 dataType: "json",
                 success: function (data) {
                     $("#num_cart").html(data.num_cart);
                     $("#total").html(data.total);
                 }
             });
         }
     })
 }
function remove_from_cart2(product_id) {//Trang giỏ hàng. Sau remove sẽ reload cả bảng đang hiển thị và phần cart trong header
    var strData="id="+product_id;
    $(".tooltip").tooltip("hide");//Ẩn title sau khi click btn xoá
    $.ajax({
        type: "POST",
        url: "?mod=product&act=remove_from_cart2",
        data: strData,
        success: function () {
            $.ajax({
                url: "?mod=product&act=reload_cart",
                dataType: "html",
                success: function (data) {
                    $("#cart_content").html(data);
                }
            });

            //Load num_cart and total
            $.ajax({
                url: "?mod=product&act=reload_num_cart_and_total",
                dataType: "json",
                success: function (data) {
                    $("#num_cart").html(data.num_cart);
                    $("#total").html(data.total);
                }
            });

            //Load list SP đang hiển thị trên trang giỏ hàng
            $.ajax({
                url: "?mod=cart&act=ajax_cart",
                dataType: "html",
                success: function (data) {
                    $("#list_product_from_cart").html(data);
                }
            });
        }
    })
}

function update_number(product_id) {
    $(".tooltip").tooltip("hide");//Ẩn title sau khi click btn update
    str_id_input_tag="#input_number"+product_id;
    var number=$(str_id_input_tag).val();
    var strData="id="+product_id+"&number="+number;
    $.ajax({
       type: "POST",
       url: "?mod=cart&act=update_number",
       data: strData,
       dataType: "json",
       success: function (data) {
            //Load num_cart and total
           $("#num_cart").html(data.num_cart);
           $("#total").html(data.total);

           //Load list SP trong Dropdown cart
           $.ajax({
               url: "?mod=product&act=reload_cart",
               dataType: "html",
               success: function (data) {
                   $("#cart_content").html(data);
               }
           });

           //Load list SP đang hiển thị trên trang giỏ hàng
           $.ajax({
               url: "?mod=cart&act=ajax_cart",
               dataType: "html",
               success: function (data) {
                   $("#list_product_from_cart").html(data);
               }
           });

           //Show thông báo "cập nhật thành công"
           $("#text-notification-success").html("<h4>Cập nhật thành công!</h4>");
           $("#notification-success").fadeIn(100).delay(1000).fadeOut(1000);
       } 
    });
}

 function load_list_product(category_id) {
     var strData="id="+category_id;
     load_list_category(category_id);
     $.ajax({
         type: "GET",
         url: "?mod=product&act=show_by_category_ajax",
         data: strData,
         dataType: "html",
         success: function (data) {
             $("#list_product").html(data);
         }
     })
 }
function load_list_category(category_id) {
    var strData="id="+category_id;
    $.ajax({
        type: "POST",
        url: "?mod=product&act=list_category_ajax",
        data: strData,
        dataType: "html",
        success: function (data) {
            $("#list_category").html(data);
            $("#category_selected").val(category_id);
        }
    });
}

function changeFilter() {
    var order_by = $("#input-sort").val();
    var limit=$("#input-limit").val();
    var category_id = $("#category_selected").val();
    var strData = "id="+category_id+"&limit="+limit+"&order_by="+order_by;
    $.ajax({
        type: "GET",
        url: "?mod=product&act=show_by_category_ajax",
        data: strData,
        dataType: "html",
        success: function (data) {
            $("#list_product").html(data);
        }
    });
}
function search() {
    $.ajax({
        type: "POST",
        url: "?mod=product&act=ajax_search_product",
        data: jQuery("#frm_search").serialize(),
        dataType: "html",
        success: function (data) {
            $("#list_product").html(data);
        }
    })
}

//**** Thay đổi số lượng sản phẩm khi click button "+" , "-" ****//
function number_up(product_id) {
    var id_input_tag="#cart_number_product"+product_id;
    var number=parseInt($(id_input_tag).val());
    var new_number=number+1;
    $(id_input_tag).val(new_number);
    number_in_pay(product_id);
}
function number_down(product_id) {
    var id_input_tag="#cart_number_product"+product_id;
    var number=parseInt($(id_input_tag).val());
    if (number>1){
        var new_number=number-1;
        $(id_input_tag).val(new_number);
        number_in_pay(product_id);
    }
}
function number_in_pay(product_id) {
    var id_input_tag="#cart_number_product"+product_id;
    var new_number=parseInt($(id_input_tag).val());
    var strData="id="+product_id+"&number="+new_number;
    if (!parseInt($(id_input_tag).val())){
        $("#text-notification-error").html("<h4>Vui lòng nhập một số!</h4>");
        $("#notification-error").fadeIn(100).delay(2000).fadeOut(1000);
        $(id_input_tag).focus();
    }
    else{
        $.ajax({
            type: "POST",
            url: "?mod=cart&act=ajax_cart_in_pay",
            data: strData,
            dataType: "html",
            success: function(data){
                $("#list_product_in_cart").html(data);
                $("#amount").load("?mod=cart&act=ajax_amount");
            }
        });
    }
}
//************************************************************************

function use_my_information(status) {
    if ($('#use_my_information').is(':checked')){
        if (parseInt(status)==0){
            $("#text-notification-error").html("<h4>Bạn chưa đăng nhập!</h4>");
            $("#notification-error").fadeIn(100).delay(2000).fadeOut(1000);
            $("#pay_fullname").focus();
            $('#use_my_information').prop('checked', false);
        }
        else{
            $.ajax({
                url: "?mod=cart&act=use_my_information",
                dataType: "json",
                success: function (data) {
                    $("#ship_fullname").val(data.fullname);
                    $("#ship_address").html(data.address);
                    $("#ship_telephone").val(data.phone_number);
                }
            })
        }
    }
    else{
        $("#ship_fullname").val("");
        $("#ship_address").html("");
        $("#ship_telephone").val("");
    }
}
function confirm_order(status) {
    if (parseInt(status)==0){
        $("#text-notification-error").html("<h4>Bạn chưa đăng nhập!</h4>");
        $("#notification-error").fadeIn(100).delay(2000).fadeOut(1000);
        $("#pay_fullname").focus();
    }
    else{
        $.ajax({
            type: "POST",
            url: "?mod=cart&act=confirm_order",
            data: jQuery("#frm_shipping_address").serialize(),
            dataType: "json",
            success: function (data) {
                if (parseInt(data.ok)==2){
                    $("#modal_order_success").modal();
                    $.ajax({
                        type: "POST",
                        url: "?mod=cart&act=send_mail_order",
                        success: function () {
                        }
                    })
                }
                else if(parseInt(data.ok)==1){
                    $("#text-notification-error").html("<h4>Đơn hàng lỗi!</h4>");
                    $("#notification-error").fadeIn(100).delay(2000).fadeOut(1000);
                }
                else {
                    if (data.error=="ship_fullname"){
                        $("#ship_fullname").focus();
                        $("#text-notification-error").html("<h4>Vui lòng nhập tên người nhận!</h4>");
                        $("#notification-error").fadeIn(100).delay(2000).fadeOut(1000);
                    }
                    else if(data.error=="ship_address"){
                        $("#ship_address").focus();
                        $("#text-notification-error").html("<h4>Vui lòng nhập địa chỉ!</h4>");
                        $("#notification-error").fadeIn(100).delay(2000).fadeOut(1000);
                    }
                    else if(data.error=="ship_telephone"){
                        $("#ship_telephone").focus();
                        $("#text-notification-error").html("<h4>Vui lòng nhập số điện thoại!</h4>");
                        $("#notification-error").fadeIn(100).delay(2000).fadeOut(1000);
                    }
                }
            }
        })
    }
}


function pay_click() {
    $.ajax({
        url: "?mod=product&act=reload_num_cart_and_total",
        dataType: "json",
        success: function (data) {
            if(parseInt(data.num_cart)==0){
                $("#text-notification-error").html("<h4>Giỏ hàng trống!</h4>");
                $("#notification-error").fadeIn(100).delay(1000).fadeOut(1000);
            }
            else{
                window.location.replace("?mod=cart&act=pay");
            }
        }
    });
}


//************* Edit customer *************
function check_pass_for_change(customer_id) {
    var old_pass=$("#input-old-password").val();
    var strData="id="+customer_id+"&old_pass="+old_pass;
    $.ajax({
        type: "POST",
        url: "?mod=dangky&act=check_old_pass",
        data: strData,
        dataType: "json",
        success: function (data) {
            if (parseInt(data.ok)!=1){
                $("#input-old-password").css("border","1px solid red");
            }
            else {
                $("#input-old-password").css("border","1px solid #ccc");
            }
        }
    })
}
function edit_customer() {
    $.ajax({
        type: "POST",
        url: "?mod=dangky&act=do_edit",
        data: jQuery("#frm_edit_customer").serialize(),
        dataType: "json",
        success: function (data) {
            if (parseInt(data.ok)==0){
                $("#text-notification-error").html("<h4>Lỗi cơ sở dữ liệu!</h4>");
                $("#notification-error").fadeIn(200).delay(1000).fadeOut(1000);
            }
            else if (parseInt(data.ok)==1){
                $("#text-notification-success").html("<h4>Sửa thành công!</h4>");
                $("#notification-success").fadeIn(200).delay(1000).fadeOut(1000);
            }
            else if (parseInt(data.ok)==2){
                $("#err_signup").html("Sai mật khẩu!");
                $("#input-old-password").focus();
            }
            else if (parseInt(data.ok)==3){
                $("#text-notification-error").html("<h4>Mật khẩu xác nhận không khớp!</h4>");
                $("#notification-error").fadeIn(200).delay(1500).fadeOut(1000);
                $("#input-confirm").focus();
            }
        }
    })
}
//*********** Edit customer ********************
