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
$cat = get_the_category($post->ID);
$catx = $cat[0]->term_id;
echo get_post_meta($catx,'cat_banner',true);
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
yoast_breadcrumb('<p class="link_top">','</p>');
}?>
            <div class="service_box_02">
<?php
$sv = get_post_meta($catx,'cat_ds',true);
switch ($sv)
{
case 1:
//tintuc
single_service_news($sv);
break;
case 2:
//dichvu
single_service_news($sv,'dv');
break;
case 3:
//hoidap
single_service_news($sv);
break;
case 4:
//hinhanh
single_service_news($sv);
break;
case 5:
//video
single_service_vd($sv);
break;
default:
single_service_news($sv);
break;
}
?>            
                               
                
            </div>
            <div class="content adv-ct">
            <div class="ft-tags"> <?php the_tags('<span>TAGS</span>','','');?>  
                </div>
                <p class="clear_2"></p>
            </div>   
<?php  
//cat_dichvu
$dvdb =(strlen(get_post_meta($cat[0]->term_id,'cat_dichvu',true))>10)?get_post_meta($cat[0]->term_id,'cat_dichvu',true):get_post_meta($cat[1]->term_id,'cat_dichvu',true); 
echo $dvdb;
?>  
         
<div class="tinlienquan">
            	<p class="tinlienquan-tt conner4">Các tin liên quan</p>
                <ul>
<?php 
$categories = get_the_category($post->ID);
if ($categories) {$category_ids = array();
foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;

    $args=array(
'category__in' => $category_ids,
'post__not_in' => array($post->ID),
'showposts'=>6, // Số bài viết muốn hiển thị.
'caller_get_posts'=>1,
'orderby' => 'comment_count',
);
$my_query = new wp_query($args);
if( $my_query->have_posts() ) {
while ($my_query->have_posts()) {
$my_query->the_post();global $post;
    $time = get_the_time('d/m/Y', $post->ID);  
    $kim='';
            $kim = wp_get_attachment_image_src(get_the_post_thumbnail($post->ID, 'medium'));
            $imgs = ($kim[0]!='')?$kim[0]:catch_that_image($post->ID);
echo '<li><a href="'.get_permalink($post->ID).'" title="'.get_the_title($post->ID).'">'.get_the_title($post->ID).'</a><span> ('.$time.')</span></li>';            
//echo '<a href="'.get_permalink($post->ID).'" title="'.get_the_title($post->ID).'" class="dvlienquan"><img alt="'.get_the_title($post->ID).'" src="'.$imgs.'"><p>'.get_the_title($post->ID).'</p></a>';
}
wp_reset_query();}
}
?>                  
                	
                 </ul>
            </div>             
            <div class="content">
                <p class="comment-tt02 clearfix">
                    <a rel="nofollow" class="cm-act" id="tab_1" onClick="tab_gold_select(1);" href="javascript:;">Bình luận chỉ định</a>
                    <a rel="nofollow" id="tab_2"  onclick="tab_gold_select(2);" href="javascript:;">Bình luận Facebook</a></p>
                <p class="clear_7"></p>
                <div id="div_gold01" >
                <?php comments_template( '', true );?>
                </div>
                <div id="div_gold02"  style="display:none" >
                	<div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/vi_VN/all.js#xfbml=1&appId=556439904493521";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    <div class="fb-comments" data-href="<?php the_permalink()?>" data-num-posts="2" mobile="false" width="548px"></div> 
                
                </div>
                
            </div>
    
        </div>
    </div>
<?php
get_sidebar();
echo '</div>';
endwhile; 
get_footer();
?>