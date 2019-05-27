<?php get_header(); ?>

<main>
  <hr>
  [front-page]

  <div>
    <?php
    if (have_posts()) :
    while (have_posts()) :
    the_post();
    ?>
    <a href="<?php the_permalink(); ?>">
      <?php if(has_post_thumbnail()): ?>
        <?php the_post_thumbnail(); ?>
      <?php else: ?>
        <img src="https://placehold.jp/3d4070/ffffff/500x500.png?text=NoImage" alt="<?php the_title(); ?>">
      <?php endif; ?>
    </a>
    <time><?php the_time('Y.m.d'); ?></time>
    <a href="<?php the_permalink(); ?>">
      <?php
      if(strlen($post->post_title)>86) {
        $title= mb_strcut($post->post_title,0,84);
        echo $title. … ;
      } else {
        echo $post->post_title;
      }
      ?>
    </a>
    <?php
    endwhile;
    else:
    ?>
    <p>まだ記事がありません。</p>
    <?php
    endif;
    ?>
  </div>

  <hr>
</main>

<?php get_footer(); ?>
