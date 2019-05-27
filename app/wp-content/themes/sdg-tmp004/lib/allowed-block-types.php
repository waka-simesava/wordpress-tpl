<?php

// ==================================================
// Gutenberg ブロック設定
// https://www.nxworld.net/wordpress/wp-gutenberg-remove-default-block.html
// ==================================================

add_filter( 'allowed_block_types', 'custom_allowed_block_types', 10, 2 );
function custom_allowed_block_types( $allowed_block_types, $post ) {

  // --------------------------------------------------
  // コラム
  // --------------------------------------------------

  if ( $post->post_type === 'column' ) {
    $allowed_block_types = array(
      'core/heading',
      'core/paragraph',
      'core/image',
    );
  }

  // --------------------------------------------------
  // 投稿
  // --------------------------------------------------

  if ( $post->post_type === 'post' ) {
    $allowed_block_types = array(
      // 一般ブロック
      'core/heading',
      'core/paragraph',
      'core/image',
      'core/quote',
      'core/list',
      'core/cover',
      // フォーマット
      'core/freeform',
      'core/html',
      'core/preformatted',
      'core/pullquote',
      'core/table',
      'core/verse',
      // レイアウト要素
      'core/nextpage',
      'core/separator',
    );
  }
  return $allowed_block_types;
}
