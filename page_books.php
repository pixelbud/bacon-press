<?php
/**
Template Name: Book Listings
*/

get_header(); ?>
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

				while ( have_posts() ) : the_post();

					the_content('');

					?>

					<?php

					if( have_rows('book_listing') ): ?>

					<h3>Books Completed (<?php $booknum = count(get_field('book_listing')); echo($booknum); ?>)</h3>
					<p>These are the books I’ve completed reading so far this year. Favorite books are denoted by a &starf;</p>

							<?php while( have_rows('book_listing') ): the_row(); ?>
							<div class="book-list">
								<?php
								$img_src = wp_get_attachment_image_url( get_sub_field('product_image'), 'full' );
								$img_srcset = wp_get_attachment_image_srcset( get_sub_field('product_image'), 'full' );
								?>
								<a href="<?php the_sub_field('product_link'); ?>" target="_blank" alt="<?php the_sub_field('product_title'); ?>"><img src="<?php echo $img_src; ?>"
								srcset="<?php echo esc_attr( $img_srcset ); ?>"
								sizes="(max-width: 117px) 100vw, 117px" class="book-img"></a>
								<div>
									<a href="<?php the_sub_field('product_link'); ?>" target="_blank" alt="<?php the_sub_field('product_title'); ?>" class="book-link"><?php the_sub_field('product_title'); ?><?php if ( get_sub_field('favorite_book') ): ?> &starf;<?php endif; ?></a>
									<p class="book-authors"><?php the_sub_field('product_slug'); ?></p>
									<?php the_sub_field('product_description'); ?>
								</div>
							</div>
					<?php endwhile; ?>
					<?php endif;
					wp_link_pages();

				endwhile;

				?>
			</div><?php // Close Post Inner ?>
		</div><?php // Close Post ?>
	</div><?php // Close Main ?>
</div><?php // Close Container ?>
<?php get_footer(); ?>
