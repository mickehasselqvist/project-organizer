<?php get_header(); ?>

	<section class="main_content page">

		<article>

			<h1><?php _e( 'Latest Posts', 'html5blank' ); ?></h1>

			<?php if (have_posts()): while (have_posts()) : the_post(); ?>

				<h2><?php the_title(); ?></h2>

				<?php the_content(); ?>

			<?php endwhile; ?>

			<div class="navigation">
				<div class="prev"><?php previous_posts_link( '<i class="fa fa-angle-left fa-5x" aria-hidden="true"></i>' ); ?></div>
				<div class="next"><?php next_posts_link( '<i class="fa fa-angle-right fa-5x" aria-hidden="true"></i>', '' ); ?></div>
			</div>

			<?php else: ?>
				<article class="no-projects">
					<p>
						<?php _e('We couldn\'t find any posts.', 'project_organizer'); ?>
					</p>
				</article>
			<?php endif; ?>

		</article>

	</section>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
