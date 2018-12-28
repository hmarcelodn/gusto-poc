<?php

function my_theme_enqueue_styles() {
    $parent_style = 'understrap-styles';
    $parent_theme = wp_get_theme("understrap");
    wp_enqueue_style( 'understrap-styles', get_template_directory_uri() . '/css/theme.min.css', array(), $parent_theme->get( 'Version' ) );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style )
    );
}

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );