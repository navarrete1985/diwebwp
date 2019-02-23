<?php
    get_header();
?>
<body>
     <!--Preloader -->
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
                    <!--El nav lo hemos metido en el archivo templates/nav-front.php-->
                    <?php get_template_part('templates/nav', 'front') ?>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Hero Area Start #####  Slider inicio, cada single-hero-slide es un elemento del carousel-->
    <section class="hero-area">
        <div class="hero-slides owl-carousel">
            <!-- Single Hero Slide -->
            <div class="single-hero-slide d-flex align-items-center justify-content-center">
                <!-- Slide Img -->
                <div class="slide-img bg-img" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/bg-img/bg-1.jpg);"></div>
                <!-- Slide Content -->
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="hero-slides-content text-center">
                                <h6 data-animation="fadeInUp" data-delay="100ms">Latest album</h6>
                                <h2 data-animation="fadeInUp" data-delay="300ms">Beyond Time <span>Beyond Time</span></h2>
                                <a data-animation="fadeInUp" data-delay="500ms" href="#" class="btn oneMusic-btn mt-50">Discover <i class="fa fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Hero Slide -->
            <div class="single-hero-slide d-flex align-items-center justify-content-center">
                <!-- Slide Img -->
                <div class="slide-img bg-img" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/other/PulpFiction2.jpg);"></div>
                <!-- Slide Content -->
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="hero-slides-content text-center">
                                <h6 data-animation="fadeInUp" data-delay="100ms">Latest album</h6>
                                <h2 data-animation="fadeInUp" data-delay="300ms">Colorlib Music <span>Colorlib Music</span></h2>
                                <a data-animation="fadeInUp" data-delay="500ms" href="#" class="btn oneMusic-btn mt-50">Discover <i class="fa fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Latest Albums Area Start ##### -->
    <section class="oneMusic-buy-now-area has-fluid section-padding-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading style-2 mb-50">
                        <p>Últimas entradas</p>
                        <!--<h2>Latest Albums</h2>-->
                        <h2><?php the_title() ?></h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-lg-9">
                    <div class="ablums-text text-center mb-70">
                        <p>Queremos que estés informado y a la última de todo lo relacionado con el mundo del cine, desde reviwes sobre las últimas peliculas en cartelera, pasando por puntos de vista personal sobre las tendencias en el mundo del cine hasta los sucedido en los últimos certamenes del séptimo arte.</p>
                    </div>
                </div>
            </div>
            <!-- ### CAROUSEL DE ÚLTIMOS POST ###-->
            <div class="row">
                <div class="col-12">
                    <div class="albums-slideshow owl-carousel">
                        
                        <!--< ?php-->
                        <!--    $args = array(-->
                        <!--    'post_per_page' => 3,-->
                        <!--    'orderby'       => 'post_date',-->
                        <!--    'order'         => 'DESC'-->
                        <!--);-->
                        
                        <!--$post_array = get_posts($args);-->
                        
                        <!--foreach ($post_array as $post) {-->
                        <!--?>-->
                             <!--Single Album -->
                        <!--    <div class="single-album">-->
                                <!--< ?php $post->post_thumbnail; ?>-->
                        <!--        <div class="album-info">-->
                        <!--            <a href="#">-->
                        <!--                <h5>< ?php echo $post->post_title; ?></h5>-->
                        <!--            </a>-->
                        <!--            <p> < ?php echo $post->post_content; ?></p>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--< ?php-->
                        <!--}-->
                        <!--?>-->
                        
                        
                        <!--< ?php-->
                        <!--    $args = array(-->
                        <!--    'post_per_page' => 3,-->
                        <!--    'orderby'       => 'post_date',-->
                        <!--    'order'         => 'DESC'-->
                        <!--);-->
                        
                        <!--$post_array = get_posts($args);-->
                        
                        <!--foreach ($post_array as $post) {-->
                        <!--?>-->
                             <!--Single Album -->
                        <!--    <div class="single-album">-->
                                <!--< ?php $post->post_thumbnail; ?>-->
                        <!--        <div class="album-info">-->
                        <!--            <a href="#">-->
                        <!--                <h5>< ?php echo $post->post_title; ?></h5>-->
                        <!--            </a>-->
                        <!--            <p> < ?php echo $post->post_content; ?></p>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--< ?php-->
                        <!--}-->
                        <!--?>-->
                        
                        <!--WP_QUERY ESTE ES EL MODO BUENO PARA HACER LA CONSULTA DE LOS ÚLTIMOS POSTS...SE REHACE ABAJO PARA DAR MEJOR ESTILO-->
                        <!--< ?php-->
                        <!--$args = array(-->
                        <!--    'post_per_page' => 3-->
                        <!--);-->
                        
                        <!--$custom_query = new WP_Query($args);-->
                        
                        <!--if ($custom_query->have_posts()):-->
                        <!--    while($custom_query->have_posts()):-->
                        <!--        $custom_query->the_post();-->
                        <!--?>-->
                             <!--Single Album -->
                        <!--    <div class="single-album">-->
                                <!--< ?php $post->post_thumbnail; ?>-->
                        <!--        <div class="album-info">-->
                        <!--            <a href="#">-->
                        <!--                <h5>< ?php the_title(); ?></h5>-->
                        <!--            </a>-->
                        <!--            <p> < ?php the_excerpt(); ?></p>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--< ?php-->
                        <!--endwhile;-->
                        <!--endif;-->
                        <!--?>-->
                        
                        <!--FORMA PARA DAR ESTILO APROPIADO-->
                        <?php
                        $args = array(
                            'post_type' => array ('post'),
                            'posts_per_page' => 5,
                            // Excluir todos los tipos de formato de post siguientes para que no salgan en el post destacado
                            'tax_query' => array( 
                                                array(
                                                    'taxonomy' => 'post_format',
                                                    'field' => 'slug',
                                                    'terms' => array(
                                                            'post-format-gallery', 
                                                            'post-format-link', 
                                                            'post-format-image', 
                                                            'post-format-quote', 
                                                            'post-format-audio', 
                                                            'post-format-video'
                                                    ),
                                                    'operator' => 'NOT IN'
                                                ) 
                                            )
                                );
                        
                        $custom_query = new WP_Query($args);
                        
                        if ($custom_query->have_posts()):
                            while($custom_query->have_posts()):
                                $custom_query->the_post();
                        ?>
                        <!--Contenedor de cada uno de los post-->
                        <div class="single-event-area mb-30">
                            <div class="event-thumbnail">
                                <div class="img bg-img pb-70" style="background-image: url(<?= the_post_thumbnail_url() ?>);"></div>
                                <!--< ?= the_post_thumbnail() ?>-->
                            </div>
                            <div class="event-text">
                                <h4><?= the_title() ?></h4>
                                <div class="event-meta-data">
                                    <a href="#" class="event-place"><?= the_author() ?></a>
                                    <a href="#" class="event-date"><?php the_time('j M Y') ?></a>
                                </div>
                                <hr>
                                <p><?= the_excerpt() ?></p>
                                <a href="<?= the_permalink() ?>" class="btn see-more-btn">Saber más</a>
                            </div>
                        </div>
                        <?php
                        endwhile;
                        endif;
                        wp_reset_query();
                        ?>
                        
                        
                        <!--QUERY POST NO SE USA-->
                        <!--< ?php query_posts('post_per_page=3'); ?>-->
                        <!--< ?php if(have_posts()): ?>-->
                        <!--< ?php while(have_posts()): ?>-->
                        <!--< ?php the_post(); ?>-->
                        
                        <!-- Single Album -->
                        <!--<div class="single-album">-->
                        <!--    < ?php the_post_thumbnail(); ?>-->
                        <!--    <div class="album-info">-->
                        <!--        <a href="#">-->
                        <!--            <h5>< ?php the_title(); ?></h5>-->
                        <!--        </a>-->
                        <!--        <p> < ?php the_excerpt(); ?></p>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <!--< ?php endwhile; ?>-->
                        <!--< ?php endif; ?>-->
                        
                         <!--Single Album -->
                        <!--<div class="single-album">-->
                        <!--    <img src="< ?php echo get_template_directory_uri(); ?>/img/bg-img/a1.jpg" alt="">-->
                        <!--    <div class="album-info">-->
                        <!--        <a href="#">-->
                        <!--            <h5>The Cure</h5>-->
                        <!--        </a>-->
                        <!--        <p>Second Song</p>-->
                        <!--    </div>-->
                        <!--</div>-->

                         <!--Single Album -->
                        <!--<div class="single-album">-->
                        <!--    <img src="< ?php echo get_template_directory_uri(); ?>/img/bg-img/a2.jpg" alt="">-->
                        <!--    <div class="album-info">-->
                        <!--        <a href="#">-->
                        <!--            <h5>Sam Smith</h5>-->
                        <!--        </a>-->
                        <!--        <p>Underground</p>-->
                        <!--    </div>-->
                        <!--</div>-->

                         <!--Single Album -->
                        <!--<div class="single-album">-->
                        <!--    <img src="< ?php echo get_template_directory_uri(); ?>/img/bg-img/a3.jpg" alt="">-->
                        <!--    <div class="album-info">-->
                        <!--        <a href="#">-->
                        <!--            <h5>Will I am</h5>-->
                        <!--        </a>-->
                        <!--        <p>First</p>-->
                        <!--    </div>-->
                        <!--</div>-->

                         <!--Single Album -->
                        <!--<div class="single-album">-->
                        <!--    <img src="< ?php echo get_template_directory_uri(); ?>/img/bg-img/a4.jpg" alt="">-->
                        <!--    <div class="album-info">-->
                        <!--        <a href="#">-->
                        <!--            <h5>The Cure</h5>-->
                        <!--        </a>-->
                        <!--        <p>Second Song</p>-->
                        <!--    </div>-->
                        <!--</div>-->

                         <!--Single Album -->
                        <!--<div class="single-album">-->
                        <!--    <img src="< ?php echo get_template_directory_uri(); ?>/img/bg-img/a5.jpg" alt="">-->
                        <!--    <div class="album-info">-->
                        <!--        <a href="#">-->
                        <!--            <h5>DJ SMITH</h5>-->
                        <!--        </a>-->
                        <!--        <p>The Album</p>-->
                        <!--    </div>-->
                        <!--</div>-->

                         <!--Single Album -->
                        <!--<div class="single-album">-->
                        <!--    <img src="< ?php echo get_template_directory_uri(); ?>/img/bg-img/a6.jpg" alt="">-->
                        <!--    <div class="album-info">-->
                        <!--        <a href="#">-->
                        <!--            <h5>The Ustopable</h5>-->
                        <!--        </a>-->
                        <!--        <p>Unplugged</p>-->
                        <!--    </div>-->
                        <!--</div>-->

                         <!--Single Album -->
                        <!--<div class="single-album">-->
                        <!--    <img src="< ?php echo get_template_directory_uri(); ?>/img/bg-img/a7.jpg" alt="">-->
                        <!--    <div class="album-info">-->
                        <!--        <a href="#">-->
                        <!--            <h5>Beyonce</h5>-->
                        <!--        </a>-->
                        <!--        <p>Songs</p>-->
                        <!--    </div>-->
                        <!--</div>-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Latest Albums Area End ##### -->

    <!-- ##### Buy Now Area Start ##### -->
    <section class="oneMusic-buy-now-area has-fluid bg-gray section-padding-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading style-2 mb-50">
                        <p>Últimas Reviwes</p>
                        <h2>Críticas</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-lg-9">
                    <div class="ablums-text text-center mb-70">
                        <p>Conone nuestra opinión sobre las últimas películas que están en cartelera, queremos ofrecerte nuestra opinión sobre películas para que después compartas tu punto de vista con nosotros, esto no es una sección especializada en la que nuestra opinión es la más válida, sino que queremos que los usuarios compartan sus puntos de vista con nosotros para poder debatir y ver el mundo del cine desde otro prisma.</p>
                    </div>
                </div>
            </div>
            <div class='container'>
                <div class="row">
                    <?php
                        $args = [
                            'post_type'     => ['filmoteca_review'],
                            'posts_per_page' => 6
                        ];
                        
                        $custom_posts = new Wp_Query($args);
                        if ($custom_posts->have_posts()){
                            while($custom_posts->have_posts()){
                                $custom_posts->the_post();
                                get_template_part('templates/content', 'small-custompost');
                            }
                        }
                        wp_reset_query();
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="load-more-btn text-center wow fadeInUp" data-wow-delay="300ms">
                        <a href="<?= get_page_link(get_page_by_title('Películas')) ?>" class="btn oneMusic-btn">Ver Más <i class="fa fa-angle-double-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Buy Now Area End ##### -->

    <!-- SECCIÓN BANDA SONORAS -->
    <?php
        $args = [
            'post_format' => 'post-format-audio',
            'posts_per_page'=> 1,
            'orderby'       => 'publish_date',
            'order'         => 'DESC',
        ];
        $audioPost = new WP_Query($args);
        if($audioPost->have_posts()):
            $audioPost->the_post();
            $images = get_attached_media('image', $post->ID);
            $imageUrl = get_the_post_thumbnail_url();
            if (count($images) > 0) {
                $count = 0;
                foreach($images as $image) {
                    // break;
                    if ($count === 1) {
                        $imageUrl =  wp_get_attachment_url($image->ID, 'full');
                        break;
                    }
                    $count++;
                }
            }
            
            $media = get_attached_media('audio', $post->ID);
            foreach($media as $item) {
                $audio = wp_get_attachment_url($item->ID);
                break;
            }
    ?>      
            <div class="row mt-70">
                <div class="col-12">
                    <div class="section-heading style-2 mb-50">
                        <p>Última Entrada</p>
                        <h2>Bandas Sonoras</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-lg-9">
                    <div class="ablums-text text-center mb-70">
                        <p>Conone las mejores bandas sonoras del mundo del cine, y descubre lo que se esconde detrás de esos acordes de los que jamás nos olvidaremos.<br>Te intentaremos contar los datos más curiosos sobre todo lo que rodea al mundo del cine desde todas las perpesctivas.</p>
                    </div>
                </div>
            </div>
            <section class="featured-artist-area section-padding-100 bg-img bg-overlay bg-fixed" style="background-image: url(<?= get_the_post_thumbnail_url(); ?>);">
                <div class="container">
                    <div class="row align-items-end">
                        <div class="col-12 col-md-5 col-lg-4">
                            <div class="featured-artist-thumb">
                                <img src="<?= $imageUrl ?>" alt="">
                            </div>
                        </div>
                        <div class="col-12 col-md-7 col-lg-8">
                            <div class="featured-artist-content">
                                <!-- Section Heading -->
                                <div class="section-heading white text-left mb-30">
                                    <p><span><?= get_the_author() ?></span> | <span><?= get_the_date() ?></span><br><i class="far fa-eye"></i>&nbsp;&nbsp;<?= get_num_visits($post->ID, false) ?></p>
                                    <a href='<?= get_the_permalink() ?>'><h2><?= get_the_title() ?></h2></a>
                                </div>
                                <p><?= get_the_excerpt() ?></p>
                                <div class="song-play-area">
                                    <div class="song-name">
                                        <p><?= end(explode('/',$audio)) ?></p>
                                    </div>
                                    <audio preload="auto" controls>
                                        <source src="<?php echo $audio ; ?>">
                                    </audio>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    <?php 
        endif;
        wp_reset_query();
    ?>
    <!-- ##### Featured Artist Area End ##### -->

    <!-- ##### RANKING TAQUILLAS ##### -->
    <section class="miscellaneous-area section-padding-100-0">
        <div class="row">
                <div class="col-12">
                    <div class="section-heading style-2 mb-50">
                        <p>Taquillas España</p>
                        <h2>Ranking Taquilla Cines</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-lg-9">
                    <div class="ablums-text text-center mb-70">
                        <p>Descubre cómo van las taquillas de nuestro país, con este ranking actualizado podrás descubrir que películas están siendo tendencia en el mundo del cine, la recaudación que están acumulando y cuanto tiempo llevan en cartelera.<br>La lista está actualizada al día por lo que podrás tener una idea de cúales son las mejores películas para que disfrutes del mejor cine.</p>
                    </div>
                </div>
            </div>
        <div class="container">
            <div class="row">
                <!-- ***** Weeks Top ***** -->
                <div class="col-12 col-lg-4">
                    <div class="weeks-top-area mb-100">
                        <div class="section-heading text-left mb-50 wow fadeInUp" data-wow-delay="50ms">
                            <p>Ranking taquilla</p>
                            <h2>Última semana</h2>
                        </div>

                        <!-- Single Top Item -->
                        <div class="single-top-item d-flex wow fadeInUp" data-wow-delay="100ms">
                            <div class="thumbnail">
                                <div class="img bg-img pb-100" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/taquilla/greenbook.jpg');"></div>
                            </div>
                            <div class="content-">
                                <h6>Green Book</h6>
                                <p>Recaudación Acumulada <span class='recaudacion'>2.5M€</span></p>
                            </div>
                        </div>

                        <!-- Single Top Item -->
                        <div class="single-top-item d-flex wow fadeInUp" data-wow-delay="150ms">
                            <div class="thumbnail">
                                <div class="img bg-img pb-100" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/taquilla/mismo-techo.jpg');"></div>
                            </div>
                            <div class="content-">
                                <h6>Bajo el Mismo Techo</h6>
                                <p>Recaudación Acumulada <span class='recaudacion'>2.2M€</span></p>
                            </div>
                        </div>

                        <!-- Single Top Item -->
                        <div class="single-top-item d-flex wow fadeInUp" data-wow-delay="200ms">
                            <div class="thumbnail">
                                <div class="img bg-img pb-100" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/taquilla/la-lego-pelicula-2.jpg');"></div>
                            </div>
                            <div class="content-">
                                <h6>La Lego Película 2</h6>
                                <p>Recaudación Acumulada <span class='recaudacion'>0.715M€</span></p>
                            </div>
                        </div>

                        <!-- Single Top Item -->
                        <div class="single-top-item d-flex wow fadeInUp" data-wow-delay="250ms">
                            <div class="thumbnail">
                                <div class="img bg-img pb-100" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/taquilla/creed2.jpg');"></div>
                            </div>
                            <div class="content-">
                                <h6>Creed II, La Leyenda de Rocky</h6>
                                <p>Recaudación Acumulada <span class='recaudacion'>4.22M€</span></p>
                            </div>
                        </div>

                        <!-- Single Top Item -->
                        <div class="single-top-item d-flex wow fadeInUp" data-wow-delay="300ms">
                            <div class="thumbnail">
                                <div class="img bg-img pb-100" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/taquilla/maria-reina-escocia.jpg');"></div>
                            </div>
                            <div class="content-">
                                <h6>María Reina de Escocia</h6>
                                <p>Recaudación Acumulada <span class='recaudacion'>0.45M€</span></p>
                            </div>
                        </div>

                        <!-- Single Top Item -->
                        <div class="single-top-item d-flex wow fadeInUp" data-wow-delay="350ms">
                            <div class="thumbnail">
                                <div class="img bg-img pb-100" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/taquilla/glass.jpeg');"></div>
                            </div>
                            <div class="content-">
                                <h6>Glass</h6>
                                <p>Recaudación Acumulada <span class='recaudacion'>4.85M€</span></p>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- ***** New Hits Songs ***** -->
                <div class="col-12 col-lg-4">
                    <div class="weeks-top-area mb-100">
                        <div class="section-heading text-left mb-50 wow fadeInUp" data-wow-delay="50ms">
                            <p>Ranking taquilla</p>
                            <h2>Estrenos 2019</h2>
                        </div>

                        <!-- Single Top Item -->
                        <div class="single-top-item d-flex wow fadeInUp" data-wow-delay="350ms">
                            <div class="thumbnail">
                                <div class="img bg-img pb-100" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/taquilla/glass.jpeg');"></div>
                            </div>
                            <div class="content-">
                                <h6>Glass</h6>
                                <p>Recaudación Acumulada <span class='recaudacion'>4.85M€</span></p>
                            </div>
                        </div>

                        <!-- Single Top Item -->
                        <div class="single-top-item d-flex wow fadeInUp" data-wow-delay="250ms">
                            <div class="thumbnail">
                                <div class="img bg-img pb-100" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/taquilla/creed2.jpg');"></div>
                            </div>
                            <div class="content-">
                                <h6>Creed II, La Leyenda de Rocky</h6>
                                <p>Recaudación Acumulada <span class='recaudacion'>4.22M€</span></p>
                            </div>
                        </div>
                        
                        <!-- Single Top Item -->
                        <div class="single-top-item d-flex wow fadeInUp" data-wow-delay="200ms">
                            <div class="thumbnail">
                                <div class="img bg-img pb-100" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/taquilla/la-favorita.jpg');"></div>
                            </div>
                            <div class="content-">
                                <h6>La Favorita</h6>
                                <p>Recaudación Acumulada <span class='recaudacion'>2.59M€</span></p>
                            </div>
                        </div>
                        
                        <!-- Single Top Item -->
                        <div class="single-top-item d-flex wow fadeInUp" data-wow-delay="100ms">
                            <div class="thumbnail">
                                <div class="img bg-img pb-100" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/taquilla/greenbook.jpg');"></div>
                            </div>
                            <div class="content-">
                                <h6>Green Book</h6>
                                <p>Recaudación Acumulada <span class='recaudacion'>2.5M€</span></p>
                            </div>
                        </div>

                        <!-- Single Top Item -->
                        <div class="single-top-item d-flex wow fadeInUp" data-wow-delay="150ms">
                            <div class="thumbnail">
                                <div class="img bg-img pb-100" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/taquilla/mismo-techo.jpg');"></div>
                            </div>
                            <div class="content-">
                                <h6>Bajo el Mismo Techo</h6>
                                <p>Recaudación Acumulada <span class='recaudacion'>2.2M€</span></p>
                            </div>
                        </div>
                        
                        <!-- Single Top Item -->
                        <div class="single-top-item d-flex wow fadeInUp" data-wow-delay="300ms">
                            <div class="thumbnail">
                                <div class="img bg-img pb-100" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/taquilla/asterix-pocion-magica.jpg');"></div>
                            </div>
                            <div class="content-">
                                <h6>Asterix: El Secreto de la Poción Mágica</h6>
                                <p>Recaudación Acumulada <span class='recaudacion'>1.9M€</span></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ***** Popular Artists ***** -->
                <div class="col-12 col-lg-4">
                    <div class="weeks-top-area mb-100">
                        <div class="section-heading text-left mb-50 wow fadeInUp" data-wow-delay="50ms">
                            <p>Ranking taquilla</p>
                            <h2>Historia</h2>
                        </div>

                        <!-- Single Top Item -->
                        <div class="single-top-item d-flex wow fadeInUp" data-wow-delay="100ms">
                            <div class="thumbnail">
                                <div class="img bg-img pb-100" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/taquilla/Avatar.jpg');"></div>
                            </div>
                            <div class="content-">
                                <h6>Avatar</h6>
                                <p>2009 Recaudación Acumulada <span class='recaudacion'>77M€</span></p>
                            </div>
                        </div>

                        <!-- Single Top Item -->
                        <div class="single-top-item d-flex wow fadeInUp" data-wow-delay="150ms">
                            <div class="thumbnail">
                                <div class="img bg-img pb-100" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/taquilla/8-apellidos-vascos.jpg');"></div>
                            </div>
                            <div class="content-">
                                <h6>8 Apellidos Vascos</h6>
                                <p>2014 Recaudación Acumulada <span class='recaudacion'>53.37M€</span></p>
                            </div>
                        </div>

                        <!-- Single Top Item -->
                        <div class="single-top-item d-flex wow fadeInUp" data-wow-delay="200ms">
                            <div class="thumbnail">
                                <div class="img bg-img pb-100" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/taquilla/lo-imposible.jpg');"></div>
                            </div>
                            <div class="content-">
                                <h6>Lo Imposible</h6>
                                <p>2012 Recaudación Acumulada <span class='recaudacion'>42.4M€</span></p>
                            </div>
                        </div>

                        <!-- Single Top Item -->
                        <div class="single-top-item d-flex wow fadeInUp" data-wow-delay="250ms">
                            <div class="thumbnail">
                                <div class="img bg-img pb-100" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/taquilla/Titanic.jpg');"></div>
                            </div>
                            <div class="content-">
                                <h6>Titanic</h6>
                                <p>1998 Recaudación Acumulada <span class='recaudacion'>41.61M€</span></p>
                            </div>
                        </div>

                        <!-- Single Top Item -->
                        <div class="single-top-item d-flex wow fadeInUp" data-wow-delay="300ms">
                            <div class="thumbnail">
                                <div class="img bg-img pb-100" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/taquilla/8-apellidos-catalanes.jpg');"></div>
                            </div>
                            <div class="content-">
                                <h6>Ocho Apellidos Catalanes</h6>
                                <p>2015 Recaudación Acumulada <span class='recaudacion'>35.48M€</span></p>
                            </div>
                        </div>

                        <!-- Single Top Item -->
                        <div class="single-top-item d-flex wow fadeInUp" data-wow-delay="350ms">
                            <div class="thumbnail">
                                <div class="img bg-img pb-100" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/taquilla/Retorno-del-Rey.jpg');"></div>
                            </div>
                            <div class="content-">
                                <h6>El Señor de los Anillos: El Retorno del Rey</h6>
                                <p>2003 Recaudación Acumulada <span class='recaudacion'>32.93M€</span></p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### FIN RANKING TAQUILLAS ##### -->
<?php
    get_footer();
?>