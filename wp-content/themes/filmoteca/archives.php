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
            include(locate_template('templates/content-archives.php', false, false));
            
            // Categorías
            $title = 'Categorías';
            $content = wp_list_categories('title_li=&show_count=1&echo=0');
            $content = preg_replace('/<\/a> \(([0-9]+)\)/', ' <span class="heavyblue pull-right">\\1</span></a>', $content);
            include(locate_template('templates/content-archives.php', false, false));
            
            // Tags
            $title = 'Tags';
            $tags = get_tags();
            if ($tags) {
                $content = '<ul class="tags">';
                foreach ($tags as $tag) {
                    $content .= '<li><a href="' . get_tag_link($tag->term_id) . '" title="' . sprintf("Ver todos los post de %s", $tag->name) . '" ' . '>' . $tag->name.'</a></li>';
                }
                $content .= '</ul>';
            }
            include(locate_template('templates/content-archives.php', false, false));
            
            // Autores
            $title = 'Autores';
            $args = [
                'orderby'       => 'post_count',
                'order'         => 'ASC',
                'number'        => null,
                'optioncount'   => true,
                'hide_empty'    => false,
                'echo'          => false
            ];
            
            $content = wp_list_authors($args);
            $content = preg_replace('/<\/a> \(([0-9]+)\)/', ' <span class="heavyblue pull-right">\\1</span></a>', $content);
            include(locate_template('templates/content-archives.php', false, false));
            
            // Post de cada autor
            $authors = get_users(['fields' => ['display_name', 'ID']]);
            $args = [
                'orderby' => 'post_date',
                'order'   => 'ASC'
            ];
            
            foreach ($authors as $author) {
                $title = 'Post de ' . $author->display_name;
                $args['author'] = $author->ID;
                $content = '';
                foreach (get_posts($args) as $post) {
                    $content .= '<li><a href="'.get_permalink($post->ID).'"> '.$post->post_title.'</a></li><hr class="hrsoft">';
                }
                include(locate_template('templates/content-archives.php', false, false));
            }
            
            // Publicaciones del día
            $title = 'Publicaciones por día';
            $args = [
                'type'            => 'daily',
                'show_post_count' => 1,
                'echo'            => false
            ];
            $content = wp_get_archives($args);
            $content = preg_replace( '~(&nbsp;)(\(\d++\))~', '$1<span class="heavyblue pull-right">$2</span>', $content );
            $content = preg_replace('/[\(\)]/', '', $content);
            include(locate_template('templates/content-archives.php'));
            
            // Publicaciones del mes
            $title = 'Publicaciones por mes';
            $args['type'] = 'monthly';
            $content = wp_get_archives($args);
            $content = preg_replace( '~(&nbsp;)(\(\d++\))~', '$1<span class="heavyblue pull-right">$2</span>', $content );
            $content = preg_replace('/[\(\)]/', '', $content);
            include(locate_template('templates/content-archives.php'));
            
            // Publicaciones del año
            $title = 'Publicaciones por año';
            $args['type'] = 'yearly';
            $content = wp_get_archives($args);
            $content = preg_replace( '~(&nbsp;)(\(\d++\))~', '$1<span class="heavyblue pull-right">$2</span>', $content );
            $content = preg_replace('/[\(\)]/', '', $content);
            include(locate_template('templates/content-archives.php'));
            
            // Publicaciones más populares
            $title = 'Publicaciones más populares';
            $content = '';
            $args = [
                'post_per_page' => null,
                'meta_key'      => 'post_view_count',
                'orderby'       => 'meta_value_num',
                'order'         => 'DESC'
            ];
            $posts = new WP_Query($args);
            while($posts->have_posts()) {
                $posts->the_post();
                $views = absint(preg_replace('/[a-zA-Z]/','', getPostViews( $post->ID ) ) );
                $content .= '<i class="fa fa-chevron-circle-right mygrey"></i>&nbsp;&nbsp;&nbsp;<a href="'.get_the_permalink($post->ID).'">'. $post->post_title.' (<span class="heavyblue pull-right"><i class="fa fa-eye mygrey"></i>&nbsp;&nbsp;'.$views.'</span>)</a><br />';
            }
            wp_reset_query();
            include(locate_template('templates/content-archives.php'));
            
            // Posts más comentados
            $title = 'Posts más comentados';
            $content = '';
            $args = [
                'orderby'       => 'comment_count',
                'post_per_page' => null
            ];
            $posts = new WP_Query($args);
            while($posts->have_posts()) {
                $posts->the_post();
                $num_comments = get_comments_number($post->ID);
                $content .= '<li><a href="'.get_the_permalink($post->ID).'">'. $post->post_title.' <span class="heavyblue pull-right"> <i class="fa fa-comment mygrey"></i>&nbsp;&nbsp; '.$num_comments.'</span></a><br /></li>';
                $content .= '<hr class="hrsoft">';
            }
            wp_reset_query();
            include(locate_template('templates/content-archives.php'));
        ?>
    </section>
<?php
    get_footer();
?>
