<?php

add_action('init','of_options');

if (!function_exists('of_options'))
{
	function of_options()
	{
		//Access the WordPress Categories via an Array
		$of_categories 		= array();  
		$of_categories_obj 	= get_categories('hide_empty=0');
		foreach ($of_categories_obj as $of_cat) {
		    $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;}
		$categories_tmp 	= array_unshift($of_categories, "Select a category:");    
	       
		//Access the WordPress Pages via an Array
		$of_pages 			= array();
		$of_pages_obj 		= get_pages('sort_column=post_parent,menu_order');    
		foreach ($of_pages_obj as $of_page) {
		    $of_pages[$of_page->ID] = $of_page->post_name; }
		$of_pages_tmp 		= array_unshift($of_pages, "Select a page:");       
	
		//Testing 
		$of_options_select 	= array("one","two","three","four","five"); 
		$of_options_radio 	= array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five");
		
		//Sample Homepage blocks for the layout manager (sorter)
		$of_options_homepage_blocks = array
		( 
			"disabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_one"		=> "Block One",
				"block_two"		=> "Block Two",
				"block_three"	=> "Block Three",
			), 
			"enabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_four"	=> "Block Four",
			),
		);


		//Stylesheets Reader
		$alt_stylesheet_path = LAYOUT_PATH;
		$alt_stylesheets = array();
		
		if ( is_dir($alt_stylesheet_path) ) 
		{
		    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) 
		    { 
		        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) 
		        {
		            if(stristr($alt_stylesheet_file, ".css") !== false)
		            {
		                $alt_stylesheets[] = $alt_stylesheet_file;
		            }
		        }    
		    }
		}


		//Background Images Reader
		$bg_images_path = get_stylesheet_directory(). '/images/bg/'; // change this to where you store your bg images
		$bg_images_url = get_template_directory_uri().'/images/bg/'; // change this to where you store your bg images
		$bg_images = array();
		
		if ( is_dir($bg_images_path) ) {
		    if ($bg_images_dir = opendir($bg_images_path) ) { 
		        while ( ($bg_images_file = readdir($bg_images_dir)) !== false ) {
		            if(stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false) {
		            	natsort($bg_images); //Sorts the array into a natural order
		                $bg_images[] = $bg_images_url . $bg_images_file;
		            }
		        }    
		    }
		}
		

		/*-----------------------------------------------------------------------------------*/
		/* TO DO: Add options/functions that use these */
		/*-----------------------------------------------------------------------------------*/
		
		//More Options
		$uploads_arr 		= wp_upload_dir();
		$all_uploads_path 	= $uploads_arr['path'];
		$all_uploads 		= get_option('of_uploads');
		$other_entries 		= array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
		$body_repeat 		= array("no-repeat","repeat-x","repeat-y","repeat");
		$body_pos 			= array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");
		
		// Image Alignment radio box
		$of_options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 
		
		// Image Links to Options
		$of_options_image_link_to = array("image" => "The Image","post" => "The Post"); 


/*-----------------------------------------------------------------------------------*/
/* The Options Array */
/*-----------------------------------------------------------------------------------*/

// Set the Options Array
global $of_options;
$of_options = array();

/*-----------------------------------------------------------------------------------*/
/* Phần thiết lập chung */
/*-----------------------------------------------------------------------------------*/


$of_options[] = array( "name" 		=> "THIẾT LẬP CHUNG",
					   "type" 		=> "heading",
					   "icon"		=> ADMIN_IMAGES . "icon-slider.png"
				);
					
$of_options[] = array(  "name" 		=> "Hello there!",
						"desc" 		=> "",
						"id" 		=> "introduction",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Welcome to the Options</h3>
					",
						"icon" 		=> true,
						"type" 		=> "info"
				);

$of_options[] = array(  "name" 	   => "HOTLINE",
						"desc" 	   => "Số Hotline liên lạc",
						"id" 		 => "hotline_thucuc",
						"std" 		=> "",
						"type" 	   => "text"
				);
				
$of_options[] = array(  "name" 	   => "Tel",
						"desc" 	   => "Số Phone liên lạc",
						"id" 		 => "phone_thucuc",
						"std" 		=> "",
						"type" 	   => "text"
				);
				
$of_options[] = array(  "name" 	   => "Email",
						"desc" 	   => "Email của bạn",
						"id" 		 => "email_thucuc",
						"std" 		=> "",
						"type" 	   => "text"
				);								
				
				
