<?php

function getselect($sl,$k){
    return ($sl==$k)?' selected="selected" ':'';
}

add_action ( 'edit_category_form_fields', 'addsearchcategories');
add_action ( 'edited_terms', 'savesearchcategories');

function getvameta($t_id,$sear){ 
    global $wpdb,$table_prefix;	
    return $wpdb->get_var("SELECT meta_value FROM ".$table_prefix."postmeta WHERE post_id = $t_id AND meta_key = '$sear'"); 
    
}

function addsearchcategories($tag) {
    global $wpdb,$table_prefix;	
    $t_id = $tag->term_id;
	$themes = get_terms('theme', 'hide_empty=0'); 
    $cat_ds = get_post_meta( $t_id, 'cat_ds', true);
    $cat_slide = get_post_meta( $t_id, 'cat_slide', true); 
    $cat_banner = get_post_meta( $t_id, 'cat_banner', true); 
    $imgcat = get_post_meta( $t_id, 'imgcat', true); 
    $cat_dichvu = get_post_meta( $t_id, 'cat_dichvu', true); 
    
    
?>
<tr class="form-field">
	<th scope="row" valign="top"><label for="category_theme"><?php _e('Mẫu giao diện:') ?></label></th>
	<td>
    <input hidden="hidden" name="hiddencat" value="<?php echo $t_id ?>" />
<select class="postform" id="cat_ds" name="cat_ds">
	<option value="1" <?php echo getselect($cat_ds,1); ?>>Tin tức</option>
	<option value="2"<?php echo getselect($cat_ds,2); ?>>Dịch vụ</option>
	<option value="3"<?php echo getselect($cat_ds,3); ?>>Hỏi đáp</option>
	<option value="4"<?php echo getselect($cat_ds,4); ?>>Hình ảnh</option>
	<option value="5"<?php echo getselect($cat_ds,5); ?>>Video</option>
</select> 
    <br /><small>Lựa chọn giao diện phù hợp</small>
	 </td>
</tr>

<tr class="form-field">
	<th scope="row" valign="top"><label for="category_theme"><?php _e('Mã HTML dịch vụ chính dưới header:') ?></label></th>
	<td>
<textarea class="wp-bannerha" name="cat_banner" ><?php echo $cat_banner?></textarea><br /><small>Chèn html vào đây</small>
	 </td>
     
</tr> 
 
<tr class="form-field">
	<th scope="row" valign="top"><label for="category_theme">URL Ảnh đại diện danh mục:<br />Điền mã ID Youtube</label></th>
	<td>
    <input type="text" name="imgcat" value="<?php echo $imgcat ?>" />
	 </td>
     
</tr>   
<tr class="form-field">
	<th scope="row" valign="top"><label for="category_theme"><?php _e('Mã HTML dịch vụ chính dưới header:') ?></label></th>
	<td>
<textarea class="wp-bannerha" name="cat_dichvu" ><?php echo $cat_dichvu?></textarea><br /><small>Chèn html vào đây</small>
	 </td>
     
</tr>  
<?php
} 


function savesearchcategories(){
    global $wpdb,$table_prefix;	
    $t_id = $_POST['hiddencat'];
    $scat = $_POST['cat_ds'];
    delmetapost($t_id,'cat_ds',$_POST['cat_ds']);
    delmetapost($t_id,'cat_slide',$_POST['cat_slide']);
    delmetapost($t_id,'cat_banner',$_POST['cat_banner']);
    delmetapost($t_id,'imgcat',$_POST['imgcat']);
    delmetapost($t_id,'cat_dichvu',$_POST['cat_dichvu']);
    
}


add_action( 'admin_menu', 'OS_plugin_menu' );

function OS_plugin_menu() {
	add_menu_page( 'Kangnam OS', 'Kangnam OS', 'manage_options', 'kn_ndvu', 'OS_plugin_options' );
}

function OS_plugin_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}    

