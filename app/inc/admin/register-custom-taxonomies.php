<?php

/**
 * Overwrite product_tag taxonomy properties to effectively hide it from WP admin ..
 */
add_action('init', function() {
    register_taxonomy('product_cat', 'product', [
        'public'            => false,
        'show_ui'           => false,
        'show_admin_column' => false,
        'show_in_nav_menus' => false,
        'show_tagcloud'     => false,
    ]);
}, 100);

/**
 * .. and also remove the column from Products table - it's also hardcoded there.
 */
add_action( 'admin_init' , function() {
    add_filter('manage_product_posts_columns', function($columns) {
        unset($columns['product_cat']);
        return $columns;
    }, 100);
});

if ( ! function_exists( 'brand_taxonomy' ) ) {
    // Register Custom Taxonomy
    function brand_taxonomy() {
        $labels = array(
            'name'                       => _x( 'Brands', 'Taxonomy General Name', 'text_domain' ),
            'singular_name'              => _x( 'Brand', 'Taxonomy Singular Name', 'text_domain' ),
            'menu_name'                  => __( 'Brands', 'text_domain' ),
            'all_items'                  => __( 'All Brands', 'text_domain' ),
            'parent_item'                => __( 'Parent Brand', 'text_domain' ),
            'parent_item_colon'          => __( 'Parent Brand:', 'text_domain' ),
            'new_item_name'              => __( 'New Brand Name', 'text_domain' ),
            'add_new_item'               => __( 'Add New Brand', 'text_domain' ),
            'edit_item'                  => __( 'Edit Brand', 'text_domain' ),
            'update_item'                => __( 'Update Brand', 'text_domain' ),
            'view_item'                  => __( 'View Brand', 'text_domain' ),
            'separate_items_with_commas' => __( 'Separate brands with commas', 'text_domain' ),
            'add_or_remove_items'        => __( 'Add or remove brands', 'text_domain' ),
            'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
            'popular_items'              => __( 'Popular Brands', 'text_domain' ),
            'search_items'               => __( 'Search Brands', 'text_domain' ),
            'not_found'                  => __( 'Not Found', 'text_domain' ),
            'no_terms'                   => __( 'No brands', 'text_domain' ),
            'items_list'                 => __( 'Brands list', 'text_domain' ),
            'items_list_navigation'      => __( 'Brands list navigation', 'text_domain' ),
        );
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => true,
        );
        register_taxonomy( 'brand', array( 'product' ), $args );
    }
    add_action( 'init', 'brand_taxonomy', 0 );
}

if ( ! function_exists( 'type_taxonomy' ) ) {
    // Register Custom Taxonomy
    function type_taxonomy() {
        $labels = array(
            'name'                       => _x( 'Types', 'Taxonomy General Name', 'text_domain' ),
            'singular_name'              => _x( 'Type', 'Taxonomy Singular Name', 'text_domain' ),
            'menu_name'                  => __( 'Types', 'text_domain' ),
            'all_items'                  => __( 'All Types', 'text_domain' ),
            'parent_item'                => __( 'Parent Type', 'text_domain' ),
            'parent_item_colon'          => __( 'Parent Type:', 'text_domain' ),
            'new_item_name'              => __( 'New Type Name', 'text_domain' ),
            'add_new_item'               => __( 'Add New Type', 'text_domain' ),
            'edit_item'                  => __( 'Edit Type', 'text_domain' ),
            'update_item'                => __( 'Update Type', 'text_domain' ),
            'view_item'                  => __( 'View Type', 'text_domain' ),
            'separate_items_with_commas' => __( 'Separate types with commas', 'text_domain' ),
            'add_or_remove_items'        => __( 'Add or remove types', 'text_domain' ),
            'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
            'popular_items'              => __( 'Popular Types', 'text_domain' ),
            'search_items'               => __( 'Search Types', 'text_domain' ),
            'not_found'                  => __( 'Not Found', 'text_domain' ),
            'no_terms'                   => __( 'No types', 'text_domain' ),
            'items_list'                 => __( 'Types list', 'text_domain' ),
            'items_list_navigation'      => __( 'Types list navigation', 'text_domain' ),
        );
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            // 'show_tagcloud'              => true,
        );
        register_taxonomy( 'type', array( 'product' ), $args );
    }
    add_action( 'init', 'type_taxonomy', 0 );
}
