<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<title><?php
        if ( is_single() ) { single_post_title(); }      
        elseif ( is_home() || is_front_page() ) { bloginfo('name'); print ' - '; bloginfo('description'); get_page_number(); }
        elseif ( is_page() ) { single_post_title(''); }
        elseif ( is_search() ) { bloginfo('name'); print ' | Search results for ' . wp_specialchars($s); get_page_number(); }
        elseif ( is_404() ) { bloginfo('name'); print ' | Not Found'; }
        else { bloginfo('name'); wp_title('|'); get_page_number(); }
    ?></title>
	<meta name="generator" content="Wordpress <?php bloginfo('version'); ?>">
	<meta name="description" content="<?php bloginfo('description'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>">
	<link rel="alternate" type="application/rss+xml" title="RSS Feed" href="<?php bloginfo('rss2_url'); ?>">
	<link rel="alternate" type="application/atom+xml" title="Atom Feed" href="<?php bloginfo('atom_url'); ?>">
	<link href="<?php bloginfo('stylesheet_directory'); ?>/css/font-awesome.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700|Open+Sans:400,700" rel="stylesheet">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif; ?>
	<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/favicon.ico">
<?php wp_head(); ?>
<!-- Hotjar Tracking Code for garybacon.com -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:855657,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script>
</head>
<body <?php body_class(); ?>>

<div class="dash-contain group">

	<div class="dash-left">
		<div class="bacon-nav">
			<a href="<?php bloginfo('url'); ?>">
				<picture>
				<source media="(max-width: 639px)" srcset="<?php bloginfo('stylesheet_directory'); ?>/img/gary_bacon_pixel@2x.png 2x">
				<source media="(min-width: 640px)" srcset="<?php bloginfo('stylesheet_directory'); ?>/img/gary_bacon_pixel.png">
				<img src="<?php bloginfo('stylesheet_directory'); ?>/img/gary_bacon_pixel.png" alt="<?php bloginfo('name'); ?>" class="garyb"></a>
			<?php wp_nav_menu( array( 'theme_location' => 'main-nav' ) ); ?>
		</div>
		
		<?php get_search_form(); ?>
		
		<?php // Social Icons ?>
		<div class="bacon-social-box bacon-shadow">
			<a href="http://twitter.com/pixelbud" title="Twitter" class="bacon-social b-twitter"><i class="fa fa-twitter"></i></a><a href="http://linkedin.com/in/pixelbud" title="LinkedIn" class="bacon-social b-linkedin" target="_blank"><i class="fa fa-linkedin"></i></a><a href="https://github.com/pixelbud" title="Github" class="bacon-social b-github" target="_blank"><i class="fa fa-github-alt"></i></a><a href="https://dribbble.com/pixelbud" title="Dribbble" class="bacon-social b-dribbble" target="_blank"><i class="fa fa-dribbble"></i></a><a href="http://codepen.io/bacon/" title="Codepen" class="bacon-social b-codepen" target="_blank"><i class="fa fa-codepen"></i></a><a href="https://www.instagram.com/pixelbud/" title="Instagram" class="bacon-social b-instagram"><i class="fa fa-instagram"></i></a><a href="https://medium.com/@pixelbud" title="Medium" class="bacon-social b-medium"><i class="fa fa-medium"></i></a><a href="https://www.snapchat.com/add/pixelbud" title="Snapchat" class="bacon-social b-snapchat"><i class="fa fa-snapchat-ghost"></i></a>
		</div>
		
	</div>
	<?php // Close Dash Left ?>
	<div class="dash-main">