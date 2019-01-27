<?php
/**
 *  Función  que registra nuestro custom post
 *  
*/ 
function reg_post_type_excursions() {
    $supports = array(
        'title', // post title
        'editor', // post content
        'author', // post author
        'thumbnail', // featured images
        //'excerpt', // post excerpt
        //'custom-fields', // custom fields
        'comments', // post comments
        'revisions', // post revisions
        //'post-formats', // post formats
    );
    $labels = array(
        'name' => _x('Excursions', 'plural'), // general name for the post type - usually plural (default = posts/pages)
        'singular_name' => _x('Excursion', 'singular'), // name for one object of this post type
        'menu_name' => _x('Excursions', 'admin menu'), // Text for use in the admin area 
        'name_admin_bar' => _x('Excursion', 'admin bar'), // Text for use in the New option in admin area 
        'add_new' => _x('Add New', 'add new'), // The text for add new (default 'Add New')
    //
        'add_new_item' => __('Add New Excursion'), // Text for add new item (default 'Add new post'/'Add new page')
        'new_item' => __('New Excursion'), // idem.
        'edit_item' => __('Edit Excursion'),  // idem.
        'view_item' => __('View Excursion'),// idem.
        'all_items' => __('All Excursions'),// idem.
        'search_items' => __('Search Excursion'),// idem.
        'not_found' => __('No Excursions found.'),// idem.
    );
    $args = array(
        'supports' => $supports,
        'labels' => $labels,
        'public' => true, // Controls how the type is visible to authors (show_in_nav_menus, show_ui) and readers (exclude_from_search, publicly_queryable). Default: false
        'query_var' => true,
        'rewrite' => array('slug' => 'nz_excursions'),
        'has_archive' => true, // Para que podamos usar la plantilla archive-{custom_post_type}.php   -->  no me funciona
        'hierarchical' => false,
        'menu_position' => 5, // The position in the menu order the post type should appear
        'menu_icon' => 'dashicons-palmtree', //The url to the icon to be used for this menu or the name of the icon from the iconfont [1] Default: null - defaults to the posts icon
         
    );
    register_post_type('nz_excursions', $args);
}
// add_action('init', 'reg_post_type_excursions');


/**
 * Añadimos un metabox para el custom post excursion
 *
 * 
 */
function excursion_add_meta_box() {

        $screens = array( 'nz_excursions' );
        // Para cada pantalla de edición del custom post type...
        foreach ( $screens as $screen ) {
            /* El formato es add_meta_box( $id, $title, $callback, $screen, $context, $priority, $callback_args ); 
              $id - es el ID html del metabox
              $title - el nombre que aparecerá al lado del campo
              $callback - es la función que dará uso a nuestro metabox, en ella definimos los campos que habrá en el metabox
              $screen - es donde queremos que se muestre el metabox, en nuestro caso deberá ser cada página que lo contenga
              $context - dentro de la entrada donde queremos que se muestre, si lo ponemos a normal le estamos diciendo que lo muestre justo debajo del editor de texto del campo descripción que viene por defecto en todas las entradas
              $priority - le dice a Wordpress dónde cargar el metabox en el contenido. Por defecto dejaremos a default
              $callback_args - consultar el codex 
            */
            add_meta_box( 'excursion_sectionid', 'Excursion Details', 'excursion_meta_box_callback', $screen, 'normal' );
         }
}
// add_action( 'add_meta_boxes', 'excursion_add_meta_box' );

/**
 * Visualiza el contenido de la caja y crea un campo oculto 
 * para chequear la procedencia de las peticiones del form -no da protección absoluta-
 * @param $post el objeto con el post actual.
 */
