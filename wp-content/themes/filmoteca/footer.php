<!-- ##### Footer Area Start ##### -->
    <footer class="footer-area">
        <div class="container">
            <div class="row d-flex flex-wrap align-items-center">
                <div class="col-12 col-md-6">
                    <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/core-img/logo.png" alt=""></a>
                    <p class="copywrite-text"><a href="#"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                </div>

                <div class="col-12 col-md-6">
                    <div class="footer-nav">
                        <ul>
                            <li><a href="<?php echo get_option('home'); ?>">Inicio</a></li>
                            <li><a href="<?php echo get_page_link(get_page_by_title('Películas')) ?>">Películas</a></li>
                            <li><a href="<?php echo get_page_link(get_page_by_title('Galería')) ?>">Galería</a></li>
                            <li><a href="<?php echo get_page_link(get_page_by_title('Eventos')) ?>">Eventos</a></li>
                            <li><a href="<?php echo get_page_link(get_page_by_title('Blog')) ?>">Noticias</a></li>
                            <li><a href="<?php echo get_page_link(get_page_by_title('Contacto')) ?>">Contacto</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <?php wp_footer(); ?>
</body>

</html>