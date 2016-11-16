<div class="wrap">

<style type="text/css">
   div.inside ul li {
      line-height: 16px;
      list-style-type: square;
      margin-left: 15px;
   }
   .sse_form label { width:150px; }
</style>

<h2>Simple Social Expandable - <?php _e('Settings'); ?>:</h2>

<p><?php _e('<strong>Simple Social Expandable</strong> by <strong>Alex Jensen</strong>. This plugin adds a social media buttons, such as: <strong>Google +1</strong>, <strong>Google Follow</strong>, <strong>Facebook Like it</strong>, <strong>Twitter share</strong> and <strong>Pinterest</strong>. The most flexible social buttons plugin ever.', 'simplesocialexpandable'); ?></p>

<?php

if(strtolower($_POST['hiddenconfirm']) == 'y') {

	/**
	 * Compile settings array
	 * @see http://codex.wordpress.org/Function_Reference/wp_parse_args
	 */

	

	$updateSettings = array(
		'googleplus' => $_POST['sse_googleplus'],
		'googlefollow' =>$_POST['sse_googlefollow'],
		'fblike' => $_POST['sse_fblike'],
		'twitter' => $_POST['sse_twitter'],
		'pinterest' => $_POST['sse_pinterest'],
		'youtube' => $_POST['sse_youtube'],
		'float' => $_POST['sse_float'],
		'follow_button' =>$_POST['sse_follow_button'],
		
		'beforepost' => $_POST['sse_beforepost'],
		'afterpost' => $_POST['sse_afterpost'],
		'beforepage' => $_POST['sse_beforepage'],
		'afterpage' => $_POST['sse_afterpage'],
		'beforearchive' => $_POST['sse_beforearchive'],
		'afterarchive' => $_POST['sse_afterarchive'],

		'showfront' => $_POST['sse_showfront'],
		'showcategory' => $_POST['sse_showcategory'],
		'showarchive' => $_POST['sse_showarchive'],
		'showtag' => $_POST['sse_showtag'],
		
		'twitterusername' => str_replace(array("@", " "), "", $_POST['sse_twitterusername']),
		'googlelink' =>  $_POST['sse_googlelink'],
		'facebooklink' =>    $_POST['sse_facebooklink'],
		'pinterestlink' =>  $_POST['sse_pinterestlink'],
		'youtubelink' =>  $_POST['sse_youtubelink']
	);

	$this->update_settings( $updateSettings );

} 

/**
 * HACK: Use one big array instead of a bunchload of single options
 * @author Fabian Wolf
 * @link http://usability-idealist.de/
 * @since 1.2.1
 */

// get settings from database
$settings = $this->get_settings();

extract( $settings, EXTR_PREFIX_ALL, 'sse' );

?>
<div><a href="http://web2rule.com/wp-banner/" target="_blank"><img src="<?php echo plugins_url(); ?>/simple-social-expandable/banner.jpg" /></a></div>

<div class="postbox-container" style="width:69%">
   <div id="poststuff">
      <form class="sse_form" name="sse_form" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">

      <div class="postbox">
         <h3><?php _e('Select buttons', 'simplesocialexpandable'); ?> </h3>
         <div class="inside">
         
            <h4><?php _e('Select social media buttons:', 'simplesocialexpandable'); ?></h4>

			<table>
			<tr><td><label for="sse_googleplus"><?php _e('Google plus one (+1)', 'simplesocialexpandable'); ?></label></td>
