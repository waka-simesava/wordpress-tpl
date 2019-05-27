<?php

// ==================================================
// ページ送り（ページ番号）
// ==================================================
/**
* 出力関数
* $paged : 現在のページ
* $pages : 全ページ数
* $range : 左右に何ページ表示するか
* $show_only : 1ページしかない時に表示するかどうか
*/
function pagination( $pages, $paged, $range = 2, $show_only = false ) {

  $pages = ( int ) $pages; // float型で渡ってくるので明示的に int型 へ
  $paged = $paged ?: 1; // get_query_var('paged')をそのまま投げても大丈夫なように

  //表示テキスト
  // $text_first   = "« 最初へ";
  // $text_before  = "‹ 前へ";
  // $text_next    = "次へ ›";
  // $text_last    = "最後へ »";
  $text_first   = "«";
  $text_before  = "‹";
  $text_next    = "›";
  $text_last    = "»";

  if ( $show_only && $pages === 1 ) {
    // １ページのみで表示設定が true の時
    echo '<div class="wp-pagenavi"><span class="current pager">1</span></div>';
    return;
  }

  if ( $pages === 1 ) return; // １ページのみで表示設定もない場合

  if ( 1 !== $pages ) {
    //２ページ以上の時
    echo '<div class="wp-pagenavi"><span class="pages">Page ', $paged ,' of ', $pages ,'</span>';
    if ( $paged > $range + 1 ) {
      // 「最初へ」 の表示
      echo '<a href="', get_pagenum_link(1) ,'" class="first">', $text_first ,'</a>';
    }
    if ( $paged > 1 ) {
      // 「前へ」 の表示
      echo '<a href="', get_pagenum_link( $paged - 1 ) ,'" class="prev">', $text_before ,'</a>';
    }
    for ( $i = 1; $i <= $pages; $i++ ) {

      if ( $i <= $paged + $range && $i >= $paged - $range ) {
        // $paged +- $range 以内であればページ番号を出力
        if ( $paged === $i ) {
          echo '<span class="current pager">', $i ,'</span>';
        } else {
          echo '<a href="', get_pagenum_link( $i ) ,'" class="pager">', $i ,'</a>';
        }
      }

    }
    if ( $paged < $pages ) {
      // 「次へ」 の表示
      echo '<a href="', get_pagenum_link( $paged + 1 ) ,'" class="next">', $text_next ,'</a>';
    }
    if ( $paged + $range < $pages ) {
      // 「最後へ」 の表示
      echo '<a href="', get_pagenum_link( $pages ) ,'" class="last">', $text_last ,'</a>';
    }
    echo '</div>';
  }
}

// ==================================================
// ページャー（前後）
// ==================================================

function wp_paging_nav($query) {
  if ( $query->max_num_pages < 2 ) {
    return;
  }

  $paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
  $pagenum_link = html_entity_decode( get_pagenum_link() );
  $query_args   = array();
  $url_parts    = explode( '?', $pagenum_link );
  $pages = '';

  if ( isset( $url_parts[1] ) ) {
    wp_parse_str( $url_parts[1], $query_args );
  }
  if($pages == '') {
    $pages = $query->max_num_pages;
    if(!$pages)
    {
      $pages = 1;
    }
  }

  $pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
  $pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

  $format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
  $format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';
  $total   = $query->max_num_pages;

  // Set up paginated links.
  $links = paginate_links( array(
    'base'     => $pagenum_link,
    'format'   => $format,
    'total'    => $total,
    'current'  => $paged,
    'mid_size' => 1,
    'add_args' => array_map( 'urlencode', $query_args ),
    'prev_text' => __( '前へ' ),
    'next_text' => __( '次へ' ),
  ) );

  if ( $links ) :

  ?>
  <div class="c-navigation">
    <?php echo $links; ?>
  </div><!-- .navigation -->
  <?php
  endif;
}
