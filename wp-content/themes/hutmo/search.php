<?php get_header(); ?>
<div class="container clearfix">
            <div class="mini-intro">
                <img src="<?php bloginfo('template_url');?>/images/chan header.jpg"/>
            </div>
            
            <div class="content-container">
                <div class="block-trai-search">
<!--             	<img src="<?php bloginfo('template_url');?>/images/HTTT.jpg"/> -->

	<?php if (have_posts()) : ?>

		<h2>Kết quả tìm kiếm</h2>

		<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>

		<?php while (have_posts()) : the_post(); ?>

			<div <?php post_class() ?> id="post-<?php the_ID(); ?>">

				<h2><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>

				<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>

				<div class="entry">
					<?php the_excerpt(); ?>
				</div>

			</div>

		<?php endwhile; ?>

		<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>

	<?php else : ?>

		<h2>Không tìm thấy kết quả nào.</h2>

	<?php endif; ?>
                        <?php wp_pagenavi(); ?>
                    </div>
                    </br>    
                      <?php get_sidebar(); ?>
                </div>
              
            </div>
</div>     

<?php get_footer(); ?>