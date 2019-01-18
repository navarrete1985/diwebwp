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
    <section class="breadcumb-area bg-img bg-overlay" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/bg-img/breadcumb3.jpg);">
        <div class="bradcumbContent">
            <?php
            
                $title = 'ARCHIVES';
                $total_results = 0;
                
                if (have_posts()) {    
                    // Hallamos el total de post devueltos
                    $total_results = $wp_the_query->post_count;
                        
                    if (is_category()) {
                        $title = single_cat_title('Categoría Archives para: ', false);
                    }elseif (is_tag()) {
                        $title = single_tag_title('Tags Archives para: ', false);
                    }elseif (is_author()) {
                        $title = 'Autor Archives';
                    }elseif (is_day()) {
                        $title_archives = 'Día Archives: ' . get_the_date();
                    } elseif (is_month()) {
                        $title_archives = 'Monthly Archives:  ' . get_the_date('F Y');
                    } elseif (is_year()) {
                        $title_archives = ' Yearly Archives:  ' . get_the_date('Y');
                    }else {
                        $title_archives = ' Entro por la cara';
                    }
                }
            ?>
            
            <h2><?= $title ?></h2>
        </div>
    </section>
    <section id=blog-standard class="section blog-standard mb-5">
        <div class=container>
            <div class="row">
                <div class="col-md-3 container-fluid mt-5">
                    <?php get_search_form(); ?>
                </div>
            </div>    
            
            <div class="row">
                <div class="col-md-12">
                    <div class="header">
                        <h3>Coincidencias encontradas: <?= $total_results > 1 ? $total_results . ' Posts' : $total_results . ' Post'?></h3>
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
        </div>
    </section>

<?php
    get_footer();
?>

<!--https://ide.c9.io/neomode/wordpress2108-->