<?php
    get_header();
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
    <section class="breadcumb-area bg-img bg-overlay" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/bg-img/sherlock.jpg);">
        <div class="bradcumbContent">
            <?php
            
                $title = 'ARCHIVES';
                $total_results = 0;
                
                if (have_posts()) {    
                    // Hallamos el total de post devueltos
                    $total_results = $wp_the_query->found_posts;
                        
                    if (is_category()) {
                        $title = single_cat_title('Categoría Archives para: ', false);
                    }elseif (is_tag()) {
                        $title = single_tag_title('Tags Archives para: ', false);
                    }elseif (is_author()) {
                        $title = 'Autor Archives';
                    }elseif (is_day()) {
                        $title = 'Día Archives: ' . get_the_date();
                    } elseif (is_month()) {
                        $title = 'Monthly Archives:  ' . get_the_date('F Y');
                    } elseif (is_year()) {
                        $title = ' Yearly Archives:  ' . get_the_date('Y');
                    }else {
                        $title = ' Entro por la cara';
                    }
                }else {
                    $title = 'Ups, no se han encontrado resultados';
                }
                wp_reset_postdata();
            ?>
            
            <h2><?= $title ?></h2>
        </div>
    </section>
    <section id=blog-standard class="section blog-standard mb-5">
        <div class=container>
            <div class="row">
                <div class="col-md-3 container-fluid mt-100 mb-4">
                    <?php get_search_form(); ?>
                </div>
            </div>    
            
            <div class="row">
                <div class="col-md-12">
                    <div class="header">
                        <h3 class="mb-3">Coincidencias encontradas: <?= $total_results > 1 ? $total_results . ' Posts' : $total_results . ' Post'?></h3>
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
                      <?php while(have_posts()) : the_post();
                        get_template_part('templates/content', 'list');
                      endwhile; ?>
                      </tbody>
                    </table>
                </div>
            </div>
            <div class="oneMusic-pagination-area wow fadeInUp mt-3 mb-100" data-wow-delay="300ms">
                <?php the_posts_pagination(array(
                        'mid_size'  => 2,
                        'prev_text' => __('« Anterior ', 'textdomain'), //Echo especial para poder usar el multi lenguaje
                        'next_text' => __('Siguiente »', 'textdomain')
                    ));
                ?>
            </div>
        </div>
    </section>

<?php
    get_footer();
?>

<!--https://ide.c9.io/neomode/wordpress2108-->