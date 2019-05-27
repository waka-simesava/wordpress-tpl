<?php

// ==================================================
// 不要なモノを削除する関数
// ==================================================

// --------------------------------------------------
// 絵文字スクリプトの無効化・削除
// --------------------------------------------------

function disable_emoji() {
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  // remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  // remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
}
add_action( 'init', 'disable_emoji' );

// --------------------------------------------------
// <head>内のWordPressのバージョン表記を削除
// --------------------------------------------------

remove_action('wp_head','wp_generator');

// --------------------------------------------------
// EditURI（xmlrpc :外部ツールから投稿を行う機能）のリンク削除
// --------------------------------------------------

remove_action( 'wp_head', 'rsd_link' );

// --------------------------------------------------
// Windows Live Writer リンク削除
// --------------------------------------------------

remove_action( 'wp_head', 'wlwmanifest_link' );