if ($_POST['submitndv']) {
    $ar1=array(
        '\"',
        "\'"
    );
    $ar2=array(
        "'",
        "'",
    );
    $myNewOptions = array(
    	'home1' => esc_html($_POST['home1']),
    	'home2' => esc_html($_POST['home2']),
    	'home3' => esc_html($_POST['home3']),
    	'home4' => esc_html($_POST['home4']),
    	'home5' => esc_html($_POST['home5']),
        
    	'home6' => esc_html($_POST['home6']),
        
    	'home6az' => esc_html($_POST['home6az']),
    	'home6bz' => esc_html($_POST['home6bz']),
    	'home6c' => esc_html($_POST['home6c']),
    	'home6d' => esc_html($_POST['home6d']),
    	'home6e' => esc_html($_POST['home6e']),
        
    	'home7' => esc_html($_POST['home7']),
    	'home7i' => esc_html($_POST['home7i']),
    	'home8' => esc_html($_POST['home8']),
    	'home9' => esc_html($_POST['home9']),
    	'home10' => esc_html($_POST['home10']),
        
        
        'home12theader' => esc_html(str_replace($ar1,$ar2,$_POST['home12theader'])),
        'home12tfooter' => esc_html(str_replace($ar1,$ar2,$_POST['home12tfooter'])),
        'home12thome' => esc_html(str_replace($ar1,$ar2,$_POST['home12thome'])),
        'home12slide' => esc_html(str_replace($ar1,$ar2,$_POST['home12slide'])),
        'home12tlinkf' => esc_html(str_replace($ar1,$ar2,$_POST['home12tlinkf'])),   
          
        'home12tpage2' => esc_html(str_replace($ar1,$ar2,$_POST['home12tpage2'])),   
        'homes34s' => esc_html(str_replace($ar1,$ar2,$_POST['homes34s'])),  
        
    );
    update_option('MyOptions', $myNewOptions); 
}
$bg = get_option('MyOptions');
if($_GET['act']=='featured'){
    if($_GET['m']=='del'){
        delete_post_meta($_GET['id'],'featured');
        echo '<meta http-equiv="REFRESH" content="0;url='.home_url("/wp-admin/admin.php?page=kn_ndvu").'" />';
    }
}
if($_GET['act']=='dsk'){
    if($_GET['m']=='del'){
        delete_post_meta($_GET['id'],'dsk');
        echo '<meta http-equiv="REFRESH" content="0;url='.home_url("/wp-admin/admin.php?page=kn_ndvu").'" />';
    }
}
//<div class='dbdb'>Nội dung HTML Slider Trang chủ</div><br />
  //         <textarea placeholder='Nhập nội dung HTML Slider Trang chủ' class='tarfull' name='home12slide'>".str_replace("\&#039;","&#039;",$bg['home12slide'])."</textarea><br />
  
echo "<h1>Quản lý hệ thống</h1>
        <form action='' method=post>
        
        Trang chủ<br /><br />
        <div class='dbdb'>Tab0:</div> <input size=50 type=text name=home4 value='".$bg['home4']."' /> H1 trang chủ<br />
		<div class='dbdb'>Tab1:</div> <input size=50 type=text name=home1 value='".$bg['home1']."' /> ID Facebook<br />
		<div class='dbdb'>Tab2:</div> <input size=50 type=text name=home2 value='".$bg['home2']."' /> Google Plus<br />
        
        <div class='dbdb'>Tab5:</div> <input size=50 type=text name=home5 value='".$bg['home5']."' /> Cat ID Khách hàng<br />
        <br />
        
        Sidebar<br />
        <div class='dbdb'>Tab5:</div> <input size=50 type=text name=home6 value='".$bg['home6']."' /> URL Img hình ảnh<br />
        <div class='dbdb'>Tab5:</div> <input size=50 type=text name=home7 value='".$bg['home7']."' /> LInk  hình ảnh<br />
        <div class='dbdb'>Tab6:</div> <input size=50 type=text name=home8 value='".$bg['home8']."' /> URL ID YOUTUBE<br />
        <div class='dbdb'>Tab7:</div> <input size=50 type=text name=home10 value='".$bg['home10']."' /> URL ID HỎI ĐÁP<br />
        <div class='dbdb'>Tab8:</div> <input size=50 type=text name=home9 value='".$bg['home9']."' /> URL ID TƯ VẤN<br /><br />
        
        <div class='dbdb'>Tab9:</div> <input size=50 type=text name=home6az value='".$bg['home6az']."' /> ID Hỏi đáp<br />
        <div class='dbdb'>Tab10:</div> <input size=50 type=text name=home6bz value='".$bg['home6bz']."' /> ID Kiến thức<br />
        <div class='dbdb'>Tab11:</div> <input size=50 type=text name=home6c value='".$bg['home6c']."' /> URL Được cấp phép sở y tế<br />
        <div class='dbdb'>Tab12:</div> <input size=50 type=text name=home6d value='".$bg['home6d']."' /> URL Khách hàng đánh giá<br />
        <div class='dbdb'>Tab13:</div> <input size=50 type=text name=home6e value='".$bg['home6e']."' /> URL Lời khuyên chuyên gia<br />
        <br />
  <div class='dbdb'>Nội dung HTML trang chủ</div><br />
           <textarea placeholder='Nhập nội dung HTML trang chủ' class='tarfull' name='home12thome'>".str_replace("\&#039;","&#039;",$bg['home12thome'])."</textarea><br />  
  <div class='dbdb'>Nội dung HTML Link Footer</div><br />
           <textarea placeholder='Nhập nội dung HTML Link Footer' class='tarfull' name='home12tlinkf'>".str_replace("\&#039;","&#039;",$bg['home12tlinkf'])."</textarea><br />  
