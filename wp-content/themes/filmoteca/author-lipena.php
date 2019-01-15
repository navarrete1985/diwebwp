<!--< ?php-->
<!--    $curauth = (get_query_var('author_name')) ? get_user_by('slug',-->
<!--    get_query_var('author_name')) : get_userdata(get_query_var('author'));-->
<!--    echo $curauth->user_nicename . '<br>';-->
<!--    echo $curauth->description;-->
    
    
<!--?>-->
  
<!--<body data-spy=scroll data-target=#main-nav-collapse data-offset=100>-->
<!--    <div class=page-loader>-->
<!--        <div class=loader>Loading...</div>-->
<!--    </div>-->
<!--    < ?php get_template_part('templates/nav','front');?>-->
<!--    <header id=header class="home-parallax home-fade dark-bg header-inner">-->
<!--        <div class=color-overlay></div>-->
<!--        <div class=container>-->
<!--            <h1>< ?php echo $curauth->user_nicename; ?></h1>-->
<!--            <h3>< ?php echo get_author_role($curauth->ID); ?> Esto es el rol</h3>-->
           
<!--        </div>-->
<!--    </header>-->
<!--    <section id=blog-standard class="section blog-standard">-->
<!--         <p>< ?php echo $curauth->description; ?></p>-->
<!--         <p>< ?php the_author_meta('twitter', $curauth->ID); ?></p>-->
<!--         <p>< ?php the_author_meta('facebook', $curauth->ID); ?></p>-->
<!--         <p>< ?php the_author_meta('linkedin', $curauth->ID); ?></p>-->
<!--         <p>< ?php the_author_meta('skill1', $curauth->ID); echo '    '; the_author_meta('skill1V', $curauth->ID); ?></p>-->
<!--         <p>< ?php the_author_meta('skill2', $curauth->ID); echo '    ';the_author_meta('skill2V', $curauth->ID); ?></p>-->
<!--         <p>< ?php the_author_meta('skill3', $curauth->ID); echo '    ';the_author_meta('skill3V', $curauth->ID); ?></p>-->
<!--         <p>< ?php the_author_meta('skill4', $curauth->ID); echo '    ';the_author_meta('skill4V', $curauth->ID); ?></p>-->
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
    <!--</section>   -->
