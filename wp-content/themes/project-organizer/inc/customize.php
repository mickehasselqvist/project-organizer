<?php
function theme_custom_logo_setup() {
    $args = array(
        'flex-width' => true,
        'flex-height' => true
    );
    add_theme_support( 'custom-logo', $args );
}

function change_logo_class($html){
    $html = str_replace('class="custom-logo-link"', 'class="page_logo"', $html);
    return $html;
}

function get_theme_logo() {
    if(has_custom_logo()) {
        the_custom_logo();
    } else {
        echo '<a href="' . get_site_url() . '" class="page_logo">' . get_bloginfo("name") . '</a>';
    }
}

function project_organizer_custom_background() {
    $defaults = array(
        'default-color'          => '',
        'default-image'          => '%1$s/img/backgrounds/bg.jpg',
        'default-repeat'         => 'repeat',
        'default-position-x'     => 'top left'
    );
    add_theme_support( 'custom-background', $defaults );
}


/*------------------------------------*\
	Actions and Filters
\*------------------------------------*/

add_action( 'after_setup_theme', 'theme_custom_logo_setup' );
add_action( 'after_setup_theme', 'project_organizer_custom_background' );
add_filter('get_custom_logo','change_logo_class');