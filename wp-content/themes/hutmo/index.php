<?php get_header(); ?>
<!-- Content -->
    <div id="container">
      <div class="slider-home fixwidth">
          <div class="flexslider">
          <ul class="slides">
              <li><img src="<?php bloginfo('template_url');?>/images/slider1.jpg" alt=""  /></li>
                <li><img src="<?php bloginfo('template_url');?>/images/slider2.jpg" alt=""  /></li>
                <li><img src="<?php bloginfo('template_url');?>/images/slider3.jpg" alt=""  /></li>
            </ul>
            </div>
        </div>
        <!-- -->
        <div class="inform fixwidth">
          <img src="<?php bloginfo('template_url');?>/images/thong-tin-bv.png" alt=""/>
        </div>
        <!-- -->
        <div class="thammymat fixwidth">
          <img src="<?php bloginfo('template_url');?>/images/tham-my-mat.png" alt="" />
            <div class="tt-thammymat">
              <h2>Hút mỡ vaser lipo</h2>
                <ul>
                    <li>Công nghệ độc quyền chỉ có tại thu cúc</li>
                    <li>Hiệu quả giảm mỡ hơn 95%</li>
                    <li>Chỉ cần thực hiện 1 lần duy nhất</li>
                    <li>Đảm bảo không gồ ghề, không thâm tím</li>
                </ul>
                <div class="chitiet">
                  <a href="#"><img src="<?php bloginfo('template_url');?>/images/chitiet.png" alt="" /></a><span>CHI TIẾT</span>
                </div>
            </div>
        </div>
        <!-- -->
        <div id="main-content" class="fixwidth">
          <!-- Content Left -->
            <div class="content-left">
              <h3 class="tit-video">Video</h3>
              <div class="flexslider1 carousel">
                <ul class="slides">
                    <li><img src="<?php bloginfo('template_url');?>/images/video1.png" alt=""  /></li>
                    <li><img src="<?php bloginfo('template_url');?>/images/video2.png" alt=""  /></li>
                    <li><img src="<?php bloginfo('template_url');?>/images/video1.png" alt=""  /></li>
                    <li><img src="<?php bloginfo('template_url');?>/images/video2.png" alt=""  /></li>
                </ul>
                </div>
                <!-- -->
                <h3 class="tit-hinhanh">Thư viện ảnh thẩm mỹ</h3>
                <div class="flexslider2 carousel">
                <ul class="slides">
                    <li><img src="<?php bloginfo('template_url');?>/images/hinhanh1.png" alt=""  /></li>
                    <li><img src="<?php bloginfo('template_url');?>/images/hinhanh2.png" alt=""  /></li>
                    <li><img src="<?php bloginfo('template_url');?>/images/hinhanh3.png" alt=""  /></li>
                    <li><img src="<?php bloginfo('template_url');?>/images/hinhanh1.png" alt=""  /></li>
                    <li><img src="<?php bloginfo('template_url');?>/images/hinhanh2.png" alt=""  /></li>
                    <li><img src="<?php bloginfo('template_url');?>/images/hinhanh3.png" alt=""  /></li>
                </ul>
                </div>
                <!-- -->
                <h3 class="tit-ykien">Ý kiến khách hàng</h3>
                <ul class="ykien">
                  <li>
                      <img src="" alt />
                        <div class="nd-ykien">
                          <strong>TRỊNH MAI ANH – HÀ NỘI</strong>
                            <p>“Trước ngày cưới, trong lúc đau đầu tìm cách giảm cân nhanh nhất để mặc vừa chiếc váy cưới hằng ao ước, thì vô tình tôi được giới thiệu công nghệ hút mỡ bằng Vaser Lipo tại Thu Cúc. Thật kỳ diệu bởi sau lần điều trị duy nhất ấy, vòng eo của tôi đã ngót hẳn 5cm. Trong hôn lễ, ai cũng trầm trồ bởi thân hình thon gọn bất ngờ của tôi. Thực sự đó là hạnh phúc nhân đôi!”</p>
                        </div>
                    </li>
                    <li>
                      <img src="" alt />
                        <div class="nd-ykien">
                          <strong>HOÀNG THU HƯƠNG – HẢI PHÒNG</strong>
                            <p>“Với vòng eo con kiến như hiện tại, không ai tin rằng tôi đã là “gái 1 con”. Sau khi sinh nở, tôi cũng rất tủi thân bởi vòng 2 phát tướng. Vậy mà chỉ sau khi thực hiện hút mỡ bụng bằng Vaser Lipo tại Thu Cúc, tôi đã tự tin diện những trang phục bó sát mà không còn lo ngại đến mỡ thừa. Tôi rất hài lòng!”</p>
                        </div>
                    </li>
                </ul>
                <ul class="menu-bot">
                    <?php if(function_exists('wp_nav_menu')){wp_nav_menu( 'theme_location=main-menu-prin'); }?>
                </ul>
            </div>
            <!-- Content Right -->
            <div class="content-right">
              <h3 class="tit-sb">Hỗ trợ trực tuyến</h3>
                <div class="wg-sb">
                    <a href="#"><img src="<?php bloginfo('template_url');?>/images/hotline.png" alt="Hotline" class="imgsb imgsb1"/></a>
                    <a href="#"><img src="<?php bloginfo('template_url');?>/images/tongdai.png" alt="Tổng đài" class="imgsb"/></a>
                    <hr />
                    <a href="#"><img src="<?php bloginfo('template_url');?>/images/tuvandv.png" alt="Tư vấn dịch vụ" class="imgsb"/></a>
                    <a href="#"><img src="<?php bloginfo('template_url');?>/images/dangkydv.png" alt="Đăng ký dịch vụ" class="imgsb"/></a>
                </div>
                <h3 class="tit-sb">Góc báo chí</h3>
                <div class="wg-sb">
                  <!-- <img src="<?php bloginfo('template_url');?>/images/goc-bc.png" alt="Góc báo chí" class="goc-bc" /> -->
                  <a href="#"><img src="<?php bloginfo('template_url');?>/images/24h.png" alt="Góc báo chí" class="goc-bc" /></a>
                  <a href="#"><img src="<?php bloginfo('template_url');?>/images/vnexpress.png" alt="Góc báo chí" class="goc-bc" /></a>
                  <a href="#"><img src="<?php bloginfo('template_url');?>/images/eva.png" alt="Góc báo chí" class="goc-bc" /></a>
                  <a href="#"><img src="<?php bloginfo('template_url');?>/images/ngoisao.png" alt="Góc báo chí" class="goc-bc" /></a>
                </div>
            </div>
        </div>
<?php get_footer(); ?>