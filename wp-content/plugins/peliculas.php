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
        'add_new_item' => __('Añadir nueva Review'), // Text for add new item (default 'Add new post'/'Add new page')
        'new_item' => __('Nueva Review'), // idem.
        'edit_item' => __('Editar Review'),  // idem.
        'view_item' => __('Ver Review'),// idem.
        'all_items' => __('Todas las Reviews'),// idem.
        'search_items' => __('Buscar Review'),// idem.
        'not_found' => __('Review no encontradas.'),// idem.
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
    register_post_type('filmoteca_review', $args); //Nombre de nuestro plugin
}

/**
 * Función para añadir los paneles con los que va a contar nuestor custom post type
 */
function add_cat_panels() {
    register_taxonomy_for_object_type('category', 'filmoteca_review');
    register_taxonomy_for_object_type('post_tag', 'filmoteca_review');
    wp_enqueue_style( 'filmoteca_review', plugins_url( './css/style.css', __FILE__ ) );
    wp_enqueue_script( 'filmoteca_review', plugins_url( 'js/script.js', __FILE__ ),  array('jquery'), null, true);
}

/**
 * Función que añade una caja para rellenar en nuestro admin area
 * El formato es add_meta_box( $id, $title, $callback, $screen, $context, $priority, $callback_args ); 
      $id - es el ID html del metabox
      $title - el nombre que aparecerá al lado del campo
      $callback - es la función que dará uso a nuestro metabox, en ella definimos los campos que habrá en el metabox
      $screen - es donde queremos que se muestre el metabox, en nuestro caso deberá ser cada página que lo contenga
      $context - dentro de la entrada donde queremos que se muestre, si lo ponemos a normal le estamos diciendo que lo muestre justo debajo del editor de texto del campo descripción que viene por defecto en todas las entradas
      $priority - le dice a Wordpress dónde cargar el metabox en el contenido. Por defecto dejaremos a default
      $callback_args - consultar el codex 
 */
function add_filmoteca_review_metabox() {
    $screens = array('filmoteca_review'); //Si quisieramos que nuestro metabox saliera en más pantallas se la añadiriamos
    foreach($screens as $screen) {
        add_meta_box('filmoteca_section_id', __('Review Películas', 'filmoteca_review_textdomain'), 'filmoteca_review_meta_box_callback', $screen, 'normal');
    }
}

/**
 * Funcion que nos pinta la información en nuestro metabox, crea un campo oculto para cuestiones de 
 * seguridad, para comprobar que la procedencia de las peticiones sean correctas.
 * @param $post -> Objeto con el post actual, para poder tener el id y recuperar los datos necesarios
 */
