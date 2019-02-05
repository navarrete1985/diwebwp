<div class="blog-sidebar-area mt-5">
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
            <div class='warning'> No está el widget activo.....lo siento </div>
            <?php endif ?>    
        </div>
    </div>
    </div>
    <!-- Widget Area -->
    <div class="single-widget-area mb-30">
        <div class="widget-title">
            <h5>Last Entries</h5>
        </div>
        <div class="widget-content remove-li-style container-list-ico">
            <?php 
                $args = array (
                    'type'  => 'postbypost',
                    'limit' => 5,
                    'before'=> '<i class="far fa-bookmark"></i>',
                    'after' => '<hr>',
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
        <div class="widget-content remove-li-style">
            <?php 
                // wp_list_authors([
                //     'hide_empty' => 0,
                //     'optioncount'=> 1
                // ]);
                $args = array (
                    'orderby'       => 'post_count', 
                    'order'         => 'ASC', 
                    'number'        => null,
                    'optioncount'   => true, 
                    'hide_empty'     => false,
                    'echo' => false,
                );
                $authors = wp_list_authors( $args ); 
                $authors = preg_replace('/<\/a> \(([0-9]+)\)/', '<span class="heavyblue pull-right">\\1</span></a>', $authors);
                // $authors = explode('<li>', $authors);
                // $resutl = '';
                // foreach($authors as $author) {
                //     $result .= '<i class="fas fa-user-tie"></i>' . $author;
                // }
                echo $authors;
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
</div>
<!--https://ide.c9.io/neomode/wordpress2108-->