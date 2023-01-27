<?php

/**
 * The template for displaying quote post formats
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage TailKick
 * @since TailKick 0.1
 * @version 0.1
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <?php
  if (is_sticky() && is_home()) :
    echo tailkick_get_svg(array('icon' => 'thumb-tack'));
  endif;
  ?>

  <div class="border-b pb-3 mb-3 entry-content">
    <div class="w-full flex items-center mb-4">
      <div class="text-base my-0 py-0">
        <a class="font-bold text-black hover:text-gray-600 active:text-gray-500" href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
          <?php the_author(); ?>
        </a>
        <span><?php echo tailkick_time_link(); ?></span>
      </div>
      <div class="ml-auto mr-0"><?php tailkick_edit_link(); ?></div>
    </div>

    <div class="flex flex-col items-center sm:items-start sm:flex-row space-x-3">
      <div class="pt-4 <?php echo (get_the_post_thumbnail() !== '') ? 'mr-1.5' : '' ?> post-thumbnail">
        <?php if (!is_single() && !is_front_page()) : ?>
          <a href="<?php the_permalink(); ?>">
          <?php endif; ?>
          <?php if (get_the_post_thumbnail() !== '') : ?>
            <figure class="w-24 h-24 overflow-hidden rounded-full">
              <?php the_post_thumbnail('tailkick-featured-image', array('class' => 'object-cover object-center w-full h-full')); ?>
            </figure>
          <?php endif; ?>
          <?php if (!is_single() && !is_front_page()) : ?>
          </a>
        <?php endif; ?>
      </div>

      <div class="max-w-xl">
        <?php
        the_content(
          sprintf(
            /* translators: %s: Post title. Only visible to screen readers. */
            __('<span class="underline text-sm text-teal-600 visited:text-teal-600 hover:text-teal-500 active:text-teal-400">Continue Reading</span><span class="' . sr_only_classes(array('screen-reader-text')) . '">"%s"</span>', 'tailkick'),
            get_the_title()
          )
        );
        ?>
      </div>

      <?php
      wp_link_pages(
        array(
          'before' => '<div class="page-links">' . __('Pages:', 'tailkick'),
          'after' => '</div>',
          'link_before' => '<span class="page-number">',
          'link_after' => '</span>',
        )
      );
      ?>

    </div>
  </div>

  <?php
  if (is_single()) {
    tailkick_entry_footer();
  }
  ?>

</article>
