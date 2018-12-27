<?php

/**
 *  Meeting post-type
 */
function meeting_post_types(){
    register_post_type('meeting', array(
        'supports' => array('title', 'editor', 'thumbnail'),
        'rewrite' => array('slug' => 'meetings'),
        'public' => true,
        'has_archive' => true,
        'labels' => array(
            'name' => 'Meetings',
            'add_new_item' => 'Add New Meeting',
            'edit_item' => 'Edit Meeting',
            'all_items' => 'All Meetings',
            'singular_name' => 'Meeting'
        ),
        'menu_icon' => 'dashicons-calendar',
        'taxonomies' => array( 'category' )
    ));
}

/**
 * Register Taxonomies
 */
function meeting_taxonomies(){
    register_taxonomy(
        '', 
        array(''),
        array(
            'hierarchical' => true,
            'show_ui' => true,
            'query_var' => true,
            'rewrite' => array('slug' => '')
        )
    );
}

// Actions
add_action('init', 'meeting_post_types');
add_action('init', 'meeting_taxonomies');