<?php

if ( ! function_exists('gemas_custom_post_type') ) {
	
    /**
     * Register a custom post type.
     *
     * @link http://codex.wordpress.org/Function_Reference/register_post_type
     */
    function gemas_custom_post_type() {

        //portfolio
        register_post_type(
            'portfolio', array(
            'labels'                 => array(
                'name'               => _x( 'Portfolio', 'post type general name', 'gemas' ),
                'singular_name'      => _x( 'Portfolio', 'post type singular name', 'gemas' ),
                'menu_name'          => _x( 'Portfolio', 'admin menu', 'gemas' ),
                'name_admin_bar'     => _x( 'Portfolio', 'add new on admin bar', 'gemas' ),
                'add_new'            => _x( 'Add New', 'Portfolio', 'gemas' ),
                'add_new_item'       => __( 'Add New Portfolio', 'gemas' ),
                'new_item'           => __( 'New Portfolio', 'gemas' ),
                'edit_item'          => __( 'Edit Portfolio', 'gemas' ),
                'view_item'          => __( 'View Portfolio', 'gemas' ),
                'all_items'          => __( 'All Portfolio', 'gemas' ),
                'search_items'       => __( 'Search Portfolio', 'gemas' ),
                'parent_item_colon'  => __( 'Parent Portfolio:', 'gemas' ),
                'not_found'          => __( 'No Portfolio found.', 'gemas' ),
                'not_found_in_trash' => __( 'No Portfolio found in Trash.', 'gemas' )
            ),

            'description'        => __( 'Description.', 'gemas' ),
            'menu_icon'          => 'dashicons-layout',
            'public'             => true,
            'show_in_menu'       => true,
            'has_archive'        => false,
            'hierarchical'       => true,
            'rewrite'            => array( 'slug' => 'portfolio' ),
            'supports'           => array( 'title', 'editor', 'thumbnail' )
        ));

        // portfolio taxonomy
        register_taxonomy(
            'portfolio_category',
            'portfolio',
            array(
                'labels' => array(
                    'name' => __( 'Portfolio Category', 'gemas' ),
                    'add_new_item'      => __( 'Add New Category', 'gemas' ),
                ),
                'hierarchical' => true,
                'show_admin_column'     => true
        ));
    }

    add_action( 'init', 'gemas_custom_post_type' );

}