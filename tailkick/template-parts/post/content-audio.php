<?php

/**
 * Template part for displaying audio posts
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
      the_title('<h1 class="font-bold text-3xl entry-title">', '</h1>');
    } elseif (is_front_page() && is_home()) {
      the_title('<h3 class="font-bold text-2xl entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h3>');
    } else {
      the_title('<h2 class="pt-3 pb-0 font-bold text-black text-2xl entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
    }
    ?>
  </header>

  <div class="mb-4 border-b pb-4">

    <?php
    $content = apply_filters('the_content', get_the_content());
    $audio   = false;

    // Only get audio from the content if a playlist isn't present.
    if (false === strpos($content, 'wp-playlist-script')) {
      $audio = get_media_embedded_in_content($content, array('audio'));
    }

    ?>

    <?php if (get_the_post_thumbnail() !== '') : ?>
      <div class="bg-gray-400 relative w-full h-72 rounded flex flex-col justify-center items-center entry-content">

        <div class="absolute opacity-25 top-0 left-0 bottom-0 right-0 post-thumbnail">
          <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('tailkick-featured-image', array('class' => 'object-cover w-full h-full object-center')); ?>
          </a>
        </div>
      <?php else : ?>
        <div class="entry-content">
        <?php endif; ?>

        <?php
        if (!is_single()) {

          // If not a single post, highlight the audio file.
          if (!empty($audio)) {
            foreach ($audio as $audio_html) {
              echo '<div class="entry-audio">';
              echo $audio_html;
              echo '</div>';
            }
          }
        }

        if (is_single() || empty($audio)) {

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
      </div>

      <?php
      if (is_single()) {
        tailkick_entry_footer();
      }
      ?>

</article>
