<?php

function jacarou($slideshow,$param='',$noff=''){
    $meteor_loop     = new WP_Query( array(	
		'post_type'      => 'slide',
		'slideshow'      => $slideshow,	
        'post_status' => array('publish'),	
        'posts_per_page' => 10,
	) );
    
    if ( $meteor_loop->have_posts() ) :
    
        while ( $meteor_loop->have_posts() ) : $meteor_loop->the_post();
        global $post;
       $j++; 
       $noff=($noff=='')?'':' rel="nofollow" target="_blank" ';
            if ( $meteor_loop->post_count > 0 ) {
            
				$meteor_shim = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
                $link = get_post_meta( $post->ID, "slide_url_value", $single = true );
				
                if($param!=''){
                $link2 = ($link!='')?'<a '.$noff.' title="'. $post->post_title.'" class="logo_img" href="'.get_post_meta( $post->ID, "slide_url_value", $single = true ).'">':'<span>';
                $link3 = ($link!='')?'</a>':'</span>';
                $res = ($link!='')?' class="responsive-img" ':'';
                echo ''.$link2.'<img '.$res.' src="'.$meteor_shim[0].'" title="'. $post->post_title.'" alt="'. $post->post_title.'" />'.$link3.'
               '; 
                }else{
                    
                    $act = ($j==1)?'active ':'';
                    $link2 = ($link!='')?'<a '.$noff.' title="'. $post->post_title.'" href="'.get_post_meta( $post->ID, "slide_url_value", $single = true ).'">':'';
                    $link3 = ($link!='')?'</a>':'';

                echo '<li class="'.$act.'item">
            	'.$link2.'<img title="'. $post->post_title.'" src="'.$meteor_shim[0].'" alt="'. $post->post_title.'" />'.$link3.'
          </li>
               ';    
                }
				
				
			}
        endwhile;
    wp_reset_query();
    endif;
}



function service_sv($cat,$news){
    if($cat!=''){
        $count_excerpt = ($news!='')?60:40;
        
    
    if ( have_posts() ) : 
        while ( have_posts() ) : the_post();
            global $post; 
            $i++;$kim='';
            $kim = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'medium');            
            $img = ($kim[0]!='')?$kim[0]:catch_that_image($post->ID);
            $time = get_the_time('d/m/Y', $post->ID);
            $cmm = wp_count_comments( $post->ID ); 
            $cmm=$cmm->total_comments;
		
        $new = ($news!='')?'':'<div class="box_news_dk"><a target="_blank" title="Bác sĩ tư vấn" href="#contact_form_pop" class="fancybox"><img src="/media/skins/images/bac-si-tu-van.jpg" alt="Bác sĩ tư vấn" onmouseover="this.src=\'\/media/skins/images/bac-si-tu-van-hover.jpg\'" onmouseout="this.src=\'\/media/skins/images/bac-si-tu-van.jpg\'"></a><a title="Đăng ký dịch vụ" href="/lien-he/"><img src="/media/skins/images/dang-ky-dich-vu3.jpg" alt="Đăng ký dịch vụ" onmouseover="this.src=\'\/media/skins/images/dang-ky-dich-vu3-hover.jpg\'" onmouseout="this.src=\'\/media/skins/images/dang-ky-dich-vu3.jpg\'"></a></div><div style="display:none" class="fancybox-hidden"><div id="contact_form_pop">'.do_shortcode('[contact-form-7 id="49358" title="Liên hệ"]').'</div></div>';
        $data.='
                <article class="box_news line_sv thum-news clearfix">
                    <a title="'.get_the_title($post->ID).'" href="'.get_permalink($post->ID).'"><img class="news_pic3 fl conner8" title="'.get_the_title($post->ID).'" alt="'.get_the_title($post->ID).'" src="'.$img.'"></a>
                    <h3><a title="'.get_the_title($post->ID).'" href="'.get_permalink($post->ID).'">'.get_the_title($post->ID).'</a></h3>
                    <p>'.get_excerpt_by_idp($post->ID,$count_excerpt).'</p>
                    '.$new.'
                </article>
        ';
        endwhile;
			?>
		<?php else : ?>        
		<?php endif; 
        echo $data;
    }
}


function single_service_news($cat,$truot=''){    
    echo $truotz = ($truot!='')?'<script src="/media/js/quangcaotruot.js" type="text/javascript"></script>':'';
?>
<h1 class="svbox_tt"><?php the_title()?></h1>
                


            	<?php the_content(); 
                echo '<div id="dangky"></div>
                <div class="dky_ft cornertop">
    <div class="dky_ft_cel1"><p>Bác sĩ tư vấn (24/7) <span>1900.5588.96</span></p></div>
</div>
                ';
                echo do_shortcode('[contact-form-7 id="49926" title="Đăng ký nhận tư vấn"]');?>

<?php
}

function get_hoidap($cat){
    if($cat!=''){
        echo '<div class="conner8 border box-bg top-m">
        	<p class="hdtt"><span class="icon-info"></span><a title="'.get_cat_name($cat).'" href="'.get_category_link($cat).'">'.get_cat_name($cat).'</a></p>';
            $my_query = new WP_Query('cat='.$cat.'&offset=0&showposts=5'); while ($my_query->have_posts()) : $my_query->the_post(); global $post;$do_not_duplicate[$post->ID] = $post->ID;
        $i++;
        if($i==1){
            echo '            
            <article class="hoidap">
                <a title="'.get_the_title($post->ID).'" href="'.get_permalink($post->ID).'" class="hoidap_tt">'.get_the_title($post->ID).'</a>
                <p>'.get_excerpt_by_idp($post->ID,36).'</p>
            </article>
            <ul class="hoidap_list">';
        }else{
            echo '<li><a title="'.get_the_title($post->ID).'" href="'.get_permalink($post->ID).'">'.get_the_title($post->ID).'</a></li>';
        }
         
        endwhile;
        wp_reset_query();
        echo '
            </ul>
			
        </div>';
    }
}

function get_tuvan($cat){
    if($cat!=''){
        echo '<div class="conner8 border box-bg2 top-m">
        	<p class="box_tt"><a title="'.get_cat_name($cat).'" href="'.get_category_link($cat).'">'.get_cat_name($cat).'</a></p>';
            $my_query = new WP_Query('cat='.$cat.'&offset=0&showposts=5'); while ($my_query->have_posts()) : $my_query->the_post(); global $post;$do_not_duplicate[$post->ID] = $post->ID;
            $kim='';
    $kim = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'thumbnail');
    $img = ($kim[0]!='')?$kim[0]:catch_that_image($post->ID);
            echo '
            <article class=" clearfix bs-news2">
                <a title="'.get_the_title($post->ID).'" href="'.get_permalink($post->ID).'"><img class="news_pic2 circle fl" title="'.get_the_title($post->ID).'" alt="'.get_the_title($post->ID).'" src="'.$img.'" /></a>
                <a class="bs-news2-tt" title="'.get_the_title($post->ID).'" href="'.get_permalink($post->ID).'">'.get_the_title($post->ID).'</a>
            </article>';
            endwhile;
        wp_reset_query();
        echo '
        </div>';
    }
}















