<?php

/**
 * Plugin Name: Desc-Peliculas
 * Plugin URI: https://diwebwp-navarrete.c9users.io/
 * Description: Crear reviews de películas
 * Version: 1.0
 * Author: Luis Ignacio Peña Navarrete
 * Author URI: https://github.com/navarrete1985
 * License: GPL
 * 
 */
 
function reg_post_type_review() {
    $supports = array(
        'title', // post title
        'editor', // post content
        'author', // post author
        'thumbnail', // featured images
        //'excerpt', // post excerpt
        //'custom-fields', // custom fields
        'comments', // post comments
        'revisions', // post revisions
        'post-formats', // post formats
    );
    $labels = array(
        'name' => _x('Reviews', 'plural'), // general name for the post type - usually plural (default = posts/pages)
        'singular_name' => _x('Review', 'singular'), // name for one object of this post type
        'menu_name' => _x('Reviews', 'admin menu'), // Text for use in the admin area 
        'name_admin_bar' => _x('Review', 'admin bar'), // Text for use in the New option in admin area 
        'add_new' => _x('Nueva entrada', 'add new'), // The text for add new (default 'Add New')
    //
        'add_new_item' => __('Add New Review'), // Text for add new item (default 'Add new post'/'Add new page')
        'new_item' => __('New Review'), // idem.
        'edit_item' => __('Edit Review'),  // idem.
        'view_item' => __('View Review'),// idem.
        'all_items' => __('All Reviews'),// idem.
        'search_items' => __('Search Review'),// idem.
        'not_found' => __('No Reviews found.'),// idem.
    );
    $args = array(
        'supports' => $supports,
        'labels' => $labels,
        'public' => true, // Controls how the type is visible to authors (show_in_nav_menus, show_ui) and readers (exclude_from_search, publicly_queryable). Default: false
        'query_var' => true,
        'rewrite' => array('slug' => 'Desc-Peliculas'),//Para poder poner el single-Desc-Peliculas.php y archive-Desc-Peliculas.php
        'has_archive' => true, // Para que podamos usar la plantilla archive-{custom_post_type}.php   -->  no me funciona
        'hierarchical' => false,
        'menu_position' => 5, // The position in the menu order the post type should appear
        'menu_icon' => 'dashicons-tickets-alt', //The url to the icon to be used for this menu or the name of the icon from the iconfont [1] Default: null - defaults to the posts icon
        // EJEMPLO: 'get_template_directory_uri() . "/images/cutom-posttype-icon.png"' (Use a image located in the current theme)
        //'taxonomies' => array('category'), //  
    );
    register_post_type('filmoteca_review', $args);
}

function add_cat_panels() {
    register_taxonomy_for_object_type('category', 'filmoteca_review');
    register_taxonomy_for_object_type('post_tag', 'filmoteca_review');
}
function add_filmoteca_review_metabox() {
    $screens = array('filmoteca_review'); //Si quisieramos que nuestro metabox saliera en más pantallas se la añadiriamos
    foreach($screens as $screen) {
        add_meta_box('filmoteca_section_id', __('Review Películas', 'filmoteca_review_textdomain'), 'filmoteca_review_meta_box_callback', $screen, 'normal');
    }
}


function filmoteca_review_meta_box_callback($post) {
    //Creamos el campo nonce
    wp_nonce_field('save_metabox', 'filmoteca_nonce');
    
    // Recogemos los campos de los documentos
    
    
    //Pintamos nuestro formulario en el backend
    
    
}


add_action('init', 'reg_post_type_review');
add_action('init', 'add_cat_panels');
add_action('add_meta_boxes', 'add_filmoteca_review_metabox');

 
 