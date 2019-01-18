<?php
 
    get_header();
?>

<body data-spy=scroll data-target=#main-nav-collapse data-offset=100>
    <div class=page-loader>
        <div class=loader>Loading...</div>
    </div>
   
    <?php get_template_part('templates/nav', 'front'); ?>
    <header id=header class="home-parallax home-fade dark-bg header-archives">
        <!--<div class="color-overlay"></div>-->
        <div class=container>
            <h1>Surfing my Blog</h1>
           
        </div>
    </header>
    <br/>
    <section class="blog-standard">
       <div class="container">   
            <div class="row blog-masonry-3col">
                    
                    <!-- Blog Item -->
                    <div class="col-md-4 col-sm-6 col-xs-12 blog-masonry-item mb25">
                        <div class="blog-one">
                           <div class="blog-one-body">
                                <h4 class="blog-title heavyblue"><a href="#">Last Entries ...</a></h4>
                                <p class="">
                                <ul class="archivesulentries">
                                    <?php 
                                        $args = array (
                                            'type' => 'postbypost',
                                            'show_post_count' => 1,
                                            'post_type'     => 'post',
                                            'after' => '<hr class="hrsoft">',
                                        );
                                        wp_get_archives( $args );
                                    ?>
                                    </ul>
                                    <p class=""></p>
                            </div>
                            <div class="blog-one-footer">
                                <a href="#"> </a>
                                &nbsp;
                                <br />
                                 
                            </div>
                        </div>
                    </div>
                    
                    <!-- Blog Item -->
                    <div class="col-md-4 col-sm-6 col-xs-12 blog-masonry-item mb25">
                        <div class="blog-one">
                            
                            <div class="blog-one-body">
                                <h4 class="blog-title"><a href="#">My Excursions</a></h4>
                                <p class="">
                                    <ul class="archivesulentries">
                                   <?php 
                                        $args = array (
                                            'type' => 'postbypost',
                                            'limit' => 5,
                                            'show_post_count' => 1,
                                            'post_type' => 'excursions',
                                        );
                                        wp_get_archives( $args );
                                    ?>
                                    </ul>
                                </p>
                            </div>
                            <div class="blog-one-footer">
                                <a href="#"> </a>
                                &nbsp;
                                <br />
                                 
                            </div>
                        </div>
                    </div>
                    
                    <!-- Blog Item -->
                    <div class="col-md-4 col-sm-6 col-xs-12 blog-masonry-item mb25">
                        <div class="blog-one">
                         
                            <div class="blog-one-body">
                                <h4 class="blog-title"><a href="#">Category List</a></h4>
                                <p class="">
                                    <ul class="archivesulcat">
                                    <?php
                                        $categories = wp_list_categories('title_li=&show_count=1&echo=0');
                                        $categories = preg_replace('/<\/a> \(([0-9]+)\)/', ' <span class="heavyblue pull-right">\\1</span></a>', $categories);
                                        echo $categories;
                                    ?>
                                    </ul>
                                </p>
                            </div>
                            <div class="blog-one-footer">
                                <a href="#"> </a>
                                &nbsp;
                                <br />
                                 
                            </div>
                        </div>
                    </div>
                    
                    <!-- Blog Item -->
                    <div class="col-md-4 col-sm-6 col-xs-12 blog-masonry-item mb25">
                        <div class="blog-one">
                         
                       
                            <div class="blog-one-body">
                                <h4 class="blog-title"><a href="#">Tag List</a></h4>
                                <p class="montse">
                                    <ul class="archivesulcat">
                                    <?php
                                      list_tags();
                                    ?>
                                    </ul>
                                </p>
                            </div>
                            <div class="blog-one-footer">
                                <a href="#"> </a>
                                &nbsp;
                                <br />
                                 
                            </div>
                        </div>
                    </div>
                    
                    <!-- Blog Item -->
                    <div class="col-md-4 col-sm-6 col-xs-12 blog-masonry-item mb25">
                        <div class="blog-one">
                            
                            <div class="blog-one-body">
                                <h4 class="blog-title"><a href="#">Authors</a></h4>
                                <p class="">
                                   <ul class="archivesulcat">
                                    <?php
                                        $args = array (
                                            'orderby'       => 'post_count', 
                                            'order'         => 'ASC', 
                                            'number'        => null,
                                            'optioncount'   => true, 
                                            'hide_empty'     => false,
                                            'echo' => false,
                                        );
                                        $authors = wp_list_authors( $args ); 
                                        $authors = preg_replace('/<\/a> \(([0-9]+)\)/', ' <span class="heavyblue pull-right">\\1</span></a>', $authors);
                                        echo $authors;
                                    ?>
                                    </ul>
                                </p>
                            </div>
                            <div class="blog-one-footer">
                                <a href="#"> </a>
                                &nbsp;
                                <br />                             
                                 
                            </div>
                        </div>
                    </div>
                    <?php
                        $authors = get_users(array( 'fields' => array( 'display_name', 'ID' ) )); // es una colección de objetos tipo autor
                        foreach($authors as $auth) {
                        
                    ?>    
                    <!-- Blog Item -->
                    <div class="col-md-4 col-sm-6 col-xs-12 blog-masonry-item mb25">
                        <div class="blog-one">
                            
                            <div class="blog-one-body">
                                <h4 class="blog-title"><a href="#" >Post by <span class="heavyblue"><?php echo $auth->display_name;?></span></a></h4>
                                <p class="">
                                    <?php
                                            $args = array (  
                                                'author'        =>  $auth->ID, //$current_user->ID,
                                                'orderby'       =>  'post_date',
                                                'order'         =>  'ASC',
                                            );
                                       $post_by_author = get_posts( $args );
                                       echo '<ul class="archivesulentries">';
                                       foreach ( $post_by_author as $post) {
                                           echo '<li><a href="'.get_permalink($post->ID).'"> '.$post->post_title.'</a></li><hr class="hrsoft">';
                                       }
                                       echo '</ul>';
                                    ?> 
                                </p>
                            </div>
                            <div class="blog-one-footer">
                                <a href="#"> </a>
                                &nbsp;
                                <br />                               
                                 
                            </div>
                        </div>
                    </div>
                    <?php 
                        }
                    ?>
                    <!-- Blog Item -->
                    <div class="col-md-4 col-sm-6 col-xs-12 blog-masonry-item mb25">
                        <div class="blog-one">
                            
                            <div class="blog-one-body">
                                <h4 class="blog-title"><a href="#">Daily Archives</a></h4>
                                <p class="">
                                    <ul class="archivesulcat">
                                     <?php 
                                        $args = array (
                                            'type' => 'daily',
                                            'show_post_count' => 1,
                                            'echo' => false,
                                        );
                                        $dailypost = wp_get_archives( $args );
                                        // Le insertamos una clase al contador de posts
                                        $dailypost = preg_replace( '~(&nbsp;)(\(\d++\))~', '$1<span class="heavyblue pull-right">$2</span>', $dailypost );
                                        $dailypost = preg_replace('/[\(\)]/', '', $dailypost);  // Le quitamos los paréntesis a los números
                                        echo $dailypost;
                                     
                                        //wp_get_archives( $args );
                                    ?>
                                    </ul>
                                </p>
                            </div>
                            <div class="blog-one-footer">
                                 <a href="#"> </a>
                                &nbsp;
                                <br />     
                            </div>
                        </div>
                    </div>
                    
                    <!-- Blog Item -->
                    <div class="col-md-4 col-sm-6 col-xs-12 blog-masonry-item mb25">
                        <div class="blog-one">
                            
                            <div class="blog-one-body">
                                <h4 class="blog-title"><a href="#"> Monthly Archives</a></h4>
                                <p class="">
                                    <ul class="archivesulcat">
                                   <?php 
                                        $args = array (
                                            'type' => 'monthly',
                                            'show_post_count' => 1,
                                            'echo' => false,
                                        );
                                        $monthly = wp_get_archives( $args );
                                        // Le insertamos una clase al contador de posts
                                        $monthly = preg_replace( '~(&nbsp;)(\(\d++\))~', '$1<span class="heavyblue pull-right">$2</span>', $monthly );
                                        $monthly = preg_replace('/[\(\)]/', '', $monthly);  // Le quitamos los paréntesis a los números
                                        echo $monthly;
                                    ?>
                                    </ul>
                                </p>
                            </div>
                            <div class="blog-one-footer">
                                <a href="#"> </a>
                                &nbsp;
                                <br />                                   
                                 
                            </div>
                        </div>
                    </div>
                    
                    <!-- Blog Item -->
                    <div class="col-md-4 col-sm-6 col-xs-12 blog-masonry-item mb25">
                        <div class="blog-one">
                             
                            <div class="blog-one-body">
                                <h4 class="blog-title"><a href="#"> Yearly Archives</a></h4>
                                <p class="">
                                    <ul class="archivesulcat">
                                   <?php 
                                        $args = array (
                                            'type' => 'yearly',
                                            'show_post_count' => 1,
                                            'echo' => false,
                                        );
                                        $yearly = wp_get_archives( $args );
                                        // Le insertamos una clase al contador de posts
                                        $yearly = preg_replace( '~(&nbsp;)(\(\d++\))~', '$1<span class="heavyblue pull-right">$2</span>', $yearly );
                                        $yearly = preg_replace('/[\(\)]/', '', $yearly);  // Le quitamos los paréntesis a los números
                                        echo $yearly;
                                    ?> 
                                    </ul>
                                </p>
                            </div>
                            <div class="blog-one-footer">
                         <a href="#"> </a>
                                &nbsp;
                                <br />                                 
                                 
                            </div>
                        </div>
                    </div>
                    
                    <!-- Blog Item -->
                    <div class="col-md-4 col-sm-6 col-xs-12 blog-masonry-item mb25">
                        <div class="blog-one">
                             
                            <div class="blog-one-body">
                                <h4 class="blog-title"><a href="#">Most Popular Posts</a></h4>
                                <p class="">
                                <?php
                                    $args = array( 
                                        'posts_per_page' => null, 
                                        'meta_key' => 'post_views_count',
                                        'orderby' => 'meta_value_num', 
                                        'order' => 'DESC'  
                                    );
                                    $popularpost = new WP_Query( $args );
                                    while ( $popularpost->have_posts() ) : $popularpost->the_post();
                                           $views = absint(preg_replace('/[a-zA-Z]/','', getPostViews( $post->ID ) ) );
                                           echo '<i class="fa fa-chevron-circle-right mygrey"></i>&nbsp;&nbsp;&nbsp;<a href="'.get_the_permalink($post->ID).'">'. $post->post_title.' (<span class="heavyblue pull-right"><i class="fa fa-eye mygrey"></i>&nbsp;&nbsp;'.$views.'</span>)</a><br />';
                                    endwhile;
                                    wp_reset_query();
                                ?>
                                </p>
                            </div>
                            <div class="blog-one-footer">
                                <a href="#"> </a>
                                &nbsp;
                                <br />                              
                                 
                            </div>
                        </div>
                    </div>
                    
                    <!-- Blog Item -->
                    <div class="col-md-4 col-sm-6 col-xs-12 blog-masonry-item mb25">
                        <div class="blog-one">
                            
                            <div class="blog-one-body">
                                <h4 class="blog-title"><a href="#">Most Commented Post</a></h4>
                                <p class="">
                                    <?php
                                        $args = array (
                                          'orderby' => 'comment_count',
                                          'post_per_page' => null,
                                        );
                                        $most = new WP_Query( $args );
                                        echo '<ul class="archivesulentries">';
                                        while ( $most->have_posts() ) : $most->the_post();
                                               $num_comments = get_comments_number( $post->ID );
                                               echo '<li><a href="'.get_the_permalink($post->ID).'">'. $post->post_title.' <span class="heavyblue pull-right"> <i class="fa fa-comment mygrey"></i>&nbsp;&nbsp; '.$num_comments.'</span></a><br /></li>';
                                               echo '<hr class="hrsoft">';
                                         endwhile;
                                         echo '</ul>';
                                         wp_reset_query();
                                    ?>
                                </p>
                            </div>
                            <div class="blog-one-footer">
                                 <a href="#"> </a>
                                &nbsp;
                                <br />                                  
                                 
                            </div>
                        </div>
                    </div>
                    
                    <!-- Blog Item -->
                    <div class="col-md-4 col-sm-6 col-xs-12 blog-masonry-item mb25">
                        <div class="blog-one">
                             
                            <div class="blog-one-body">
                                <h4 class="blog-title"><a href="#">WhatEver Post</a></h4>
                                <p class="">
                                    
                                </p>
                            </div>
                            <div class="blog-one-footer">
                                 <a href="#"> </a>
                                &nbsp;
                                <br />                           
                                 
                            </div>
                        </div>
                    </div>
                    
                </div>
                
          
            </div>
        </div> 
    </section>
    <br/><br/>
<?php
    get_footer();
?>