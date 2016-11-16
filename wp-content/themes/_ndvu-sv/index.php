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
//echo html_entity_decode(str_replace("\&#039;","&#039;",str_replace("&#039;","'",$ndvu['home12slide']))); ?> 
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
<?php echo html_entity_decode(str_replace("\&#039;","&#039;",str_replace("&#039;","'",$ndvu['home12thome'])));
hoidaptrangchu($ndvu['home6az']);

 ?>  

<div class="baochi">
        	<h4 class="baochi_tt">Báo chí nói về chúng tôi </h4>
            <a href="/bao-chi-noi-ve-chung-toi/"><img alt="" src="/media/skins/upload/adv-24h.jpg"  style="margin-top:10px"></a>
            <a href="/bao-chi-noi-ve-chung-toi/"><img alt="" src="/media/skins/upload/adv-vnexpress.jpg"></a>
            <a href="/bao-chi-noi-ve-chung-toi/"><img alt="" src="/media/skins/upload/adv-eva1.jpg"></a>
		<a href="/bao-chi-noi-ve-chung-toi/"><img alt="" src="/media/skins/upload/adv-ngoi-sao.jpg"></a>
        </div><div class="clear"></div>
<?php
kienthuctrangchu($ndvu['home6bz']);
 ?>              
</div> </div>     
<?php
get_footer();
?>