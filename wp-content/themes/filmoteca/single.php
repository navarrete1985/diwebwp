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
                            <div class=post-content>
                                <?php the_content(); ?>
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