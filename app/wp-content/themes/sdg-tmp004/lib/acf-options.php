<?php

// ==================================================
// ACF Options Page の設定
// ==================================================

// --------------------------------------------------
// 参考：
// [ACF | Options Page](https://www.advancedcustomfields.com/resources/options-page/)
// [Advanced Custom Fields のアドオンのオプションページの表示方法](https://hirashimatakumi.com/blog/3842.html)
// --------------------------------------------------

if( function_exists('acf_add_options_page') ) {

  // ------------------------------
  // 親ページ
  // ------------------------------

  acf_add_options_page(array(
    // ページ内のタイトル
    'page_title' 	=> '更新箇所',
    // サイドバーメニューのタイトル
    'menu_title'	=> '更新箇所',
    // メニュースラッグ
    'menu_slug' 	=> 'induction',
    // このメニューが表示されるユーザーの権限
    // e.g.
    // https://wpdocs.osdn.jp/%E3%83%A6%E3%83%BC%E3%82%B6%E3%83%BC%E3%81%AE%E7%A8%AE%E9%A1%9E%E3%81%A8%E6%A8%A9%E9%99%90
    'capability'	=> 'edit_posts',
    // リダイレクト
    // trueにすると、このオプションページの最初の子ページにリダイレクト。つまり、メニュー名としてだけ使うときにtrueにする。
    // ただし子ページがいないと無効。falseにした場合は、この親ページ自体もページとして存在できる。デフォルトはtrue。
    'redirect'		=> false,
    // メニューの位置（小数で書くと衝突する可能性を減らせる）
    'position' => 4.1,
    // Dashicons（メニューアイコン）
    'icon_url' => 'dashicons-slides',
  ));
}
