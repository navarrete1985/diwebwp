<div class='row justify-content-center'>
    <h1 class='text-center'>POST RELACIONADOS</h1>
</div>
<div class='row'>
    <?php
        
        $id = $post->ID;
        
        $categories = get_the_category($id);
        $category = [];
        foreach($categories as $item) {
            $category[] = $item->term_id;
        }
        
        $args = array(
            'posts_per_page' => 3,
            'orderby'        => 'date',
            'category__in'    => $category,//Admite un array de id de categorias, por lo que me falla al pasarle un array de categorias....recorrer con un fo y meter id de cada una de las categorias
            'post__not_in'  => array($id_destacado)
        );
        $custom_query = new WP_Query($args);
    
    if($custom_query->have_posts()):
        while($custom_query->have_posts()):
            $custom_query->the_post() 
    ?>
        <div class='col-md-4 single-album-area wow fadeInUp resume-post'>
            <div class="img bg-img pb-70" style="background-image:url('<?= the_post_thumbnail_url() ?>')">
            </div>
            <h5><?= get_the_author() ?></h5>
            <p><?= excerpt(20) ?></p>
            <a class="btn oneMusic-btn m-2 align-self-end" href="<?= the_permalink() ?>" >Saber más</a>
        </div>
    <?php endwhile;
            endif;
        wp_reset_query();
    ?>
</div>
<hr>
<div class='row mt-5'>
    <div class='col-md-2 text-center'>
        <div class='circle-image mb-2'>
            <?= get_avatar($id, 55, null, 'Foto autor') ?>    
        </div>
        <?= the_author_posts_link() ?>
    </div>
    <div class='col-md-10'>
        <p><?= the_author_description() ?></p>
    </div>
</div>
<hr>


<!--< ?php-->
<!--		$id=get_the_author_meta('ID');-->
<!--		$avatar=get_avatar($id, 48, get_template_directory_uri() .'/images/user_default.png', 'Foto autor', array('class' => 'avatar-xs'));-->
<!--	?>-->
<!--	<img src="< ?php echo $avatar ?>" class="pull-left img-circle" alt="">-->
<!--	<h4><a href="#">< ?php the_author(); ?></a></h4>-->
<!--	<h4><a href="#">< ?php echo $avatar;?></a></h4>-->
<!--	<p>-->
<!--	< ?php -->
<!--		the_author_description(); -->
<!--	?>-->
<!--<ul class="list-inline social-share">-->
<!--	<li><a href="#"><i class="fab fa-facebook"></i></a></li>-->
<!--	<li><a href="#"><i class="fab fa-twitter"></i></a></li>-->
<!--	<li><a href="#"><i class="fab fa-instagram"></i></a></li>-->
<!--</ul>-->