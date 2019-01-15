<?php
    get_header();
    the_post();
?>

<body data-spy=scroll data-target=#main-nav-collapse data-offset=100>
    <!--<div class=page-loader>-->
    <!--    <div class=loader>Loading...</div>-->
    <!--</div>-->
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="lds-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ##### Header Area Start ##### -->
    <header class="header-area">
        <!-- Navbar Area -->
        <div class="oneMusic-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                 <?php get_template_part('templates/nav', 'front') ?>
                </div>
            </div>
        </div>
    </header>
    <section class="breadcumb-area bg-img bg-overlay" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/bg-img/breadcumb3.jpg);">
        <div class="bradcumbContent">
            <?php
                $total_busqueda = $wp_the_query->post_count;
                switch($total_busqueda) {
                    case 0:
                        $label = '0 post encontrados';
                        break;
                    case 1:
                        $label = 'Encontrado 1 post';
                        break;
                    default:
                        $label = 'Encontrados ' . $total_busqueda . ' resultados';
                }
            ?>
            
            <h2><?= $label ?></h2>
        </div>
    </section>
    <section id=blog-standard class="section blog-standard mb-5">
        <div class=container>
            <div class="row">
                <div class="col-md-3 container-fluid mt-5">
                    <?php get_search_form(); ?>
                </div>
            </div>    
            <div class="row m-5">
                <div class="col-md-9">
                    <!--< ?php -->
                    <!--    $args = array (-->
                    <!--        'type' => 'postbypost',-->
                    <!--        'limit' => 5,-->
                    <!--    );-->
                    <!--    wp_get_archives( $args );-->
                    <!--?>-->
                    <div class='row'>
                        <div class="col-md-3">
                            <div class="oneMusic-buttons-area fadeInUp">
                                <a class="btn oneMusic-btn btn-sm" href=#>Categorías</a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="oneMusic-buttons-area fadeInUp">
                                <a class="btn oneMusic-btn btn-sm" href=#>Categorías</a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="oneMusic-buttons-area fadeInUp">
                                <a class="btn oneMusic-btn btn-sm" href=#>Categorías</a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="oneMusic-buttons-area fadeInUp">
                                <a class="btn oneMusic-btn btn-sm" href=#>Categorías</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 ml-5">
                    <div class="load-more-btn text-center wow fadeInUp">
                        <a class="btn oneMusic-btn" href=#>Todo</a>
                    </div>
                </div>
            </div>
            <?php if(have_posts()): ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="header">
                        <h3>Tablas de resultado para la búqueda: <?= $_GET['s'] ?></h3>
                    </div>
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">Fecha</th>
                          <th scope="col">Autor</th>
                          <th scope="col">Título</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php while(have_posts()): ?>
                      <?php the_post() ?>
                          <?= get_template_part('templates/content','list') ?><!--Recogemos la plantilla que hemos creado en templates/content-list-->
                      <?php endwhile ?>
                      </tbody>
                    </table>
                </div>
            </div>
            <?php endif ?>
        </div>
    </section>

<?php
    get_footer();
?>