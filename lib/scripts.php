<?php

// ==================================================
// CSSやJavascript関連の関数
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
    // if ( strpos( $url, 'jquery-migrate.min.js' ) ) return $url;
    if ( strpos( $url, 'scripts.js' ) ) return $url;

    // 'jquery.js'以外は async属性を付与して非同期にする
    return "$url' async charset='UTF-8";
  }

  add_filter( 'clean_url', 'add_async_to_enqueue_script', 11, 1 );
}

// --------------------------------------------------
// ロードする JS ファイルの設定
// --------------------------------------------------

function add_files() {
  // WordPressプラグインにより追加されるjquery.jsをロードしない場合
  // wp_deregister_script('jquery');

  // // 任意に追加されたjQueryファイルをロードする場合
  // wp_enqueue_script( 'jquery', get_stylesheet_directory_uri() . '/_assets/js/jquery-1.9.1.js', "", "20180906", false );

  // サイトで使用される共通のJS
  wp_enqueue_script( 'smart-script', get_stylesheet_directory_uri() . '/_assets/js/app.js', "", '20180906', true );

  // wp_enqueue_script( 'smart-script', get_stylesheet_directory_uri() . '/_assets/js/app.js', array( 'jquery' ), '20180906', true );
}
add_action('wp_enqueue_scripts', 'add_files');