<td><select name="sse_googleplus" id="sse_googleplus">
				<option value=""<?php if(empty($sse_googleplus) != false) {
				 	 ?>selected="selected"<?php
				} ?>><?php _e('inactive', 'simplesocialexpandable'); ?></option>

			<?php for($pos = 1; $pos < 5; $pos++) { ?>
				<option value="<?php echo $pos; ?>"<?php if($sse_googleplus == $pos) {
					 ?>selected="selected"<?php
				} ?>> # <?php echo $pos; ?> </option>
			<?php } ?>
			</select></td></tr>
			<tr><td><label for="sse_fblike"><?php _e('Facebook Like it', 'simplesocialexpandable'); ?></label></td>
				<td><select name="sse_fblike" id="sse_fblike">
				<option value=""<?php if(empty($sse_fblike) != false) {
				 	 ?>selected="selected"<?php
				} ?>><?php _e('inactive', 'simplesocialexpandable'); ?></option>

			<?php for($pos = 1; $pos < 5; $pos++) { ?>
				<option value="<?php echo $pos; ?>"<?php if($sse_fblike == $pos) {
					 ?>selected="selected"<?php
				} ?>> # <?php echo $pos; ?> </option>
			<?php } ?>
			</select> </td></tr>

			<!-- /fblike -->

			<!-- twitter -->
			<tr><td><label for="sse_twitter"><?php _e('Twitter share', 'simplesocialexpandable'); ?></label></td>
<td><select name="sse_twitter" id="sse_twitter">
				<option value=""<?php if(empty($sse_twitter) != false) {
				 	 ?>selected="selected"<?php
				} ?>><?php _e('inactive', 'simplesocialexpandable'); ?></option>

			<?php for($pos = 1; $pos < 5; $pos++) { ?>
				<option value="<?php echo $pos; ?>"<?php if($sse_twitter == $pos) {
					 ?>selected="selected"<?php
				} ?>> # <?php echo $pos; ?> </option>
			<?php } ?>
			</select></td></tr>

			<!-- /twitter -->
			
			<!--  pinterest -->
			<tr><td><label for="sse_pinterest"><?php _e('Pinterest - Pin It', 'simplesocialexpandable'); ?></label> </td>
<td><select name="sse_pinterest" id="sse_pinterest">
				<option value=""<?php if(empty($sse_pinterest) != false) {
				 	 ?>selected="selected"<?php
				} ?>><?php _e('inactive', 'simplesocialexpandable'); ?></option>

			<?php for($pos = 1; $pos < 5; $pos++) { ?>
				<option value="<?php echo $pos; ?>"<?php if($sse_pinterest == $pos) {
					 ?>selected="selected"<?php
				} ?>> # <?php echo $pos; ?> </option>
			<?php } ?>
			</select></td></tr>
            </table>
            <!--  /pinterest -->
			
            <!--  Youtube 
			<p>			<label for="sse_youtube"><?php _e('Youtube Subscription', 'simplesocialexpandable'); ?></label> 
<select name="sse_youtube" id="sse_youtube">
				<option value=""<?php if(empty($sse_youtube) != false) {
				 	 ?>selected="selected"<?php
				} ?>><?php _e('inactive', 'simplesocialexpandable'); ?></option>

			<?php for($pos = 1; $pos < 6; $pos++) { ?>
				<option value="<?php echo $pos; ?>"<?php if($sse_youtube == $pos) {
					 ?>selected="selected"<?php
				} ?>> # <?php echo $pos; ?> </option>
			<?php } ?>
			</select> &nbsp; </p>
	
            <!--  /Youtube -->