function excursion_meta_box_callback( $post ) {
    /* Añadimos un campo 'nonce' (mientras tanto) que es usado para validar que el contenido de
       la petición del formulario viene del sitio actual y no de ningún otro sitio. Es un campo oculto
       que será chequeado más tarde para tal misión. 
       
       <?php wp_nonce_field( $action, $name, $referer, $echo ) ?>
       
       Los campos $action y $name son opcionales pero se especifican para una mayor seguridad
       - El nombre del campo field oculto es el que queramos, una vez que el formulario es enviado es accesible vía $_POST
       - El valor es el que establece la propia función
       - La acción que vamos a especificar será una función que se encargue de guardar los datos en la BBDD
    */
    wp_nonce_field( 'excursion_save_meta_box_data', 'excursion_meta_box_nonce' );

    /*
     * Usamos get_post_meta() para recoger un valor existente
     * en la BBDD y se o asignamos en el form al campo correspondiente
     */
    $value0 = get_post_meta( $post->ID, 'excursion_type', true );
    $value1 = get_post_meta( $post->ID, 'excursion_price', true );
    $value2 = get_post_meta( $post->ID, 'excursion_from', true );    
    $value3 = get_post_meta( $post->ID, 'excursion_to', true );
    $value4 = get_post_meta( $post->ID, 'excursion_places', true );
    $value5 = get_post_meta( $post->ID, 'excursion_paxleft', true );
    $value6 = get_post_meta( $post->ID, 'excursion_kms', true );
    /*
     * Dibujamos los campos del formulario que irán en el metabox
     *  
     */
     echo '<fieldset>';
     echo '<label for="excursion_type">';
     _e( 'Type', 'excursion_textdomain' );
     echo '</label> ';
     echo '<input type="text" id="excursion_type" name="excursion_type" value="' . esc_attr( $value0 ) . '" size="20" />';
     echo '</fieldset>';
     ?>
      <fieldset class="flexi">
          <input type="checkbox" id="hiking" name="type[]" value="hiking" <?php if ($type[0]) echo 'checked';?>>&nbsp;Hiking    
          <input type="checkbox" id="watersports" name="type[]" value="watersports" <?php if ($type[1]) echo 'checked';?>>&nbsp;Water Sports 
          <input type="checkbox" id="caving" name="type[]" value="caving" <?php if ($type[2]) echo 'checked';?>>&nbsp;Caving 
          <input type="checkbox" id="climbing" name="type[]" value="climbing" <?php if ($type[3]) echo 'checked';?>>&nbsp;Climbing  
          <input type="checkbox" id="horseriding" name="type[]" value="horseriding" <?php if ($type[4]) echo 'checked';?>>&nbsp;Horse Riding  
          <input type="checkbox" id="mtb" name="type[]" value="mtb" <?php if ($type[5]) echo 'checked';?>>&nbsp;MTB 
          <input type="checkbox" id="kayaking" name="type[]" value="kayaking" <?php if ($type[6]) echo 'checked';?>>&nbsp;Kayaking   
          <input type="checkbox" id="kayaking" name="type[]" value="kayaking" <?php if ($type[6]) echo 'checked';?>>&nbsp;Kayaking  
      </fieldset>
     <?php 
     echo '<fieldset>';
     echo '<label for="excursion_price">';
     _e( 'Price', 'excursion_textdomain' );
     echo '</label> ';
     echo '<input type="text" id="excursion_price" name="excursion_price" value="' . esc_attr( $value1 ) . '" size="12" />';
     echo '</fieldset>';
       
     echo '<fieldset>';
     echo '<label for="excursion_from">';
     _e( 'From:', 'excursion_textdomain' );
     echo '</label> ';
     echo '<input type="date" id="excursion_from" name="excursion_from" value="' . esc_attr( $value2 ) . '" size="25" />';
     echo '</fieldset>';
  
     echo '<fieldset>';
     echo '<label for="excursion_to">';
     _e( 'To:', 'excursion_textdomain' );
     echo '</label> ';
     echo '<input type="date" id="excursion_to" name="excursion_to" value="' . esc_attr( $value3 ) . '" size="12" />';
     echo '</fieldset>';
  
     echo '<fieldset>';
     echo '<label for="excursion_places">';
     _e( 'Number of places:', 'excursion_textdomain' );
     echo '</label> ';
     echo '<input type="number" id="excursion_places" name="excursion_places" value="' . esc_attr( $value4 ) . '" size="3" />';
     echo '<label for="excursion_places">';
     echo '</fieldset>';
       
     echo '<fieldset>';
     _e( 'PAX left:', 'excursion_textdomain' );
     echo '</label> ';
     echo '<input type="number" id="excursion_paxleft" name="excursion_paxleft" value="' . esc_attr( $value5 ) . '" size="3" />';
     echo '</fieldset>';
      
     echo '<fieldset>';
     _e( 'KMS:', 'excursion_textdomain' );
     echo '</label> ';
     echo '<input type="number" id="excursion_kms" name="excursion_kms" value="' . esc_attr( $value6 ) . '" size="5" />';
     echo '</fieldset>';
    
}

