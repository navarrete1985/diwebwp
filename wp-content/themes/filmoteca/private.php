<?php 
/*
    Template Name: Private
*/
//navarrete-wordpress --> SG.1jXrxMoRQ7Of2pwVum5x1Q.dwEeMsaT3z2dg3XXzrnr-TkW6EuMdxuzl4YKp5kQWZc0
// echo is_user_logged_in() ? 'Estás logueado' : 'No estás logueado';
get_header();
?>
<!--<h1>Esto es una plantilla personalizada</h1>-->

<div class="preloader d-flex align-items-center justify-content-center">
 <div class="lds-ellipsis">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
 </div>
</div>
<header class="header-area">
 <div class="oneMusic-main-menu">
    <div class="classy-nav-container breakpoint-off">
       <div class="container">
          <?php get_template_part('templates/nav', 'front') ?>
       </div>
    </div>
 </div>
</header>
<section class="breadcumb-area bg-img bg-overlay" style="background-image: url(<?= get_template_directory_uri() ?>/img/bg-img/breadcumb3.jpg);">
 <div class="bradcumbContent">
    <p>See what’s new</p>
    <h2>Login</h2>
 </div>
</section>
<?php if (!is_user_logged_in()) { ?>
<section class="login-area section-padding-100">
 <div class="container">
    <div class="row justify-content-center">
       <div class="col-12 col-lg-8">
          <div class="login-content">
             <h3 class='mb-5'>Inicio de Sesión</h3>
             <div class="login-form">
                <?php
                    wp_login_form();
                    wp_register('<span class="link">', '</span>', true);
                ?>
             </div>
          </div>
       </div>
    </div>
 </div>
</section>
<?php
}else {
    // echo '<a href="' . wp_logout_url(get_permalink()) . '">Cerrar Sesión</a>';

    $user = wp_get_current_user();
    if ($user->ID > 0) {
        $rol  = get_author_role($user->ID);
        switch($rol) {
            case 'administrator':
            case 'editor':
            case 'author':
            case 'subcriber':
            case 'contributor':
                //Lo suyo es tener un template para cada uno de los roles, y pintar dependiendo de cada uno de ellos
                get_template_part('templates/content', $rol);
                break;
        }
    }
}
?>
<?= get_footer(); ?>
     