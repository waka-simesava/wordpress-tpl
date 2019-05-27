<?php

// ==================================================
// 管理画面のメニュー削除
// ==================================================

// --------------------------------------------------
// 既存メニューの削除
// --------------------------------------------------

function remove_menus () {
  global $menu;
  if (!current_user_can('administrator')) {
    // 管理者ではない場合
    unset($menu[2]);  // ダッシュボード
  }
  // unset($menu[4]);  // メニューの線1
  // unset($menu[5]);  // 投稿
  unset($menu[6]);  // トリ博士
  // unset($menu[10]); // メディア
  // unset($menu[15]); // リンク
  // unset($menu[20]); // ページ
  unset($menu[25]); // コメント
  // unset($menu[59]); // メニューの線2
  // unset($menu[60]); // テーマ
  // unset($menu[65]); // プラグイン
  // unset($menu[70]); // プロフィール
  if (!current_user_can('administrator')) {
    // 管理者ではない場合
    unset($menu[75]); // ツール
  }
  // unset($menu[80]); // 設定
  // unset($menu[90]); // メニューの線3
}

add_action('admin_menu', 'remove_menus');


// --------------------------------------------------
// 特定のプラグインのメニューを削除
// --------------------------------------------------

// aioseop_class.php
// function remove_plugin_setting_page() {
//   // remove_menu_page('all-in-one-seo-pack');
//   remove_menu_page('all-in-one-seo-pack/aioseop_class.php');
// }
//
// add_action('admin_init', 'remove_plugin_setting_page', 99);

function remove_plugin_setting_page() {
  global $submenu;
  // unset($submenu['options-general.php'][46]); // Imsanity
  remove_submenu_page('options-general.php', 'home/japanakadori/nippon-akadori.or.jp/public_html/wp/wp-content/themes/dest/lib/imsanity/settings.php'); // Imsanity
}

add_action('admin_menu', 'remove_plugin_setting_page');


// --------------------------------------------------
// （検証用）メニュー配列の値を調べる
// --------------------------------------------------

// メニューの配列

function conf_menus () {
  global $menu;
  echo('<div class="pre-wrap"><pre>');
  var_dump($menu);
  echo('</pre></div><style>.pre-wrap {position: fixed;top: 0;left: 0;right: 0;bottom: 0;z-index: 10000;background: rgba(0,0,0,.8);display: -webkit-flex;display: -ms-flex;display: flex;align-items: center;justify-content: center;}.pre-wrap pre {width: 80%;height: 80%;overflow-y: scroll;color: white;background: #292C33;padding: 1em;border-radius: .2em;}</style>');
}
// add_action('admin_menu', 'conf_menus');

// サブメニューの配列

function conf_submenus () {
  global $submenu;
  echo('<div class="pre-wrap"><pre>');
  var_dump($submenu);
  echo('</pre></div><style>.pre-wrap {position: fixed;top: 0;left: 0;right: 0;bottom: 0;z-index: 10000;background: rgba(0,0,0,.8);display: -webkit-flex;display: -ms-flex;display: flex;align-items: center;justify-content: center;}.pre-wrap pre {width: 80%;height: 80%;overflow-y: scroll;color: white;background: #292C33;padding: 1em;border-radius: .2em;}</style>');
}
// add_action('admin_menu', 'conf_submenus');
