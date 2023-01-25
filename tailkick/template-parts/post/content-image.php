<?php

/**
 * Template part for displaying image posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage TailKick
 * @since TailKick 0.1
 * @version 0.1
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('mb-8'); ?>>
  <?php
  if (is_sticky() && is_home()) {
    echo tailkick_get_svg(array('icon' => 'thumb-tack'));
  }
  ?>
  <header class="entry-header">
    <?php
    if ('post' === get_post_type()) {
      echo '<div class="flex items-center entry-meta">';
      if (is_single()) {
        tailkick_posted_on();
      } else {
        echo '<div>';
        echo tailkick_time_link();
        echo '</div>';
        echo '<div class="ml-auto mr-0">';
        tailkick_edit_link();
        echo '</div>';
      }
      echo '</div>';
    }

    if (is_single()) {
      the_title('<h1 class="pt-1 pb-0 entry-title">', '</h1>');
    } elseif (is_front_page() && is_home()) {
      the_title('<h3 class="pt-1 pb-0 entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h3>');
    } else {
      the_title('<h2 class="pt-1 pb-0 font-bold text-black text-2xl entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
    }
    ?>
  </header>

  <div class="mb-3 border-b pb-0 entry-content">

    <?php
    if (is_single() || '' === get_the_post_thumbnail()) {

      // Only show content if is a single post, or if there's no featured image.
      the_content(
        sprintf(
          /* translators: %s: Post title. Only visible to screen readers. */
          __('<span class="underline text-sm text-teal-600 visited:text-teal-600 hover:text-teal-500 active:text-teal-400">Continue Reading</span><span class="' . sr_only_classes(array('screen-reader-text')) . '"> "%s"</span>', 'tailkick'),
          get_the_title()
        )
      );

      wp_link_pages(
        array(
          'before'      => '<div class="page-links">' . __('Pages:', 'tailkick'),
          'after'       => '</div>',
          'link_before' => '<span class="page-number">',
          'link_after'  => '</span>',
        )
      );
    }
    ?>

  </div>

  <?php
  if (is_single()) {
    tailkick_entry_footer();
  }
  ?>

</article>
