<?php

/**
 * Soportes del tema
 * 
 */
 add_theme_support('post-thumbnails');
 add_theme_support('post-formats', array('image', 'link', 'gallery', 'audio', 'video', 'quote'));
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
    
    wp_register_script('masonry', get_template_directory_uri() . '/js/plugins/masonry-docs.min.js', array('jquery'), null, true);
    wp_enqueue_script('masonry');
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

function get_author_role($author_id) {
    $user_info = get_userdata( $author_id );
    $rol = implode(', ', $user_info->roles);
    return $rol;
}

/* Listado de tags para la plantilla archives */
function list_tags() {
    if (is_page('archives')) {  // Quitar si lo queremos invocar en más plantillas
        $tags = get_tags(array('orderby' => 'count', 'order' => 'DESC', 'number' => 30));
        foreach (  $tags as $tag ) {
            echo '<i class="fa fa-tag mygrey"></i>&nbsp;<a href="' . get_tag_link ($tag->term_id) . '" rel="tag">' . $tag->name . ' <span class="heavyblue pull-right">' . $tag->count . '</span></a><br />';
        }
    }
}

add_action('widgets_init', 'generaltheme_widgets_init');


/*-----------------------COMENTARIOS------------------*/
/*$fields es un array que contiene todos los campos del formulario, lo que tenemos que hacer es filtrar y devolverlo
para eliminarlo usamos unset($fields['url'])*/
function remove_url_field($fields) {
    unset($fields['url']);
    return $fields;
}

/*Para cambiar el orden de los campos del formulario*, podríamos hacer esto en la misma función anterior, pero
para verlo mejor semánticamente lo vamos a hacer con esta función*/
function push_comment_to_bottom($fields) {
    $comment = $fields['comment']; //Guardamos el campo comentario
    unset($fields['comment']); //Lo quitamos de nuestros campos
    $fields['comment'] = $comment; //Lo volvemos a añadir para que esté en el fondo
    $content = '<div class="form-check">
                    <input type="checkbox" class="form-check-input" id="policy">
                    <label class="form-check-label" for="policy">Acepta las <a href="#">políticas de privacidad</a> de la página</label>
              </div>';
    $fields['policy'] = $content;
    return $fields;
    
}

add_filter('comment_form_default_fields', 'remove_url_field');
add_filter('comment_form_fields', 'push_comment_to_bottom');//Para esto podríamos usar el hook anterior...pero vemos que lo podemos enganchar con este también

// CONTADOR DE VISITAS
function get_num_visits($post_id) {
    $numvisit = 1;
    if (!add_post_meta($post_id, 'numvisit', $numvisit, true)) {
       $numvisit = get_post_meta($post_id, 'numvisit', true) + 1;
       update_post_meta($post_id, 'numvisit', $numvisit);
    }
    return $numvisit .( $numvisit == 1 ? ' Visita' : ' Visitas');
}

// Función para cambiar la longitud de the_excerpt
function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'[...]';
  } else {
    $excerpt = implode(" ",$excerpt);
  }	
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
} 

/**
 * Función callback para el shortcode [year]
 */
function year_func() {
    $year = date('Y');
    return '<h1>' . $year . '</h1>';
}
add_shortcode('year', 'year_func');

// Función callback para otro shortcode [salute]
function salute_func($atts, $content = 'asdasd') {
    $name = shortcode_atts([ 'name' => 'Antoñico'], $atts);
    return '<h1>Hola ' . $name['name'] . ' eres un '. $content . '</h1>';
}
add_shortcode('salute', 'salute_func');

/**
 * Función que nos va a convertir un array de valores en un string separado por comas.
 */
function getListString($post_id, $post_meta_key) {
    $result = '';
    $items = get_post_meta($post_id, $post_meta_key, false);
    foreach($items[0] as $item) {
        $result .= ucwords($item) . ', ';
    }
    return strlen($result) > 0 ? substr($result, 0, strlen($result) - 2) : $result;
}

?>