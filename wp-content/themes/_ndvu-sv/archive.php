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
if(is_category()){
$cat=get_query_var('cat');
}elseif(is_tag()){
$cat=get_query_var('tag_id');
}else{
$cat=1;
}
echo get_post_meta($cat,'cat_banner',true);
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
}
$imgcat = (get_post_meta($cat,'imgcat',true)!='')?'<img class="fl conner8" src="'.get_post_meta($cat,'imgcat',true).'" />':'';
 ?>
            <div class="new-top clearfix">
            	<?php echo $imgcat?>
            	<h1 class="new-top-tt"><?php single_tag_title()?></h1>
                <h2 class="dhang"><?php echo category_description($cat)?></h2>
                
            </div>
            <section class="boxz2 clearfix">
<?php
$sv = get_post_meta($cat,'cat_ds',true);
switch ($sv)
{
case 1:
service_sv($cat,'news');
break;
case 2:
service_sv($cat);
break;
default:
service_sv($cat);
break;
}
?>             
                
            </section>
            <div class="pagination">
<?php wp_pagenavi(); ?>
</div> 
<?php
echo get_post_meta($cat,'cat_dichvu',true);
?>            
        </div>
    </div>
<?php
get_sidebar();
echo '</div>';
get_footer();
?>