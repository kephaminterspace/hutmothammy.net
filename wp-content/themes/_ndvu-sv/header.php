<?php
$ndvu = get_option('MyOptions');
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php wp_title( '', true,'right'); ?></title>
<?php wp_head(); ?>
<link rel="shortcut icon" href="/media/images/favicon.ico" />
<link href="<?php bloginfo('template_url'); ?>/style.css" rel="stylesheet" type="text/css">
<link href="/media/skins/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="/media/skins/nav/nav.css">
<link rel="stylesheet" href="/media/skins/slider/flexslider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="/media/skins/fonts/style.css">
<link rel="stylesheet" href="/media/css/jquery.bxslider.css">
<link rel="stylesheet" href="/media/skins/reponsive.css">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<?php echo html_entity_decode(str_replace("\&#039;","&#039;",str_replace("&#039;","'",$ndvu['home12theader']))); ?> 

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-46661404-2', 'auto');
  ga('send', 'pageview');

</script>

<script type='text/javascript'>window._sbzq||function(e){e._sbzq=[];var t=e._sbzq;t.push(["_setAccount",15534]);var n=e.location.protocol=="https:"?"https:":"http:";var r=document.createElement("script");r.type="text/javascript";r.async=true;r.src=n+"//static.subiz.com/public/js/loader.js";var i=document.getElementsByTagName("script")[0];i.parentNode.insertBefore(r,i)}(window);</script>

</head>

<body>
<?php
$_SESSION['udd'] = (($_SESSION['udd']!=''))?$_SESSION['udd']:$_GET['udd'];
?>
<div class="fixwidth1">
    <div class="fixwidth">
    <?php eemail_show(); ?>
        <div class="searchhome">
    <form action="<?php echo home_url( '/' ); ?>" method="get" id="searchform">
     <input type="text" name="s" id="s" class="searchthammy" placeholder="Tìm kiếm..." autocomplete="off"/>
    </form>
    </div>
        <?php
        wp_nav_menu(
            array(
                'menu' => 'Main Menu',
                'container' => '',
                'menu_class' => 'submenu',
                'menu_id' => '',
                'theme_location' => 'mndvutop1'
            )     
        );
        ?>
    </div>
</div>
<header class="header1 fixwidth">
    <div class="logo logofix"><a title="Thẩm mỹ công nghệ cao" href="<?php echo home_url();?>"><img src="http://thammycongnghecao.vn/wp-content/uploads/2015/01/banner-tet.png" alt="thẩm mỹ công nghệ cao" /></a></div>
     <!--   <div class="slogan">
<a href="http://thammycongnghecao.vn/"><img alt="" src="http://thammycongnghecao.vn/wp-content/themes/_ndvu-sv/noel-banner1.png"></a>
</div> -->
<div class="hotline clearfix"><a href="tel:1900558896" rel="nofollow"><img src='/media/skins/images/hotline1.png'></a></div>   
</header>
<div id="slideads" class=" fixwidth clearfix">
        <div class="conner8" id="slideads2" style="width: 69px; text-align:center;">
            <a rel="nofollow" href="#udiem" title=""><img class="cornertop" alt="Gioi thieu dich vu" src="/media/skins/images/Dich-vu-gioi-thieu.jpg" /></a>
            <a rel="nofollow" href="#qtrinh" title="#"><img src="/media/skins/images/Dich-vu-quy-trinh.jpg" alt="Quy trinh dich vu" /></a>
            <a rel="nofollow" href="#hanh" title="#"><img src="/media/skins/images/Dich-vu-che-do-cham-soc.jpg" alt="Che do cham soc dich vu" /></a>
            <a rel="nofollow" href="#khang" title=""><img src="/media/skins/images/Dich-vu-hoi-dap.jpg" alt="Hoi dap dich vu" /></a>
            <a rel="nofollow" href="#dangky"><img class="cornerb8" src="/media/skins/images/Dich-vu-dang-ky.jpg" alt="Dang ky dich vu" /></a>
        </div>
    </div>

<nav id="topnav"  role="navigation" class="fixwidth clearfix">
    
    <div class="menu-toggle">Danh mục dịch vụ</div>
            <?php
wp_nav_menu(
    array(
        'menu' => 'Main Menu',
        'container' => '',
        'menu_class' => 'srt-menu',
        'menu_id' => 'menu-main-navigation',
        'theme_location' => 'mndvutop2' 
    )    
);
?>  
</nav>
<div style="clear:both"></div>
<?php 
if ( is_active_sidebar( 'sidebar-6' ) ) :
{
    echo '<div class="fixwidth">';dynamic_sidebar( 'sidebar-6' ); echo '</div>';
} 
        
        endif; 
      
?>