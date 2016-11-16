<?php

/******add field*****/


function my_fields($fields) {
$fields['mobile'] = '<p class="comment-form-mobile">
      <input id="mobile" name="mobile" type="text" value="' . esc_attr(  $commenter['comment_author_mobile'] ) .
      '" size="30"' . $aria_req . ' placeholder="' . __( ' Mobile: ', 'domainreference' ) . '' .
      ( $req ? '*' : '' ) .
      '"  /></p>';
return $fields;
}
add_filter('comment_form_default_fields','my_fields');


add_action( 'comment_post', 'save_comment_meta_data' );
function save_comment_meta_data( $comment_id ) {
	if ( ( isset( $_POST['mobile'] ) ) && ( $_POST['mobile'] != '') )
	$mobile = wp_filter_nohtml_kses($_POST['mobile']);
	add_comment_meta( $comment_id, 'mobile', $mobile );
}

add_action( 'add_meta_boxes_comment', 'extend_comment_add_meta_box' );
function extend_comment_add_meta_box() {
    add_meta_box( 'title', __( 'Comment Metadata - Extend Comment' ), 'extend_comment_meta_box', 'comment', 'normal', 'high' );
}

function extend_comment_meta_box ( $comment ) {
    $mobile = get_comment_meta( $comment->comment_ID, 'mobile', true );
    wp_nonce_field( 'extend_comment_update', 'extend_comment_update', false );
    ?>
    <p>
        <label for="mobile"><?php _e( 'mobile' ); ?></label>
        <input type="text" name="mobile" value="<?php echo esc_attr( $mobile ); ?>" class="widefat" />
    </p>
    <?php
}

add_action( 'edit_comment', 'extend_comment_edit_metafields' );
function extend_comment_edit_metafields( $comment_id ) {
    if( ! isset( $_POST['extend_comment_update'] ) || ! wp_verify_nonce( $_POST['extend_comment_update'], 'extend_comment_update' ) ) return;

	if ( ( isset( $_POST['mobile'] ) ) && ( $_POST['mobile'] != '') ) : 
	$mobile = wp_filter_nohtml_kses($_POST['mobile']);
	update_comment_meta( $comment_id, 'mobile', $mobile );
	else :
	delete_comment_meta( $comment_id, 'mobile');
	endif;
	
}

add_filter( 'wp_comment_reply', 'my_quick_edit_menu', 10, 2);
 
// Render our own comments quick edit menu
function my_quick_edit_menu($str, $input) {
   
    extract($input);
    $table_row = TRUE;
    if ( $mode == 'single' ) {
        $wp_list_table = _get_list_table('WP_Post_Comments_List_Table');
    } else {
        $wp_list_table = _get_list_table('WP_Comments_List_Table');
    }
    // Get editor string
    ob_start();
        $quicktags_settings = array( 'buttons' => 'strong,em,link,block,del,ins,img,ul,ol,li,code,spell,close' );
    wp_editor( '', 'replycontent', array( 'media_buttons' => false, 'tinymce' => false, 'quicktags' => $quicktags_settings, 'tabindex' => 104 ) );
    $editorStr = ob_get_contents();
    ob_end_clean();
 
 
    // Get nonce string
    ob_start();    
    wp_nonce_field( "replyto-comment", "_ajax_nonce-replyto-comment", false );
        if ( current_user_can( "unfiltered_html" ) )
        wp_nonce_field( "unfiltered-html-comment", "_wp_unfiltered_html_comment", false );
    $nonceStr = ob_get_contents();
    ob_end_clean();
 
 
    $content = '<form method="get" action="">';
    if ( $table_row ) :
        $content .= '<table style="display:none;"><tbody id="com-reply"><tr id="replyrow" style="display:none;"><td colspan="'.$wp_list_table->get_column_count().'" class="colspanchange">';
    else :
        $content .= '<div id="com-reply" style="display:none;"><div id="replyrow" style="display:none;">';
    endif;
 
    $content .= '
            <div id="replyhead" style="display:none;"><h5>Reply to Comment</h5></div>
            <div id="addhead" style="display:none;"><h5>Add new Comment</h5></div>
            <div id="edithead" style="display:none;">';
             
    $content .= '  
                <div class="inside">
                <label for="author">Name</label>
                <input type="text" name="newcomment_author" size="50" value="" tabindex="101" id="author" />
                </div>
         
                <div class="inside">
                <label for="author-email">E-mail</label>
                <input type="text" name="newcomment_author_email" size="50" value="" tabindex="102" id="author-email" />
                </div>
         
                <div class="inside">
                <label for="author-url">URL</label>
                <input type="text" id="author-url" name="newcomment_author_url" size="103" value="" tabindex="103" />
                </div>
                <div style="clear:both;"></div>';
        // Add new quick edit fields       
    $content .= '
                <div class="inside">
                <label for="comment-post-id">Mobile</label>
                <input type="text" id="comment-post-id" name="shiba_comment_post_ID" size="50" value="" tabindex="103" />
                </div>
                <div style="clear:both;"></div>
 
            </div>
            ';
         
    // Add editor
    $content .= "<div id='replycontainer'>\n";   
    $content .= $editorStr;
    $content .= "</div>\n";  
             
    $content .= '          
            <p id="replysubmit" class="submit">
            <a href="#comments-form" class="cancel button-secondary alignleft" tabindex="106">Cancel</a>
            <a href="#comments-form" class="save button-primary alignright" tabindex="104">
            <span id="addbtn" style="display:none;">Add Comment</span>
            <span id="savebtn" style="display:none;">Update Comment</span>
            <span id="replybtn" style="display:none;">Submit Reply</span></a>
            <img class="waiting" style="display:none;" src="'.esc_url( admin_url( "images/wpspin_light.gif" ) ).'" alt="" />
            <span class="error" style="display:none;"></span>
            <br class="clear" />
            </p>';
             
        $content .= '
            <input type="hidden" name="user_ID" id="user_ID" value="'.get_current_user_id().'" />
            <input type="hidden" name="action" id="action" value="" />
            <input type="hidden" name="comment_ID" id="comment_ID" value="" />
            <input type="hidden" name="comment_post_ID" id="comment_post_ID" value="" />
            <input type="hidden" name="status" id="status" value="" />
            <input type="hidden" name="position" id="position" value="'.$position.'" />
            <input type="hidden" name="checkbox" id="checkbox" value="';
         
    if ($checkbox) $content .= '1'; else $content .=  '0';
    $content .= "\" />\n";
        $content .= '<input type="hidden" name="mode" id="mode" value="'.esc_attr($mode).'" />';
         
    $content .= $nonceStr;
    $content .="\n";
         
    if ( $table_row ) :
        $content .= '</td></tr></tbody></table>';
    else :
        $content .= '</div></div>';
    endif;
    $content .= "\n</form>\n";
    return $content;
}

add_filter( 'comment_text', 'my_menu_data', 10, 2);
 
function my_menu_data($comment_text, $comment ) {
    $mobile = get_comment_meta( $comment->comment_ID, 'mobile', true );
    /*
    ?>
        <div id="inline-xtra-<?php echo $comment->comment_ID; ?>" class="hidden">
        <div class="comment-post-id"><?php echo esc_attr( $mobile ); ?></div>
        </div>
        <?php
        */
    return $comment_text;
}

// Add quick edit javascript to the page footer
add_action('admin_footer', 'my_quick_edit_javascript');
 
function my_quick_edit_javascript() {
?>
    <script type="text/javascript">
    function expandedOpen(id) {
        editRow = jQuery('#replyrow');
        rowData = jQuery('#inline-xtra-'+id);
            jQuery('#comment-post-id', editRow).val( jQuery('div.comment-post-id', rowData).text() );
    }  
    </script>
   <?php
}

add_filter( 'comment_row_actions', 'my_quick_edit_action', 10, 2);
 
function my_quick_edit_action($actions, $comment ) {
    global $post;
    $actions['quickedit'] = '<a onclick="commentReply.close();if (typeof(expandedOpen) == \'function\') expandedOpen('.$comment->comment_ID.');commentReply.open( \''.$comment->comment_ID.'\',\''.$post->ID.'\',\'edit\' );return false;" class="vim-q" title="'.esc_attr__( 'Quick Edit' ).'" href="#">' . __( 'Quick&nbsp;Edit' ) . '</a>';
    return $actions;
}