function filmoteca_review_meta_box_callback($post) {
    //Creamos el campo nonce, ese es el campo que se encarga de la seguridad, para asegurarnos
    //de que las peticiones vienen del sitio actual.
    wp_nonce_field('save_metabox', 'filmoteca_nonce');
    
    // Recogemos los campos con get_post_meta() de nuestra base de datos, para rellenarlos
    //en caso de que estemos editando y ya tubiera contenido
    $original = get_post_meta($post->ID, 'review_original_title', true);
    $genre = get_post_meta($post->ID, 'review_genre', false);
    $year = get_post_meta($post->ID, 'review_year', true);
    $director = get_post_meta($post->ID, 'review_director', true);
    $casting = get_post_meta($post->ID, 'review_casting', false);
    $runtime = get_post_meta($post->ID, 'review_runtime', true);
    $storyline = get_post_meta($post->ID, 'review_storyline', true);
    $rating = get_post_meta($post->ID, 'review_rating', true);
    $producer = get_post_meta($post->ID, 'review_producer', true);
    ?>
    
    <!--Pintamos nuestro formulario en el backend-->
    <div class='content-filmoteca'>
        <fieldset>
            <div class='form-group'>
                <label class='title' for='review_original_title'><?= __('Título original') ?></label>
                <input type="text" name="review_original_title" value="<?= $original ?>"/>
            </div>
        </fieldset>
        <fieldset>
            <div class='form-group'>
                <label class='title' for='review_year'><?= __('Año de producción') ?></label>
                <input type="number" name="review_year" value="<?= $year ?>"/>
            </div>
        </fieldset>
        <fieldset>
            <div class='form-group'>
                <label class='title' for='review_producer'><?= __('Productora') ?></label>
                <input type="text" name="review_producer" value="<?= $producer ?>"/>
            </div>
        </fieldset>
        <fieldset>
            <div class='form-group'>
                <label class='title' for='review_director'><?= __('Director') ?></label>
                <input type="text" name="review_director" value="<?= $director ?>"/>
            </div>
        </fieldset>
        <fieldset>
            <div class='form-group'>
                <label class='title' for='review_casting'><?= __('Reparto') ?></label>
                <input type="text" id='review-actor'/>
                <div class='btn-add-actor dashicons-before dashicons-plus-alt'></div>
                <div class='content-casting'>
                    <!--Los valores almacenados como array que saneamos los tenemos que recoger como si fuese un array dentro de otro-->
                    <?php
                    if (sizeof($casting) > 0) {
                        foreach($casting[0] as $actor){ ?>   
                            <span class='item'>
                                <input type="hidden" name="review_casting[]" value="<?= $actor ?>"/>
                                <span class='name-author actor'><?= $actor ?></span>
                                <span type='button' class='delete-actor dashicons-before dashicons-no-alt'></span>
                            </span>
                    <?php 
                        }
                    }?> 
                </div>
            </div>
        </fieldset>
        <fieldset>
            <div class='form-group'>
                <label class='title' for='review_runtime'><?= __('Duración') ?></label>
                <input type="number" name="review_runtime" value="<?= $runtime ?>"/>
            </div>
        </fieldset>
        <fieldset class='genre'>
            <div class='title'>Géneros</div>
            <div class='container'>
                <label><input type="checkbox" name="review_genre[]" value="terror" <?= in_array("terror", $genre[0]) ? 'checked' : '' ?>/> <?= __('Terror') ?></label>
                <label><input type="checkbox" name="review_genre[]" value="accion"  <?= in_array("accion", $genre[0])  ? 'checked' : '' ?>/> <?= __('Accion') ?></label>
                <label><input type="checkbox" name="review_genre[]" value="desconocido"  <?= in_array("desconocido", $genre[0])  ? 'checked' : '' ?>/> <?= __('Desconocido') ?></label>
                <label><input type="checkbox" name="review_genre[]" value="sci-fi"  <?= in_array("sci-fi", $genre[0]) ? 'checked' : '' ?>/> <?= __('Sci-fi') ?></label>
                <label><input type="checkbox" name="review_genre[]" value="aventura"  <?= in_array("aventura", $genre[0]) ? 'checked' : '' ?>/> <?= __('Aventura') ?></label>
                <label><input type="checkbox" name="review_genre[]" value="documental"  <?= in_array("documental", $genre[0]) ? 'checked' : '' ?>/> <?= __('Documental') ?></label>
                <label><input type="checkbox" name="review_genre[]" value="fantastico"  <?= in_array("fantastico", $genre[0]) ? 'checked' : '' ?>/> <?= __('Fantastico') ?></label>
                <label><input type="checkbox" name="review_genre[]" value="drama" <?= in_array("drama", $genre[0]) ? 'checked' : '' ?> /> <?= __('Drama') ?></label>
                <label><input type="checkbox" name="review_genre[]" value="cinenegro"  <?= in_array("cinenegro", $genre[0]) ? 'checked' : '' ?>/> <?= __('Cinenegro') ?></label>
                <label><input type="checkbox" name="review_genre[]" value="infantil"  <?= in_array("infantil", $genre[0])  ? 'checked' : ''  ?>/> <?= __('Infantil') ?></label>
                <label><input type="checkbox" name="review_genre[]" value="belico" <?= in_array("belico", $genre[0]) ? 'checked' : ''  ?> /> <?= __('Belico') ?></label>
                <label><input type="checkbox" name="review_genre[]" value="comedia"  <?= in_array("comedia", $genre[0]) ? 'checked' : ''  ?>/> <?= __('Comedia') ?></label>
                <label><input type="checkbox" name="review_genre[]" value="romance"  <?= in_array("romance", $genre[0]) ? 'checked' : ''  ?>/> <?= __('Romance') ?></label>
                <label><input type="checkbox" name="review_genre[]" value="intriga" <?= in_array("intriga", $genre[0])  ? 'checked' : ''  ?>/> <?= __('Intriga') ?></label>
                <label><input type="checkbox" name="review_genre[]" value="musical"  <?= in_array("musical", $genre[0])  ? 'checked' : ''  ?>/> <?= __('Musical') ?></label>
                <label><input type="checkbox" name="review_genre[]" value="serie"  <?= in_array("serie", $genre[0])  ? 'checked' : ''  ?>/> <?= __('Serie') ?></label>
                <label><input type="checkbox" name="review_genre[]" value="weterm"  <?= in_array("weterm", $genre[0])  ? 'checked' : ''  ?>/> <?= __('Weterm') ?></label>
                <label><input type="checkbox" name="review_genre[]" value="thriller"  <?= in_array("thriller", $genre[0])  ? 'checked' : ''  ?>/> <?= __('Thriller') ?></label>
            </div>
        </fieldset>
        <fieldset>
            <div class='form-group'>
                <label class='title' for='review_storyline'><?= __('Sinopsis') ?></label>
                <textarea type="text" name="review_storyline" value="<?= $storyline ?>" rows='8'/><?= $storyline ?></textarea>
            </div>
        </fieldset>
        <label class='title' for='review_rating'><?= __('Valoracion') ?></label>
        <div class="stars">
               <input class="star star-5" id="star-5" type="radio" name="review_rating" <?= $rating == 5 ? 'checked' : '' ?> value='5'/>
               <label class="star star-5" for="star-5"></label>
               <input class="star star-4" id="star-4" type="radio" name="review_rating" <?= $rating == 4 ? 'checked' : '' ?> value='4'/>
               <label class="star star-4" for="star-4"></label>
               <input class="star star-3" id="star-3" type="radio" name="review_rating" <?= $rating == 3 ? 'checked' : '' ?> value='3'/>
               <label class="star star-3" for="star-3"></label>
               <input class="star star-2" id="star-2" type="radio" name="review_rating" <?= $rating == 2 ? 'checked' : '' ?> value='2'/>
               <label class="star star-2" for="star-2"></label>
               <input class="star star-1" id="star-1" type="radio" name="review_rating" <?= $rating == 1 ? 'checked' : '' ?> value='1'/>
               <label class="star star-1" for="star-1"></label>
        </div>
    </div>
<?php
    
}

