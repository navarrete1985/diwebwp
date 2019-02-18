<?php 
/*
    Template Name: Peliculas
*/
    get_header();
?>
<body>
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
                    <nav class="classy-navbar justify-content-between" id="oneMusicNav">
                        <?php get_template_part('templates/nav', 'front') ?>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img bg-overlay" style="background-image: url(<?= get_template_directory_uri() ?>/img/bg-img/breadcumb3.jpg);">
        <div class="bradcumbContent">
            <p>Conoce las últimas reviews</p>
            <h2>Últimas Reviews</h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->
    
    <!-- #### ÚLTIMAS REVIEWS #### -->
    <section class="events-area section-padding-100">
        <div class="container">
            <?php
                $paged = get_query_var('paged') > 1 ? get_query_var('paged') : 1;
                $args = [
                    'post_type'     => ['filmoteca_review'],
                    'posts_per_page'=> 4,
                    'paged'         => $paged,
                    'orderby'       => 'date'
                ];
                
                $custom_posts = new Wp_Query($args);
                if ($custom_posts->have_posts()){
                    $count = 0;
                    echo '<div class="row">';
                    while($custom_posts->have_posts()){
                        $custom_posts->the_post();
                        get_template_part('templates/content', 'custompost');
                        $count++;
                        if ($count % 2 === 0) {
                            echo '</div><div class="row">';
                        }
                    }
                    echo '</div>';
                }   
            ?>
            <div class="row">
                
            </div>
            <div class="oneMusic-pagination-area wow fadeInUp" data-wow-delay="300ms">
                <div class='nav-links'>
                    <?php
                        $big = 999999999; // need an unlikely integer
                         
                        echo paginate_links( array(
                            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                            'format' => '?paged=%#%',
                            'current' => max(1, get_query_var('paged')),
                            'total' => $custom_posts->max_num_pages
                        ) );
                    ?>
                </div>
            </div>
            <?php wp_reset_query() ?>
    </section>
    <!-- #### FIN ÚLTIMAS REVIEWS #### -->
    

    <?= get_footer(); ?>