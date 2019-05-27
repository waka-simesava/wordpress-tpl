<?php

// ==================================================
// パスとURLの定義
// ==================================================

// --------------------------------------------------
// テーマに ACF を含める記述
// --------------------------------------------------

// 参照 : https://www.advancedcustomfields.com/resources/including-acf-within-a-plugin-or-theme/

// ACF プラグインへのパスとURLの定義
define( 'MY_ACF_PATH', get_stylesheet_directory() . '/lib/acf/' );
define( 'MY_ACF_URL', get_stylesheet_directory_uri() . '/lib/acf/' );

// ACF プラグインを含める
include_once( MY_ACF_PATH . 'acf.php' );

// URL設定をカスタマイズし、誤ったアセットURLを修正
add_filter('acf/settings/url', 'my_acf_settings_url');
function my_acf_settings_url( $url ) {
  return MY_ACF_URL;
}

// （オプション）ACF管理メニュー項目の非表示化
add_filter('acf/settings/show_admin', 'my_acf_settings_show_admin');
function my_acf_settings_show_admin( $show_admin ) {
  return false;
}

// --------------------------------------------------
// テーマに Imsanity を含める記述
// --------------------------------------------------

// Imsanity プラグインへのパスとURLの定義
define( 'MY_IMSANITY_PATH', get_stylesheet_directory() . '/lib/imsanity/' );
define( 'MY_IMSANITY_URL', get_stylesheet_directory_uri() . '/lib/imsanity/' );

// Imsanity プラグインを含める
include_once( MY_IMSANITY_PATH . 'imsanity.php' );
