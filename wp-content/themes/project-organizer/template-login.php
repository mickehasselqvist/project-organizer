<?php
/* Template Name: Login Page */
?>

<?php get_header(); ?>

	<section class="main_content login">

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<div class="content">

					<?php

						if(isset($wp_query->query_vars['login'])) {
							$login = urldecode($wp_query->query_vars['login']);

							switch ($login) {
								case 'false':
									$message = __('You have been logged out.', 'project_organizer');
									break;
								case 'failed':
									$message = __('Username or password wrong.', 'project_organizer');
									break;
								case 'empty':
									$message = __('You have to fill out a username and a password.', 'project_organizer');
									break;
							}

							?>
								<div id="login_error">
									<p><?php echo $message; ?></p>
								</div>
							<?php
						}


						$args = array(
							'redirect' => home_url()
						);
						wp_login_form($args);
					?>
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
