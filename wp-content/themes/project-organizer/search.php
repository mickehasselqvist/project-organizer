<?php get_header(); ?>

	<section class="main_content page">

		<article>

		<h2><?php echo sprintf( __( '%s search results for ', 'project_organizer' ), $wp_query->found_posts ); echo '"' . get_search_query() . '"'; ?></h2>

		<?php if (have_posts()): ?>


				<ul>

				<?php while (have_posts()) : the_post(); ?>

					<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>

				<?php endwhile; ?>

				</ul>


		<?php else: ?>
			<p>
				<?php _e('No search results could be found.', 'project_organizer'); ?>
			</p>
		<?php endif; ?>

		</article>

	</section>


<?php get_footer(); ?>
