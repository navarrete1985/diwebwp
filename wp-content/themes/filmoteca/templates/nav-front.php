<!-- Menu -->
<nav class="classy-navbar justify-content-between" id="oneMusicNav">

    <!-- Nav brand -->
    <a href="index.html" class="nav-brand"><img src="<?php echo get_template_directory_uri(); ?>/img/core-img/logo.png" alt=""></a>

    <!-- Navbar Toggler -->
    <div class="classy-navbar-toggler">
        <span class="navbarToggler"><span></span><span></span><span></span></span>
    </div>

    <!-- Menu -->
    <div class="classy-menu">

        <!-- Close Button -->
        <div class="classycloseIcon">
            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
        </div>

        <!-- Nav Start -->
        <div class="classynav">
            <ul>
                <li><a href="<?php echo get_option('home'); ?>">Inicio</a></li>
                <li><a href="<?php echo get_page_link(get_page_by_title('Películas')) ?>">Películas</a></li>
                <li><a href="<?php echo get_page_link(get_page_by_title('Galería')) ?>">Galería</a></li>
                <li><a href="<?php echo get_page_link(get_page_by_title('Eventos')) ?>">Eventos</a></li>
                <li><a href="<?php echo get_page_link(get_page_by_title('Blog')) ?>">Noticias</a></li>
                <li><a href="<?php echo get_page_link(get_page_by_title('Contacto')) ?>">Contacto</a></li>
                <li><a href="<?php echo get_page_link(get_page_by_title('Archivos')) ?>">Archivos</a></li>
                <li><a href="<?php echo get_page_link(get_page_by_title('Private')) ?>">Private</a></li>
            </ul>

            <!-- Login/Register & Cart Button -->
            <div class="login-register-cart-button d-flex align-items-center">
                <!-- Login/Register -->
                <div class="login-register-btn mr-50">
                    <a href="login.html" id="loginBtn">Login / Register</a>
                </div>

                <!-- Cart Button -->
                <div class="cart-btn">
                    <p><span class="icon-shopping-cart"></span> <span class="quantity">1</span></p>
                </div>
            </div>
        </div>
        <!-- Nav End -->

    </div>
</nav>