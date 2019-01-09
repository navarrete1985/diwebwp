
<div class="blog-sidebar-area">

        <!-- Widget Area -->
        <div class="single-widget-area mb-30">
            <div class="widget-title">
                <h5>Categories</h5>
            </div>
            <div class="widget-content">
                <h4>Tag cloud</h4>
                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar Widgets')): ?>
                <div class='warning'> No está el widget activo.....lo siento</div>
                <?php endif ?>
            </div>
            <div class="widget last-entries">
        <div class=widget-title>
            <h4>Last Entries</h4>
        </div>
            <div class=widget-content>
            <?php 
                $args = array (
                    'type' => 'postbypost',
                    'limit' => 5,
                   
                );
                wp_get_archives( $args );
            ?>
        </div>
      </div>
      <div class="widget my_authors">
            <div class=widget-title>
                <h4>Authors</h4>
            </div>
                <div class=widget-content>
                <?php 
                    wp_list_authors();
                ?>
            </div>
      </div>
      <div class="widget my_authors">
            <div class=widget-title>
                <h4>List Pages</h4>
            </div>
                <div class=widget-content>
                <?php 
                    wp_list_pages('title_li');
                ?>
            </div>
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