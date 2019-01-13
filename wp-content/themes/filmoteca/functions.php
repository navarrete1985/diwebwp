<?php

/**
 * Soportes del tema
 * 
 */
 add_theme_support('post-thumbnails');
 require_once('templates/custom-fields.php');
/**
 * Registramos todas nuestras funciones personalizadas
 *   
 * 
*/

/**
 * función que registra todos nuestros script de nuestro tema
*/
function my_theme_script() {
    
    wp_register_script('jquery', get_template_directory_uri() . '/js/jquery/jquery-2.2.4.min.js', null, null, false);
    wp_enqueue_script('jquery');
    
    wp_register_script('appear-js', get_template_directory_uri() . '/js/jquery/jquery.appear.js', array('jquery'), null, true);
    wp_enqueue_script('appear-js');
    
    wp_register_script('pooper-min', get_template_directory_uri() . '/js/bootstrap/popper.min.js', array('jquery'), null, true);
    wp_enqueue_script('pooper-min');
    
    wp_register_script('bootstrap-min', get_template_directory_uri() . '/js/bootstrap/bootstrap.min.js', array('jquery'), null, true);
    wp_enqueue_script('bootstrap-min');
    
    wp_register_script('plugins', get_template_directory_uri() . '/js/plugins/plugins.js', array('jquery'), null, true);
    wp_enqueue_script('plugins');
    
    wp_register_script('active', get_template_directory_uri() . '/js/active.js', array('jquery'), null, true);
    wp_enqueue_script('active');
}

add_action('wp_enqueue_scripts', 'my_theme_script');

function generaltheme_widgets_init() {
    register_sidebar(array(
       'name'         => 'Sidebar Widgets',
       'id'           => 'sidebar',
       'description'  => 'Sidebar Widget Area',
       'before_widget'=> '<div class="widget">',
       'after_widget' => '</div">'
    ));
}

function get_author_role( $author_id ) {
    $user_info = get_userdata( $author_id );
    return implode(', ', $user_info->roles);    
}

   

add_action('widgets_init', 'generaltheme_widgets_init');
?>