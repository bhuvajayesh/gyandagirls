<!DOCTYPE html>
<html lang="en-US" prefix="og: http://ogp.me/ns#">

<head>
    <?php wp_head(); ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php bloginfo('name'); ?> <?php wp_title(); ?>
        <?php if (is_front_page()) {
            echo "| ";
            bloginfo('description');
        } ?>
    </title>
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.ico" />
    <link type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/bootstrap.min.css"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.5.3/build/css/intlTelInput.css">
    <link type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/footer.css" rel="stylesheet">
    <link type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/header.css" rel="stylesheet">
    <link type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/custom-style.css"
        rel="stylesheet">
    <link type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/custom-media.css"
        rel="stylesheet">
</head>

<body>
    <div id="preloader">
        <div id="status"><span></span></div>
    </div>
    <?php wp_body_open(); ?>
    <header class="headermain">
        <div class="site-header" role="banner">
            <div class="container">
                <div class="header-inner">
                    <div class="logo">
                        <a href="<?php echo site_url(); ?>" class="d-inline-block">
                            <?php $logoimg = get_header_image(); ?>
                            <img src="<?php echo $logoimg; ?>" alt="Logo" class="logo-icon" />
                        </a>
                    </div>

                    <button class="toggleButton d-xl-none" aria-label="Toggle menu" aria-expanded="false">
                        <span class="one"></span>
                        <span class="two"></span>
                        <span class="three"></span>
                    </button>

                    <nav class="primary-navigation custom-nav" role="navigation" aria-label="Primary Navigation">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'primary_menu',
                            'container' => 'nav',
                            'menu_class' => '',
                        ));
                        ?>
                    </nav>

                    <div class="header-actions">
                        <a href="<?php echo site_url(); ?>/contact-us" class="default-btn-theme">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="page-overlay">