<?php

/**
 * Get the post type labels
 *
 * @param $name
 * @param $theme
 * @return array
 */
function getPostTypeLabels($name, $theme, $menuName) {

    // Set UI labels for Custom Post Type
    $labels = array(
        'name'                => __( $name, 'Post Type General Name', $theme ),
        'singular_name'       => __( $name, 'Post Type Singular Name', $theme ),
        'menu_name'           => __( $menuName, $theme ),
        'parent_item_colon'   => __( "Parent $name", $theme ),
        'all_items'           => __( "All $name", $theme ),
        'view_item'           => __( "View $name", $theme ),
        'add_new_item'        => __( "Add New $name", $theme ),
        'add_new'             => __( "Add New", $theme ),
        'edit_item'           => __( "Edit $name", $theme ),
        'update_item'         => __( "Update $name", $theme ),
        'search_items'        => __( "Search $name", $theme ),
        'not_found'           => __( 'Not Found', $theme ),
        'not_found_in_trash'  => __( 'Not found in Trash', $theme ),
    );

    return $labels;
}


/**
 * Get the post type args
 *
 * @param $names
 * @param $labels
 * @param $theme
 */
function getPostTypeArgs($names, $labels, $theme, $showBlockEditor = false) {


    // Set other options for Custom Post Type

    $args = array(
        'label'               => __( $names, $theme ),
        'description'         => __( "Corus $names", $theme ),
        'labels'              => $labels,

        // Features this CPT supports in Post Editor
        'supports'            => ($showBlockEditor) ? array( 'title', 'author', 'thumbnail', 'revisions', 'custom-fields', 'editor') : array( 'title', 'author', 'thumbnail', 'revisions', 'custom-fields'),

        // You can associate this CPT with a taxonomy or custom taxonomy.
        //'taxonomies'          => array( 'planner' ),

        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
        'show_in_rest'        => $showBlockEditor,
    );

    return $args;
}

/**
 * Create custom post type
 */
function createProductPostType() {

    $theme = 'Corus WordPress Exercise';
    $name = 'Gallery';
    $menuName = 'Gallery';

    $labels = getPostTypeLabels($name, $theme, $menuName);
    $args = getPostTypeArgs($name, $labels, $theme);
    register_post_type( $name, $args );

}

add_action( 'init', 'createProductPostType', 0 );
