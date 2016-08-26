<?php get_header(); ?>


	<section class="main_content projects">
		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class('project-article'); ?>>

				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">

					<h3 class="project-title"><span><?php the_title(); ?></span></h3>

					<p>

						<span class="project-completition"><strong>Completion:</strong> <?php the_field('project_completion_status'); ?>%</span>

						<button aria-hidden="true">
							<i class="fa fa-long-arrow-right"></i>
						</button>

					</p>

				</a>

			</article>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="prev"><?php previous_posts_link( '<i class="fa fa-angle-left fa-5x" aria-hidden="true"></i>' ); ?></div>
			<div class="next"><?php next_posts_link( '<i class="fa fa-angle-right fa-5x" aria-hidden="true"></i>', '' ); ?></div>
		</div>

		<?php else: ?>
			<article class="no-projects">
				<p>
					<?php _e('No project are created.', 'project_organizer'); ?> <a href="<?php echo admin_url(); ?>post-new.php?post_type=project"><?php _e('Create one?', 'project_organizer'); ?></a>
				</p>
			</article>
		<?php endif; ?>
	</section>

<?php get_footer(); ?>
