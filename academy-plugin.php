<?php
/**
 * Plugin Name: Fulfilment Ops Academy
 * Description: Registers "Academy" custom post type and taxonomy for logistics knowledge articles.
 * Version: 1.0
 * Author: Amit Nandi
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// 1. Register Custom Post Type: Academy
function create_academy_cpt() {
    $labels = array(
        'name'               => 'Academy Articles',
        'singular_name'      => 'Academy Article',
        'menu_name'          => 'Academy',
        'add_new'            => 'Add New Article',
        'add_new_item'       => 'Add New Academy Article',
        'edit_item'          => 'Edit Article',
        'new_item'           => 'New Article',
        'view_item'          => 'View Article',
        'search_items'       => 'Search Academy',
        'not_found'          => 'No articles found',
        'not_found_in_trash' => 'No articles found in Trash',
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'show_in_rest'        => true, // Enables Gutenberg
        'has_archive'         => 'fulfilment-ops-academy',
        'rewrite'             => array( 'slug' => 'fulfilment-ops-academy/article', 'with_front' => false ),
        'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'taxonomies'          => array( 'academy_category' ),
        'menu_icon'           => 'dashicons-welcome-learn-more',
    );
    register_post_type( 'academy', $args );
}
add_action( 'init', 'create_academy_cpt' );

// 2. Register Custom Taxonomy: Academy Sections
function create_academy_taxonomy() {
    register_taxonomy(
        'academy_category',
        'academy',
        array(
            'label'             => 'Academy Sections',
            'rewrite'           => array( 'slug' => 'fulfilment-ops-academy', 'with_front' => false ),
            'hierarchical'      => true,
            'show_admin_column' => true,
            'show_in_rest'      => true,
        )
    );
}
add_action( 'init', 'create_academy_taxonomy' );
