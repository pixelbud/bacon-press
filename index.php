<?php
	get_header();
		if ( is_home() ) { query_posts($query_string . "&cat=-" . thePortGrab() ); /* thePortGrab pulls the ID for Portfolio Category */ }
		if ( have_posts() ) : while ( have_posts() ) : the_post();
	?>

		<div class="bacon-blog-post bacon-pixel-box bacon-shadow">
			<?php if ( has_post_thumbnail() ) { /* check if the post has a Post Thumbnail assigned to it. */ ?>
				<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent link to <?php the_title_attribute(); ?>"><?php the_post_thumbnail( array ( 427,999 ) ); ?></a>
				<div class="bacon-blog-post-inner">
					<h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent link to <?php the_title_attribute(); ?>" class="title-row"><?php the_title(); ?></a></h2>
			<?php } else { ?>

				<div class="bacon-blog-post-inner">
					<h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<?php
				}
					the_content('');
					wp_link_pages();

				?>

			<?php if ( count( get_the_category() ) ) :
				if ( !is_single() ) { ?>
				<div class="action-row group">
					<div class="alignleft bacon-more">
						<a href="<?php the_permalink(); ?>" class="">More &rarr;</a>
					</div>
					<div class="alignright bacon-post-info">
						<?php the_time('j M Y'); ?> <span class="bacon-cat-tag"><em>in</em> <?php the_category(' '); ?></span>
					</div>
				</div><?php // Close Action Row ?>
			<?php } else { ?>
				<div class="action-row group">
					<div class="alignright bacon-post-info">
					<?php the_time('j M Y'); ?> <span class="bacon-cat-tag"><em>in</em> <?php the_category(' '); ?></span>
					</div>
				</div><?php // Close Action Row ?>
			<?php
				}
			?>

	<?php endif; ?>

			<?php /* comments_template(); */ ?>

			</div><?php // Close Post Inner ?>
		</div><?php // Close Post ?>


			<?php if ( is_page() ) { ?>
				</div><?php // Close Post Inner ?>
				</div><?php // Close Post ?>
			<?php } ?>


		<?php endwhile;

		if ( $wp_query->max_num_pages > 1 ) : ?>
			<div id="post-nav" class="navigation group">
				<div class="nav-previous alignleft"><?php next_posts_link( __( 'Older posts', 'bacon-press' ) ); ?></div>
				<div class="nav-next alignright"><?php previous_posts_link( __( 'Newer posts', 'bacon-press' ) ); ?></div>
			</div><?php // Post Nav ?>

		<?php endif; ?>

		<?php else: ?>

		<div class="bacon-blog-post bacon-shadow">
			<div class="bacon-blog-post-inner">
			<p><img src="<?php bloginfo('stylesheet_directory'); ?>/img/bacon_not_found.png" style="display: block; width: 220px; margin: 0 auto;"></p>
			<h3>Not found.</h3>
			<p>Oops. Something was supposed to load here, but for some reason it did not. That being said, try another search on the left.</p>
			<p>Most likely, what you are looking for is still here, somewhere.</p>
			<p>You can check out <a href="https://garybacon.com/start-here/">my favorite posts</a> or what I'm <a href="https://garybacon.com/reading/">currently reading</a>.</p>
			<div class="action-row">
				<a href="<?php bloginfo('url'); ?>" class="read-more-bacon">&larr; Go Home</a>
			</div>
			</div>
		</div>

		<?php endif; ?>

	</div><?php // Close Main ?>
</div><?php // Close Container ?>
<?php get_footer(); ?>
