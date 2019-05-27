<?php

// ==================================================
// 広告関連の関数
// ==================================================

// --------------------------------------------------
// 本文中にアドセンスコードを自動挿入する
// --------------------------------------------------

function add_ads_before_h2($the_content) {
if (is_single()) {
$ads = <<< EOF
ここにアドセンスコード「置き換えてください」
EOF;
$h2 = '/^.+?<\/h2>$/im';//H2見出しのパターン

if ( preg_match_all( $h2, $the_content, $h2s )) {
  if ( $h2s[0] ) {

    // 1つ目のh2見出しの上にアドセンス挿入
    if ( $h2s[0][0] ) {
      $the_content  = str_replace($h2s[0][0], $ads.$h2s[0][0], $the_content);
    }

    // 3つ目のh2見出しの上にアドセンス挿入
    if ( $h2s[0][2] ) {
      $the_content  = str_replace($h2s[0][2], $ads.$h2s[0][2], $the_content);
    }

    // 5つ目のh2見出しの上にアドセンス挿入
    if ( $h2s[0][4] ) {
      $the_content  = str_replace($h2s[0][4], $ads.$h2s[0][4], $the_content);
    }

    // 7つ目のh2見出しの上にアドセンス挿入
    if ( $h2s[0][6] ) {
      $the_content  = str_replace($h2s[0][6], $ads.$h2s[0][6], $the_content);
    }

  }
}
}
return $the_content;
}
add_filter('the_content','add_ads_before_h2');