$of_options[] = array(  "name" 	   => "Website - Tên Trung Tâm",
						"desc" 	   => "Website - Tên Trung Tâm của bạn",
						"id" 		 => "site_thucuc",
						"std" 		=> "",
						"type" 	   => "text"
				);			
$of_options[] = array(  "name" 	   => "Tel Kinh doanh",
						"desc" 	   => "Số điện thoại kinh doanh giấy dán tường.",
						"id" 		 => "kinhdoanh_tuong",
						"std" 		=> "",
						"type" 	   => "text"
);
$of_options[] = array(  "name" 	   => "Tel Kỹ thuật",
						"desc" 	   => "Số điện thoại kỹ thuật liên lạc với giấy dán tường",
						"id" 		 => "kythuat_tuong",
						"std" 		=> "",
						"type" 	   => "text"
);					
$of_options[] = array(  "name" 	   => "Số điện thoại phản ánh chất lượng DV",
						"desc" 	   => "Phone phản ánh chất lượng DV",
						"id" 		 => "tag_Dv",
						"std" 		=> "",
						"type" 	   => "text"
				);						
$of_options[] = array(  "name" 	   => "Tư vấn chuyên gia",
						"desc" 	   => "Số điện thoại tư vấn chuyên gia",
						"id" 		 => "tag_chuyengia",
						"std" 		=> "",
						"type" 	   => "text"
);						
$of_options[] = array(  "name" 	   => "Hotline 1",
						"desc" 	   => "Hotline 1",
						"id" 		 => "tag_hotline",
						"std" 		=> "",
						"type" 	   => "text"
				);						
$of_options[] = array(  "name" 	   => "Hotline 2",
						"desc" 	   => "Hotline 2",
						"id" 		 => "tag_hotline2",
						"std" 		=> "",
						"type" 	   => "text"
				);
$of_options[] = array(  "name" 	   => "Yahoo",
						"desc" 	   => "Yahoo support",
						"id" 		 => "tag_yahoo",
						"std" 		=> "",
						"type" 	   => "text"
				);								
$of_options[] = array(  "name" 	   => "Skype",
						"desc" 	   => "Skype support",
						"id" 		 => "tag_skype",
						"std" 		=> "",
						"type" 	   => "text"
				);						
$of_options[] = array(  "name" 	   => "Yahoo 2",
						"desc" 	   => "Yahoo support 2",
						"id" 		 => "tag_yahoo2",
						"std" 		=> "",
						"type" 	   => "text"
);								
$of_options[] = array(  "name" 	   => "Skype 2",
						"desc" 	   => "Skype support 2",
						"id" 		 => "tag_skype2",
						"std" 		=> "",
						"type" 	   => "text"
);								
$of_options[] = array(  "name" 	   => "Thẻ H1",
						"desc" 	   => "Thẻ H1",
						"id" 		 => "tag_h1",
						"std" 		=> "",
						"type" 	   => "text"
);	
$of_options[] = array(  "name" 	   => "Đơn vị tính",
						"desc" 	   => "Đơn vị tính",
						"id" 		 => "donvi_tinh",
						"std" 		=> "",
						"type" 	   => "text"
);	
$of_options[] = array(  "name" 	   => "Giá chung",
						"desc" 	   => "Giá chung",
						"id" 		 => "donvi_chung",
						"std" 		=> "",
						"type" 	   => "text"
);	

$of_options[] = array(  "name" 	   => "Giấy dán tường theo công năng",
						"desc" 	   => "Giấy dán tường theo công năng",
						"id" 		 => "ma_giaycongnang",
						"std" 		=> "",
						"type" 	   => "text"
);								

/*-----------------------------------------------------------------------------------*/
/* Phần Header */
/*-----------------------------------------------------------------------------------*/				
				
$of_options[] = array( "name" 		=> "Header",
					   "type" 		=> "heading"
				);				
$of_options[] = array(  "name" 		=> "Logo Image",
						"desc" 		=> "Upload logo cho website của bạn.",
						"id" 		=> "logo_img",
						// Use the shortcodes [site_url] or [site_url_secure] for setting default URLs
						"std" 		=> "",
						"type" 		=> "upload"
				);	
$of_options[] = array(  "name" 		=> "Favicon Image",
						"desc" 		=> "Upload Favicon cho website của bạn.",
						"id" 		=> "favicon_img",
						// Use the shortcodes [site_url] or [site_url_secure] for setting default URLs
						"std" 		=> "",
						"type" 		=> "upload"
				);
				
