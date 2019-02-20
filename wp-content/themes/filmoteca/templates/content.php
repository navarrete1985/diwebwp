<!-- Single Post Start -->
<div class="single-blog-post mb-100 wow fadeInUp" data-wow-delay="100ms">
    <!-- Post Thumb -->
    <div class="blog-post-thumb mt-30">
        <!--<a href="#"><img src="img/bg-img/blog1.jpg" alt=""></a>-->
        <div class="img bg-img pb-70 bg-position-top" style="background-image: url(<?= the_post_thumbnail_url() ?>);"></div>
        <!-- Post Date -->
        <div class="post-date">
            <span><?php echo get_the_date('d'); ?></span>
            <span><?php echo get_the_date('M Y'); ?></span>
        </div>
    </div>

    <!-- Blog Content -->
    <div class="blog-content">
        <!-- Post Title -->
        <a href="<?php the_permalink(); ?>" class="post-title"><?php the_title(); ?></a>
        <!-- Post Meta -->
        <div class="post-meta d-flex mb-30">
            <p class="post-author">Autor<a href="#"> <?php echo get_the_author(); ?></a></p>
            <?php
                $categories = wp_get_post_categories($post->ID);
                foreach($categories as $cat) {
                    $categorie = get_category($cat);
                    echo '<p class="tags"><a href=' . get_category_link($cat)  . '>' . $categorie->name . '</a></p>';
                }
            ?>
            <p class="tags"><i class="far fa-comments"></i>  <a href="#"><?= get_comments_number($post->ID) ?> Comentarios</a></p>
            <p class="tags"><i class="far fa-eye"></i>  <a href="#"><?= get_num_visits($post->ID, false) ?></a></p>
        </div>
        <!-- Post Excerpt -->
        <!--<p>Pellentesque sit amet velit a libero viverra porta non eu justo. Vivamus mollis metus sem, ac sodales dui lobortis. Pellentesque sit amet velit a libero viverra porta non eu justo. Vivamus mollis metus sem, ac sodales dui lobortis.</p>-->
        <?php the_excerpt(); ?>
    </div>
</div>