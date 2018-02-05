<!doctype html>
<html class="l-html no-js" <?php language_attributes(); ?>>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <!-- <meta property="og:image" content="<?php echo get_theme_file_uri( 'assets/img/userfiles/og-image.png' ); ?>" /> -->

    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no">


  <link rel="shortcut icon" href="<?php echo home_url( '/favicon.ico' ); ?>" />
  <link rel="manifest" href="<?php echo home_url( '/site.webmanifest' ); ?>" />
  <link rel="apple-touch-icon" href="<?php echo home_url( '/icon.png' ); ?>" />

  <!--<meta name="theme-color" content="#ed1c24" />-->

  <?php wp_head(); ?>
  <?php get_template_part( 'template-parts/scripts', 'header' ); ?>
</head>
<body>
  <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  <div class="container">
      <header class="header">
          <a href="" class="header__logo">
              <?php bloginfo( 'name' ); ?>.
          </a>
          <?php if ( has_nav_menu( 'header' ) ): ?>
              <nav class="navigation">
                  <?php
                  wp_nav_menu( array(
                      'theme_location' => 'header',
                      'container'      => false,
                      'menu_class'     => 'navigation__list',
                      'fallback_cb'    => false,
                      'depth'          => 1,
                      'walker'         => new nc_Walker_Nav_Menu,
                  ) );
                  ?>
              </nav>
          <?php endif; ?>
          <div class="header__menuBtn js-menuOpen">
              <i class="fa fa-bars fa-2x" aria-hidden="true"></i>
          </div>
      </header>

    <div class="l-content">
