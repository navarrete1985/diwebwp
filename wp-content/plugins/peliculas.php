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
    ?>
    <!--Pintamos nuestro formulario en el backend-->
    <div class='content'>
        <fieldset>
            <div class='form-group'>
                <label for='review_original_title'><?= __('Título original') ?></label>
                <input type="text" name="review_original_title" value="<?= $original ?>"/>
            </div>
        </fieldset>
        <fieldset>
            <div class='form-group'>
                <label for='review_year'><?= __('Año de producción') ?></label>
                <input type="number" name="review_year" value="<?= $year ?>"/>
            </div>
        </fieldset>
        <fieldset>
            <div class='form-group'>
                <label for='review_director'><?= __('Director') ?></label>
                <input type="text" name="review_director" value="<?= $director ?>"/>
            </div>
        </fieldset>
        <fieldset>
            <div class='form-group'>
                <label for='review_casting'><?= __('Reparto') ?></label>
                <input type="text" name="review_casting"/>
                <button type='button' class='btn-add-actor'>añadir</button>
                <?php foreach($casting as $actor){ ?>
                        <div class='item'>
                            <input type="hidden" name="actor[]" value="<?= $actor ?>"/>
                            <span><?= $actor ?></span>
                            <span type='button' class='delete-actor'>&#10802;</span>
                        </div>
                <?php } ?> 
            </div>
        </fieldset>
        <fieldset>
            <div class='form-group'>
                <label for='review_runtime'><?= __('Duración') ?></label>
                <input type="number" name="review_runtime" value="<?= $runtime ?>"/>
            </div>
        </fieldset>
        <fieldset>
            <label><input type="checkbox" name="review_genre[]" value="terror" <?= in_array("terror", $genre) ? 'checked' : '' ?>/> <?= __('Terror') ?></label>
            <label><input type="checkbox" name="review_genre[]" value="accion"  <?= in_array("accion", $genre)  ? 'checked' : '' ?>/> <?= __('Accion') ?></label>
            <label><input type="checkbox" name="review_genre[]" value="desconocido"  <?= in_array("desconocido", $genre)  ? 'checked' : '' ?>/> <?= __('Desconocido') ?></label>
            <label><input type="checkbox" name="review_genre[]" value="sci-fi"  <?= in_array("sci-fi", $genre) ? 'checked' : '' ?>/> <?= __('Sci-fi') ?></label>
            <label><input type="checkbox" name="review_genre[]" value="aventura"  <?= in_array("aventura", $genre) ? 'checked' : '' ?>/> <?= __('Aventura') ?></label>
            <label><input type="checkbox" name="review_genre[]" value="documental"  <?= in_array("documental", $genre) ? 'checked' : '' ?>/> <?= __('Documental') ?></label>
            <label><input type="checkbox" name="review_genre[]" value="fantastico"  <?= in_array("fantastico", $genre) ? 'checked' : '' ?>/> <?= __('Fantastico') ?></label>
            <label><input type="checkbox" name="review_genre[]" value="drama" <?= in_array("drama", $genre) ? 'checked' : '' ?> /> <?= __('Drama') ?></label>
            <label><input type="checkbox" name="review_genre[]" value="cinenegro"  <?= in_array("cinenegro", $genre) ? 'checked' : '' ?>/> <?= __('Cinenegro') ?></label>
            <label><input type="checkbox" name="review_genre[]" value="infantil"  <?= in_array("infantil", $genre)  ? 'checked' : ''  ?>/> <?= __('Infantil') ?></label>
            <label><input type="checkbox" name="review_genre[]" value="belico" <?= in_array("belico", $genre) ? 'checked' : ''  ?> /> <?= __('Belico') ?></label>
            <label><input type="checkbox" name="review_genre[]" value="comedia"  <?= in_array("comedia", $genre) ? 'checked' : ''  ?>/> <?= __('Comedia') ?></label>
            <label><input type="checkbox" name="review_genre[]" value="romance"  <?= in_array("romance", $genre) ? 'checked' : ''  ?>/> <?= __('Romance') ?></label>
            <label><input type="checkbox" name="review_genre[]" value="intriga" <?= in_array("intriga", $genre)  ? 'checked' : ''  ?>/> <?= __('Intriga') ?></label>
            <label><input type="checkbox" name="review_genre[]" value="musical"  <?= in_array("musical", $genre)  ? 'checked' : ''  ?>/> <?= __('Musical') ?></label>
            <label><input type="checkbox" name="review_genre[]" value="serie"  <?= in_array("serie", $genre)  ? 'checked' : ''  ?>/> <?= __('Serie') ?></label>
            <label><input type="checkbox" name="review_genre[]" value="weterm"  <?= in_array("weterm", $genre)  ? 'checked' : ''  ?>/> <?= __('Weterm') ?></label>
            <label><input type="checkbox" name="review_genre[]" value="thriller"  <?= in_array("thriller", $genre)  ? 'checked' : ''  ?>/> <?= __('Thriller') ?></label>
        </fieldset>
        <fieldset>
            <div class='form-group'>
                <label for='review_storyline'><?= __('Sinopsis') ?></label>
                <textarea type="text" name="review_storyline" value="<?= $storyline ?>"/><?= $storyline ?></textarea>
            </div>
        </fieldset>
        <fieldset>
            <div class='form-group'>
                <label for='review_rating'><?= __('Valoracion') ?></label>
                <input type="range" min="0" max="5" step="0.5" list="steplist" value='<?= $rating === '' ? 0 : $rating ?>' name='review_rating'>
                <datalist id="steplist">
                    <option>0</option>
                    <option>0.5</option>
                    <option>1</option>
                    <option>1.5</option>
                    <option>2</option>
                    <option>2.5</option>
                    <option>3</option>
                    <option>3.5</option>
                    <option>4</option>
                    <option>4.5</option>
                    <option>5</option>
                </datalist>
            </div>
        </fieldset>
    </div>
<?php
    
}


add_action('init', 'reg_post_type_review');
add_action('init', 'add_cat_panels');
add_action('add_meta_boxes', 'add_filmoteca_review_metabox');

 
 