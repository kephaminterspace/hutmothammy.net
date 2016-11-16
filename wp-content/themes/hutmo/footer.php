<!-- Footer -->   
    <footer>
        <div class="footer fixwidth">
            <a href="#"><img src="<?php bloginfo('template_url');?>/images/logo-zinnia.png" alt="Zinnia" /></a>
            <div class="address">
            <h2>Bệnh viện đa khoa quốc tế thu cúc</h2>
            <p>Địa chỉ: 286 Thụy Khuê, Tây Hồ, Hà Nội</p>
            <p>Hotline: 0964 080 999</p>
            <p>Tổng đài: 1900 558 896</p>
            <p><a href="">Xem bản đồ</a></p>
            </div>
        </div>
    </footer>
<!-- End Footer -->
    </div>
<!-- End Content -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url');?>

/jquery.flexslider.js"></script>
    <script type="application/javascript">
        $(document).ready(function(e) {
            $("#menumobi").click(function(){
              $("#main-menu").toggle();
            });
            $(window).load(function() {
              $('.flexslider').flexslider({
                animation: "fade",
                slideshowSpeed: 5000,
                slideshow: true,
              });
              $('.flexslider1').flexslider({
                animation: "slide",
                animationLoop: false,
                itemWidth: 320,
                itemMargin: 5,
                controlNav: false,
              });
              $('.flexslider2').flexslider({
                animation: "slide",
                animationLoop: false,
                itemWidth: 166,
                itemMargin: 5,
                controlNav: false,
              });
            });
            
            if ($(window).width() <= 980 && $(window).width() > 800){
                alert('960')
                $('.flexslider1').flexslider({
                animation: "slide",
                animationLoop: false,
                itemWidth: 289,
                itemMargin: 5,
                controlNav: false,
              });
            }else if($(window).width() <= 800 && $(window).width() > 768){
                $('.flexslider1').flexslider({
                animation: "slide",
                animationLoop: false,
                itemWidth: 235,
                itemMargin: 5,
                controlNav: false,
              });
            }
            else if($(window).width() <= 768 && $(window).width() > 640){
                $('.flexslider1').flexslider({
                animation: "slide",
                animationLoop: false,
                itemWidth: 225,
                itemMargin: 5,
                controlNav: false,
              });
            }
            else if($(window).width() <= 640 && $(window).width() > 480){
                $('.flexslider1').flexslider({
                animation: "slide",
                animationLoop: false,
                itemWidth: 304,
                itemMargin: 5,
                controlNav: false,
              });
            }
            else if($(window).width() <= 480 && $(window).width() > 360){
                $('.flexslider1').flexslider({
                animation: "slide",
                animationLoop: false,
                itemWidth: 225,
                itemMargin: 5,
                controlNav: false,
              });
            }
            else if($(window).width() <= 360 && $(window).width() > 320){
                $('.flexslider1').flexslider({
                animation: "slide",
                animationLoop: false,
                itemWidth: 170,
                itemMargin: 5,
                controlNav: false,
              });
            }
            else if($(window).width() <= 320){
                $('.flexslider1').removeClass('carousel');
                $('.flexslider1').flexslider({
                animation: "slide",
                slideshowSpeed: 5000,
                slideshow: false,
                controlNav: false,
              });
            }
        });
    </script>

</body>
</html>