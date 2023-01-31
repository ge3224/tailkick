<?php

/**
 * Template part for displaying aside posts
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
  if (is_sticky() && is_home()) :
    echo tailkick_get_svg(array('icon' => 'thumb-tack'));
  endif;
  ?>

  <div class="border border-gray-g00 bg-none rounded p-2.5 entry-content">

    <?php if (get_the_post_thumbnail() !== '') : ?>
      <div class="mb-3 w-full max-h-96 rounded-sm overflow-hidden post-thumbnail">
        <a href="<?php the_permalink(); ?>">
          <?php the_post_thumbnail('tailkick-featured-image', array('class' => 'object-cover object-center')); ?>
        </a>
      </div>
    <?php endif; ?>

    <div>

      <div class="w-full flex items-center mb-2">
        <div class="mr-2 w-10 h-10 rounded-full overflow-hidden bg-gray-300">
          <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
            <?php echo get_avatar(get_the_author_meta('ID'), 40, 'mm', 'Author Avatar'); ?>
          </a>
        </div>
        <div>
          <div class="text-base my-0 py-0">
            <a class="font-bold text-black hover:text-gray-600 active:text-gray-500" href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
              <?php the_author(); ?>
            </a>
          </div>
          <div class="text-xs text-gray-500 mr-2 my-0 py-0">
            <span><?php echo tailkick_time_link(); ?></span>
          </div>
        </div>
        <div class="ml-auto mr-0"><?php tailkick_edit_link(); ?></div>
      </div>

      <?php

      echo '<a href="' . esc_url(get_permalink()) . '" rel="bookmark">';

      $before = '<span class="underline text-sm text-teal-600 visited:text-teal-600 hover:text-teal-500 active:text-teal-400">';

      the_content(
        sprintf(
          /* translators: %s: Post title. Only visible to screen readers. */
          $before . esc_html__('Continue Reading', 'tailkick') . '</span><span class="' . sr_only_classes(array('screen-reader-text')) . '">' . esc_html__('%s', 'tailkick') . '</span>',
          get_the_title()
        )
      );
      echo '</a>';

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
