<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <title><?php wp_title('');if(wp_title('', false))echo '｜';bloginfo('name'); ?></title>
  <meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, minimum-scale=1, user-scalable=no">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">
  <?php wp_head(); ?>
</head>

<body class="<?php if ( is_front_page() ) : ?>index<?php else: ?>lower<?php endif; ?>" data-tmpdir="<?php echo get_template_directory_uri(); ?>/" itemscope itemtype="http://schema.org/Webpage">

  <?php if(is_front_page()){
    get_template_part( 'inc/hero-index' );
  } else {
    get_template_part( 'inc/hero' );
    get_template_part( 'inc/breadcrumb' );
  }?>

  <header>
    <hr>
    ヘッダー
    <nav>
      nav（デフォルト）
      <?php wp_nav_menu(); ?>

      nav（カスタム）
      <?php
        wp_nav_menu(
          array(
            'menu'           => 'menu01',
            'menu_class'     => 'nav-menu',
            'theme_location' => 'primary',
          )
        );
      ?>

    </nav>
    <hr>
  </header>
