<?php

/**
 * The template for displaying link post formats
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
    <div class="w-full flex items-center mb-2">
      <div class="text-base my-0 py-0">
        <a class="font-bold text-black hover:text-gray-600 active:text-gray-500" href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
          <?php the_author(); ?>
        </a>
        <span><?php echo tailkick_time_link(); ?></span>
      </div>
      <div class="ml-auto mr-0"><?php tailkick_edit_link(); ?></div>
    </div>

    <div class="flex items-center space-x-3">
      <div class="post-thumbnail">
        <?php if (!is_single() && !is_front_page()) : ?>
          <a href="<?php the_permalink(); ?>">
          <?php endif; ?>
          <?php if (get_the_post_thumbnail() !== '') : ?>
            <figure class="w-8 h-8 overflow-hidden rounded-sm">
              <?php the_post_thumbnail('tailkick-featured-image', array('class' => 'object-cover object-center w-full h-full')); ?>
            </figure>
          <?php else : ?>
            <div class="w-8 h-8 rounded-sm bg-gray-100">
              <svg class="w-full h-auto opacity-10" version="1.1" viewBox="0 0 700 700" xmlns="http://www.w3.org/2000/svg">
                <g transform="translate(0, 60)">
                  <path d="m505.84 324.43 115.87-115.87c11.051-11.051 11.051-29.004 0-40.055l-160.37-160.22c-11.051-11.051-29.004-11.051-40.055 0l-115.71 115.87 40.055 40.055 95.762-95.762 120.16 120.16-95.762 95.762zm-65.684-174.64-220.38 220.38 40.055 40.055 220.38-220.38zm-85.789 246.01-95.762 95.762-120.16-120.16 95.762-95.762-40.055-40.055-115.87 115.71c-11.051 11.051-11.051 29.004 0 40.055l160.22 160.37c11.051 11.051 29.004 11.051 40.055 0l115.87-115.87z" />
                </g>
              </svg>
            </div>
          <?php endif; ?>
          <?php if (!is_single() && !is_front_page()) : ?>
          </a>
        <?php endif; ?>
      </div>

      <?php
      the_content(
        sprintf(
          /* translators: %s: Post title. Only visible to screen readers. */
          __('Continue reading<span class="' . sr_only_classes(array('screen-reader-text')) . '">"%s"</span>', 'tailkick'),
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
      ?>

    </div>
  </div>

  <?php
  if (is_single()) {
    tailkick_entry_footer();
  }
  ?>

</article>
