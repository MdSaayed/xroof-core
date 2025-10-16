<?php

function services_page_template($template)
{
    if (is_singular('service')) {
        $new_template = __DIR__ . '/template/services-single.php';
        if ('' != $new_template) {
            return $new_template;
        }
    }
    return $template;
}
add_filter('template_include', 'services_page_template', 99);

function services_post_type_init()
{
    $labels = array(
        'name' => _x('Services', 'Post type general name', 'xroof'),
        'singular_name' => _x('Service', 'Post type singular name', 'xroof'),
        'menu_name' => _x('Services', 'Admin Menu text', 'xroof'),
        'name_admin_bar' => _x('Service', 'Add New on Toolbar', 'xroof'),
        'add_new' => __('Add New', 'xroof'),
        'add_new_item' => __('Add New Services', 'xroof'),
        'new_item' => __('New Services', 'xroof'),
        'edit_item' => __('Edit Service', 'xroof'),
        'view_item' => __('View Service', 'xroof'),
        'all_items' => __('All Services', 'xroof'),
        'search_items' => __('Search Services', 'xroof'),
        'parent_item_colon' => __('Parent Services:', 'xroof'),
        'not_found' => __('No projects found.', 'xroof'),
        'not_found_in_trash' => __('No projects found in Trash.', 'xroof'),
        'featured_image' => _x('Service Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'xroof'),
        'set_featured_image' => _x('Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'xroof'),
        'remove_featured_image' => _x('Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'xroof'),
        'use_featured_image' => _x('Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'xroof'),
        'archives' => _x('Service archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'xroof'),
        'insert_into_item' => _x('Insert into service', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'xroof'),
        'uploaded_to_this_item' => _x('Uploaded to this service', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'xroof'),
        'filter_items_list' => _x('Filter projects list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'xroof'),
        'items_list_navigation' => _x('Services list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'xroof'),
        'items_list' => _x('Services list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'xroof'),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'service'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
    );

    register_post_type('service', $args);


    $labels = array(
        'name' => _x('Service Categories', 'taxonomy general name', 'xroof'),
        'singular_name' => _x('Service Category', 'taxonomy singular name', 'xroof'),
        'search_items' => __('Search Service Categories', 'xroof'),
        'all_items' => __('All Service Categories', 'xroof'),
        'view_item' => __('View Service Category', 'xroof'),
        'parent_item' => __('Parent Service Category', 'xroof'),
        'parent_item_colon' => __('Parent Service Category:', 'xroof'),
        'edit_item' => __('Edit Service Category', 'xroof'),
        'update_item' => __('Update Service Category', 'xroof'),
        'add_new_item' => __('Add New Service Category', 'xroof'),
        'new_item_name' => __('New Service Category Name', 'xroof'),
        'not_found' => __('No Service Categories Found', 'xroof'),
        'back_to_items' => __('Back to Service Categories', 'xroof'),
        'menu_name' => __('Service Categories', 'xroof'),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'service-category'),
        'show_in_rest' => true,
    );

    register_taxonomy('service_category', 'service', $args);
}

add_action('init', 'services_post_type_init');