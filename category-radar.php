<?php
/**
 * The template for displaying Radar Category pages.
 *
 * @package WordPress
 * @subpackage Bacon-Press
 * @since Bacon-Press 2.5
 */

	get_header();


		
		query_posts($query_string . "&cat=-" . thePortGrab() ); // thePortGrab pulls the ID for Portfolio Category
		
		
		if ( have_posts() ) : while ( have_posts() ) : the_post();
		
		?>
		
		<div class="dash-block group">
			<div class="badge group">
			</div>
				
			
			
			<?php 
				if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
					?>
					<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent link to <?php the_title_attribute(); ?>">
					<?php
					the_post_thumbnail( array ( 427,999 ) );
					?>
					
				<div class="title-row">
				
				<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
				</div>
				<?php
				} else {
				?>
				
				<div class="title-alt">
					<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
				</div>
				
				<?php
				}
					
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
	

	
