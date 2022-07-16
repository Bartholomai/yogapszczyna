<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package yogapszczyna
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function yogapszczyna_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'yogapszczyna_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function yogapszczyna_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'yogapszczyna_pingback_header' );

function add_opengraph_doctype( $output ) {
	return $output . ' xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml"';
}

add_filter('language_attributes', 'add_opengraph_doctype');


//Open Graph Meta Info
function insert_fb_in_head() {
	global $post;
	if ( !is_singular())
		return;
		echo '<meta property="fb:admins" content=""/>';
		echo '<meta property="og:title" content="' . get_the_title() . '"/>';
		echo '<meta property="og:type" content="article"/>';
		echo '<meta property="og:url" content="' . get_permalink() . '"/>';
		echo '<meta property="og:site_name" content="TechTir"/>';
	if(!has_post_thumbnail( $post->ID )) {
		$default_image="'.get_stylesheet_directory_uri().'/img/og.png'";
		echo '<meta property="og:image" content="' . $default_image . '"/>';
	}
	else{
		$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
		echo '<meta property="og:image" content="' . esc_attr( $thumbnail_src[0] ) . '"/>';
	}
	echo "
";
}
add_action( 'wp_head', 'insert_fb_in_head', 5 );

// Svg upload
function custom_mtypes( $m ){
    $m['svg'] = 'image/svg+xml';
    $m['svgz'] = 'image/svg+xml';
    return $m;
}

//svg display in media
function mime_types( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}

//svg add js and css to svg display in admin media
function svg_enqueue_scripts( $hook ) {
	wp_enqueue_style( 'fadupla-svg-style', get_theme_file_uri( '/css/svg.css' ) );
	wp_enqueue_script( 'fadupla-svg-script', get_theme_file_uri( '/js/svg.js' ), 'jquery' );
	wp_localize_script( 'fadupla-svg-script', 'script_vars',
		array( 'AJAXurl' => admin_url( 'admin-ajax.php' ) ) );
}

function get_attachment_url_media_library() {
	$url          = '';
	$attachmentID = isset( $_REQUEST['attachmentID'] ) ? $_REQUEST['attachmentID'] : '';
	if ( $attachmentID ) {
		$url = wp_get_attachment_url( $attachmentID );
	}
	echo $url;
	die();
}

// usunięcie niepotrzebnych info z sekcji head
function remove_header_info() {
    remove_action( 'wp_head', 'rsd_link' );
    remove_action( 'wp_head', 'wlwmanifest_link' );
    remove_action( 'wp_head', 'wp_generator' );
    remove_action( 'wp_head', 'start_post_rel_link' );
    remove_action( 'wp_head', 'index_rel_link' );
    remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head' ); // WordPress >= 3.0
}
add_action( 'init', 'remove_header_info' );

// Add excerpt to page
function add_excerpt_to_pages(){
    add_post_type_support( 'page', 'excerpt' );
}
add_action('init', 'add_excerpt_to_pages');

// Website or URL Field Removal from comments
function wpadmin_remove_comment_url($arg) {
    $arg['url'] = '';
    return $arg;
}

add_action( 'wp_head', 'insert_fb_in_head', 5 ); // Add ogm fb
add_action( 'admin_enqueue_scripts', 'svg_enqueue_scripts' ); // Add svg js and css scripts to upload
add_action( 'wp_ajax_svg_get_attachment_url', 'get_attachment_url_media_library' ); // Display svg in media

add_filter( 'upload_mimes', 'custom_mtypes' ); // Upload svg
add_filter( 'upload_mimes', 'mime_types' ); //  Display svg in admin media

//  Add custom logo to login page
function wpdev_filter_login_head() {

if ( has_custom_logo() ) :
	$image = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );
	?>
<style type="text/css">
.login h1 a {
  background-image: url(<?php echo esc_url( $image[0] );
  ?>);
  -webkit-background-size: <?php echo absint($image[1])?>px;
  background-size: <?php echo absint($image[1]) ?>px;
  height: <?php echo absint($image[2]) ?>px;
  width: <?php echo absint($image[1]) ?>px;
}
</style>
<?php
endif;
}

add_action( 'login_head', 'wpdev_filter_login_head', 100 );

//  Remove link to WP from custom logo on login page
function new_wp_login_url() {
    return home_url();
}
add_filter('login_headerurl', 'new_wp_login_url');