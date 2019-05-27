<?php

// ==================================================
// タイトル出力の関数
// ==================================================

// --------------------------------------------------
// `wp_title` : <title> タグ出力フォーマット
// --------------------------------------------------

function my_wp_title( $title, $sep ) {
  global $paged, $page;
  if ( is_feed() ) {
    return $title;
  }
  $title .= get_bloginfo( 'name' );
  $site_description = get_bloginfo( 'description', 'display' );
  if ( $paged >= 2 || $page >= 2 ) {
    $title = "$title $sep " . sprintf( __( 'Page %s', '' ), max( $paged, $page ) );
  }
  return $title;
}
add_filter( 'wp_title', 'my_wp_title', 10, 2 );

// --------------------------------------------------
// `the_archive_title` : アーカイブタイトルの接頭辞削除（`タグ:`など）
// --------------------------------------------------

add_filter( 'get_the_archive_title', function ($title) {
  if ( is_category() ) {
    /* translators: Category archive title. 1: Category name */
    $title = sprintf( __( '%s' ), single_cat_title( '', false ) );
  } elseif ( is_tag() ) {
    /* translators: Tag archive title. 1: Tag name */
    $title = sprintf( __( '%s' ), single_tag_title( '', false ) );
  } elseif ( is_author() ) {
    /* translators: Author archive title. 1: Author name */
    $title = sprintf( __( '%s' ), '<span class="vcard">' . get_the_author() . '</span>' );
  } elseif ( is_year() ) {
    /* translators: Yearly archive title. 1: Year */
    $title = sprintf( __( '%s' ), get_the_date( _x( 'Y', 'yearly archives date format' ) ) );
  } elseif ( is_month() ) {
    /* translators: Monthly archive title. 1: Month name and year */
    $title = sprintf( __( '%s' ), get_the_date( _x( 'F Y', 'monthly archives date format' ) ) );
  } elseif ( is_day() ) {
    /* translators: Daily archive title. 1: Date */
    $title = sprintf( __( '%s' ), get_the_date( _x( 'F j, Y', 'daily archives date format' ) ) );
  } elseif ( is_tax( 'post_format' ) ) {
    if ( is_tax( 'post_format', 'post-format-aside' ) ) {
      $title = _x( 'Asides', 'post format archive title' );
    } elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
      $title = _x( 'Galleries', 'post format archive title' );
    } elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
      $title = _x( 'Images', 'post format archive title' );
    } elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
      $title = _x( 'Videos', 'post format archive title' );
    } elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
      $title = _x( 'Quotes', 'post format archive title' );
    } elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
      $title = _x( 'Links', 'post format archive title' );
    } elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
      $title = _x( 'Statuses', 'post format archive title' );
    } elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
      $title = _x( 'Audio', 'post format archive title' );
    } elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
      $title = _x( 'Chats', 'post format archive title' );
    }
  } elseif ( is_post_type_archive() ) {
    /* translators: Post type archive title. 1: Post type name */
    $title = sprintf( __( '%s' ), post_type_archive_title( '', false ) );
  } elseif ( is_tax() ) {
    $tax = get_taxonomy( get_queried_object()->taxonomy );
    /* translators: Taxonomy term archive title. 1: Taxonomy singular name, 2: Current taxonomy term */
    $title = sprintf( __( '%2$s' ), $tax->labels->singular_name, single_term_title( '', false ) );
  } else {
    $title = __( 'Archives' );
  }

  return $title;
});
