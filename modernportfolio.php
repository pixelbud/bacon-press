<?php
/*
Template Name: Modern Portfolio
*/
?>

<!DOCTYPE html>
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo('charset'); ?>" />
<title><?php
        if ( is_single() ) { single_post_title(); }      
        elseif ( is_home() || is_front_page() ) { bloginfo('name'); print ' - '; bloginfo('description'); get_page_number(); }
        elseif ( is_page() ) { single_post_title(''); }
        elseif ( is_search() ) { bloginfo('name'); print ' | Search results for ' . wp_specialchars($s); get_page_number(); }
        elseif ( is_404() ) { bloginfo('name'); print ' | Not Found'; }
        else { bloginfo('name'); wp_title('|'); get_page_number(); }
    ?></title>
<meta name="generator" content="Wordpress <?php bloginfo('version'); ?>" />
<meta name="description" content="<?php bloginfo('description'); ?>" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
<link rel="alternate" type="application/rss+xml" title="RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/favicon.ico" />
<meta name="robots" content="noindex">
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, width=device-width"> 
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div class="port-contain group">

	<div class="dash-left">
		<div class="dash-left-inner">

			<div class="garyb">
				
				<a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/garybacon.jpg" class="garyb" style="margin-top: 10px;"></a>
			<a href="<?php bloginfo('url'); ?>" class="title-main">Gary Bacon</a>
			
			</div>
			
		</div>
	</div>
	<div class="port-main">


		<div class="nav-contain">
			
			<div class="port-nav group">
				<?php wp_nav_menu( array( 'theme_location' => 'port-nav', 'depth' => 1 ) ); ?>
			</div>

			<?php
			global $post;			
			/* If the page has a post parent and it is named stans or the page is stans then show otherwise hide menu */
			if($post->post_parent) { $post_data = get_post($post->post_parent);
				$post_name = $post_data->post_name;
				if( $post_name == 'stans' || is_page('stans') ) {
					?>
					<div class="port-sub">
					<?php wp_nav_menu( array( 'theme_location' => 'port-nav' ) ); ?>
					</div>
					<?php
				}
			}?>
		</div>

	<div class="port-main">

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>	
					
					<?php
					
					if ( function_exists( 'sharing_display' ) ) remove_filter( 'the_content', 'sharing_display', 19 );
					if ( function_exists( 'sharing_display' ) ) remove_filter( 'the_excerpt', 'sharing_display', 19 );

					the_content('');
					wp_link_pages();
	
					if ( count( get_the_category() ) ) :
					if ( !is_single() ) { ?><a href="<?php the_permalink(); ?>" class="read-more-bacon">More &rarr;</a> <?php } ?>
			 
		<?php endif; ?>
		<?php endwhile; ?>
		
		<?php if ( $wp_query->max_num_pages > 1 ) : ?>
			<div id="post-nav" class="navigation group">
				<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'bacon-press' ) ); ?></div>
				<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'bacon-press' ) ); ?></div>
			</div><!-- #post-above -->
			
		<?php endif; ?>

		<?php else: ?>
		<div class="dash-block group">
			<p><img src="<?php bloginfo('stylesheet_directory'); ?>/img/bacon_not_found.png" style="display: block; width: 220px; margin: 0 auto;"></p>
			<h3>Not found.</h3>
			<p>Oops. So here is the scoop, turns out the wonderful content you were seeking is not here. That being said, give the ole' search a go to the left.</p>
			<p>Most likely, what you are looking for is still here, somewhere.</p>
			<div class="action-row">
				<a href="<?php bloginfo('url'); ?>" class="read-more-bacon">&larr; Go back home, maverick.</a>
			</div>
		</div><br>
		
		<?php endif; ?>
	</div>
</div>
<?php get_footer(); ?>
	

	
