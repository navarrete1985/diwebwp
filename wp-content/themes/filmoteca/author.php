<?php
    $curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
    // $lastest_posts = get_posts(array(
    //     'author'     => $curauth->ID,
    //     'orderby'    => 'date',
    //     'numberposts'=> 5
    // ));
?>
<!--    <h1>< ?php echo $curauth->user_nicename; ?></h1>-->
<!--    <h3>< ?php echo get_author_role($curauth->ID); ?> Esto es el rol</h3>-->
<!--     <p>< ?php echo $curauth->description; ?></p>-->
<!--     <p>< ?php the_author_meta('twitter', $curauth->ID); ?></p>-->
<!--     <p>< ?php the_author_meta('twitter', $curauth->ID); ?></p>-->
<!--     <p>< ?php the_author_meta('facebook', $curauth->ID); ?></p>-->
<!--     <p>< ?php the_author_meta('linkedin', $curauth->ID); ?></p>-->
<!--     <p>< ?php the_author_meta('skill1', $curauth->ID); echo '    '; the_author_meta('skill1v', $curauth->ID); ?></p>-->
<!--     <p>< ?php the_author_meta('skill2', $curauth->ID); echo '    ';the_author_meta('skill2v', $curauth->ID); ?></p>-->
<!--     <p>< ?php the_author_meta('skill3', $curauth->ID); echo '    ';the_author_meta('skill3v', $curauth->ID); ?></p>-->
<!--     <p>< ?php the_author_meta('skill4', $curauth->ID); echo '    ';the_author_meta('skill4v', $curauth->ID); ?></p>-->
<!--     <p>Link de la imagen < ?php the_author_meta('userprofile', $curauth->ID); ?></p>-->
    
<!--< ?php get_footer(); ?>-->

 <!--    < ?php-->
        
    <!--    if ( has_gravatar($curauth->user_email) ) {-->
    <!--        // El usuario tiene gravatar-->
    <!--        echo get_avatar($curauth->ID, 200);-->
    <!--    } else {-->
    <!--        // No tiene gravatar así que hallamos la url de la foto del usuario-->
    <!--        $miURL = get_template_directory_uri()."assets/images/".$curauth->nickname.".jpg";-->
    <!--        // Comprobamos Si existe una imagen del usuario en nuestro sitio-->
    <!--        if ( file_exists($miURL) ) {-->
    <!--            echo '<img src="'.$miURL.'" class="img-responsive">';-->
    <!--        }else{-->
    <!--            // Tampoco tiene foto en nuestro sitio así que sacamos el NOPIC-->
    <!--            echo '<img src="'.get_template_directory_uri().'/assets/images/nopic.png" width="200">';-->
    <!--        }-->
    <!--    } -->
    <!--?>-->
    
    <?= get_header() ?>
    
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
    <header class="header-area fixed-nav">
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
    
    <!-- CONTENIDO -->
    <section class="elements-area mt-50 section-padding-100">
        <div class="container-full">
            <div class="row">
                <!-- CONTENT -->
                <div class="col-12 col-lg-9">
                    <div class="content mb-100">
                        <!-- Cabecera de la biografía -->
                        <div class="row">
                            <div class="col-xl-4 col-sm-12">
                                <div class="img pb-100 mb-70 bg-img " style="background-image: url(<?= get_template_directory_uri() ?>/img/bg-img/a1.jpg)"></div>
                            </div>
                            <div class="col-xl-8 col-sm-12">
                                <h2><?= $curauth->user_nicename ?> - Biografía</h2>
                                <p><?= get_author_role($curauth->ID) ?></p>
                                <p><?= $curauth->description ?></p>
                            </div>
                        </div>
                        <!-- REDES SOCIALES -->
                        <div class="row">
                            <div class="col-12 d-flex justify-content-center">
                                <div class="social-ico mx-3">
                                    <a href="<?= the_author_meta('facebook', $curauth->ID) ?>"></a>
                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                    <span>@Facebook</span>
                                </div>
                                <div class="social-ico mx-3">
                                    <a href="<?= the_author_meta('twitter', $curauth->ID) ?>"></a>
                                    <i class="fa fa-twitter" aria-hidden="true"></i>
                                    <span>@Twitter</span>
                                </div>
                                <div class="social-ico mx-3">
                                    <a href="<?= the_author_meta('instagram', $curauth->ID) ?>"></a>
                                    <i class="fa fa-instagram" aria-hidden="true"></i>
                                    <span>@Instagram</span>
                                </div>
                                <div class="social-ico mx-3">
                                    <a href="<?= the_author_meta('linkedin', $curauth->ID) ?>"></a>
                                    <i class="fa fa-linkedin" aria-hidden="true"></i>
                                    <span>@Linkedin</span>
                                </div>
                            </div>
                        </div>
                        <!-- SIKILL RANGE -->
                        <div class="row mt-50 wow fadeInUp mr-5">
                            <div class="skillbar clearfix " data-percent="<?= the_author_meta('skill1v', $curauth->ID) ?>%">
                                <div class="skillbar-title"><span><?= the_author_meta('skill1', $curauth->ID) ?></span></div>
                                <div class="skillbar-bar"></div>
                                <div class="skill-bar-percent"><span class="counter"><?= the_author_meta('skill1v', $curauth->ID); ?></span>%</div>
                            </div>
                            <div class="skillbar clearfix " data-percent="<?= the_author_meta('skill2v', $curauth->ID); ?>%">
                                <div class="skillbar-title"><span><?= the_author_meta('skill2', $curauth->ID) ?></span></div>
                                <div class="skillbar-bar"></div>
                                <div class="skill-bar-percent"><span class="counter"><?= the_author_meta('skill2v', $curauth->ID); ?></span>%</div>
                            </div>
                            <div class="skillbar clearfix " data-percent="<?= the_author_meta('skill3v', $curauth->ID); ?>%">
                                <div class="skillbar-title"><span><?= the_author_meta('skill3', $curauth->ID) ?></span></div>
                                <div class="skillbar-bar"></div>
                                <div class="skill-bar-percent"><span class="counter"><?= the_author_meta('skill3v', $curauth->ID); ?></span>%</div>
                            </div>
                            <div class="skillbar clearfix " data-percent="<?= the_author_meta('skill4v', $curauth->ID); ?>%">
                                <div class="skillbar-title"><span><?= the_author_meta('skill4', $curauth->ID) ?></span></div>
                                <div class="skillbar-bar"></div>
                                <div class="skill-bar-percent"><span class="counter"><?= the_author_meta('skill4v', $curauth->ID); ?></span>%</div>
                            </div>
                        </div>
                        <!-- RECENT POSTS -->
                        <div class="row mt-50 wow fadeInUp d-flex justify-content-center">
                            <div class="col-12 col-xl-10 text-center">
                                <h1 class="mb-70">Últimos Posts</h1>
                                <!-- Single Post Start -->
                                <?php 
                            
                                    $lastest_posts = get_posts(array(
                                        'post_type'  => ['post'],
                                        'author'     => $curauth->ID,
                                        'orderby'    => 'date',
                                        'numberposts'=> 5
                                    ));
                                    
                                    foreach($lastest_posts as $post){ 
                                        the_post();
                                        if (get_post_type($post) == 'post') {
                                            get_template_part('templates/post', 'author');    
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- SIDEBAR -->
                <div class="col-12 col-lg-3">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </section>
    
    <?= get_footer() ?>