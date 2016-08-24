<?php get_header(); ?>

<?php
	$current_user = wp_get_current_user();
	$current_user_display_name = $current_user->display_name;
	$current_user_email = $current_user->user_email;
?>

	<section class="main_content">

		<h2>Welcome, <?php echo $current_user_display_name; ?></h2>
		<div class="user_avatar">
			<?php echo get_avatar( $current_user_email, 156 ); ?>
		</div>
		<div class="user_controls">
			<?php project_organizer_main_menu(); ?>
		</div>

	</section>


<?php get_footer(); ?>
