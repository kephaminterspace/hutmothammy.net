<?php  
/* 
	Template Name: Page Chuyên mục
*/  
?>
<?php get_header(); ?>
<div class="container clearfix">
            <div class="mini-intro">
                <img src="<?php bloginfo('template_url');?>/images/mini-intro.jpg"/>
            </div>
            <div class="gradient-under-tech">
                <img src="<?php bloginfo('template_url');?>/images/gradient-under-tech.jpg"/>
            </div>
            <div class="content-container">
                <?php while (have_posts()) : the_post(); ?>
                <div class="block-trai">
                    <div class="video">
                        <img src="<?php bloginfo('template_url');?>/images/page-trangchu.jpg"/>
                        <div class="thanhdieuhuong">
                            <a href="#">Trang chủ</a> > <a href="#">Cắt tuyến mồ hôi nách</a>
                        </div>
                        <div class="page-content">
                            <?php the_content();?>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
</div>    
<?php get_sidebar(); ?>   
<?php get_footer(); ?>