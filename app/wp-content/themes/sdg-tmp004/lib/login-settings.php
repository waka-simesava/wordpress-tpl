<?php

// ==================================================
// ログイン画面の設定
// ==================================================

// --------------------------------------------------
// メールアドレスによるログインを無効化
// --------------------------------------------------

remove_filter( 'authenticate', 'wp_authenticate_email_password', 20 );

// --------------------------------------------------
// ログインフォームのラベルの変更
// --------------------------------------------------

function my_gettext_login( $translated_text, $text, $domain ) {
  if ( 'wp-login.php' === $GLOBALS['pagenow'] ) {
    if ( $domain == 'default' && $text === 'Username or Email Address' ) {
      // 「ユーザー名またはメールアドレス」ラベルを「ユーザー名」のみに
      $translated_text = __( 'Username' );
    }
  }
  return $translated_text;
}

add_filter( 'gettext', 'my_gettext_login', 20, 3 );
