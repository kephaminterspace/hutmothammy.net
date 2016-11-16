<?php
include('fun-f.php');
include('f-newform.php');
include('f-comment.php');

add_action('init', 'myStartSession', 1);
add_action('wp_logout', 'myEndSession');
add_action('wp_login', 'myEndSession');

function myStartSession() {
    if(!session_id()) {
        session_start();
    }
}

function myEndSession() {
    session_destroy ();
}


unset($GLOBALS['wpdb']->dbpassword);
unset($GLOBALS['wpdb']->dbname);

function hideprofile($contactmethods){
unset ($contactmethods['aim']);
return $contactmethods;
}
add_filter('user_contactmethods', 'hideprofile', 10, 1);

// xóa admin picker //
if(is_admin()){
  remove_action("admin_color_scheme_picker", "admin_color_scheme_picker");
}
// unregister all widgets
function unregister_default_widgets() {
    
     unregister_widget('WP_Widget_Pages');
     unregister_widget('WP_Widget_Calendar');
     unregister_widget('WP_Widget_Archives');
     //unregister_widget('WP_Widget_Links');
     unregister_widget('WP_Widget_Meta');
     //unregister_widget('WP_Widget_Search');
     //unregister_widget('WP_Widget_Text');
     //unregister_widget('WP_Widget_Categories');
     //unregister_widget('WP_Widget_Recent_Posts');
     unregister_widget('WP_Widget_Recent_Comments');
     unregister_widget('WP_Widget_RSS');
     //unregister_widget('WP_Widget_Tag_Cloud');
     //unregister_widget('WP_Nav_Menu_Widget');
     //unregister_widget('Twenty_Eleven_Ephemera_Widget');
}
add_action('widgets_init', 'unregister_default_widgets', 11);
remove_action('wp_head', 'wp_generator'); 

add_theme_support( 'post-thumbnails' );

register_nav_menu( 'mndvutop1', 'MenuTop1' );
register_nav_menu( 'mndvutop2', 'MenuTop2' );
register_nav_menu( 'mndvutop3', 'MenuTop3' );

add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1);
add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1);
add_filter('page_css_class', 'my_css_attributes_filter', 100, 1);
function my_css_attributes_filter($var) {    
    $da = is_array($var) ? array_intersect($var, array('current-menu-item','current-menu-parent','current_page_item',$var[0])) : '';
    $da = str_replace('current-menu-item','act ',$da);
    return $da;
}

function anti_autosave() {
wp_deregister_script('autosave');
}
add_action('wp_print_scripts', 'anti_autosave');

/* Disable AutoSave, hacky-style */
function hacky_autosave_disabler( $src, $handle ) {
if( 'autosave' != $handle )
return $src;
return '';
}
add_filter( 'script_loader_src', 'hacky_autosave_disabler', 10, 2 );

/**************/
class Walker_Nav_Menu_Dropdown extends Walker_Nav_Menu{
    function start_lvl(&$output, $depth){
      $indent = str_repeat("\t", $depth); // don't output children opening tag (`<ul>`)
    }

    function end_lvl(&$output, $depth){
      $indent = str_repeat("\t", $depth); // don't output children closing tag
    }

    function start_el(&$output, $item, $depth, $args){
      // add spacing to the title based on the depth
      $item->title = str_repeat("&nbsp;", $depth * 4).$item->title;



        $output .= $indent . ' id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';  
        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';  
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';  
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';  
        $attributes .= ! empty( $item->url )        ? ' value="'   . esc_attr( $item->url        ) .'"' : '';  
        
        $item_output .= '<option'. $attributes .'>';  
        $item_output .= $args->link_before .apply_filters( 'the_title', $item->title, $item->ID );  
        $item_output .= '</option>';  
        
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );  



      // no point redefining this method too, we just replace the li tag...
      $output = str_replace('<li', '<option', $output);
    }

    function end_el(&$output, $item, $depth){
      $output .= "</option>\n"; // replace closing </li> with the option tag
    }
}

