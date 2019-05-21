<?php

// ==================================================
// ページャー
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
