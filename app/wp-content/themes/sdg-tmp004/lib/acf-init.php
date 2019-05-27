<?php

// ==================================================
// グーテンベルクのためのACFブロック
// https://www.advancedcustomfields.com/blog/acf-5-8-introducing-acf-blocks-for-gutenberg/
// ==================================================

// --------------------------------------------------
// 1.ブロックを登録する
// https://www.advancedcustomfields.com/resources/acf_register_block_type/
// --------------------------------------------------

add_action('acf/init', 'my_acf_init');
function my_acf_init() {

  // check function exists
  if( function_exists('acf_register_block') ) {

    // register a testimonial block
    acf_register_block(array(
      // ブロックを識別する一意の名前
      'name' => 'marker',
      // ブロックの表示タイトル
      'title' => '蛍光ペン',
      // ブロックの簡単な説明
      'description' => '蛍光ペン',
      // render_templateを指定する代わりに、コールバック関数名を指定してブロックのHTMLを出力する
      'render_callback' => 'my_acf_block_render_callback',
      // カテゴリ [ common | formatting | layout | widgets | embed ]
      'category' => 'formatting',
      // WordPressのDashicons
      // 'icon' => 'admin-customizer',
      'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M7,20.58,6.19,22,2.41,19.85l.84-1.46h0l-.2-2.17.79-1.36-.54-.31a.37.37,0,0,1-.13-.5l1-1.66,7.66,4.42-1,1.67a.37.37,0,0,1-.5.13L9.8,18.3,9,19.66ZM18.52,4.42l-7-4A.38.38,0,0,0,11,.5L4.75,11.32l7.66,4.43L18.66,4.93A.37.37,0,0,0,18.52,4.42ZM.57,23.68H4.84l.56-1L2.22,20.87.57,23.68M7.89,22.2,7,23.67h16.2V22.2Z"/></svg>',
      // ユーザーが検索中にブロックを見つけやすくするための検索語の配列
      'keywords' => array( 'マーカー', '蛍光', 'ペン', 'marker' ),
    ));
  }
}
