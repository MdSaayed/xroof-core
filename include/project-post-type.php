<?php

function project_page_template($template)
{
    if (is_singular('project')) {
        $new_template = __DIR__.'/template/project-single.php';
        if ('' != $new_template) {
            return $new_template;
        }
    }
    return $template;
}
add_filter('template_include', 'project_page_template', 99);

function project_post_type_init()
{
    $labels = array(
        'name' => _x('Projects', 'Post type general name', 'xroof'),
        'singular_name' => _x('Project', 'Post type singular name', 'xroof'),
        'menu_name' => _x('Projects', 'Admin Menu text', 'xroof'),
        'name_admin_bar' => _x('Project', 'Add New on Toolbar', 'xroof'),
        'add_new' => __('Add New', 'xroof'),
        'add_new_item' => __('Add New Projects', 'xroof'),
        'new_item' => __('New Projects', 'xroof'),
        'edit_item' => __('Edit Project', 'xroof'),
        'view_item' => __('View Project', 'xroof'),
        'all_items' => __('All Projects', 'xroof'),
        'search_items' => __('Search Projects', 'xroof'),
        'parent_item_colon' => __('Parent Projects:', 'xroof'),
        'not_found' => __('No projects found.', 'xroof'),
        'not_found_in_trash' => __('No projects found in Trash.', 'xroof'),
        'featured_image' => _x('Project Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'xroof'),
        'set_featured_image' => _x('Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'xroof'),
        'remove_featured_image' => _x('Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'xroof'),
        'use_featured_image' => _x('Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'xroof'),
        'archives' => _x('Project archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'xroof'),
        'insert_into_item' => _x('Insert into project', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'xroof'),
        'uploaded_to_this_item' => _x('Uploaded to this project', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'xroof'),
        'filter_items_list' => _x('Filter projects list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'xroof'),
        'items_list_navigation' => _x('Projects list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'xroof'),
        'items_list' => _x('Projects list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'xroof'),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'project'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
    );

    register_post_type('project', $args);


    $labels = array(
        'name' => _x('Project Categories', 'taxonomy general name', 'xroof'),
        'singular_name' => _x('Project Category', 'taxonomy singular name', 'xroof'),
        'search_items' => __('Search Project Categories', 'xroof'),
        'all_items' => __('All Project Categories', 'xroof'),
        'view_item' => __('View Project Category', 'xroof'),
        'parent_item' => __('Parent Project Category', 'xroof'),
        'parent_item_colon' => __('Parent Project Category:', 'xroof'),
        'edit_item' => __('Edit Project Category', 'xroof'),
        'update_item' => __('Update Project Category', 'xroof'),
        'add_new_item' => __('Add New Project Category', 'xroof'),
        'new_item_name' => __('New Project Category Name', 'xroof'),
        'not_found' => __('No Project Categories Found', 'xroof'),
        'back_to_items' => __('Back to Project Categories', 'xroof'),
        'menu_name' => __('Project Categories', 'xroof'),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => true,  
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'project-category'),
        'show_in_rest' => true,
    );

    register_taxonomy('project_category', 'project', $args);
}

add_action('init', 'project_post_type_init');