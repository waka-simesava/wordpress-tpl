<?php

// 初期設定の関数
locate_template('lib/init.php', true);
// パスとURLの定義
locate_template('lib/defines.php', true);
// 不要なモノを削除する関数
locate_template('lib/cleanup.php', true);
// カスタム投稿タイプ
locate_template('lib/post-type.php', true);
// タイトル出力の関数
// locate_template('lib/titles.php', true);
// パンくずリストの関数
locate_template('lib/breadcrumbs.php', true);
// Javascript関連の関数
locate_template('lib/scripts.php', true);
// CSS関連の関数
locate_template('lib/style.php', true);
// サイドバー、ウィジェットの関数
locate_template('lib/widgets.php', true);
// ナビゲーションメニューの関数
locate_template('lib/navmenu.php', true);
// ページ送りの関数
locate_template('lib/pagenav.php', true);
// グーテンベルクのためのACFブロック
// locate_template('lib/acf-init.php', true);
// ACF Options Page の設定
locate_template('lib/acf-options.php', true);
// ログイン画面の設定
locate_template('lib/login-settings.php', true);
// 管理画面のメニュー削除
locate_template('lib/remove-menus.php', true);
// Gutenberg ブロック設定
locate_template('lib/allowed-block-types.php', true);
// その他カスタマイズの関数
locate_template('lib/custom.php', true);
