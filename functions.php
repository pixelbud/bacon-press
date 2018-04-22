<?php

// Register Script
function custom_scripts() {

	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', 'http://code.jquery.com/jquery-1.11.0.min.js', false, '1.11.0', true );
	wp_enqueue_script( 'jquery' );

	wp_register_script( 'tinynav', get_template_directory_uri() . '/js/tinynav.min.js', false, false, true );
	wp_enqueue_script( 'tinynav' );

	wp_register_script( 'twitter-render', 'https://platform.twitter.com/widgets.js', false, false, true );
	wp_enqueue_script( 'twitter-render' );

}

// Hook into the 'wp_enqueue_scripts' action
add_action( 'wp_enqueue_scripts', 'custom_scripts' );

// Make theme available for translation
// Translations can be filed in the /languages/ directory
load_theme_textdomain( 'bacon-press', TEMPLATEPATH . '/languages' );

$locale = get_locale();
$locale_file = TEMPLATEPATH . "/languages/$locale.php";
if ( is_readable($locale_file) )
 require_once($locale_file);

// Get the page number
function get_page_number() {
    if ( get_query_var('paged') ) {
        print ' | ' . __( 'Page ' , 'bacon-press') . get_query_var('paged');
    }
} // end get_page_number

// Add feature-image support
if ( function_exists( 'add_theme_support' ) ) {
  add_theme_support( 'post-thumbnails' );
}

// Remove JPEG Compression
add_filter('jpeg_quality', function($arg){return 100;});

// Grab the portfolio category ID
function thePortGrab() {
	$thePortId = get_term_by( 'slug', 'portfolio', 'category' );
	$thePortId = $thePortId->term_id;
	return $thePortId;
}

// Remove [...] from excerpt and replace with own version

function new_excerpt_more($more) {
       global $post;
	return '... <a href="'. get_permalink($post->ID) . '">Read more.</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

// More menus sir.

function register_my_menus() {
  register_nav_menus(
    array('main-nav' => __( 'Main Nav' ), 'social-nav' => __( 'Social Nav' ),  'port-nav' => __( 'Portfolio Nav' ), 'blog-nav' => __( 'Blog Nav' ) )
  );
}
add_action( 'init', 'register_my_menus' );

add_filter( 'jetpack_enable_opengraph', '__return_false', 99 );

// Facebook Open Graph

// Allow for Facebooks's markup language
add_filter('language_attributes', 'add_og_xml_ns');
function add_og_xml_ns($content) {
  return ' xmlns:og="http://ogp.me/ns#" ' . $content;
}

add_filter('language_attributes', 'add_fb_xml_ns');
function add_fb_xml_ns($content) {
  return ' xmlns:fb="https://www.facebook.com/2008/fbml" ' . $content;
}

// Generate Excerpt Outside of "The Loop"
function blabla($excerpt_word_count=200)
{
    global $post;
    $excerpt = $post->post_excerpt;
    if( $excerpt == '' )
    {
        $excerpt = $post->post_content;
        $excerpt = strip_shortcodes( $excerpt );
        $excerpt = str_replace(']]>', ']]>', $excerpt);
        $excerpt = strip_tags($excerpt);
	$words = explode(' ', $excerpt, $excerpt_word_count + 1);
	if (count($words) > $excerpt_length)
		{
		array_pop($words);
		$excerpt = implode(' ', $words);
		$excerpt .= '...';
		}
    }
    return $excerpt;
}

// Set your Open Graph Meta Tags
function fbogmeta_header() {
  if (is_singular()) {
    ?>
		<meta property="og:title" content="<?php the_title(); ?>">
		<meta property="og:description" content="<?php echo blabla(); ?>">
		<meta property="og:url" content="<?php the_permalink(); ?>">
		<?php $fb_image = wp_get_attachment_image_src(get_post_thumbnail_id( get_the_ID() ), 'large'); ?>
		<?php if ($fb_image) : ?>
			<meta property="og:image" content="<?php echo $fb_image[0]; ?>">
			<?php endif; ?>
		<meta property="og:type" content="<?php
			if (is_single() || is_page()) { echo "article"; } else { echo "website";} ?>"
		/>
		<meta property="og:site_name" content="<?php bloginfo('name'); ?>">
		<meta property="og:twitter" content="@pixelbud">
		<meta name="twitter:card" content="summary_large_image">
		<meta name="twitter:site" content="@pixelbud">
		<meta name="twitter:creator" content="@pixelbud">
		<?php $twitter_image = wp_get_attachment_image_src(get_post_thumbnail_id( get_the_ID() ), 'large'); ?>
		<?php if ($twitter_image) : ?>
			<meta property="twitter:image" content="<?php echo $twitter_image[0]; ?>">
		<?php endif; ?>
		<meta property="twitter:description" content="<?php echo blabla(); ?>">
    <?php
  }
}
add_action('wp_head', 'fbogmeta_header');

/**
 * Join posts and postmeta tables
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_join
 */
function cf_search_join( $join ) {
    global $wpdb;

    if ( is_search() ) {
        $join .=' LEFT JOIN '.$wpdb->postmeta. ' ON '. $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
    }

    return $join;
}
add_filter('posts_join', 'cf_search_join' );

/**
 * Modify the search query with posts_where
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_where
 */
function cf_search_where( $where ) {
    global $pagenow, $wpdb;

    if ( is_search() ) {
        $where = preg_replace(
            "/\(\s*".$wpdb->posts.".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
            "(".$wpdb->posts.".post_title LIKE $1) OR (".$wpdb->postmeta.".meta_value LIKE $1)", $where );
    }

    return $where;
}
add_filter( 'posts_where', 'cf_search_where' );

/**
 * Prevent duplicates
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_distinct
 */
function cf_search_distinct( $where ) {
    global $wpdb;

    if ( is_search() ) {
        return "DISTINCT";
    }

    return $where;
}
add_filter( 'posts_distinct', 'cf_search_distinct' );
