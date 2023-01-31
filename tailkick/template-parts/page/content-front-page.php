<?php

/**
 * Displays content for front page
 *
 * @package WordPress
 * @subpackage TailKick
 * @since TailKick 0.1
 * @version 0.1
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('tailkick-panel '); ?>>
  <?php

  if (has_post_thumbnail()) :
    $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'tailkick-featured-image');

    // Calculate aspect ratio: h / w * 100%.
    $ratio = $thumbnail[2] / $thumbnail[1] * 100;

  ?>
    <div class="panel-image" style="background-image: url(<?php echo esc_url($thumbnail[0]); ?>);">
      <div class="panel-image-prop" style="padding-top: <?php echo esc_attr($ratio); ?>%"></div>
    </div>
  <?php endif; ?>

  <div class="panel-content">
    <div class="wrap">
      <section class="entry-header">
        <?php tailkick_edit_link(get_the_ID()); ?>
      </section>
      <div class="entry-content">
        <?php

        $before = '<span class="underline text-sm text-teal-600 visited:text-teal-600 hover:text-teal-500 active:text-teal-400">';

        the_content(
          sprintf(
            /* translators: %s: Post title. Only visible to screen readers. */
            $before . esc_html__('Continue Reading', 'tailkick') . '</span><span class="' . sr_only_classes(array('screen-reader-text')) . '">' . esc_html__('%s', 'tailkick') . '</span>',
            get_the_title()
          )
        );
        wp_link_pages(
          array(
            'before' => '<div class="page-links">' . __('Pages:', 'tailkick'),
            'after'  => '</div>',
          )
        );
        ?>
      </div>
    </div>
  </div>
</article>
