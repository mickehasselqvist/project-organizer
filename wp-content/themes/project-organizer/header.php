<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); ?>

	</head>
	<body <?php body_class(); ?>>

		<header class="page_header" role="banner">

			<div class="header_inner">

				<div class="logo">
					<?php get_theme_logo(); ?>
				</div>

				<button class="show_menu">
					<i class="fa fa-cog" aria-hidden="true"></i>
					<span><?php _e('Show menu', 'project-organizer'); ?></span>
				</button>
				<nav class="nav" role="navigation">
					<?php project_organizer_main_menu(); ?>
				</nav>

				<?php get_search_form(); ?>

			</div>

		</header>

		<div class="wrapper">