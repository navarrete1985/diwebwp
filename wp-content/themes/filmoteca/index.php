<?php
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
                 <?php get_template_part('templates/nav', 'front') ?>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img bg-overlay" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/bg-img/breadcumb3.jpg);">
        <div class="bradcumbContent">
            <p>See what’s new</p>
            <h2>Noticias</h2>
            <!--<h2>< ?php the_title() ?></h2>-->
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Blog Area Start ##### -->
    <div class="blog-area section-padding-100">
        <div class='container'>
            <div class='row'>
                <div class="col-12 mt-50">
                    <!--Primer loop para el post destacado, nos guardamos el id de este post para despues no mostrarlo-->
                    <?php
                        $args = array(
                            'post_type' => array ('post'),
                            'posts_per_page' => 1,
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
                        $post_destacado = new WP_Query($args);
                        if ($post_destacado->have_posts()):
                            $post_destacado->the_post();
                            echo the_title();
                            echo the_author();
                            the_post_thumbnail();
                            $id_destacado = $post->ID;
                        endif;
                        wp_reset_postdata();
                    ?>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-9">
                    <!--2º loop donde vamos a sacar los últimos 5 post en el que excluimos el post destacado-->
                    <?php
                        $args = array(
                            'posts_per_page' => 5,
                            'post__not_in'  => array($id_destacado)
                        );
                        $custom_query = new WP_Query($args);
                    ?>
                    <?php if($custom_query->have_posts()): ?>
                    <?php while($custom_query->have_posts()): ?>
                    <?php $custom_query->the_post() ?>
                    
                    <!-- Single Post Start -->
                    <!--<div class="single-blog-post mb-100 wow fadeInUp" data-wow-delay="100ms">-->
                        <!-- Post Thumb -->
                    <!--    <div class="blog-post-thumb mt-30">-->
                            <!--<a href="#"><img src="img/bg-img/blog1.jpg" alt=""></a>-->
                    <!--        < ?php the_post_thumbnail(); ?>-->
                            <!-- Post Date -->
                    <!--        <div class="post-date">-->
                    <!--            <span>< ?php echo get_the_date('d'); ?></span>-->
                    <!--            <span>< ?php echo get_the_date('M Y'); ?></span>-->
                    <!--        </div>-->
                    <!--    </div>-->

                        <!-- Blog Content -->
                    <!--    <div class="blog-content">-->
                            <!-- Post Title -->
                    <!--        <a href="< ?php the_permalink(); ?>" class="post-title"><?php the_title(); ?></a>-->
                            <!-- Post Meta -->
                    <!--        <div class="post-meta d-flex mb-30">-->
                    <!--            <p class="post-author">By<a href="#"> < ?php echo the_author(); ?></a></p>-->
                    <!--            <p class="tags">in<a href="#"> < ?php echo the_category(); ?></a></p>-->
                    <!--            <p class="tags"><a href="#">2 Comments</a></p>-->
                    <!--        </div>-->
                            <!-- Post Excerpt -->
                            <!--<p>Pellentesque sit amet velit a libero viverra porta non eu justo. Vivamus mollis metus sem, ac sodales dui lobortis. Pellentesque sit amet velit a libero viverra porta non eu justo. Vivamus mollis metus sem, ac sodales dui lobortis.</p>-->
                    <!--        < ?php the_excerpt(); ?>-->
                    <!--    </div>-->
                    <!--</div>-->
                        <?php get_template_part('templates/content', get_post_format()); ?> <!--Con get_post_format(id_post) -> recogemos el formato de post para poder repesentarlo-->
                        <!--En nuestros templates tenemos que crear una plantilla por cada uno de los formatos de post que tengamos-->
                    <?php endwhile; ?>
                    <?php endif; ?>
                    
                    <!-- Single Post Start -->
                    <!--<div class="single-blog-post mb-100 wow fadeInUp" data-wow-delay="100ms">-->
                        <!-- Post Thumb -->
                    <!--    <div class="blog-post-thumb mt-30">-->
                    <!--        <a href="#"><img src="img/bg-img/blog1.jpg" alt=""></a>-->
                            <!-- Post Date -->
                    <!--        <div class="post-date">-->
                    <!--            <span>15</span>-->
                    <!--            <span>June ‘18</span>-->
                    <!--        </div>-->
                    <!--    </div>-->

                        <!-- Blog Content -->
                    <!--    <div class="blog-content">-->
                            <!-- Post Title -->
                    <!--        <a href="#" class="post-title">5 Festivals you shouldn’t miss this summer</a>-->
                            <!-- Post Meta -->
                    <!--        <div class="post-meta d-flex mb-30">-->
                    <!--            <p class="post-author">By<a href="#"> Admin</a></p>-->
                    <!--            <p class="tags">in<a href="#"> Events</a></p>-->
                    <!--            <p class="tags"><a href="#">2 Comments</a></p>-->
                    <!--        </div>-->
                            <!-- Post Excerpt -->
                    <!--        <p>Pellentesque sit amet velit a libero viverra porta non eu justo. Vivamus mollis metus sem, ac sodales dui lobortis. Pellentesque sit amet velit a libero viverra porta non eu justo. Vivamus mollis metus sem, ac sodales dui lobortis.</p>-->
                    <!--    </div>-->
                    <!--</div>-->

                    <!-- Single Post Start -->
                    <!--<div class="single-blog-post mb-100 wow fadeInUp" data-wow-delay="100ms">-->
                        <!-- Post Thumb -->
                    <!--    <div class="blog-post-thumb mt-30">-->
                    <!--        <a href="#"><img src="img/bg-img/blog2.jpg" alt=""></a>-->
                            <!-- Post Date -->
                    <!--        <div class="post-date">-->
                    <!--            <span>15</span>-->
                    <!--            <span>June ‘18</span>-->
                    <!--        </div>-->
                    <!--    </div>-->

                        <!-- Blog Content -->
                    <!--    <div class="blog-content">-->
                            <!-- Post Title -->
                    <!--        <a href="#" class="post-title">5 Festivals you shouldn’t miss this summer</a>-->
                            <!-- Post Meta -->
                    <!--        <div class="post-meta d-flex mb-30">-->
                    <!--            <p class="post-author">By<a href="#"> Admin</a></p>-->
                    <!--            <p class="tags">in<a href="#"> Events</a></p>-->
                    <!--            <p class="tags"><a href="#">2 Comments</a></p>-->
                    <!--        </div>-->
                            <!-- Post Excerpt -->
                    <!--        <p>Pellentesque sit amet velit a libero viverra porta non eu justo. Vivamus mollis metus sem, ac sodales dui lobortis. Pellentesque sit amet velit a libero viverra porta non eu justo. Vivamus mollis metus sem, ac sodales dui lobortis.</p>-->
                    <!--    </div>-->
                    <!--</div>-->

                    <!-- Single Post Start -->
                    <!--<div class="single-blog-post mb-100 wow fadeInUp" data-wow-delay="100ms">-->
                        <!-- Post Thumb -->
                    <!--    <div class="blog-post-thumb mt-30">-->
                    <!--        <a href="#"><img src="img/bg-img/blog3.jpg" alt=""></a>-->
                            <!-- Post Date -->
                    <!--        <div class="post-date">-->
                    <!--            <span>15</span>-->
                    <!--            <span>June ‘18</span>-->
                    <!--        </div>-->
                    <!--    </div>-->

                        <!-- Blog Content -->
                    <!--    <div class="blog-content">-->
                            <!-- Post Title -->
                    <!--        <a href="#" class="post-title">5 Festivals you shouldn’t miss this summer</a>-->
                            <!-- Post Meta -->
                    <!--        <div class="post-meta d-flex mb-30">-->
                    <!--            <p class="post-author">By<a href="#"> Admin</a></p>-->
                    <!--            <p class="tags">in<a href="#"> Events</a></p>-->
                    <!--            <p class="tags"><a href="#">2 Comments</a></p>-->
                    <!--        </div>-->
                            <!-- Post Excerpt -->
                    <!--        <p>Pellentesque sit amet velit a libero viverra porta non eu justo. Vivamus mollis metus sem, ac sodales dui lobortis. Pellentesque sit amet velit a libero viverra porta non eu justo. Vivamus mollis metus sem, ac sodales dui lobortis.</p>-->
                    <!--    </div>-->
                    <!--</div>-->

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

                <div class="col-12 col-lg-3">
                    <div class="blog-sidebar-area">

                        <!-- Widget Area -->
                        <div class="single-widget-area mb-30">
                            <div class="widget-title">
                                <h5>Categories</h5>
                            </div>
                            <div class="widget-content">
                                <ul>
                                    <li><a href="#">Music</a></li>
                                    <li><a href="#">Events &amp; Press</a></li>
                                    <li><a href="#">Festivals</a></li>
                                    <li><a href="#">Lyfestyle</a></li>
                                    <li><a href="#">Uncategorized</a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- Widget Area -->
                        <div class="single-widget-area mb-30">
                            <div class="widget-title">
                                <h5>Archive</h5>
                            </div>
                            <div class="widget-content">
                                <ul>
                                    <li><a href="#">February 2018</a></li>
                                    <li><a href="#">March 2018</a></li>
                                    <li><a href="#">April 2018</a></li>
                                    <li><a href="#">May 2018</a></li>
                                    <li><a href="#">June 2018</a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- Widget Area -->
                        <div class="single-widget-area mb-30">
                            <div class="widget-title">
                                <h5>Tags</h5>
                            </div>
                            <div class="widget-content">
                                <ul class="tags">
                                    <li><a href="#">music</a></li>
                                    <li><a href="#">events</a></li>
                                    <li><a href="#">artists</a></li>
                                    <li><a href="#">press</a></li>
                                    <li><a href="#">mp3</a></li>
                                    <li><a href="#">videos</a></li>
                                    <li><a href="#">concerts</a></li>
                                    <li><a href="#">performers</a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- Widget Area -->
                        <div class="single-widget-area mb-30">
                            <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/bg-img/add.gif" alt=""></a>
                        </div>

                        <!-- Widget Area -->
                        <div class="single-widget-area mb-30">
                            <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/bg-img/add2.gif" alt=""></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Blog Area End ##### -->

    <!-- ##### Contact Area Start ##### -->
    <section class="contact-area section-padding-100 bg-img bg-overlay bg-fixed has-bg-img" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/bg-img/bg-2.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading white">
                        <p>See what’s new</p>
                        <h2>Get In Touch</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <!-- Contact Form Area -->
                    <div class="contact-form-area">
                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="email" placeholder="E-mail">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="subject" placeholder="Subject">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-12 text-center">
                                    <button class="btn oneMusic-btn mt-30" type="submit">Send <i class="fa fa-angle-double-right"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
    get_footer();
?>
    <!-- ##### Contact Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
<!--    <footer class="footer-area">-->
<!--        <div class="container">-->
<!--            <div class="row d-flex flex-wrap align-items-center">-->
<!--                <div class="col-12 col-md-6">-->
<!--                    <a href="#"><img src="< ? php echo get_template_directory_uri(); ?>/img/core-img/logo.png" alt=""></a>-->
<!--                    <p class="copywrite-text"><a href="#"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
<!--Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>-->
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0.</p> --> 
<!--                </div>-->

<!--                <div class="col-12 col-md-6">-->
<!--                    <div class="footer-nav">-->
<!--                        <ul>-->
<!--                            <li><a href="#">Home</a></li>-->
<!--                            <li><a href="#">Albums</a></li>-->
<!--                            <li><a href="#">Events</a></li>-->
<!--                            <li><a href="#">News</a></li>-->
<!--                            <li><a href="#">Contact</a></li>-->
<!--                        </ul>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </footer>-->
    
<!--</body>-->
