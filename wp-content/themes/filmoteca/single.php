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
    <section id=blog-standard class="section blog-standard mb-70 mt-100">
        <div class=container>
            <div class="row">
                <!--Contenido-->
                <div class=col-md-8>
                    <div class=color-overlay></div>
                    <div class="container">
                        <!--<h1>Lee mi post</h1>-->
                    </div>
                    <div class="row blog-post">
                        <div class=col-md-12>
                            <div class="post-meta mb-3">Autor: <a href=#><?php the_author(); ?></a>  <span><br></span>  <a href=#><?php the_time('j M Y');?></a>  <span>|</span> <?= get_comments_number($post->ID) ?> Comentarios <span>|</span> <span></span> <?= get_num_visits($post->ID) ?>  
                            <?php
                                $categories = wp_get_post_categories($post->ID);
                                foreach($categories as $cat) {
                                    $categorie = get_category($cat);
                                    echo '<span>|</span> <a href=' . get_category_link($cat)  . '>' . $categorie->name . '</a>';
                                }
                            ?>
                            </div>
                            <div class=post-content>
                                <?php the_content(); ?>
                                <?= get_template_part('templates/content', 'related') ?>
                                <div class='mb-5'></div>
                                <?= comments_template() ?>
                            </div>
                            <!--<div id=disqus_thread></div>-->
                            <noscript>Please enable JavaScript to view the <a href=https://disqus.com/?ref_noscript rel=nofollow>comments powered by Disqus.</a>
                            </noscript>
                        </div>
                    </div>
                </div>
                <!--Sidebar-->
                <div class="col-md-4 col-md-offset-0">
                   <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </section>

<?php
    get_footer();
?>