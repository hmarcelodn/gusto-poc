<?php

/**
 * Add custom post-types
 */
function gusto_post_types(){

    /**
     *  Article post-type
     */
    register_post_type('article', array(
        'supports' => array('title', 'editor', 'thumbnail'),
        'rewrite' => array('slug' => 'articles'),
        'public' => true,
        'has_archive' => true,
        'labels' => array(
            'name' => 'Articles',
            'add_new_item' => 'Add New Article',
            'edit_item' => 'Edit Article',
            'all_items' => 'All Article',
            'singular_name' => 'Article'
        ),
        'menu_icon' => 'dashicons-format-aside',
        'taxonomies' => array( 'category' )
    ));

    /**
     *  CTA post-type
     */    
    register_post_type('cta', array(
        'supports' => array('title', 'editor', 'thumbnail'),
        'rewrite' => array('slug' => 'ctas'),
        'public' => true,
        'has_archive' => true,
        'labels' => array(
            'name' => 'CTA',
            'add_new_item' => 'Add New CTA',
            'edit_item' => 'Edit CTA',
            'all_items' => 'All CTA',
            'singular_name' => 'CTA'
        ),
        'menu_icon' => 'dashicons-format-aside',
        'taxonomies' => array( 'category' )
    )); 
    
    /**
     *  AskGusto post-type
     */    
    register_post_type('askgusto', array(
        'supports' => array('title', 'editor', 'thumbnail'),
        'rewrite' => array('slug' => 'askgusto'),
        'public' => true,
        'has_archive' => true,
        'labels' => array(
            'name' => 'AskGusto',
            'add_new_item' => 'Add New AskGusto',
            'edit_item' => 'Edit AskGusto',
            'all_items' => 'All AskGusto',
            'singular_name' => 'AskGusto'
        ),
        'menu_icon' => 'dashicons-format-aside',
        'taxonomies' => array( 'category' )
    ));     
}

/**
 * Add custom categories
 */
function gusto_custom_categories(){
    wp_insert_term(
        // the name of the sub-category
        'Collection',         
        // the taxonomy 'category' (don't change)
        'category',        
        array(
            // what to use in the url for term archive
            'slug' => 'collection',         
            // link with main category. In the case, become a child of the "Category A"   parent  
            'parent'=> ''        
        ));

    $parent = term_exists( 'Collection', 'category' );
    $termId = $parent['term_id'];        
    
    wp_insert_term(
        // the name of the sub-category
        'Collection-A',         
        // the taxonomy 'category' (don't change)
        'category',        
        array(
            // what to use in the url for term archive
            'slug' => 'collection-a',         
            // link with main category. In the case, become a child of the "Category A"   parent  
            'parent'=> $termId       
        )
    );   
    
    wp_insert_term(
        // the name of the sub-category
        'Collection-B',         
        // the taxonomy 'category' (don't change)
        'category',        
        array(
            // what to use in the url for term archive
            'slug' => 'collection-b',         
            // link with main category. In the case, become a child of the "Category A"   parent  
            'parent'=> $termId      
        )
    );       
}

// Actions
add_action('init', 'gusto_post_types');
add_action('init', 'gusto_custom_categories');