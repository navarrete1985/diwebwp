<?php 
/*
    Template Name: Private
*/
//navarrete-wordpress --> SG.1jXrxMoRQ7Of2pwVum5x1Q.dwEeMsaT3z2dg3XXzrnr-TkW6EuMdxuzl4YKp5kQWZc0
// echo is_user_logged_in() ? 'Estás logueado' : 'No estás logueado';
if (!is_user_logged_in()) {
    wp_login_form();
    wp_register('<span class="link">', '</span>', true);
}else {?>
    <a href="<?= wp_logout_url(get_permalink()) ?>">Cerrar Sesión</a>
<?php
}
    $user = wp_get_current_user();
    if ($user->ID > 0) {
        $rol  = get_author_role($user->ID);
        echo $rol;    
        switch($rol) {
            case 'administrator':
                //Lo suyo es tener un template para cada uno de los roles, y pintar dependiendo de cada uno de ellos
                break;
            case 'editor':
                break;
            case 'author':
                break;
            case 'subcriber':
                break;
            case 'contributor':
                break;
        }
    }
    
    
    
?>
<h1>Esto es una plantilla personalizada</h1>