function ndvukangnam_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Widget MENU', 'ndvukangnam' ),
		'id' => 'sidebar-1',
		'description' => __( 'MENU.' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );
	register_sidebar( array(
		'name' => __( 'Dịch vụ SIDEBAR', 'ndvukangnam' ),
		'id' => 'sidebar-2',
		'description' => __( 'Dịch vụ SIDEBAR.' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );
	register_sidebar( array(
		'name' => __( 'Dịch vụ Slider Revo', 'ndvukangnam' ),
		'id' => 'sidebar-3',
		'description' => __( 'Dịch vụ Slider Revo.' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );
	register_sidebar( array(
		'name' => __( 'ADV SIDEBAR ALLPAGE', 'ndvukangnam' ),
		'id' => 'sidebar-4',
		'description' => __( 'Hiển thị SIDEBAR All Pages.' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );
	register_sidebar( array(
		'name' => __( 'ADV SINGLE POST ALLPAGE', 'ndvukangnam' ),
		'id' => 'sidebar-5',
		'description' => __( "ADV SINGLE POST ALLPAGE" ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );
	register_sidebar( array(
		'name' => __( 'ADV dưới Header', 'ndvukangnam' ),
		'id' => 'sidebar-6',
		'description' => __( "ADV dưới Header" ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );
    
}
add_action( 'widgets_init', 'ndvukangnam_widgets_init' );

add_action('the_content','replace_code');

function replace_code($content){
    $content=str_replace('\"','"',$content);
    return $content;
}

class My_Walker_Nav_Menu extends Walker_Nav_Menu {
  function start_lvl(&$output, $depth) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul class=\"my-sub-menu\">\n";
  }
}


if ( ! function_exists( 'twentyeleven_comment' ) ) :
function twentyeleven_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
    
                                
                                
		<div class="comment-body" id="div-comment-<?php comment_ID(); ?>">
                                <div class="comment-author vcard">
					<?php
						$avatar_size = 68;
						if ( '0' != $comment->comment_parent )
							$avatar_size = 39;
						echo '<strong>'.get_avatar( $comment, $avatar_size ).'';
						/* translators: 1: comment author, 2: date and time */
						printf( __( '%1$s </strong> : %2$s <span class="says">:</span>', 'twentyeleven' ),
							sprintf( '<span class="fn">%s</span>', comment_author() ),
							sprintf( '<a rel="nofollow" href="%1$s"><time datetime="%2$s">%3$s</time></a>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								/* translators: 1: date, 2: time */
								sprintf( __( '%1$s at %2$s', 'twentyeleven' ), get_comment_date(), get_comment_time() )
							)
						);
					?>
					<?php edit_comment_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .comment-author .vcard -->
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'twentyeleven' ); ?></em>
					<br />
				<?php endif; ?>
			
			<div class="comment-content"><?php comment_text(); ?></div>
			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply <span>&darr;</span>', 'twentyeleven' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</div><!-- #comment-## -->
	<?php
			break;
	endswitch;
}
endif; // ends check for twentyeleven_comment()

function youtube_thumbnail_url($url,$size=0)
{
if(!filter_var($url, FILTER_VALIDATE_URL)){
    // URL is Not valid
    return false;
}
$domain=parse_url($url,PHP_URL_HOST);
if($domain=='www.youtube.com' OR $domain=='youtube.com') // http://www.youtube.com/watch?v=t7rtVX0bcj8&feature=topvideos_film
{
    if($querystring=parse_url($url,PHP_URL_QUERY))
    {  
        parse_str($querystring);
        if(!empty($v)) return "http://img.youtube.com/vi/$v/$size.jpg";
        else return false;
    }
    else return false;
 
}
elseif($domain == 'youtu.be') // something like http://youtu.be/t7rtVX0bcj8
{
    $v= str_replace('/','', parse_url($url, PHP_URL_PATH));
    return (empty($v)) ? false : "http://img.youtube.com/vi/$v/$size.jpg" ;
}
 
else
 
return false;
}

function catch_that_image($id=null) {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  if($id!=''){
      $post_content = get_post_field('post_content', $id);
      $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post_content, $matches);       
  }
  elseif(is_single()){
	  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $posts['0']->post_content, $matches);
  }else{
	  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
	}
	  $first_img = $matches [1] [0];

	  if(empty($first_img)){
	   $link = get_post_meta($post->ID,'linkyoutube',true);       
       $linkyoutube='http://www.youtube.com/watch?v='.$link;
        $url =youtube_thumbnail_url($linkyoutube,'0');        
        $first_img =($link!='')?$url:$first_img;
		$first_img = ($first_img!='')?$first_img:"/media/images/logo-tmv.jpg";
	  }  
  return $first_img;
}

function get_excerpt_by_idp($post_id,$count){
		$the_post = get_post($post_id); //Gets post ID
        $the_excerpt2 = $the_post->post_excerpt;
		$the_excerpt = ($the_excerpt2=='')?$the_post->post_content:$the_excerpt2; //Gets post_content to be used as a basis for the excerpt
        
		$excerpt_length = $count; //Sets excerpt length by word count
		$the_excerpt = strip_tags(strip_shortcodes($the_excerpt)); //Strips tags and images
		$words = explode(' ', $the_excerpt, $excerpt_length + 1);
		if(count($words) > $excerpt_length) :
			array_pop($words);
			array_push($words, '...');
			$the_excerpt = implode(' ', $words);
		endif;
		return $the_excerpt;
}


function delmetapost($id,$field1,$field2,$im='',$te=''){
    global $wpdb;
    //if($field2!=''){        
        $field2= ($te=='')?$field2:$field2;
        $field2=($field2!='')?$field2:get_post_meta($id,$field1,true);
        $count = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->postmeta WHERE post_id = '$id' AND meta_key='$field1'");
        if($count>0){
            $wpdb->query("
            UPDATE $wpdb->postmeta SET meta_value = '$field2' WHERE post_id = '$id' AND meta_key='$field1';
            ");
            //update_post_meta ($id, $field1,  $field2 );
        }else{
            $wpdb->query("
            INSERT INTO $wpdb->postmeta (
post_id ,
meta_key ,
meta_value
)
VALUES (
'$id', '$field1', '$field2'
);            ");
            //add_post_meta( $id, $field1, ( $field2 ));
        }
    //}else{
     //   if($im==''){
            //delete_post_meta($id, $field1);    
    //    }        
    //}
}

function remove_vnm($string,$tt) {
  $trans = array(
    'à'=>'a','á'=>'a','ả'=>'a','ã'=>'a','ạ'=>'a','A'=>'a',
    'ă'=>'a','ằ'=>'a','ắ'=>'a','ẳ'=>'a','ẵ'=>'a','ặ'=>'a',
    'â'=>'a','ầ'=>'a','ấ'=>'a','ẩ'=>'a','ẫ'=>'a','ậ'=>'a',
    'À'=>'a','Á'=>'a','Ả'=>'a','Ã'=>'a','Ạ'=>'a',
    'Ă'=>'a','Ằ'=>'a','Ắ'=>'a','Ẳ'=>'a','Ẵ'=>'a','Ặ'=>'a',
    'Â'=>'a','Ầ'=>'a','Ấ'=>'a','Ẩ'=>'a','Ẫ'=>'a','Ậ'=>'a',  
    'B'=>'b','C'=>'c','D'=>'d',  
    'đ'=>'d','Đ'=>'d',
    'è'=>'e','é'=>'e','ẻ'=>'e','ẽ'=>'e','ẹ'=>'e','E'=>'e',
    'ê'=>'e','ề'=>'e','ế'=>'e','ể'=>'e','ễ'=>'e','ệ'=>'e',
    'È'=>'e','É'=>'e','Ẻ'=>'e','Ẽ'=>'e','Ẹ'=>'e',
    'Ê'=>'e','Ề'=>'e','Ế'=>'e','Ể'=>'e','Ễ'=>'e','Ệ'=>'e',
    'G'=>'g','H'=>'h','I'=>'i','K'=>'k','L'=>'l','M'=>'m','N'=>'n',
    'ì'=>'i','í'=>'i','ỉ'=>'i','ĩ'=>'i','ị'=>'i',
    'Ì'=>'i','Í'=>'i','Ỉ'=>'i','Ĩ'=>'i','Ị'=>'i',
    'ò'=>'o','ó'=>'o','ỏ'=>'o','õ'=>'o','ọ'=>'o',
    'ô'=>'o','ồ'=>'o','ố'=>'o','ổ'=>'o','ỗ'=>'o','ộ'=>'o',
    'ơ'=>'o','ờ'=>'o','ớ'=>'o','ở'=>'o','ỡ'=>'o','ợ'=>'o',
    'Ò'=>'o','Ó'=>'o','Ỏ'=>'o','Õ'=>'o','Ọ'=>'o','O'=>'o',
    'Ô'=>'o','Ồ'=>'o','Ố'=>'o','Ổ'=>'o','Ỗ'=>'o','Ộ'=>'o',
    'Ơ'=>'o','Ờ'=>'o','Ớ'=>'o','Ở'=>'o','Ỡ'=>'o','Ợ'=>'o', 
    'P'=>'p','Q'=>'q','R'=>'r','S'=>'s','T'=>'t',
    'ù'=>'u','ú'=>'u','ủ'=>'u','ũ'=>'u','ụ'=>'u','U'=>'u',
    'ư'=>'u','ừ'=>'u','ứ'=>'u','ử'=>'u','ữ'=>'u','ự'=>'u',
    'Ù'=>'u','Ú'=>'u','Ủ'=>'u','Ũ'=>'u','Ụ'=>'u',
    'Ư'=>'u','Ừ'=>'u','Ứ'=>'u','Ử'=>'u','Ữ'=>'u','Ự'=>'u',
    'V'=>'v','X'=>'x',
    'ỳ'=>'y','ý'=>'y','ỷ'=>'y','ỹ'=>'y','ỵ'=>'y',
    'Y'=>'y','Ỳ'=>'y','Ý'=>'y','Ỷ'=>'y','Ỹ'=>'y','Ỵ'=>'y',
	'`' => '', '“' => '-', '”'=>'-',' '=>$tt
  );
  return strtr($string, $trans);
}

function getkhachhangff($f_anhkhach1,$f_tenkhach1,$f_dckhach1,$f_noidungkhach1,$class=''){
    if($f_anhkhach1!=''){
        $dat.='<li class="clearfix">
                                            <img alt="'.$f_tenkhach1.'" class="alignleft responsive_img" src="'.$f_anhkhach1.'">
                                            <h5>'.$f_tenkhach1.'</h5>
                                            <p class="meta">'.$f_dckhach1.'</p>
                                            <p>'.$f_noidungkhach1.'</p>
                                        </li>';
    }
    
    echo $dat;                                        
}



if ( ! function_exists( 'twentyeleven_comment' ) ) :
function twentyeleven_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
    <?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
    
                                
                                
		<div class="comment-body" id="div-comment-<?php comment_ID(); ?>">
                                <div class="comment-author vcard">
					<?php
						$avatar_size = 68;
						if ( '0' != $comment->comment_parent )
							$avatar_size = 39;
                            
						echo '<strong>'.get_avatar( $comment, $avatar_size ).'';
						/* translators: 1: comment author, 2: date and time */
						printf( __( '%1$s </strong> : %2$s <span class="says">:</span>', 'twentyeleven' ),
							sprintf( '<span class="fn">%s</span>', comment_author() ),
							sprintf( '<a rel="nofollow" href="%1$s"><time datetime="%2$s">%3$s</time></a>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								/* translators: 1: date, 2: time */
								sprintf( __( '%1$s at %2$s', 'twentyeleven' ), get_comment_date(), get_comment_time() )
							)
						);                        echo '';
					?>
					<?php edit_comment_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .comment-author .vcard -->
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'twentyeleven' ); ?></em>
					<br />
				<?php endif; ?>
			
			<div class="comment-content"><?php comment_text(); ?></div>
			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply <span>&darr;</span>', 'twentyeleven' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</div><!-- #comment-## -->
	<?php
			break;
	endswitch;
}
endif; // ends check for twentyeleven_comment()




#####loai bo tu
#content
function loaiboturep($content){
    $ar=array(
 


    );
    $arreplace=array(


    );
    $content=str_replace($ar,$arreplace,$content);
    return $content;
}

add_action('the_content','loaiboturep');
add_filter('comment_text', 'loaiboturep');