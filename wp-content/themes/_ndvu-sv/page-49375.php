<?php
get_header();
$ndvu = get_option('MyOptions');
?>
<div class='fixwidth slideshow'>
        <div class='flexslider'>
          <ul class='slides'>
<?php jacarou('slide-home','','nof')?>
          </ul>
        </div> 
</div>
<?php
while ( have_posts() ) : the_post();
global $post;
echo get_post_meta($post->ID, 'htmlvideoheader',true);
if(!is_home()){
    echo '<div class="fixwidth learfix imgslide" style="margin-bottom:15px">
	<span><img alt="thuong-hieu-uy-tin" src="http://thammynangnguc.vn/wp-content/uploads/2014/09/banner-nho1.jpg"></span>
</div>';
}  
?>
<div class="fixwidth clearfix">
<div class="colum02 fr">
    	<div class="conner8 border box-bg">
        	<?php if ( function_exists('yoast_breadcrumb') ) {
yoast_breadcrumb('<p class="link_top cornertop">','</p>');
}?>
            
            <div class="videobox">
            <h1 class="videoclips_tt"><?php the_title();?></h1>
 <?php 
 
 the_content();
if(get_post_meta($post->ID, 'linkyoutube',true)!=''){
    echo '
    <div class="videoclips">
                <iframe width="100%" height="271" frameborder="1" src="http://www.youtube.com/embed/'.get_post_meta($post->ID, 'linkyoutube',true).'?feature=player_detailpage"></iframe>
                </div>
    ';
    echo (get_post_meta($post->ID, 'iddichvu',true)!='')?'
    <div class="clips_icon_b clearfix">
            	<a title="Giới thiệu" href="'.get_permalink(get_post_meta($post->ID, 'iddichvu',true)).'#udiem" class="clips_icon"><img alt="Giới thiệu" src="/media/skins/images/Video-gioi-thieu.jpg"><p>Ưu điểm</p></a>
            	<a title="Quy trình" href="'.get_permalink(get_post_meta($post->ID, 'iddichvu',true)).'#qtrinh" class="clips_icon"><img alt="Quy trình" src="/media/skins/images/Video-quy-trinh.jpg"><p>Quy trình</p></a>
            	<a title="Chi phí" href="'.get_permalink(get_post_meta($post->ID, 'iddichvu',true)).'#hanh" class="clips_icon"><img alt="Chi phí" src="/media/skins/images/Video-cham-soc.jpg"><p>Chi phí</p></a>
            	<a title="Hỏi đáp" href="'.get_permalink(get_post_meta($post->ID, 'iddichvu',true)).'#khang" class="clips_icon"><img alt="Hỏi đáp" src="/media/skins/images/Video-hoi-dap.jpg"><p>Hỏi đáp</p></a>
            </div>
<p class="clips_dangky"><a title="Đăng ký tư vấn" href="'.get_permalink(get_post_meta($post->ID, 'iddichvu',true)).'#dangky"><img alt="Đăng ký tư vấn" src="/media/skins/images/Video-dang-ky.jpg"></a></p>            
    ':'';
    
}       
echo '<div id="dangky"></div>
<div class="dky_ft cornertop">
    <div class="dky_ft_cel1"><p>Bác sĩ tư vấn (24/7) <span>1900.5588.96</span></p></div>
</div>

';
                //echo do_shortcode('[contact-form-7 id="47" title="Đăng ký tư vấn"]'); 
		echo do_shortcode('[contact-form-7 id="49926" title="Đăng ký nhận tư vấn"]');
            ?>
            
            </div>
            <?php echo get_post_meta($post->ID, 'htmlvideolienquan',true);?>            
            </div>  
    </div>
<?php
get_sidebar('lienhe');
echo '</div>';
endwhile; 
get_footer();
?>