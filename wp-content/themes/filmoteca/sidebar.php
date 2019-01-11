<div class="blog-sidebar-area">
    <!-- Widget Area -->
    <div class="single-widget-area mb-30">
        <div class="widget-title">
            <h5>Buscar</h5>
        </div>
        <div class="widget-content">
            <?php get_search_form(); ?>
        </div>
    </div>
    <!-- Widget Area -->
    <div class="single-widget-area mb-30">
        <div class="widget-title">
            <h5>Tags</h5>
        </div>
        <div class="widget-content">
            <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar Widgets')): ?>
            <div class='warning'> No está el widget activo.....lo siento</div>
            <?php endif ?>    
        </div>
    </div>
    <!-- Widget Area -->
    <div class="single-widget-area mb-30">
        <div class="widget-title">
            <h5>Last Entries</h5>
        </div>
        <div class="widget-content">
            <?php 
                $args = array (
                    'type' => 'postbypost',
                    'limit' => 5,
                );
                wp_get_archives( $args );
            ?>
        </div>
    </div>
    <!-- Widget Area -->
    <div class="single-widget-area mb-30">
        <div class="widget-title">
            <h5>Authors</h5>
        </div>
        <div class="widget-content">
            <?php 
                wp_list_authors('hide_empty=0');
            ?>
        </div>
    </div>
     <!-- Widget Area -->
    <div class="single-widget-area mb-30">
        <div class="widget-title">
            <h5>Categorias</h5>
        </div>
        <div class="widget-content">
            <?php 
                wp_list_categories('title_li');
            ?>
        </div>
    </div>
    <!-- Widget Area -->
    <div class="single-widget-area mb-30">
        <div class="widget-title">
            <h5>List Pages</h5>
        </div>
        <div class="widget-content">
            <?php 
                wp_list_pages('title_li');
            ?>
        </div>
    </div>
     <!--Widget Area -->
    <div class="single-widget-area mb-30">
        <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/bg-img/add.gif" alt=""></a>
    </div>

     <!--Widget Area -->
    <div class="single-widget-area mb-30">
        <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/bg-img/add2.gif" alt=""></a>
    </div>
</div>

<!--https://ide.c9.io/neomode/wordpress2108-->