/**
 * Función Callback para salvar los datos recogidos en el formulario de entrada
 * La función se tiene que llamar lo mismo que el callback que le pusimos en el wp_once_field
 */
 function save_metabox($post_id) {
     //Comprobamos el campo nonce para la comprobación de seguridad
     if (!isset($_POST['filmoteca_nonce']) || !wp_verify_nonce($_POST['filmoteca_nonce'], 'save_metabox')) {
         return;
     }
     
     //Comprobamos si el usuario tiene permisos para guardar o editar
     if (!current_user_can('edit_page', $post_id) || !current_user_can('edit_post', $post_id)) {
         return;
     }
     
    //Recogemos los campos y los saneamos para posteriormente guardarlos en nuestra base de datos
    $original = sanitize_text_field($_POST['review_original_title']);
    $year = sanitize_text_field($_POST['review_year']);
    $director = sanitize_text_field($_POST['review_director']);
    $producer = sanitize_text_field($_POST['review_producer']);
    $data = $_POST['review_casting'];
    $casting = [];
    foreach($data as $item) {
        $casting[] = sanitize_text_field($item);
    }
    
    $data2 = $_POST['review_genre'];
    $genre = [];
    foreach($data2 as $item) {
        $genre[] = sanitize_text_field($item);;
    }
    
    $runtime = sanitize_text_field($_POST['review_runtime']);
    $storyline = sanitize_text_field($_POST['review_storyline']);
    $rating = sanitize_text_field($_POST['review_rating']);
    
    //Actualizamos la base de datos
    update_post_meta($post_id, 'review_original_title', $original);
    update_post_meta($post_id, 'review_year', $year);
    update_post_meta($post_id, 'review_director', $director);
    update_post_meta($post_id, 'review_runtime', $runtime);
    update_post_meta($post_id, 'review_storyline', $storyline);
    update_post_meta($post_id, 'review_rating', $rating);
    update_post_meta($post_id, 'review_casting', $casting);
    update_post_meta($post_id, 'review_genre', $genre);
    update_post_meta($post_id, 'review_producer', $producer);
 }


add_action('init', 'reg_post_type_review');
add_action('init', 'add_cat_panels');
add_action('add_meta_boxes', 'add_filmoteca_review_metabox');
add_action('save_post', 'save_metabox');

 
 