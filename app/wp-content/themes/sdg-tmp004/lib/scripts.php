<?php

// ==================================================
// Javascript関連の関数
// ==================================================

// --------------------------------------------------
// レンダリングをブロックする JavaScript を除去
// --------------------------------------------------

// WordPressがwp_headに自動で呼び出すJavaScript（管理画面以外で適用する）
if (!(is_admin() )) {
  function add_async_to_enqueue_script( $url ) {
    // '.js' 以外は対象外
    if ( FALSE === strpos( $url, '.js' ) ) return $url;

    // 'jquery.js'は、asyc（非同期）対象外
    if ( strpos( $url, 'jquery.js' ) ) return $url;
    if ( strpos( $url, 'app.js' ) ) return $url;

    // 'jquery.js'以外は async属性を付与して非同期にする
    return "$url' async charset='UTF-8";
  }

  add_filter( 'clean_url', 'add_async_to_enqueue_script', 11, 1 );
}

// --------------------------------------------------
// ロードする JS ファイルの設定
// --------------------------------------------------

if (!(is_admin() )) {

  function add_files() {
    // WordPressプラグインにより追加されるjquery.jsをロードしない場合
    // wp_deregister_script('jquery');

    // // 任意に追加されたjQueryファイルをロードする場合
    // wp_enqueue_script( 'jquery', get_stylesheet_directory_uri() . '/_assets/js/jquery-1.9.1.js', '', "20180906", false );

    // サイトで使用される共通のJS
    wp_enqueue_script( 'app', get_stylesheet_directory_uri() . '/_assets/js/app.js', '', '', true );

    // wp_enqueue_script( 'smart-script', get_stylesheet_directory_uri() . '/_assets/js/app.js', array( 'jquery' ), '20180906', true );
  }
  add_action('wp_enqueue_scripts', 'add_files');

}

// --------------------------------------------------
// script タグの不要な属性の調整
// --------------------------------------------------

if (!(is_admin() )) {

  // type 属性

  function remove_script_type($tag) {
    return str_replace("type='text/javascript' ", "", $tag);
  }
  add_filter('script_loader_tag','remove_script_type');

  // charset 属性

  function remove_charset($tag) {
    return str_replace("charset='UTF-8'", "", $tag);
  }
  add_filter('script_loader_tag','remove_charset');

  // プラグイン等の外部ファイル

  add_action('wp_loaded', 'prefix_output_buffer_start');
  function prefix_output_buffer_start() {
    ob_start("prefix_output_callback");
  }

  add_action('shutdown', 'prefix_output_buffer_end');
  function prefix_output_buffer_end() {
    ob_end_flush();
  }

  function prefix_output_callback($buffer) {
    return preg_replace( "%[ ]type=[\'\"]text\/(javascript|css)[\'\"]%", '', $buffer );
  }

  // JS・CSSに付加されるWPバージョン(?ver=4.4.2など)の削除

  function remove_src_wp_ver( $dep ) {
    $dep->default_version = '';
  }
  add_action( 'wp_default_scripts', 'remove_src_wp_ver' );
  add_action( 'wp_default_styles', 'remove_src_wp_ver' );
}

// --------------------------------------------------
//一部機能・プラグインを除外しREST APIを無効
// --------------------------------------------------

// if (!(is_admin() )) {
//
//   function deny_restapi_except_plugins( $result, $wp_rest_server, $request ){
//     $namespaces = $request->get_route();
//
//     //oembedの除外
//     if( strpos( $namespaces, 'oembed/' ) === 1 ){
//         return $result;
//     }
//
//     //Jetpackの除外
//     if( strpos( $namespaces, 'jetpack/' ) === 1 ){
//         return $result;
//     }
//
//     //Contact Form7の除外
//     if( strpos( $namespaces, 'contact-form-7/' ) === 1 ){
//         return $result;
//     }
//
//     return new WP_Error( 'rest_disabled', __( 'The REST API on this site has been disabled.' ), array( 'status' => rest_authorization_required_code() ) );
//   }
//   add_filter( 'rest_pre_dispatch', 'deny_restapi_except_plugins', 10, 3 );
//
//   // `rel="https://api.w.org/"` 削除
//   remove_action('wp_head','rest_output_link_wp_head');
//   // `type="application/json+oembed"` 削除
//   remove_action('wp_head','wp_oembed_add_discovery_links');
//   // `type="text/xml+oembed"` 削除
//   remove_action('wp_head','wp_oembed_add_host_js');
// }
