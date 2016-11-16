<?php  
?>
<?php get_header(); ?>
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
<div id="main-content" class="fixwidth">
            <div class="content-left">
                <div class="tit-ykien">
                    <?php if(function_exists('rdfa_breadcrumb')){ rdfa_breadcrumb(); } ?>
                </div>
                <?php while (have_posts()) : the_post(); ?>
                <h1><a title="<?php the_title();?>" href="<?php the_permalink();?>"><?php the_title();?></a></h1>
                <?php the_content();?>
                <!-- <?php echo do_shortcode('[contact-form-7 id="51669" title="Đăng ký nhận tư vấn"]'); ?> -->
            </div>
            <?php endwhile; ?>
            <?php get_sidebar(); ?>
</div>                
<?php get_footer(); ?>
</div>