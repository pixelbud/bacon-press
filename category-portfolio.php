<?php
/**
 * The template for displaying Portfolio Category pages.
 *
 * @package WordPress
 * @subpackage Bacon-Press
 * @since Bacon-Press .5
 */

get_header(); ?>


				<?php
					// printf( __( '%s', 'bacon-press' ), '<span>' . single_cat_title( '', false ) . '</span>' );
		query_posts( 'posts_per_page=-1&cat=' . thePortGrab() . '&orderby=date&order=DESC' );

		if ( have_posts() ) : while ( have_posts() ) : the_post();
		
		?>
		
		<div class="port-title">
			<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
		</div>
		<div class="dash-block port-radius">
		
			<?php 
			if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
			  the_post_thumbnail( array ( 425,999 ) );
			} 
			?>
		
			<?php the_content(); ?>
			<?php wp_link_pages(); ?>
		
		</div>
		<?php endwhile; ?>
		
		<?php if ( $wp_query->max_num_pages > 1 ) : ?>
			<div id="post-nav" class="navigation group">
				<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'bacon-press' ) ); ?></div>
				<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'bacon-press' ) ); ?></div>
			</div>
			
		<?php endif; ?>

		<?php else: ?>
		<h2>Not Found</h2>
		<p>The bacon loving posts you were looking for could not be found.</p>
		
		<?php endif; ?>


<?php get_footer(); ?>
