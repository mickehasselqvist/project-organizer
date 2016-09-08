<?php get_header(); ?>


	<section class="main_content projects">

		<?php project_archive_header(); ?>

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class('project-article'); ?>>

				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">

					<h3 class="project-title"><span><?php the_title(); ?></span></h3>

					<p>
						<?php if( have_rows('project_to_do_list') ): ?>
							<?php $mandatory_count = 0 ?>
							<?php $finished_mandatory_count = 0 ?>
							<?php while ( have_rows('project_to_do_list') ) : the_row(); ?>
								<?php $project_to_do_importance = get_sub_field('project_to_do_importance'); ?>
								<?php if($project_to_do_importance == 'mandatory') {
									$mandatory_count++;
									$project_to_do_completion = get_sub_field('project_to_do_completion');
									if($project_to_do_completion) {
										$finished_mandatory_count++;
									}
								} ?>
							<?php endwhile; ?>
							<?php $completion_status = 100/$mandatory_count*$finished_mandatory_count . '%'; ?>
						<?php else : ?>
							<?php $completion_status = '100%'; ?>
						<?php endif; ?>

						<span class="project-completition"><strong>Completion:</strong> <?php echo $completion_status; ?></span>

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
