<!DOCTYPE html>
<!--[if IE]><![endif]-->
<!--[if IE 8 ]>
<html dir="ltr" lang="vi" class="ie8"><![endif]-->
<!--[if IE 9 ]>
<html dir="ltr" lang="vi" class="ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html dir="ltr" lang="vi">
<!--<![endif]-->

{************ Head *************}
    {include file="head.tpl"}
{********** End Head ***********}



<body class="common-home h-8">
{************ Header *************}
    {include file="header.tpl"}
{********** End Header ***********}

{****** Custom header background *******}
    {if $mod=="home"}
        {include file="custom_slider.tpl"}     {**** Nếu là trang chủ thì show slide ****}
    {else}
        {include file="page_image_title.tpl"}  {* Ảnh bìa *}
        {include file="breadcum_main.tpl"}     {* Đường dẫn VD: Trang chủ ->Liên hệ *}
    {/if}
{**** End Custom header background *****}

{***** content ******}
    {$tmp_module}
{*** End content ****}


{*********** Footer **************}
    {include file="footer.tpl"}
{********* End Footer ************}

{*********** script_bottom **************}
    {include file="script_bottom.tpl"}
{********* End script_bottom ************}
</body>
</html>