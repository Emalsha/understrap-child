<?php
function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {

	// Get the theme data
	$the_theme = wp_get_theme();
    wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_script( 'jquery');
	wp_enqueue_script( 'popper-scripts', get_template_directory_uri() . '/js/popper.min.js', array(), false);
    wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

function add_child_theme_textdomain() {
    load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );


/**
 * 
 * Read more text editing
 * 
 */

function modify_read_more_link() {
    return '<a class="more-link" href="' . get_permalink() . '">View list..</a>';
}
add_filter( 'the_content_more_link', 'modify_read_more_link' );

/**
 * Filter the "read more" excerpt string link to the post.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function wpdocs_excerpt_more( $more ) {
    return sprintf( '<a class="understrap-read-more-link goodswave-read-more" href="%1$s">%2$s</a>',
        get_permalink( get_the_ID() ),
        __( 'Read More', 'textdomain' )
    );
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

/**
 * -----------------------------
 *  Goodswave Custom Post types
 * -----------------------------
 *  2018/08/21 - Emalsha Rasad
 * 
 */

add_action( 'init', 'goodswave_gift_init' );
/**
 * Register a gift post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function goodswave_gift_init() {
	$labels = array(
		'name'               => _x( 'Gifts', 'post type general name', 'Goodswave' ),
		'singular_name'      => _x( 'Gift', 'post type singular name', 'Goodswave' ),
		'menu_name'          => _x( 'Gift Items', 'admin menu', 'Goodswave' ),
		'name_admin_bar'     => _x( 'Gift Items', 'add new on admin bar', 'Goodswave' ),
		'add_new'            => _x( 'Add New', 'gift', 'Goodswave' ),
		'add_new_item'       => __( 'Add New Gift', 'Goodswave' ),
		'new_item'           => __( 'New Gift', 'Goodswave' ),
		'edit_item'          => __( 'Edit Gift', 'Goodswave' ),
		'view_item'          => __( 'View Gift', 'Goodswave' ),
		'all_items'          => __( 'All Gifts', 'Goodswave' ),
		'search_items'       => __( 'Search Gift', 'Goodswave' ),
		'parent_item_colon'  => __( 'Parent Gift:', 'Goodswave' ),
		'not_found'          => __( 'No Gifts found.', 'Goodswave' ),
		'not_found_in_trash' => __( 'No Gifts found in Trash.', 'Goodswave' )
	);

	$args = array(
		'labels'             => $labels,
                'description'        => __( 'Goodswave gift items.', 'Goodswave' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'gift' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'menu_icon' 		 => 'dashicons-align-left',
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments','block-editor' ),
		'taxonomy'		     => array('post_tag')
	);

	register_post_type( 'gift', $args );
}

add_action( 'init', 'goodswave_home_init' );
/**
 * Register a home post type. 
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function goodswave_home_init() {
	$labels = array(
		'name'               => _x( 'Home Items', 'post type general name', 'Goodswave' ),
		'singular_name'      => _x( 'Home', 'post type singular name', 'Goodswave' ),
		'menu_name'          => _x( 'Home Items', 'admin menu', 'Goodswave' ),
		'name_admin_bar'     => _x( 'Home Items', 'add new on admin bar', 'Goodswave' ),
		'add_new'            => _x( 'Add New', 'home', 'Goodswave' ),
		'add_new_item'       => __( 'Add New Home Item', 'Goodswave' ),
		'new_item'           => __( 'New Home Item', 'Goodswave' ),
		'edit_item'          => __( 'Edit Home Item', 'Goodswave' ),
		'view_item'          => __( 'View Home Item', 'Goodswave' ),
		'all_items'          => __( 'All Home Items', 'Goodswave' ),
		'search_items'       => __( 'Search Home Items', 'Goodswave' ),
		'parent_item_colon'  => __( 'Parent Home Item:', 'Goodswave' ),
		'not_found'          => __( 'No Item found.', 'Goodswave' ),
		'not_found_in_trash' => __( 'No Item found in Trash.', 'Goodswave' )
	);

	$args = array(
		'labels'             => $labels,
                'description'        => __( 'Goodswave home appliations items.', 'Goodswave' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'home-appliance' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'menu_icon' 		 => 'dashicons-align-left',
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'block-editor' ),
		'taxonomy'		     => array('post_tag')
	);

	register_post_type( 'home', $args );
}

add_action( 'init', 'goodswave_office_init' );
/**
 * Register a office post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function goodswave_office_init() {
	$labels = array(
		'name'               => _x( 'Office Items', 'post type general name', 'Goodswave' ),
		'singular_name'      => _x( 'Office', 'post type singular name', 'Goodswave' ),
		'menu_name'          => _x( 'Office Items', 'admin menu', 'Goodswave' ),
		'name_admin_bar'     => _x( 'Office Items', 'add new on admin bar', 'Goodswave' ),
		'add_new'            => _x( 'Add New', 'Office', 'Goodswave' ),
		'add_new_item'       => __( 'Add New Office Item', 'Goodswave' ),
		'new_item'           => __( 'New Office Item', 'Goodswave' ),
		'edit_item'          => __( 'Edit Office Item', 'Goodswave' ),
		'view_item'          => __( 'View Office Item', 'Goodswave' ),
		'all_items'          => __( 'All Office Items', 'Goodswave' ),
		'search_items'       => __( 'Search Office Items', 'Goodswave' ),
		'parent_item_colon'  => __( 'Parent Office Item:', 'Goodswave' ),
		'not_found'          => __( 'No Item found.', 'Goodswave' ),
		'not_found_in_trash' => __( 'No Item found in Trash.', 'Goodswave' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Goodswave office applications items.', 'Goodswave' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'office-organizing' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'menu_icon' 		 => 'dashicons-align-left',
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'block-editor' ),
		'taxonomy'		     => array('post_tag')
	);

	register_post_type( 'office', $args );
}

