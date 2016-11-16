function wpb_adding_scripts() {
wp_register_script('facebook', get_template_directory_uri() . '/js/facebook.js','','1.1', true);
wp_enqueue_script('facebook');
}
add_action( 'wp_enqueue_scripts', 'wpb_adding_scripts' );
