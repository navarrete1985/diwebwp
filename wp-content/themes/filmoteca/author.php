<?php
    $curauth = (get_query_var('author_name')) ? get_user_by('slug',
    get_query_var('author_name')) : get_userdata(get_query_var('author'));
    echo $curauth->user_nicename . '<br>';
    echo $curauth->description;
    
    
?>
  
<body data-spy=scroll data-target=#main-nav-collapse data-offset=100>
    <div class=page-loader>
        <div class=loader>Loading...</div>
    </div>
    <?php get_template_part('templates/nav','front');?>
    <header id=header class="home-parallax home-fade dark-bg header-inner">
        <div class=color-overlay></div>
        <div class=container>
            <h1><?php echo $curauth->user_nicename; ?></h1>
            <h3><?php echo get_author_role($curauth->ID); ?> Esto es el rol</h3>
           
        </div>
    </header>
    <section id=blog-standard class="section blog-standard">
         <p><?php echo $curauth->description; ?></p>
         <p><?php the_author_meta('twitter', $curauth->ID); ?></p>
         <p><?php the_author_meta('facebook', $curauth->ID); ?></p>
         <p><?php the_author_meta('linkedin', $curauth->ID); ?></p>
         <p><?php the_author_meta('skill1', $curauth->ID); echo '    '; the_author_meta('skill1V', $curauth->ID); ?></p>
         <p><?php the_author_meta('skill2', $curauth->ID); echo '    ';the_author_meta('skill2V', $curauth->ID); ?></p>
         <p><?php the_author_meta('skill3', $curauth->ID); echo '    ';the_author_meta('skill3V', $curauth->ID); ?></p>
         <p><?php the_author_meta('skill4', $curauth->ID); echo '    ';the_author_meta('skill4V', $curauth->ID); ?></p>
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
    </section>   
<!--< ?php get_footer(); ?>-->

