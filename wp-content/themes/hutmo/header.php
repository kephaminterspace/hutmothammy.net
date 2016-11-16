<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	
	<?php if (is_search()) { ?>
	   <meta name="robots" content="noindex, nofollow" /> 
	<?php } ?>
 	
	<title>
		   <?php
		      if (function_exists('is_tag') && is_tag()) {
		         single_tag_title("Tag Archive for &quot;"); echo '&quot; - '; }
		      elseif (is_archive()) {
		         wp_title(''); echo ' - '; }
		      elseif (is_search()) {
		         echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; }
		      elseif (!(is_404()) && (is_single()) || (is_page())) {
		         wp_title(''); echo ' - '; }
		      elseif (is_404()) {
		         echo 'Not Found - '; }
		      if (is_home()) {
		         bloginfo('name'); echo ' - '; bloginfo('description'); }
		      else {
		          bloginfo('name'); }
		      if ($paged>1) {
		         echo ' - page '. $paged; }
		   ?>
	</title>
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
    <link rel="shortcut icon" href="/favicon.ico">    
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url');?>/res/responsive.css"/>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url');?>/flexslider.css"/>
	<?php wp_head(); ?>
    <div id="fb-root"></div>

</head>

<body>
<!-- Header -->
  <header>
      <div id="header">
        <a href="#" class="logo"><img src="<?php bloginfo('template_url');?>/images/logo-thucuc.png" alt="Bấm mí thẩm mỹ"  /></a>
        <ul id="menu-top">
        <?php if(function_exists('wp_nav_menu')){wp_nav_menu( 'theme_location=main-menu-top'); }?>
        </ul>
        <div id="header-bot">
          <form action="" method="get" id="searchform">
        <input type="text" name="s" class="searchveg" placeholder="Tìm kiếm..." autocomplete="off"/>        
                <input type="submit" class="search-submit" value="" />
      </form>
            <h1>HÚT MỠ THẨM MỸ</h1>
            <a href="#" class="sdt-hotline"><img src="<?php bloginfo('template_url');?>/images/sdt-tongdai.png" alt="Tổng đài" /></a>
        </div>
        </div>
    </header>
<!-- End Header -->
<!-- Menu -->
    <div id="mainmenu">
    <div id="menumobi">Menu dịch vụ</div>
      <ul id="main-menu">
            <?php if(function_exists('wp_nav_menu')){wp_nav_menu( 'theme_location=main-menu-prin'); }?>
        </ul>
    
    </div>
<!-- End Menu -->