/**
 * Cuando se actualice el post, salvar nuestros datos personalizados.
 *
 * @param int $post_id Es el ID del post que guardado.
 */
 function excursion_save_meta_box_data( $post_id ) {
     // Si no hay campo oculto nonce salimos
     if ( ! isset( $_POST['excursion_meta_box_nonce'] ) ) {
        return;
     }
     // Si ha fallado la verificación del campo nonce salimos
     if ( ! wp_verify_nonce( $_POST['excursion_meta_box_nonce'], 'excursion_save_meta_box_data' ) ) {
        return;
     }
     /* Chequeamos si está definida la constante DOING_AUTOSAVE y si ésta vale TRUE en cuyo caso salimos
      * Esta constate es usada por la función wp_autosave() de WP que salva un post enviado con XHR
      * XMLHttpRequest, también referida como XMLHTTP, es una interfaz empleada para realizar peticiones HTTP y HTTPS a 
      * servidores Web. Para los datos transferidos se usa cualquier codificación basada en texto, incluyendo: texto plano, XML, 
      * JSON, HTML y codificaciones particulares específicas. ...
     */
     if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
     }
    
     // Comprobamos los permisos del usuario
     if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {
    
        if ( ! current_user_can( 'edit_page', $post_id ) ) {
            return;
        }
    
     } else {
    
        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }
     }
    
     if ( ! isset( $_POST['excursion_price'] ) ) {
        return;
     }
     // Saneamos los valores que haya podido introducir el usuario para evitar inyecciones de código
     $excursion_type = sanitize_text_field( $_POST['excursion_type'] );
     $excursion_price = sanitize_text_field( $_POST['excursion_price'] );
     $excursion_from = sanitize_text_field( $_POST['excursion_from'] );
     $excursion_to = sanitize_text_field( $_POST['excursion_to'] );
     $excursion_places = sanitize_text_field( $_POST['excursion_places'] );
     $excursion_paxleft = sanitize_text_field( $_POST['excursion_paxleft'] );
     $excursion_kms = sanitize_text_field( $_POST['excursion_kms'] );
    
     // Actualizamos la BBDD
     update_post_meta( $post_id, 'excursion_type', $excursion_type );
     update_post_meta( $post_id, 'excursion_price', $excursion_price );
     update_post_meta( $post_id, 'excursion_from', $excursion_from );
     update_post_meta( $post_id, 'excursion_to', $excursion_to );
     update_post_meta( $post_id, 'excursion_places', $excursion_places );
     update_post_meta( $post_id, 'excursion_paxleft', $excursion_paxleft );
     update_post_meta( $post_id, 'excursion_kms', $excursion_kms );
}
// add_action( 'save_post', 'excursion_save_meta_box_data' );

// Incluimos categorías y tags en nuestro custom post type

function add_tags_categories() {
    register_taxonomy_for_object_type('category', 'nz_excursions');
    register_taxonomy_for_object_type('post_tag', 'nz_excursions');
}
// add_action('init', 'add_tags_categories');


/* ------------------------------------------------------------------*/
/* CUSTOM CPTs ICONS */
/* ------------------------------------------------------------------*/



// add_action( 'admin_head', 'cpt_icons' );
function cpt_icons() {
	?>
    <style type="text/css" media="screen">
        #menu-posts-portfolio .wp-menu-image {
            background: url(<?php get_template_directory_uri(); ?>/assets/img/excursion-icon.png) no-repeat 6px -17px !important;
        }
        #menu-posts-portfolio:hover .wp-menu-image, #menu-posts-portfolio.wp-has-current-submenu .wp-menu-image {
            background-position:6px 7px!important;
        }
    </style>
<?php } 

?>