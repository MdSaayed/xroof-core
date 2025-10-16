<?php
// get all category
function get_post_cat($category = 'category')
{
    $categories = get_categories(array(
        'taxonomy' => $category,
        'orderby' => 'name',
        'order' => 'ASC',
    ));

    $cat_list = [];
    foreach ($categories as $cat) {
        $cat_list[$cat->slug] = $cat->name;
    }
    return $cat_list;
}

// get all post
function get_all_posts($post_type_name = 'post')
{
    $posts = get_posts(array(
        'post_type' => $post_type_name,
        'orderby' => 'name',
        'order' => 'ASC',
    ));

    $posts_list = [];
    foreach ($posts as $post) {
        $posts_list[$post->ID] = $post->post_title;
    }
    return $posts_list;
}

// get cat slug and name
function xroof_get_cat_data($categories = [], $delimiter = ', ', $term = 'slug')
{
    $slugs = [];
    foreach ($categories as $cat) {
        if ($term == 'slug') {
            array_push($slugs, $cat->slug);
        }
        if ($term == 'name') {
            $slugs[] = $cat->name;
        }
    }
    return implode($delimiter, $slugs);
}

// get all post type
function get_all_post_types_list()
{
    $post_types = get_post_types(['public' => true], 'objects'); 
    $list = [];

    foreach ($post_types as $post_type) {
        $list[$post_type->name] = $post_type->labels->singular_name;  
    }

    return $list;
}