$of_options[] = array(  "name" 		=> "Slogan",
						"desc" 		=> "Thêm slogan vào dưới icon của bạn.",
						"id" 		=> "slogan_tgb",
						// Use the shortcodes [site_url] or [site_url_secure] for setting default URLs
						"std" 		=> "",
						"type" 		=> "text"
				);											
/*-----------------------------------------------------------------------------------*/
/* Phần Footer */
/*-----------------------------------------------------------------------------------*/
$of_options[] = array( "name" 		=> "Footer",
					   "type" 		=> "heading"
				);				

$of_options[] = array(  "name" 	   => "Địa chỉ liên hệ",
						"desc" 	   => "Nhập địa chỉ của bạn.",
						"id" 		 => "dia_chi",
						"std" 		=> "Số 09 - Ngõ 196 - Trần Duy Hưng - Hà Nội.",
						"type" 	   => "textarea"
				);										
								
$of_options[] = array(  "name" 	   => "Google Analytics",
						"desc" 	   => "Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.",
						"id" 		 => "google_analytics",
						"std" 		=> "",
						"type" 	   => "textarea"
				);
$of_options[] = array(  "name" 	   => "Google Webmaster Tool",
						"desc" 	   => "Paste your Google Webmaster Tool (or other) tracking code here. This will be added into the footer template of your theme.",
						"id" 		 => "google_webmaster_tool",
						"std" 		=> "",
						"type" 	   => "textarea"
				);
$of_options[] = array(  "name" 	   => "Remarketing adwords",
						"desc" 	   => "Paste your Remarketing adwords (or other) tracking code here. This will be added into the footer template of your theme.",
						"id" 		 => "remarketing_adwords",
						"std" 		=> "",
						"type" 	   => "textarea"
				);					
						
/*-----------------------------------------------------------------------------------*/
/* Phần Mạng Xã Hội */
/*-----------------------------------------------------------------------------------*/				
$of_options[] = array( "name" 		=> "Social networking",
					   "type" 		=> "heading",
					   "icon"		=> ADMIN_IMAGES . "icon-slider.png"
				);
			
$of_options[] = array(  "name" 	   => "Social Network",
						"desc" 	   => "Tích hợp mạng xã hội.",
						"id" 		 => "offline",
						"std" 		=> 0,
						"folds" 	  => 1,
						"type" 	   => "checkbox"
				);				
				
$of_options[] = array(  "name" 	   => "Facebook",
						"desc" 	   => "Bạn điền Link Facebook hoặc Fanpage",
						"id" 		 => "hidden_link_fb",
						"std" 		=> "",
						"fold" 	   => "offline", /* the checkbox hook */
						"type" 	   => "text"
				);
$of_options[] = array(  "name" 	   => "Facebook Ifame",
						"desc" 	   => "Bạn điền Link Iframe Fanpage Facebook",
						"id" 		 => "hidden_link_iframe_fb",
						"std" 		=> "",
						"fold" 	   => "offline", /* the checkbox hook */
						"type" 	   => "textarea"
				);				
				
				
$of_options[] = array( "name" 		=> "Google Plus",
						"desc" 	   => "Bạn điền Link G+",
						"id" 		 => "hidden_link_gg",
						"std" 		=> "",
						"fold" 	   => "offline", /* the checkbox hook */
						"type" 	   => "text"
				);	
$of_options[] = array( "name" 		=> "Youtube",
						"desc" 	   => "Bạn điền Link YouTube",
						"id" 		 => "hidden_link_youtube",
						"std" 		=> "",
						"fold" 	   => "offline", /* the checkbox hook */
						"type" 	   => "text"
				);
$of_options[] = array( "name" 		=> "Twitter",
						"desc" 	   => "Bạn điền Link Twitter",
						"id" 		 => "hidden_link_twitter",
						"std" 		=> "",
						"fold" 	   => "offline", /* the checkbox hook */
						"type" 	   => "text"
				);	
$of_options[] = array( "name" 		=> "Pinterest",
						"desc" 	   => "Bạn điền Link Pinterest",
						"id" 		 => "hidden_link_pinterest",
						"std" 		=> "",
						"fold" 	   => "offline", /* the checkbox hook */
						"type" 	   => "text"
				);						
						
									
/*-----------------------------------------------------------------------------------*/
/* Phần Slide Gallery Đối tác */
/*-----------------------------------------------------------------------------------*/


$of_options[] = array( "name" 		=> "Gallery Banner Đối tác",
					   "type" 		=> "heading",
					   "icon"		=> ADMIN_IMAGES . "icon-slider.png"
				);
