<?php
/*
Template Name: Bacon Press Wide
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
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/style_wide.css" />
<link rel="alternate" type="application/rss+xml" title="RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/favicon.ico" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

	<div id="header" data-bottom-top="opacity: 1;"
        data--33p-top="opacity: 1;"
        data--66p-top="opacity: 0;"
        data-anchor-target="#header">
	</div>
<div id="main">
		<div class="about">
			<img src="<?php bloginfo('stylesheet_directory'); ?>/img/gary.jpg" class="gare" width="128" height="128">
		</div>
	<div id="content">
		<div class="info">
			<h1>Gary Bacon</h1>
			<h2>UI/UX Designer</h2><br clear="all">
		</div>


		<div class="nav-contain">

			
		<?php get_search_form(); ?>
		
			<div class="dash-nav">
				<ul>
					<li><a href="<?php bloginfo('url'); ?>">&#10229; Back to home</a></li>
				</ul>
			</div>
			<div class="dash-nav">
				<ul>
					<?php wp_list_categories("title_li=&exclude=" . thePortGrab()); ?>
				</ul>
			</div>
			
			<div class="dash-nav">
				<?php wp_nav_menu( array( 'theme_location' => 'main-nav' ) ); ?>
			</div>

			<div class="social-icons">
			<a href="http://twitter.com/pixelbud" target="_blank" title="Twitter @pixelbud"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/icon_twitter.png"></a> <a href="http://facebook.com/pixelbud/" target="_blank" title="Facebook"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/icon_facebook.png"></a> <a href="http://dribbble.com/pixelbud/" target="_blank" title="Dribbble"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/icon_dribbble.png"></a> <a href="https://plus.google.com/+GaryBacon/about/" target="_blank" title="Google+"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/icon_google.png"></a> <a href="http://www.linkedin.com/in/pixelbud" target="_blank" title="LinkedIn"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/icon_linkedin.png"></a> <a href="http://pinterest.com/pixelbud/" target="_blank" title="Pinterest"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/icon_pinterest.png"></a> <a href="http://garyb.co/PDE9" target="_blank" title="Email"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/icon_email.png"></a> <a href="<?php bloginfo('rss2_url'); ?>" target="_blank" title="RSS"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/icon_rss.png"></a>
			</div>
			
		</div>
			
<div class="dash-contain group">

	<div class="dash-main">

<?php

		
		if ( have_posts() ) : while ( have_posts() ) : the_post();
		
		?>
		
		<div class="dash-block group">
				
			
			


					
				<div class="title-row">
				<a href="<?php the_permalink(); ?>" class="screen-reader-text" rel="bookmark" title="Permanent link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
				</div>	
					
					<?php
					
					if ( function_exists( 'sharing_display' ) ) remove_filter( 'the_content', 'sharing_display', 19 );
					if ( function_exists( 'sharing_display' ) ) remove_filter( 'the_excerpt', 'sharing_display', 19 );

					the_content('');
					wp_link_pages();
					
					?>
					
					
			<div class="action-row">
				<?php if ( function_exists( 'sharing_display' ) ) echo sharing_display();  ?>
				
				<?php if ( count( get_the_category() ) ) :
					if ( !is_single() ) { ?><a href="<?php the_permalink(); ?>" class="read-more-bacon">More &rarr;</a> <?php } ?>
			 
			</div>
		</div>
			<div class="info-block">
				<?php the_time('j M Y'); ?> &bull; Filed under <?php the_category(', '); ?>
			</div>

			 
			<?php endif; ?>
			
			<div class="commentblock">
				<?php /* comments_template(); */ ?>
			</div>
			
			<?php if ( is_page() ) { ?>
				</div></div><br>
			<?php } ?>
		

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
		
<?php get_footer(); ?>
	

	
