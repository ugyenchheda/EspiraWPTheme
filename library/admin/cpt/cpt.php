<?php
// Register kindergarden Post Type
function Kindergarden_post_type()
{

    $labels = array(
        'name' => _x('Barnehage', 'Post Type General Name', 'espira'),
        'singular_name' => _x('Barnehage', 'Post Type Singular Name', 'espira'),
        'menu_name' => __('Barnehage', 'espira'),
        'name_admin_bar' => __('Barnehage', 'espira'),
        'archives' => __('Item Archives', 'espira'),
        'attributes' => __('Item Attributes', 'espira'),
        'parent_item_colon' => __('Parent Barnehage:', 'espira'),
        'all_items' => __('All Barnehage', 'espira'),
        'add_new_item' => __('Add New Barnehage', 'espira'),
        'add_new' => __('Add New', 'espira'),
        'new_item' => __('New Barnehage', 'espira'),
        'edit_item' => __('Edit Barnehage', 'espira'),
        'update_item' => __('Update Barnehage', 'espira'),
        'view_item' => __('View Barnehage', 'espira'),
        'view_items' => __('View Barnehage', 'espira'),
        'search_items' => __('Search Barnehage', 'espira'),
        'not_found' => __('Not found', 'espira'),
        'not_found_in_trash' => __('Not found in Trash', 'espira'),
        'featured_image' => __('Featured Image', 'espira'),
        'set_featured_image' => __('Set featured image', 'espira'),
        'remove_featured_image' => __('Remove featured image', 'espira'),
        'use_featured_image' => __('Use as featured image', 'espira'),
        'insert_into_item' => __('Insert into Barnehage', 'espira'),
        'uploaded_to_this_item' => __('Uploaded to this Barnehage', 'espira'),
        'items_list' => __('Barnehage list', 'espira'),
        'items_list_navigation' => __('Barnehage list navigation', 'espira'),
        'filter_items_list' => __('Filter Barnehage list', 'espira'),
    );
    $args = array(
        'label' => __('Barnehage', 'espira'),
        'description' => __('Post Type Description', 'espira'),
        'labels' => $labels,
        'menu_icon' => 'dashicons-store',
        'supports' => array('title', 'editor', 'thumbnail', 'author'),
        'public' => true,
    );

    register_post_type('Kindergarden', $args);

}
add_action('init', 'Kindergarden_post_type');

add_action('init', 'kindergarden_category', 0);
function kindergarden_category()
{
    $labels = array(
        'name' => _x('Certificates', 'taxonomy general name'),
        'singular_name' => _x('Certificate', 'taxonomy singular name'),
        'search_items' => __('Search Certificates'),
        'all_items' => __('All Certificates'),
        'parent_item' => __('Parent Certificate'),
        'parent_item_colon' => __('Parent Certificate:'),
        'edit_item' => __('Edit Certificate'),
        'update_item' => __('Update Certificate'),
        'add_new_item' => __('Add New Certificate'),
        'new_item_name' => __('New Certificates Name'),
        'menu_name' => __('Certificates'),
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'kindergarden_category'),
    );
    register_taxonomy('kindergarden_category', array('kindergarden'), $args);

}

add_action('init', 'kindergarden_nutrition', 0);
function kindergarden_nutrition()
{
    $labels = array(
        'name' => _x('Ernæring', 'taxonomy general name'),
        'singular_name' => _x('Certificate', 'taxonomy singular name'),
        'search_items' => __('Search Ernæring'),
        'all_items' => __('All Ernæring'),
        'parent_item' => __('Parent Certificate'),
        'parent_item_colon' => __('Parent Certificate:'),
        'edit_item' => __('Edit Certificate'),
        'update_item' => __('Update Certificate'),
        'add_new_item' => __('Add New Certificate'),
        'new_item_name' => __('New Ernæring Name'),
        'menu_name' => __('Ernæring'),
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'kindergarden_nutrition'),
    );
    register_taxonomy('kindergarden_nutrition', array('kindergarden'), $args);

}

add_action('init', 'kindergarden_department', 0);
function kindergarden_department()
{
    $labels = array(
        'name' => _x('Departments', 'taxonomy general name'),
        'singular_name' => _x('Department', 'taxonomy singular name'),
        'search_items' => __('Search Departments'),
        'all_items' => __('All Departments'),
        'parent_item' => __('Parent Department'),
        'parent_item_colon' => __('Parent Department:'),
        'edit_item' => __('Edit Department'),
        'update_item' => __('Update Department'),
        'add_new_item' => __('Add New Department'),
        'new_item_name' => __('New Departments Name'),
        'menu_name' => __('Departments'),
        'featured_image' => __('Featured Image', 'espira'),
        'set_featured_image' => __('Set featured image', 'espira'),
        'remove_featured_image' => __('Remove featured image', 'espira'),
        'use_featured_image' => __('Use as featured image', 'espira'),
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'kindergarden_department'),
    );
    register_taxonomy('kindergarden_department', array('kindergarden'), $args);
}