<h3><?php _e('Follow URL'); ?></h3>
<div style="float:right; margin-right:160px;margin-top:100px;">
         	<a href="http://web2rule.com/simple-social-expandable-set-up-video/" target="_blank"><img src="<?php echo plugins_url(); ?>/simple-social-expandable/w2.jpg" alt="W2 Plugin Set up" /></a>
         </div>
         <div >
           <table>
           <tr><td><label for="sse_follow_button"><?php _e('Follow Button', 'simplesocialexpandable'); ?>: </td><td>On :<input type="radio" name="sse_follow_button" id="sse_follow_button" value="1" <?php if($sse_follow_button=='1') { echo 'checked="checked"'; } ?>/>&nbsp;&nbsp;Off :<input type="radio" name="sse_follow_button" id="sse_follow_button" value="0" <?php if($sse_follow_button=='0') { echo 'checked="checked"'; } ?>/></label></td></tr>
           
            <tr><td><label for="sse_twitterusername"><?php _e('Twitter @username', 'simplesocialexpandable'); ?>: </td><td><input type="text" name="sse_twitterusername" size="40" id="sse_twitterusername" value="<?php echo (isset($sse_twitterusername)) ? $sse_twitterusername : "";?>" /></label></td></tr>
           
            <tr><td><label for="sse_googlelink"><?php _e('Google Author Link ', 'simplesocialexpandable'); ?>: </td><td><input type="text" name="sse_googlelink"  size="40"  id="sse_googlelink" value="<?php echo (isset($sse_googlelink)) ? $sse_googlelink : "";?>" /></label></td></tr>
           
            <tr><td><label for="sse_facebooklink"><?php _e('Facebook Profile Link ', 'simplesocialexpandable'); ?>: </td><td><input type="text" name="sse_facebooklink" size="40"  id="sse_facebooklink" value="<?php echo (isset($sse_facebooklink)) ? $sse_facebooklink : "";?>" /></label></td></tr>
 
            <tr><td><label for="sse_pinterestlink"><?php _e('Pinterest Profile Link ', 'simplesocialexpandable'); ?>: </td><td><input type="text" name="sse_pinterestlink" size="40"  id="sse_pinterestlink" value="<?php echo (isset($sse_pinterestlink)) ? $sse_pinterestlink : "";?>" /></label></td></tr>
			 <tr><td><label for="sse_youtubelink"><?php _e('Youtube Channel Link ', 'simplesocialexpandable'); ?>: </td><td><input type="text" name="sse_youtubelink" size="40"  id="sse_youtubelink" value="<?php echo (isset($sse_youtubelink)) ? $sse_youtubelink : "";?>" /></label></td></tr>   
             </table>         
            </div>    
    
    
            
			<p><label for="sse_override_css"><input type="checkbox" name="sse_override_css" id="sse_override_css" value="1" <?php if($sse_override_css) { echo 'checked="checked"'; } ?>/> <?php _e('Disable plugin CSS (only advanced users)'); ?></label></p>
            
            <p>Float Left<input type="radio" name="sse_float" id="sse_floatleft" value="left" <?php if($sse_float=='left') { echo 'checked="checked"'; } ?>/> Float Right<input type="radio" name="sse_float" id="sse_floatright" value="right" <?php if($sse_float=='right') { echo 'checked="checked"'; } ?>/>  Float None<input type="radio" name="sse_float" id="sse_floatright" value="none" <?php if($sse_float=='none') { echo 'checked="checked"'; } ?>/></p>
            
            <p>Shortcode - [SSE]<br/>
            Function - <code> &#60;?php get_sse(); ?&#62;</code> </p>
         </div>
      </div>

      <div class="postbox">
         <h3><?php _e('Single posts - display settings', 'simplesocialexpandable'); ?></h3>
         <div class="inside">
            <h4><?php _e('Place buttons on single post:', 'simplesocialexpandable'); ?></h4>
            <p><input type="checkbox" name="sse_beforepost" id="sse_beforepost" value="1" <?php if(!empty($sse_beforepost)) { ?>checked="checked"<?php } ?> /> <label for="sse_beforepost"><?php _e('Before the content', 'simplesocialexpandable'); ?></label></p>
            <p><input type="checkbox" name="sse_afterpost" id="sse_afterpost" value="1" <?php if(!empty($sse_afterpost)) { ?>checked="checked"<?php } ?> /> <label for="sse_afterpost"><?php _e('After the content', 'simplesocialexpandable'); ?></label></p>
         </div>
      </div>

      <div class="postbox">
         <h3><?php _e('Single pages - display settings', 'simplesocialexpandable'); ?></h3>
         <div class="inside">
            <h4><?php _e('Place buttons on single pages:', 'simplesocialexpandable'); ?></h4>
            <p><input type="checkbox" name="sse_beforepage" id="sse_beforepage" value="1" <?php if(!empty($sse_beforepage)) { ?>checked="checked"<?php } ?> /> <label for="sse_beforepage"><?php _e('Before the page content', 'simplesocialexpandable'); ?></label></p>
            <p><input type="checkbox" name="sse_afterpage" id="sse_afterpage" value="1" <?php if(!empty($sse_afterpage)) { ?>checked="checked"<?php } ?> /> <label for="sse_afterpage"><?php _e('After the page content', 'simplesocialexpandable'); ?></label></p>
         </div>
      </div>

      <div class="postbox">
         <h3><?php _e('Archives - display settings', 'simplesocialexpandable'); ?></h3>
         <div class="inside">
            <h4><?php _e('Select additional places to display buttons:', 'simplesocialexpandable'); ?></h4>
            <p><input type="checkbox" name="sse_showfront" id="sse_showfront" value="1" <?php if(!empty($sse_showfront)) { ?>checked="checked"<?php } ?> /> <label for="sse_showfront"><?php _e('Show at frontpage', 'simplesocialexpandable'); ?></label></p>
            <p><input type="checkbox" name="sse_showcategory" id="sse_showcategory" value="1" <?php if(!empty($sse_showcategory)) { ?>checked="checked"<?php } ?> /> <label for="sse_showcategory"><?php _e('Show at category pages', 'simplesocialexpandable'); ?></label></p>
            <p><input type="checkbox" name="sse_showarchive" id="sse_showarchive" value="1" <?php if(!empty($sse_showarchive)) { ?>checked="checked"<?php } ?> /> <label for="sse_showarchive"><?php _e('Show at archive pages', 'simplesocialexpandable'); ?></label></p>
            <p><input type="checkbox" name="sse_showtag" id="sse_showtag" value="1" <?php if(!empty($sse_showtag)) { ?>checked="checked"<?php } ?> /> <label for="sse_showtag"><?php _e('Show at tag pages', 'simplesocialexpandable'); ?></label></p>

            <h4><?php _e('Place buttons on archives:', 'simplesocialexpandable'); ?></h4>
            <p><input type="checkbox" name="sse_beforearchive" id="sse_beforearchive" value="1" <?php if(!empty($sse_beforearchive)) { ?>checked="checked"<?php } ?> /> <label for="sse_beforearchive"><?php _e('Before the content', 'simplesocialexpandable'); ?></label></p>
            <p><input type="checkbox" name="sse_afterarchive" id="sse_afterarchive" value="1" <?php if(!empty($sse_afterarchive)) { ?>checked="checked"<?php } ?> /> <label for="sse_afterarchive"><?php _e('After the content', 'simplesocialexpandable'); ?></label></p>
         </div>
      </div>
      
      <!--<div class="postbox">
         <h3><?php _e('Additional features'); ?></h3>
         <div class="inside">
            <p><label for="sse_twitterusername"><?php _e('Twitter @username', 'simplesocialexpandable'); ?>: <input type="text" name="sse_twitterusername" id="sse_twitterusername" value="<?php echo (isset($sse_twitterusername)) ? $sse_twitterusername : "";?>" /></label></p>
            
            <p><label for="sse_googlelink"><?php _e('Google Profile Link ', 'simplesocialexpandable'); ?>: <input type="text" name="sse_googlelink" id="sse_googlelink" value="<?php echo (isset($sse_googlelink)) ? $sse_googlelink : "";?>" /></label></p>
           
            <p><label for="sse_facebooklink"><?php _e('Facebook Profile Link ', 'simplesocialexpandable'); ?>: <input type="text" name="sse_facebooklink" id="sse_facebooklink" value="<?php echo (isset($sse_facebooklink)) ? $sse_facebooklink : "";?>" /></label></p>
 
            <p><label for="sse_pinterestlink"><?php _e('Pinterest Profile Link ', 'simplesocialexpandable'); ?>: <input type="text" name="sse_pinterestlink" id="sse_pinterestlink" value="<?php echo (isset($sse_pinterestlink)) ? $sse_pinterestlink : "";?>" /></label></p>
			 <p><label for="sse_youtubelink"><?php _e('Youtube Channel Link ', 'simplesocialexpandable'); ?>: <input type="text" name="sse_youtubelink" id="sse_youtubelink" value="<?php echo (isset($sse_youtubelink)) ? $sse_youtubelink : "";?>" /></label></p>            
            </div> 
         
      </div> -->

      <div class="submit">
         <input type="hidden" name="hiddenconfirm" value="Y" />
         <input type="submit" name="Submit" class="button-primary" value="<?php _e('Save Changes'); ?>" />
      </div>

   </form>
</div>
</div>


</div>