<!--< ?php get_footer(); ?>-->




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
        <div class="row d-flex justify-content-center">
            <!-- CONTENT -->
            <div class="col-10">
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
                    <div class="col-12 mt-70">
                        <!-- Loaders Area Start -->
                        <div class="our-skills-area">
                            <div class="row">
    
                                <!-- Single Skills Area -->
                                <div class="col-12 col-sm-6 col-lg-3">
                                    <div class="single-skils-area mb-100">
                                        <div id="circle" class="circle" data-value="0.75">
                                            <div class="skills-text">
                                                <span>75%</span>
                                                <p>Good Music</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <!-- Single Skills Area -->
                                <div class="col-12 col-sm-6 col-lg-3">
                                    <div class="single-skils-area mb-100">
                                        <div id="circle2" class="circle" data-value="0.83">
                                            <div class="skills-text">
                                                <span>83%</span>
                                                <p>Amazing Artists</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <!-- Single Skills Area -->
                                <div class="col-12 col-sm-6 col-lg-3">
                                    <div class="single-skils-area mb-100">
                                        <div id="circle3" class="circle" data-value="0.25">
                                            <div class="skills-text">
                                                <span>25%</span>
                                                <p>Concerts</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <!-- Single Skills Area -->
                                <div class="col-12 col-sm-6 col-lg-3">
                                    <div class="single-skils-area mb-100">
                                        <div id="circle4" class="circle" data-value="0.95">
                                            <div class="skills-text">
                                                <span>95%</span>
                                                <p>Superstars</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--<div class="row mt-50 wow fadeInUp mr-5">-->
                    <!--    <div class="skillbar clearfix " data-percent="< ?= the_author_meta('skill1v', $curauth->ID) ?>%">-->
                    <!--        <div class="skillbar-title"><span>< ?= the_author_meta('skill1', $curauth->ID) ?></span></div>-->
                    <!--        <div class="skillbar-bar"></div>-->
                    <!--        <div class="skill-bar-percent"><span class="counter">< ?= the_author_meta('skill1v', $curauth->ID); ?></span>%</div>-->
                    <!--    </div>-->
                    <!--    <div class="skillbar clearfix " data-percent="< ?= the_author_meta('skill2v', $curauth->ID); ?>%">-->
                    <!--        <div class="skillbar-title"><span>< ?= the_author_meta('skill2', $curauth->ID) ?></span></div>-->
                    <!--        <div class="skillbar-bar"></div>-->
                    <!--        <div class="skill-bar-percent"><span class="counter">< ?= the_author_meta('skill2v', $curauth->ID); ?></span>%</div>-->
                    <!--    </div>-->
                    <!--    <div class="skillbar clearfix " data-percent="< ?= the_author_meta('skill3v', $curauth->ID); ?>%">-->
                    <!--        <div class="skillbar-title"><span>< ?= the_author_meta('skill3', $curauth->ID) ?></span></div>-->
                    <!--        <div class="skillbar-bar"></div>-->
                    <!--        <div class="skill-bar-percent"><span class="counter">< ?= the_author_meta('skill3v', $curauth->ID); ?></span>%</div>-->
                    <!--    </div>-->
                    <!--    <div class="skillbar clearfix " data-percent="< ?= the_author_meta('skill4v', $curauth->ID); ?>%">-->
                    <!--        <div class="skillbar-title"><span>< ?= the_author_meta('skill4', $curauth->ID) ?></span></div>-->
                    <!--        <div class="skillbar-bar"></div>-->
                    <!--        <div class="skill-bar-percent"><span class="counter">< ?= the_author_meta('skill4v', $curauth->ID); ?></span>%</div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!-- RECENT POSTS -->
                    <div class="row mt-50 wow fadeInUp d-flex justify-content-center">
                        <div class="col-10 text-center">
                            <h1 class="mb-70">Últimos Posts</h1>
                            <!-- Single Post Start -->
                            <div class="single-blog-post mb-100 wow fadeInUp" data-wow-delay="100ms">
                                <!-- Post Thumb -->
                                <div class="blog-post-thumb mt-30">
                                    <a href="#"><img src="<?= get_template_directory_uri() ?>/img/bg-img/blog1.jpg" alt=""></a>
                                    <!-- Post Date -->
                                    <div class="post-date">
                                        <span>15</span>
                                        <span>June ‘18</span>
                                    </div>
                                </div>

                                <!-- Blog Content -->
                                <div class="blog-content">
                                    <!-- Post Title -->
                                    <a href="#" class="post-title">5 Festivals you shouldn’t miss this summer</a>
                                    <!-- Post Meta -->
                                    <div class="post-meta d-flex mb-30">
                                        <p class="post-author">By<a href="#"> Admin</a></p>
                                        <p class="tags">in<a href="#"> Events</a></p>
                                        <p class="tags"><a href="#">2 Comments</a></p>
                                    </div>
                                    <!-- Post Excerpt -->
                                    <p>Pellentesque sit amet velit a libero viverra porta non eu justo. Vivamus mollis metus sem, ac sodales dui lobortis. Pellentesque sit amet velit a libero viverra porta non eu justo. Vivamus mollis metus sem, ac sodales dui lobortis.</p>
                                </div>
                            </div>

                            <!-- Single Post Start -->
                            <div class="single-blog-post mb-100 wow fadeInUp" data-wow-delay="100ms">
                                <!-- Post Thumb -->
                                <div class="blog-post-thumb mt-30">
                                    <a href="#"><img src="<?= get_template_directory_uri() ?>/img/bg-img/blog2.jpg" alt=""></a>
                                    <!-- Post Date -->
                                    <div class="post-date">
                                        <span>15</span>
                                        <span>June ‘18</span>
                                    </div>
                                </div>

                                <!-- Blog Content -->
                                <div class="blog-content">
                                    <!-- Post Title -->
                                    <a href="#" class="post-title">5 Festivals you shouldn’t miss this summer</a>
                                    <!-- Post Meta -->
                                    <div class="post-meta d-flex mb-30">
                                        <p class="post-author">By<a href="#"> Admin</a></p>
                                        <p class="tags">in<a href="#"> Events</a></p>
                                        <p class="tags"><a href="#">2 Comments</a></p>
                                    </div>
                                    <!-- Post Excerpt -->
                                    <p>Pellentesque sit amet velit a libero viverra porta non eu justo. Vivamus mollis metus sem, ac sodales dui lobortis. Pellentesque sit amet velit a libero viverra porta non eu justo. Vivamus mollis metus sem, ac sodales dui lobortis.</p>
                                </div>
                            </div>

                            <!-- Single Post Start -->
                            <div class="single-blog-post mb-100 wow fadeInUp" data-wow-delay="100ms">
                                <!-- Post Thumb -->
                                <div class="blog-post-thumb mt-30">
                                    <a href="#"><img src="<?= get_template_directory_uri() ?>/img/bg-img/blog3.jpg" alt=""></a>
                                    <!-- Post Date -->
                                    <div class="post-date">
                                        <span>15</span>
                                        <span>June ‘18</span>
                                    </div>
                                </div>

                                <!-- Blog Content -->
                                <div class="blog-content">
                                    <!-- Post Title -->
                                    <a href="#" class="post-title">5 Festivals you shouldn’t miss this summer</a>
                                    <!-- Post Meta -->
                                    <div class="post-meta d-flex mb-30">
                                        <p class="post-author">By<a href="#"> Admin</a></p>
                                        <p class="tags">in<a href="#"> Events</a></p>
                                        <p class="tags"><a href="#">2 Comments</a></p>
                                    </div>
                                    <!-- Post Excerpt -->
                                    <p>Pellentesque sit amet velit a libero viverra porta non eu justo. Vivamus mollis metus sem, ac sodales dui lobortis. Pellentesque sit amet velit a libero viverra porta non eu justo. Vivamus mollis metus sem, ac sodales dui lobortis.</p>
                                </div>
                            </div>

                            <!-- Pagination -->
                            <div class="oneMusic-pagination-area wow fadeInUp" data-wow-delay="300ms">
                                <nav>
                                    <ul class="pagination">
                                        <li class="page-item active"><a class="page-link" href="#">01</a></li>
                                        <li class="page-item"><a class="page-link" href="#">02</a></li>
                                        <li class="page-item"><a class="page-link" href="#">03</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class='container-full'>
        <div class='row'>
            <div class='col-lg-4 col-md-6 col-12'>
                <div class='weeks-top-area mb-100'>
                    <div class='section-heading text-center mb-50 wow fadeInUp' data-wow-delay='50ms'>
                        <p>posts</p>
                        <h2>TOP-5</h2>
                    </div>
                    <div class='single-top-item d-flex wow fadeInUp'>
                        <div class='thumbnail'></div>
                        <div class='content'>
                            <h6>Esto es el título de un post</h6>
                            <p>Autor</p>
                        </div>
                    </div>
                    <div class='single-top-item d-flex wow fadeInUp'>
                        <div class='thumbnail'></div>
                        <div class='content'>
                            <h6>Esto es el título de un post</h6>
                            <p>Autor</p>
                        </div>
                    </div>
                    <div class='single-top-item d-flex wow fadeInUp'>
                        <div class='thumbnail'></div>
                        <div class='content'>
                            <h6>Esto es el título de un post</h6>
                            <p>Autor</p>
                        </div>
                    </div>
                    <div class='single-top-item d-flex wow fadeInUp'>
                        <div class='thumbnail'></div>
                        <div class='content'>
                            <h6>Esto es el título de un post</h6>
                            <p>Autor</p>
                        </div>
                    </div>
                    <div class='single-top-item d-flex wow fadeInUp'>
                        <div class='thumbnail'></div>
                        <div class='content'>
                            <h6>Esto es el título de un post</h6>
                            <p>Autor</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class='col-lg-4 col-md-6 col-12'>
                <div class='weeks-top-area mb-100'>
                    <div class='section-heading text-center mb-50 wow fadeInUp' data-wow-delay='50ms'>
                        <p>autores</p>
                        <h2>OTROS AUTORES</h2>
                    </div>
                    <div class='single-top-item d-flex wow fadeInUp'>
                        <div class='thumbnail'></div>
                        <div class='content'>
                            <h6>Esto es el título de un post</h6>
                            <p>Autor</p>
                        </div>
                    </div>
                    <div class='single-top-item d-flex wow fadeInUp'>
                        <div class='thumbnail'></div>
                        <div class='content'>
                            <h6>Esto es el título de un post</h6>
                            <p>Autor</p>
                        </div>
                    </div>
                    <div class='single-top-item d-flex wow fadeInUp'>
                        <div class='thumbnail'></div>
                        <div class='content'>
                            <h6>Esto es el título de un post</h6>
                            <p>Autor</p>
                        </div>
                    </div>
                    <div class='single-top-item d-flex wow fadeInUp'>
                        <div class='thumbnail'></div>
                        <div class='content'>
                            <h6>Esto es el título de un post</h6>
                            <p>Autor</p>
                        </div>
                    </div>
                    <div class='single-top-item d-flex wow fadeInUp'>
                        <div class='thumbnail'></div>
                        <div class='content'>
                            <h6>Esto es el título de un post</h6>
                            <p>Autor</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class='col-lg-4 col-md-6 col-12'>
                <div class='weeks-top-area mb-100'>
                    <div class='section-heading text-center mb-50 wow fadeInUp' data-wow-delay='50ms'>
                        <p>posts</p>
                        <h2>TOP-5</h2>
                    </div>
                    <div class='single-top-item d-flex wow fadeInUp'>
                        <div class='thumbnail'></div>
                        <div class='content'>
                            <h6>Esto es el título de un post</h6>
                            <p>Autor</p>
                        </div>
                    </div>
                    <div class='single-top-item d-flex wow fadeInUp'>
                        <div class='thumbnail'></div>
                        <div class='content'>
                            <h6>Esto es el título de un post</h6>
                            <p>Autor</p>
                        </div>
                    </div>
                    <div class='single-top-item d-flex wow fadeInUp'>
                        <div class='thumbnail'></div>
                        <div class='content'>
                            <h6>Esto es el título de un post</h6>
                            <p>Autor</p>
                        </div>
                    </div>
                    <div class='single-top-item d-flex wow fadeInUp'>
                        <div class='thumbnail'></div>
                        <div class='content'>
                            <h6>Esto es el título de un post</h6>
                            <p>Autor</p>
                        </div>
                    </div>
                    <div class='single-top-item d-flex wow fadeInUp'>
                        <div class='thumbnail'></div>
                        <div class='content'>
                            <h6>Esto es el título de un post</h6>
                            <p>Autor</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= get_footer() ?>