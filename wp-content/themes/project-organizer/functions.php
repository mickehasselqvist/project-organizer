<?php

require_once(get_template_directory() . '/inc/customize.php'); // Customizer

/*------------------------------------*\
	Theme Support
\*------------------------------------*/

if (!isset($content_width))
{
    $content_width = 900;
}

if (function_exists('add_theme_support'))
{
    add_theme_support('menus');
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support( 'html5', array( 'search-form' ) );

    // Localisation Support
    load_theme_textdomain('project_organizer', get_template_directory() . '/languages');
}

/*------------------------------------*\
	Functions
\*------------------------------------*/

function project_organizer_scripts()
{
    wp_register_script('main_script', get_template_directory_uri() . '/js/scripts.min.js', array('jquery'), '1.0.0');
    wp_enqueue_script('main_script');
}


function project_organizer_styles()
{
    wp_register_style('main_css', get_template_directory_uri() . '/css/style.css', array(), '1.0', 'all');
    wp_enqueue_style('main_css');
}

function register_project_organizer_menu()
{
    register_nav_menus(array(
        'header-menu' => __('Header Menu', 'project_organizer')
    ));
}


function theme_slug_render_title() {
    ?>
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <?php
}

function project_organizer_main_menu() {
    ?>
    <ul>
        <li><a href="<?php echo admin_url(); ?>post-new.php?post_type=project"><?php _e('Add new project', 'project_organizer'); ?></a></li>
        <li><a href="<?php echo get_post_type_archive_link( 'project' ); ?>"><?php _e('View all projects', 'project_organizer'); ?></a></li>
        <li><a href="<?php echo wp_logout_url(); ?>"><?php _e('Log out', 'project_organizer'); ?></a></li>
    </ul>
    <?php
}

show_admin_bar( false );

function projects_alter_loop( $query ) {

    if ( !$query->is_main_query() )
        return;

    //if ( is_singular('project') )
        //return;

    if( !isset($query->{'query'}{'post_type'}) )
        return;

    if( !$query->{'query'}{'post_type'} = 'project' )
        return;


    // Only show projects you yourself has created
    $current_user = wp_get_current_user();
    $query->set( 'author', $current_user->ID );

}

/*------------------------------------*\
	Custom Post Types
\*------------------------------------*/

// Post type for projects
function create_project_posttype()
{
    $labels = array(
        'name'               => _x( 'Projects', 'project general name', 'project-organizer' ),
        'singular_name'      => _x( 'Project', 'project singular name', 'project-organizer' ),
        'menu_name'          => _x( 'Projects', 'project admin menu', 'project-organizer' ),
        'name_admin_bar'     => _x( 'Project', 'add new project on admin bar', 'project-organizer' ),
        'add_new'            => _x( 'Create New', 'project post type', 'project-organizer' ),
        'add_new_item'       => __( 'Create New Project', 'project-organizer' ),
        'new_item'           => __( 'New Project', 'project-organizer' ),
        'edit_item'          => __( 'Edit Project', 'project-organizer' ),
        'view_item'          => __( 'View Project', 'project-organizer' ),
        'all_items'          => __( 'All Projects', 'project-organizer' ),
        'search_items'       => __( 'Search Projects', 'project-organizer' ),
        'parent_item_colon'  => __( 'Parent Projects:', 'project-organizer' ),
        'not_found'          => __( 'No projects found.', 'project-organizer' ),
        'not_found_in_trash' => __( 'No projects found in Trash.', 'project-organizer' )
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'rewrite'            => array( 'slug' => 'projects' ),
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'supports'           => array( 'title', 'author' )
    );

    register_post_type( 'project', $args );
}

function filter_listing_by_author_project( $wp_query_obj )
{
    // Front end, do nothing
    if( !is_admin() )
        return;

    global $current_user, $pagenow;
    wp_get_current_user();

    // http://php.net/manual/en/function.is-a.php
    if( !is_a( $current_user, 'WP_User') )
        return;

    // Not the correct screen, bail out
    if( 'edit.php' != $pagenow )
        return;

    // Not the correct post type, bail out
    if( 'project' != $wp_query_obj->query['post_type'] )
        return;

    // If the user is not administrator, filter the post listing
    if( !current_user_can( 'delete_plugins' ) )
        $wp_query_obj->set('author', $current_user->ID );
}

function project_organizer_remove_menus(){
    remove_menu_page( 'edit.php' );
}

//Password protect entire site

function project_organizer_protect_site() {
    $args = [
        'post_type' => 'page',
        'fields' => 'ids',
        'nopaging' => true,
        'meta_key' => '_wp_page_template',
        'meta_value' => 'template-login.php'
    ];
    $login_page_id = get_posts( $args )[0];
    if ( !is_user_logged_in() && !is_page($login_page_id) ) {
        $login_page  = get_permalink($login_page_id);
        wp_redirect($login_page);
        exit;
    }
}

function project_organizer_custom_login_failed() {
    $args = [
        'post_type' => 'page',
        'fields' => 'ids',
        'nopaging' => true,
        'meta_key' => '_wp_page_template',
        'meta_value' => 'template-login.php'
    ];
    $login_page_id = get_posts( $args )[0];
    $login_page  = get_permalink($login_page_id);
    wp_redirect($login_page . '?login=failed');
    exit;
}
function project_organizer_verify_user_pass($user, $username, $password) {
    $args = [
        'post_type' => 'page',
        'fields' => 'ids',
        'nopaging' => true,
        'meta_key' => '_wp_page_template',
        'meta_value' => 'template-login.php'
    ];
    $login_page_id = get_posts( $args )[0];
    $login_page  = get_permalink($login_page_id);
    if($username == "" || $password == "") {
        wp_redirect($login_page . "?login=empty");
        exit;
    }
}
function project_organizer_logout_redirect() {
    $args = [
        'post_type' => 'page',
        'fields' => 'ids',
        'nopaging' => true,
        'meta_key' => '_wp_page_template',
        'meta_value' => 'template-login.php'
    ];
    $login_page_id = get_posts( $args )[0];
    $login_page  = get_permalink($login_page_id);
    wp_redirect($login_page . "?login=false");
    exit;
}

function add_query_vars($aVars) {
    $aVars[] = "login";
    return $aVars;
}

/*------------------------------------*\
	Actions and Filters
\*------------------------------------*/

// Add Actions
add_action('wp_enqueue_scripts', 'project_organizer_scripts');
add_action('wp_enqueue_scripts', 'project_organizer_styles');
add_action('after_setup_theme', 'register_project_organizer_menu');
add_action('init', 'create_project_posttype');
add_action('pre_get_posts', 'filter_listing_by_author_project');
add_action('admin_menu', 'project_organizer_remove_menus');
add_action('wp_head', 'theme_slug_render_title');
add_action( 'pre_get_posts', 'projects_alter_loop' );

add_action ('template_redirect', 'project_organizer_protect_site');
add_action('wp_login_failed', 'project_organizer_custom_login_failed');
add_action('wp_logout','project_organizer_logout_redirect');

// Add Filters
add_filter('authenticate', 'project_organizer_verify_user_pass', 1, 3);
add_filter('query_vars', 'add_query_vars');

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'parent_post_rel_link', 10);
remove_action('wp_head', 'start_post_rel_link', 10);
remove_action('wp_head', 'adjacent_posts_rel_link', 10);
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10);

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether