<?php
$ndvu = get_option('MyOptions');
?>
<aside class="colum01 fl">
        <?php
        /*
        <!--div class="">
        	<a href="<?php echo $ndvu['home6a'];?>"><img src="/media/skins/upload/icon-uy-dtin.png" alt=""></a>
            <a href="<?php echo $ndvu['home6b'];?>"><img src="/media/skins/upload/icon-bacsi.png" alt=""></a>
            <a href="<?php echo $ndvu['home6c'];?>"><img src="/media/skins/upload/icon-capphep.png" alt=""></a>
        </div-->
        */
        ?>
      
    	<div class="conner8 border box-bg top-m">
        	<p class="box_tt">Hỗ trợ trực tuyến</p>
            <div class="box_ct">
            	<!-- <p class="center"><a href="tel:1900.5588.96"><img src="/media/skins/images/hotline1.png"></a></p> -->
                <span class="support-cel  border conner8"><img alt="" src="/media/skins/upload/phone.png"><span class="tuvan-tt">Hotline</span><br><span class="tuvan-phone"><a href="tel:0964.080.999"><b>0964.080.999</b></a></span></span>
                <span class="support-cel  border conner8"><img alt="" src="/media/skins/upload/phone2.png"><span class="tuvan-tt">Tổng đài</span><br><span class="tuvan-phone"><a href="tel:1900558896"><b>1900.5588.96</b></a></span></span>
            </div>
        </div>
 <div class="conner8 border box-bg top-m">
        	<p class="box_tt">Danh mục</p>
                        <?php
wp_nav_menu(
    array(
        'menu' => 'Main Menu',
        'container' => '',
        'menu_class' => 'nav_hr',
        'menu_id' => '',
        'theme_location' => 'mndvutop3' 
    )     
);
?> 
        </div>
<?php
if(trim($ndvu['home12tpage2'])!=''){
    echo '
<script src="/media/js/slidebox.js" type="text/javascript"></script>    
    <div id="alrp-slidebox" style="text-align: left; bottom: -500px;">
	<div class="slidebox_ct">
    <div class="slidebox_ctf">
 
      '.html_entity_decode(str_replace("\&#039;","&#039;",str_replace("&#039;","'",$ndvu['home12tpage2']))).'
       
   </div></div>
</div>
<div id="alrp-slidebox-anchor"></div>';
}
?>
        <div class="top-m">
			<img src="/media/skins/upload/gui-cau-hoi-tu-van.png" alt="">
            <?php echo do_shortcode('[contact-form-7 id="51668" title="Gửi câu hỏi"]');?>
        	
        </div>
        
    	

    	<div class="conner8 border box-bg top-m">
        	<p class="box_tt">Hình ảnh trước sau</p>
            <div class="box_ct2">
				<a href=""><img src="http://hutmothucuc.com/wp-content/uploads/2014/12/1376274273-cau-chuyen-beo-bung-cua-dan-van-phong-5-.jpg"></a>
            </div>
        </div>
    	<div class="conner8 border box-bg top-m">
        	<p class="box_tt">Video clips</p>
            <div class="box_ct2">
				<iframe width='100%' height='190' frameborder='0' class='ifkhachhang' src='https://www.youtube.com/embed/wzcEKC7j19g' allowfullscreen="true"></iframe>
            </div>
        </div>
        
        <!-- <div class="top-m">
        
        	<a href="<?php echo $ndvu['home6d'];?>"><img class="box_gui_cauhoi_space" src="/media/skins/upload/danh-gia.png" alt=""></a>
            <a href="<?php echo $ndvu['home6e'];?>"><img class="box_gui_cauhoi_space" src="/media/skins/upload/loi-khuyen.png" alt=""></a>
        </div> -->
<?php //get_tuvan(16);?> 
        <?php get_hoidap($ndvu['home10']);?>
    	<?php get_tuvan($ndvu['home9']);?>
    	
	</aside>