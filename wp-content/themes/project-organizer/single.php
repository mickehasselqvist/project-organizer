<?php get_header(); ?>


	<section class="main_content single-project">
		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class('single-project-article'); ?>>

				<header>

					<h3><span><?php the_title(); ?></span></h3>
					<ul class="tabs">
						<li><a href="#general" class="active"><?php _e('General', 'project-organizer'); ?></a></li>
						<li><a href="#logins"><?php _e('Logins', 'project-organizer'); ?></a></li>
						<li><a href="#todo"><?php _e('To do-list', 'project-organizer'); ?></a></li>
						<li><a href="#notes"><?php _e('Notes', 'project-organizer'); ?></a></li>
					</ul>

				</header>

				<div class="content">
					<div id="general" class="tab-content">

						<?php get_template_part( 'templates/content', 'project_general' ); ?>
						
					</div>

					<div id="logins" class="tab-content">

						<?php get_template_part( 'templates/content', 'project_logins' ); ?>

					</div>

					<div id="todo" class="tab-content">

						<?php get_template_part( 'templates/content', 'project_todo' ); ?>

					</div>

					<div id="notes" class="tab-content">

						<?php get_template_part( 'templates/content', 'project_notes' ); ?>

					</div>
				</div>

			</article>

		<?php endwhile; ?>

		<?php else: ?>

		<?php endif; ?>

		<div class="navigation">
			<div class="prev"><a href="<?php echo get_post_type_archive_link( 'project' ); ?>"><i class="fa fa-angle-left fa-5x" aria-hidden="true"></i></a></div>
		</div>
	</section>



<?php get_footer(); ?>
