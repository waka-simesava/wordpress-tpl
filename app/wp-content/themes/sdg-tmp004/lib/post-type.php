<?php

// ==================================================
// カスタム投稿タイプ
// ==================================================

// --------------------------------------------------
// 鶏のコラム
// --------------------------------------------------
function create_post_type() {
  // カスタム投稿名
  $customPostTypeName = 'column';
  $customPostTypeLabel = 'トリ博士';
  // supports のパラメータを設定する配列
  $cusomSupports = [
    'title',           // タイトル
    'editor',          // エディター
    'thumbnail',       // アイキャッチ画像
    // 'excerpt',         // 抜粋
    // 'trackbacks',      // トラックバック送信
    'custom-fields',   // カスタムフィールド
    // 'comments',        // コメント
    // 'revisions',       // リビジョンの保存
    'author',          // 作成者（登録者）
    'page-attributes', // ページ属性
    'post-formats',    // 投稿のフォーマットの追加（投稿フォーマットを参照）
  ];
  $labels = array(
    // 投稿タイプの一般名（通常は複数形）
    'name' => $customPostTypeLabel,
    // この投稿タイプのオブジェクト 1 個の名前（単数形）
    'singular_name' => $customPostTypeLabel,
    // メニュー名のテキスト（メニュー項目の名前を決める文字列）
    'menu_name' => $customPostTypeLabel,
    // 管理バーの「新規追加」ドロップダウンに入れる名前
    'name_admin_bar' => '新規追加',
    // メニューの「すべての〜」に使うテキスト
    'all_items' => 'すべての'.$customPostTypeLabel,
    // 「新規追加」のテキスト
    'add_new' => '新規追加',
    // 「新規〜を追加」のテキスト
    'add_new_item' => '新規'.$customPostTypeLabel.'を追加',
    // 「〜を編集」のテキスト
    'edit_item' => $customPostTypeLabel.'を編集',
    // 「新規〜」のテキスト
    'new_item' => '新規'.$customPostTypeLabel,
    // 「〜を表示」のテキスト
    'view_item' => $customPostTypeLabel.'を表示',
    // 「〜を検索」のテキスト"。
    'search_items' => $customPostTypeLabel.'を検索',
    // 「〜が見つかりませんでした」のテキスト
    'not_found' => $customPostTypeLabel.'が見つかりませんでした',
    // 「ゴミ箱内に〜が見つかりませんでした」のテキスト
    'not_found_in_trash' => 'ゴミ箱内に'.$customPostTypeLabel.'が見つかりませんでした',
    // 「親〜：」のテキスト
    'parent_item_colon' => '親の'.$customPostTypeLabel,
  );
  $args = array(
    // 投稿タイプのラベルの配列
    'labels' => $labels,
    // 投稿タイプの簡潔な説明。
    'description' => '',
    // 一般公開
    'public' => true,
    // 一般公開クエリー可
    'publicly_queryable' => true,
    // UI を表示
    'show_ui' => true,
    // ナビゲーションメニューに表示
    'show_in_nav_menus' => true,
    // REST API で表示（ブロックエディタ使用する場合は必須）
    'show_in_rest' => true,
    // アーカイブあり
    'has_archive' => false,
    // 検索結果から除外
    'exclude_from_search' => false,
    // 権限タイプ
    'capability_type' => 'post',
    // 階層
    'hierarchical' => false,
    // リライト（カスタムリライトスラッグ）
    // 'rewrite' => false,
    'rewrite' => array(
      'slug' => 'column',
      'with_front' => false
    ),
    // メニューに表示
    'show_in_menu' => true,
    // クエリー変数
    'query_var' => false,
    // メニューの位置
    'menu_position' => 6,
    // メニューアイコン
    'menu_icon' => 'dashicons-welcome-learn-more',
    // サポート
    'supports' => $cusomSupports,
    // 利用するタクソノミー
    'taxonomies' => array(),
  );

  register_post_type( $customPostTypeName, $args );

}
add_action( 'init', 'create_post_type' );