<br />
  <div class='dbdb'>Nội dung Header trước thẻ &lt;/head&gt; HEADER</div><br />
           <textarea placeholder='Nhập nội dung HTML GA' class='tarfull' name='home12theader'>".str_replace("\&#039;","&#039;",$bg['home12theader'])."</textarea><br />
  <div class='dbdb'>Nội dung Footer trước thẻ &lt;/body&gt; FOOTER</div><br />
           <textarea placeholder='Nhập nội dung HTML G ADV' class='tarfull' name='home12tfooter'>".str_replace("\&#039;","&#039;",$bg['home12tfooter'])."</textarea><br />
           
        <div class='dbdb'>Quảng cáo</div><br />
           <textarea placeholder='Nhập nội dung HTML - ADV, FLASH, IMAGES ...' class='tarfull' name='home12tpage2'>".str_replace("\&#039;","&#039;",$bg['home12tpage2'])."</textarea><br /><br />
        
        
        <div class='dbdb'>POPUP - BOTTOM:&lt;/body&gt; FOOTER</div>
           <textarea placeholder='Nhập nội dung HTML IMAGE hoặc Flash' class='tarfull' name='homes34s'>".str_replace("\&#039;","&#039;",$bg['homes34s'])."</textarea><br /><br />
           
        <div class='dbdb'>Tab5:</div> <input size=50 type=text name=home7i value='".$bg['home7i']."' /> Mã UDD trang<br />
        
           
        <input type=submit name=submitndv value=Submit>
		</form>
        
		";
?>
<style>
.dbdb{    
    float: left;
    width: 285px;
}
textarea.tarfull {
  height: 100px;
  width: 98%;
}      
</style>
<?php

}

function hoidaptrangchu($cat){
    $cat=(int)$cat;
    if($cat!=0){
$data.='
<div class="tinqt">
            <h4 class="tt_rev"><a title="'.get_cat_name($cat).'" href="'.get_category_link($cat).'">'.get_cat_name($cat).'</a></h4>';
            $my_query = new WP_Query('cat='.$cat.'&offset=0&showposts=4'); while ($my_query->have_posts()) : $my_query->the_post(); global $post;$do_not_duplicate[$post->ID] = $post->ID;
        $i++;
        if($i==1){$kim='';
            $kim = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'medium');            
            $img = ($kim[0]!='')?$kim[0]:catch_that_image($post->ID);
   $data.='         
        	<div class=" border conner8 clearfix">
                <div class="tinqt_big">
                	<a title="'.get_the_title($post->ID).'" href="'.get_permalink($post->ID).'"><img alt="'.get_the_title($post->ID).'" src="'.$img.'"></a>
                    <p><a title="'.get_the_title($post->ID).'" href="'.get_permalink($post->ID).'">'.get_the_title($post->ID).'</a></p>
                    <p style="font-weight: normal;">'.get_excerpt_by_idp($post->ID,22).'</p>
                </div>
                <div class="tinqt_smal">';
        }else{ $kim2 = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'thumbnail');            
            $img2 = ($kim2[0]!='')?$kim2[0]:catch_that_image($post->ID);
             $data.='  
                	<div class="tinqt_smal_rows clearfix">
                        <a title="'.get_the_title($post->ID).'" href="'.get_permalink($post->ID).'"><img alt="" src="'.$img2.'"></a>
                        <a title="'.get_the_title($post->ID).'" href="'.get_permalink($post->ID).'">'.get_the_title($post->ID).'</a>'.get_excerpt_by_idp($post->ID,22).'
                    </div>';
                    }
         
        endwhile;
        wp_reset_query();
        $data.= '
                </div>
            </div>
        </div>        
        ';        
        echo $data;
    }    
}

function kienthuctrangchu($cat){
    $cat=(int)$cat;
    if($cat!=0){
$data.='
<h4 class="tt_rev"><a title="'.get_cat_name($cat).'" href="'.get_category_link($cat).'">'.get_cat_name($cat).'</a></h4>
        
        <div class="border conner8 bgwhite box">
        ';
            $my_query = new WP_Query('cat='.$cat.'&offset=0&showposts=5'); while ($my_query->have_posts()) : $my_query->the_post(); global $post;$do_not_duplicate[$post->ID] = $post->ID;
	$kim3 = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'medium');            
            $img3 = ($kim3[0]!='')?$kim3[0]:catch_that_image($post->ID);
        $i++;$kim2 = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'medium');            
            $img2 = ($kim2[0]!='')?$kim2[0]:catch_that_image($post->ID);
        $clr = ($i%3==0)?'<p class="clear_5px"></p>':'';
        if($i==1){
   $data.='         
   			<div class="hd_cel1"> 	
            	<a title="'.get_the_title($post->ID).'" href="'.get_permalink($post->ID).'"><img alt="'.get_the_title($post->ID).'" src="'.$img2.'" class="border conner8 bc-photo"></a>
                <h3 class="baochi-tt"><a title="'.get_the_title($post->ID).'" href="'.get_permalink($post->ID).'">'.get_the_title($post->ID).'</a></h3>
                <span>'.get_excerpt_by_idp($post->ID,22).'</span>
			</div>
            <div class="hd_cel2">';
        }else{
             $data.='  
				<a title="'.get_the_title($post->ID).'" href="'.get_permalink($post->ID).'" class="bc-second"><img alt="'.get_the_title($post->ID).'" src="'.$img3.'" class="border conner8"><h3 class="bc-sctt">'.get_the_title($post->ID).'</h3></a>'.$clr;
                    }
         
        endwhile;
        wp_reset_query();
        $data.= '
        	</div>
        <a class="xemthem" title="'.get_cat_name($cat).'" href="'.get_category_link($cat).'"></a>
    </div>          
        ';
echo $data;        
    }
}