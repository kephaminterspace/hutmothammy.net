<!DOCTYPE html>

<html id="ie6" <?php language_attributes(); ?>>

<html id="ie7" <?php language_attributes(); ?>>

<html id="ie8" <?php language_attributes(); ?>>

<html <?php language_attributes(); ?>>


<head>
<script type='text/javascript'>window._sbzq||function(e){e._sbzq=[];var t=e._sbzq;t.push(["_setAccount",8356]);var n=e.location.protocol=="https:"?"https:":"http:";var r=document.createElement("script");r.type="text/javascript";r.async=true;r.src=n+"//static.subiz.com/public/js/loader.js";var i=document.getElementsByTagName("script")[0];i.parentNode.insertBefore(r,i)}(window);</script>

<link rel="author" href="https://plus.google.com/100013792538847646304" />
<meta name="geo.region" content="VN-HN" />
<meta name="geo.position" content="21.003974;105.841668" />
<meta name="ICBM" content="21.003974, 105.841668" />
<meta name="msvalidate.01" content="BD4CBD12BEBB3169A4D0EDFA4B837F88" />

<meta charset="utf-8"/>
<meta charset="<?php bloginfo( 'charset' ); ?>" />

<meta name="viewport" content="width=device-width" />

<title><?php wp_title( '|', true, 'right' ); ?></title>

<link rel="profile" href="http://gmpg.org/xfn/11" />



<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_stylesheet_uri(); ?>" />

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
 <link rel="shortcut icon" type="image/ico" href="http://thammynangnguc.vn/wp-content/uploads/2014/05/favicon_thammythucuc.ico" title="Favicon" />
<?php

	wp_head();

?>


<!-- Thongtin -->



<meta name="msvalidate.01" content="6C8C33EDF9906795309B0E5ACD3515CF" />

<!-- Analytics -->


<!-- End Analytics -->

<!-- Webmastertool-->
<meta name="google-site-verification" content="WE-1ktkMja4VCjtnUDV5tzcuoSAVFlF2KKo7bUdKmAo" />
<!-- End Webmastertool-->

<!---<link rel="author" href="https://plus.google.com/117366610650604625654"/>-->
<meta name="google-site-verification" content="pgbqd3N0KN1rycNEwR6SgaMfJSrHyOMV0B-YbOHfJBg" />
<!-- Tracking -->
<script>(function() {
  var _fbq = window._fbq || (window._fbq = []);
  if (!_fbq.loaded) {
    var fbds = document.createElement('script');
    fbds.async = true;
    fbds.src = '//connect.facebook.net/en_US/fbds.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(fbds, s);
    _fbq.loaded = true;
  }
  _fbq.push(['addPixelId', '424372011034469']);
})();
window._fbq = window._fbq || [];
window._fbq.push(['track', 'PixelInitialized', {}]);
</script>
<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?id=424372011034469&amp;ev=NoScript" /></noscript>
</head>

<body <?php body_class(); ?>>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>



<script>
 runQuery();
</script>
<script>
 pepsi_floating_init();
</script>

<div id="page" class="hfeed">

	<header id="branding" role="banner">

			<hgroup>

               	<?php

				// Check to see if the header image has been removed

				$header_image = get_header_image();

				if ( ! empty( $header_image ) ) :

				?>

				<div id="site-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">

					<img src="<?php header_image(); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />

				</a></div>

				<?php endif; // end check for removed header image ?>

                <div id="site-details">            

					<!-- <h1 id="site-title"><span><a href="<?php //echo esc_url( home_url( '/' ) ); ?>" title="<?php //echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php //bloginfo( 'name' ); ?></a></span></h1> -->

					<h2 id="site-description"><?php bloginfo( 'description' ); ?></h2>

                </div>

			</hgroup>

			 <nav id="access-secondary" class="<?php echo $menuclass; ?>" role="navigation">

                	<h3 class="assistive-text"><?php _e( 'Secondary menu', 'catchbox' ); ?></h3>

						<div class="skip-link"><a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to primary content', 'catchbox' ); ?>"><?php _e( 'Skip to primary content', 'catchbox' ); ?></a></div>

						<div class="skip-link"><a class="assistive-text" href="#secondary" title="<?php esc_attr_e( 'Skip to secondary content', 'catchbox' ); ?>"><?php _e( 'Skip to secondary content', 'catchbox' ); ?></a></div>

                    <?php wp_nav_menu( array( 'theme_location'  => 'secondary', 'container_class' => 'menu-secondary-container' ) );  ?>

                </nav>

			<?php if ( has_nav_menu( 'secondary', 'catchbox' ) ) { 

				// Check is seconday menu is enable or not

				$options = catchbox_get_theme_options();

				if ( !empty ($options ['enable_menus'] ) ) :

					$menuclass = "mobile-enable";

				else :

					$menuclass = "mobile-disable";

				endif;

			?>


			<nav id="access" role="navigation">

				<h3 class="assistive-text"><?php _e( 'Primary menu', 'catchbox' ); ?></h3>

				<div class="skip-link"><a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to primary content', 'catchbox' ); ?>"><?php _e( 'Skip to primary content', 'catchbox' ); ?></a></div>

				<div class="skip-link"><a class="assistive-text" href="#secondary" title="<?php esc_attr_e( 'Skip to secondary content', 'catchbox' ); ?>"><?php _e( 'Skip to secondary content', 'catchbox' ); ?></a></div>

				<?php if ( has_nav_menu( 'primary', 'catchbox' ) ) { 

					wp_nav_menu( array( 'theme_location' => 'primary', 'container_class' => 'menu-header-container' ) );

				} else { ?>

                	<div class="menu-header-container">

						<?php wp_page_menu( array( 'menu_class'  => 'menu' ) ); ?>

                    </div>

				<?php

                } ?>   

			</nav><!-- #access -->

            <?php } ?>

	</header><!-- #branding -->
<?php if ( function_exists( 'meteor_slideshow' ) ) { meteor_slideshow(); } ?>
	<div id="main" class="clearfix">
<!--
	<div id="content_top">

	</div>
-->
		<div id="primary">

			<div id="content" role="main">

				<?php 

                
do_action( 'catchbox_content' ); ?>