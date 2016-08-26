<?php get_header(); ?>

	<section class="main_content page">

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<div class="content">
					<?php the_content(); ?>
				</div>

			</article>

		<?php endwhile; ?>

		<?php else: ?>

			<article>

				<div class="content">
					<h2><?php _e( 'Sorry, nothing to display.', 'content_organizer' ); ?></h2>
				</div>

			</article>

		<?php endif; ?>

	</section>



<?php get_footer(); ?>
