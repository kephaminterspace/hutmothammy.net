<?php

/**

 * The template for displaying the footer.

 *

 * Contains the closing of the id=main div and all content after

 *

 * @package Catch Themes

 * @subpackage Catch_Box

 * @since Catch Box 1.0

 */

?>



	</div><!-- #main -->



	<footer id="colophon" role="contentinfo">

			<?php

				/* A sidebar in the footer? Yep. You can can customize

				 * your footer with three columns of widgets.

				 */

				get_sidebar( 'footer' );

			?>

           <?php if ( has_nav_menu( 'footer', 'catchbox' ) ) {

				// Check is footer menu is enable or not

				$options = catchbox_get_theme_options();

				if ( !empty ($options ['enable_menus'] ) ) :

					$menuclass = "mobile-enable";

				else :

					$menuclass = "mobile-disable";

				endif;

				?>

                

            <?php } ?>

			<div id="site-generator" class="clearfix">

            	<?php do_action( 'catchbox_startgenerator_open' ); ?>

<div class="copyright1">
<p>Bệnh viện đa khoa quốc tế thu cúc</p>

Địa chỉ: 286 Thụy Khuê, Tây Hồ, Hà Nội

<br>Email: <a href="mailto:tuvan@thucuchospital.vn?Subject=Lien he tu Website" target="_top">tuvan@thucuchospital.vn</a> 
<br> Phone: 04 383 55555 
<br>Hotline : 0964.080.999
<br>
Tổng đài hỗ trợ: 1900.5588.96<br>
<br>
<img style="-webkit-user-select: none" src="http://thammythucuc.vn/wp-content/banners/social.png"><strong><em><span style="font-size: x-small;"><span style="color: #b28f27;"></span></span></em></strong>
<p></p>
                </div>
                <div class="copyright2">
                <p>Thẩm mỹ thu cúc</p>
                Cơ sở 1: 57 Nguyễn Khắc Hiếu, Ba Đình, Hà Nội<br>
                Phone: (04) 37150316<br>
                Phone: (04) 37151541<br><br>
                Cơ sở 2: 288 Tây Sơn, Đống Đa, Hà Nội<br>
                Phone: (04) 3537 9565
                </div>
		<div class="copyright3">
<img style="-webkit-user-select: none" src="http://thammythucuc.vn/wp-content/banners/maps.jpg" width="100%" height="auto"><strong><em><span style="font-size: x-small;"><span style="color: #b28f27;"></span></span></em></strong>
<p></p>
                </div>
<p class="copyright">Copyright © 2013 <strong><span style="color: #fbdb74;"><a title="Bệnh viện đa khoa quốc tế Thu Cúc" href="http://thammythucuc.vn/"><span style="color: #fbdb74;">Bệnh Viện Đa Khoa Quốc Tế</span></a> Thu Cúc</span></strong>. All Rights Reserved.</p>

                <?php do_action( 'catchbox_startgenerator_close' ); ?>

          	</div> <!-- #site-generator -->

	</footer><!-- #colophon -->

</div><!-- #page -->


<?php wp_footer(); ?>

<!-- Google Code dành cho Thẻ tiếp thị lại -->
<!--------------------------------------------------
Không thể liên kết thẻ tiếp thị lại với thông tin nhận dạng cá nhân hay đặt thẻ tiếp thị lại trên các trang có liên quan đến danh mục nhạy cảm. Xem thêm thông tin và hướng dẫn về cách thiết lập thẻ trên: http://google.com/ads/remarketingsetup
--------------------------------------------------->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 975769408;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/975769408/?value=0&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-50979994-1', 'thammynangnguc.vn');
  ga('send', 'pageview');

</script>
<script type='text/javascript'>window._sbzq||function(e){e._sbzq=[];var t=e._sbzq;t.push(["_setAccount",8356]);var n=e.location.protocol=="https:"?"https:":"http:";var r=document.createElement("script");r.type="text/javascript";r.async=true;r.src=n+"//static.subiz.com/public/js/loader.js";var i=document.getElementsByTagName("script")[0];i.parentNode.insertBefore(r,i)}(window);</script>
</body>

</html>