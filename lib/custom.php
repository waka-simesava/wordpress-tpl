<?php

// ==================================================
// その他カスタマイズの関数
// ==================================================

// --------------------------------------------------
// 固定ページにて［抜粋］を有効化
// --------------------------------------------------

add_post_type_support( 'page', 'excerpt' );

// --------------------------------------------------
// 投稿のラベルを変更
// --------------------------------------------------

function change_post_menu_label() {
  global $menu;
  global $submenu;
  $menu[5][0] = 'トピックス';
  $menu[5][3] = '3';
  $submenu['edit.php'][5][0] = 'トピックス一覧';
  $submenu['edit.php'][10][0] = '新規追加';
  $submenu['edit.php'][16][0] = 'タグ';
  //echo ”;
}
function change_post_object_label() {
  global $wp_post_types;
  $labels = &$wp_post_types['post']->labels;
  $menu_icon = &$wp_post_types['post']->menu_icon;
  $menu_icon = 'dashicons-clipboard';
  $labels->name = 'トピックス';
  $labels->singular_name = 'トピックス';
  $labels->add_new = _x('新規追加', 'トピックス');
  $labels->add_new_item = '新規追加';
  $labels->edit_item = 'トピックスの編集';
  $labels->new_item = '新規追加';
  $labels->view_item = 'トピックスを表示';
  $labels->search_items = 'トピックス検索';
  $labels->not_found = 'トピックスが見つかりませんでした';
  $labels->not_found_in_trash = 'ゴミ箱のトピックスにも見つかりませんでした';
}
add_action( 'init', 'change_post_object_label' );
add_action( 'admin_menu', 'change_post_menu_label' );

// --------------------------------------------------
// 抜粋文言の長さの変更
// --------------------------------------------------

function new_excerpt_mblength($length) {
  return 100;
}
add_filter('excerpt_mblength', 'new_excerpt_mblength');

// --------------------------------------------------
// 抜粋文言の文末の記号の変更
// --------------------------------------------------

function custom_excerpt_more($more) {
  return ' ... ';
}
add_filter('excerpt_more', 'custom_excerpt_more');