$of_options[] = array( "name" 		=> "Danh sách ảnh Đối tác",
					   "desc"		=> "Bạn nhập ảnh side muốn hiển thị.",
					   "id" 	      => "doitac_slide",
					   "std" 		 => "",
					   "type" 	    => "slider");						
									
/*-----------------------------------------------------------------------------------*/
/* Phần Slide Gallery ảnh */
/*-----------------------------------------------------------------------------------*/


$of_options[] = array( "name" 		=> "Gallery Banner Home",
					   "type" 		=> "heading",
					   "icon"		=> ADMIN_IMAGES . "icon-slider.png"
				);
$of_options[] = array( "name" 		=> "Danh sách ảnh Slide",
					   "desc"		=> "Bạn nhập ảnh side muốn hiển thị.",
					   "id" 	      => "img_slide",
					   "std" 		 => "",
					   "type" 	    => "slider");						
									

/*-----------------------------------------------------------------------------------*/
/* Phần Slide Gallery Giảm cân - 960x276 */
/*-----------------------------------------------------------------------------------*/


$of_options[] = array( "name" 		=> "Gallery Giảm cân 960x276",
					   "type" 		=> "heading",
					   "icon"		=> ADMIN_IMAGES . "icon-slider.png"
				);
$of_options[] = array( "name" 		=> "Danh sách ảnh Slide",
					   "desc"		=> "Bạn nhập ảnh side muốn hiển thị.",
					   "id" 	      => "img_slide_weight",
					   "std" 		 => "",
					   "type" 	    => "slider");						
								
				
//Advanced Settings
$of_options[] = array( 	"name" 		=> "Advanced Settings",
						"type" 		=> "heading"
				);
				
$of_options[] = array( 	"name" 		=> "Folding Checkbox",
						"desc" 		=> "This checkbox will hide/show a couple of options group. Try it out!",
						"id" 		=> "offline",
						"std" 		=> 0,
						"folds" 	=> 1,
						"type" 		=> "checkbox"
				);
				
$of_options[] = array( 	"name" 		=> "Hidden option 1",
						"desc" 		=> "This is a sample hidden option 1",
						"id" 		=> "hidden_option_1",
						"std" 		=> "Hi, I\'m just a text input",
						"fold" 		=> "offline", /* the checkbox hook */
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> "Hidden option 2",
						"desc" 		=> "This is a sample hidden option 2",
						"id" 		=> "hidden_option_2",
						"std" 		=> "Hi, I\'m just a text input",
						"fold" 		=> "offline", /* the checkbox hook */
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> "Hello there!",
						"desc" 		=> "",
						"id" 		=> "introduction_2",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Grouped Options.</h3>
						You can group a bunch of options under a single heading by removing the 'name' value from the options array except for the first option in the group.",
						"icon" 		=> true,
						"type" 		=> "info"
				);
				
				$of_options[] = array( 	"name" 		=> "Some pretty colors for you",
										"desc" 		=> "Color 1.",
										"id" 		=> "example_colorpicker_3",
										"std" 		=> "#2098a8",
										"type" 		=> "color"
								);
								
				$of_options[] = array( 	"name" 		=> "",
										"desc" 		=> "Color 2.",
										"id" 		=> "example_colorpicker_4",
										"std" 		=> "#2098a8",
										"type" 		=> "color"
								);
								
				$of_options[] = array( 	"name" 		=> "",
										"desc" 		=> "Color 3.",
										"id" 		=> "example_colorpicker_5",
										"std" 		=> "#2098a8",
										"type" 		=> "color"
								);
								
				$of_options[] = array( 	"name" 		=> "",
										"desc" 		=> "Color 4.",
										"id" 		=> "example_colorpicker_6",
										"std" 		=> "#2098a8",
										"type" 		=> "color"
								);
				
// Backup Options
$of_options[] = array( 	"name" 		=> "Backup Options",
						"type" 		=> "heading",
						"icon"		=> ADMIN_IMAGES . "icon-slider.png"
				);
				
$of_options[] = array( 	"name" 		=> "Backup and Restore Options",
						"id" 		=> "of_backup",
						"std" 		=> "",
						"type" 		=> "backup",
						"desc" 		=> 'You can use the two buttons below to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.',
				);
				
$of_options[] = array( 	"name" 		=> "Transfer Theme Options Data",
						"id" 		=> "of_transfer",
						"std" 		=> "",
						"type" 		=> "transfer",
						"desc" 		=> 'You can tranfer the saved options data between different installs by copying the text inside the text box. To import data from another install, replace the data in the text box with the one from another install and click "Import Options".',
				);
				
	}//End function: of_options()
}//End chack if function exists: of_options()
?>
