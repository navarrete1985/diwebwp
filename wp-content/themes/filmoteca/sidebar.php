<div class="blog-sidebar-area ">
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
            <h5>Últimas Entradas</h5>
        </div>
        <div class="widget-content remove-li-style container-list-ico last-entries-sidebar">
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
                $args = [
                    'orderby'       => 'post_count',
                    'order'         => 'ASC',
                    'number'        => null,
                    'optioncount'   => true,
                    'hide_empty'    => false,
                    'echo'          => false,
                    'style'         => '<i class="fas fa-user-tie"></i>'
                ];
                
                $content = wp_list_authors($args);
                // $content = preg_replace('/<\/a> \(([0-9]+)\)/', ' <span class="heavyblue pull-right">\\1</span></a>', $content);
                $authors = explode(",", $content);
                $content = '<ul>';
                foreach($authors as $author) {
                    $count = preg_replace('/<\/a> \(([0-9]+)\)/', ' <span class="heavyblue pull-right">(\\1)</span></a>', $author);
                    $content .= '<li>' . $count . '</li>'; 
                }
                $content .= '</ul>';
                echo $content;
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
                // wp_list_categories('title_li');
                $content = '<ul>';
                $categories = get_categories();
                foreach($categories as $category) {
                    $content .= '<li><a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name .'<span class="heavyblue pull-right">(' . $category->category_count . ')</span></a></li>';
                }
                $content .= '</ul>';
                echo $content;
            ?>
        </div>
    </div>
    <!-- Widget Area -->
    <div class="single-widget-area mb-30 ">
        <div class="widget-title">
            <h5>Lista de Páginas</h5>
        </div>
        <div class="widget-content remove-li-style pages-sidebar">
            <?php 
                wp_list_pages('title_li');
            ?>
        </div>
    </div>
</div>
<!--https://ide.c9.io/neomode/wordpress2108-->