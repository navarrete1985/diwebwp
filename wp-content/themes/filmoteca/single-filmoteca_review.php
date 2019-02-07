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
    <section class="breadcumb-area bg-img bg-overlay" style="background-image: url(<?= get_the_post_thumbnail_url() ?>);">
        <div class="bradcumbContent">
            <h2><?php the_title() ?></h2>
            <div class='rating-content d-flex flex-row align-items-center justify-content-center mt-3'>
                <div class="stars container-stars">
                   <?php $rating = get_post_meta($post->ID, 'review_rating', true) ?>
                   <input class="cp-star star-5" id="star-5" type="radio" <?= $rating == 5 ? 'checked' : '' ?> value='5'/>
                   <label class="cp-star star-5" for="star-5"></label>
                   <input class="cp-star star-4" id="star-4" type="radio" <?= $rating == 4 ? 'checked' : '' ?> value='4'/>
                   <label class="cp-star star-4" for="star-4"></label>
                   <input class="cp-star star-3" id="star-3" type="radio" <?= $rating == 3 ? 'checked' : '' ?> value='3'/>
                   <label class="cp-star star-3" for="star-3"></label>
                   <input class="cp-star star-2" id="star-2" type="radio" <?= $rating == 2 ? 'checked' : '' ?> value='2'/>
                   <label class="cp-star star-2" for="star-2"></label>
                   <input class="cp-star star-1" id="star-1" type="radio" <?= $rating == 1 ? 'checked' : '' ?> value='1'/>
                   <label class="cp-star star-1" for="star-1"></label>
                </div>
                <div class="rating ml-2">Valoración <?= $rating ?> / 5</span>
            </div>
        </div>
    </section>
    <section id=blog-standard class="section blog-standard mb-70">
        <div class=container>
            <div class="row">
                <div class=col-md-8>
                    <div class=color-overlay></div>
                    <div class="container mt-5">
                        <!--<h1>Lee mi post</h1>-->
                    </div>
                    <div class="row blog-post">
                        <div class=col-md-12>
                            <!--<div class=featured-image>-->
                            <!--    <img src="< ?php echo get_the_post_thumbnail_url(); ?>" class=img-responsive alt="Alternative Text">-->
                            <!--</div>-->
                            <!--<h2 class=post-title>< ?php the_title(); ?></h2>-->
                            <div class="post-meta mb-3">by <a href=#><?php the_author(); ?></a>  <span>|</span>  <a href=#><?php the_time('j M Y');?></a>  <span>|</span> 3 Comments <span>|</span> <span></span> <?= get_num_visits($post->ID) ?><span>|</span>  <a href=#>Categorías</a>
                            </div>
                            <div class='post-content custom-post-content'>
                                <?php the_content(); ?>
                                <div class='row mt-5 mb-5 p-3 container-description'>
                                    <div class='col-md-6'>
                                        <h4 class='text-center mb-3'>Ficha Técnica</h4>
                                        <ul class='item-list'>
                                            <li><i class="fas fa-arrow-circle-right"></i><span class='item'>Título Original: </span><?= get_post_meta($post->ID, 'review_original_title', true) ?></li>
                                            <li><i class="fas fa-arrow-circle-right"></i><span class='item'>Año de producción: </span><?= get_post_meta($post->ID, 'review_year', true) ?></li>
                                            <li><i class="fas fa-arrow-circle-right"></i><span class='item'>Director: </span><?= get_post_meta($post->ID, 'review_director', true) ?></li>
                                            <li><i class="fas fa-arrow-circle-right"></i><span class='item'>Duración: </span><?= get_post_meta($post->ID, 'review_runtime', true) ?> min</li>
                                            <li><i class="fas fa-arrow-circle-right"></i><span class='item'>Reparto: </span><?= getListString($post->ID, 'review_casting'); ?></li>
                                            <li><i class="fas fa-arrow-circle-right"></i><span class='item'>Productora: </span><?= get_post_meta($post->ID, 'review_producer', true) ?></li>
                                            <li><i class="fas fa-arrow-circle-right"></i><span class='item'>Género: </span><?= getListString($post->ID, 'review_genre'); ?></li>
                                        </ul>
                                    </div>
                                    <div class='col-md-6'>
                                        <h4 class='text-center mb-3'>Sinopsis</h4>
                                        <p class='text-justify'><?= get_post_meta($post->ID, 'review_storyline', true) ?></p>
                                    </div>
                                </div>
                                <?= get_template_part('templates/content', 'related') ?>
                                <?= comments_template() ?>
                            </div>
                            <!--<div id=disqus_thread></div>-->
                            <noscript>Please enable JavaScript to view the <a href=https://disqus.com/?ref_noscript rel=nofollow>comments powered by Disqus.</a>
                            </noscript>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4 col-md-offset-0 mt-5">
                   <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </section>

<?php
    get_footer();
?>