<?php

// ==================================================
// CSS関連の関数
// ==================================================

function add_style_files() {
  // サイト共通のCSSの読み込み
  wp_enqueue_style( 'theme', get_stylesheet_directory_uri() . '/_assets/css/theme.css', '', '' );
}
add_action( 'wp_enqueue_scripts', 'add_style_files' );
