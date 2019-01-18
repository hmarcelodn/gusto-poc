<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

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

// Add new custom format for related-posts-articles
add_filter( 'related_posts_by_taxonomy_template', 'rpbt_gusto_format_template', 10, 3 );
function rpbt_gusto_format_template( $template, $type, $format ) {
    if ( isset( $format ) && ( 'gusto' === $format ) ) {
        return 'related-posts-gusto.php';
    }
    return $template;
}

// Create new format thumbnail_excerpt for use in widget and shortcode
add_action( 'wp_loaded', 'rpbt_gusto_format', 11 );
 
function rpbt_gusto_format() {
 
    if ( !class_exists( 'Related_Posts_By_Taxonomy_Defaults' ) ) {
        return;
    }
 
    $defaults = Related_Posts_By_Taxonomy_Defaults::get_instance();
 
    // Add the new format .
    $defaults->formats['gusto'] = __( 'Gusto' );
}