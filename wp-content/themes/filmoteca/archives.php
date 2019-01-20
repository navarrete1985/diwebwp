<?php
/*
Template Name: Archivos
*/
    get_header();
?>
<!--Plantilla personalizada donde vamos a meter toda la info del blog como si fuera un sidebar a lo basto (esta es la que se ve en el navbar)-->

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
    <!--Cabecera-->
     <section class="breadcumb-area bg-img bg-overlay" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/bg-img/breadcumb3.jpg);">
        <div class="bradcumbContent">
            <h2>ARCHIVES</h2>
        </div>
    </section>
    <!---->
    <section class='content content-masonry'>
        <?php
        
            // Últimas entradas
            $title = 'Últimas entradas';
            $args = array (
                'type'            => 'postbypost',
                'show_post_count' => 1,
                'post_type'       => 'post',
                'after'           => '<hr class="hrsoft">',
                'echo'            => false
            );
            $content =  wp_get_archives( $args );
            include( locate_template( 'templates/content-archives.php', false, false ) );
            
            // Categorías
            $title = 'Categorías';
            $content = wp_list_categories('title_li=&show_count=1&echo=0');
            $content = preg_replace('/<\/a> \(([0-9]+)\)/', ' <span class="heavyblue pull-right">\\1</span></a>', $content);
            include( locate_template( 'templates/content-archives.php', false, false ) );
            
            // Tags
            $title = 'Tags';
            $tags = get_tags();
            if ($tags) {
                $content = '<ul class="tags">';
                foreach ($tags as $tag) {
                    $content .= '<li><a href="' . get_tag_link( $tag->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $tag->name ) . '" ' . '>' . $tag->name.'</a></li>';
                }
                $content .= '</ul>';
            }
            include( locate_template( 'templates/content-archives.php', false, false ) );
            
        ?>
    </section>
<?php
    get_footer();
?>
