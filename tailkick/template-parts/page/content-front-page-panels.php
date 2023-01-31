<?php

/**
 * Template part for displaying pages on front page
 *
 * @package WordPress
 * @subpackage TailKick
 * @since TailKick 0.1
 * @version 0.1
 */

global $tailkickcounter;

?>

<article id="panel<?php echo $tailkickcounter; ?>" <?php post_class('tailkick-panel '); ?>>

  <?php
  if (has_post_thumbnail()) :
    $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'tailkick-featured-image');

    // Calculate aspect ratio: h / w * 100%.
    $ratio = $thumbnail[2] / $thumbnail[1] * 100;
  ?>

    <div class="panel-image" style="background-image: url(<?php echo esc_url($thumbnail[0]); ?>);">
      <div class="panel-image-prop" style="padding-top: <?php echo esc_attr($ratio); ?>%"></div>
    </div><!-- .panel-image -->

  <?php endif; ?>

  <div class="panel-content">
    <div class="wrap">
      <header class="entry-header">
        <?php the_title('<h2 class="entry-title">', '</h2>'); ?>

        <?php tailkick_edit_link(get_the_ID()); ?>

      </header><!-- .entry-header -->

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
        ?>
      </div><!-- .entry-content -->

      <?php
      // Show recent blog posts if is blog posts page (Note that get_option returns a string, so we're casting the result as an int).
      if (get_the_ID() === (int) get_option('page_for_posts')) :
      ?>

        <?php
        // Show three most recent posts.
        $recent_posts = new WP_Query(
          array(
            'posts_per_page'      => 3,
            'post_status'         => 'publish',
            'ignore_sticky_posts' => true,
            'no_found_rows'       => true,
          )
        );
        ?>

        <?php if ($recent_posts->have_posts()) : ?>

          <div class="recent-posts">

            <?php
            while ($recent_posts->have_posts()) :
              $recent_posts->the_post();
              get_template_part('template-parts/post/content', 'excerpt');
            endwhile;
            wp_reset_postdata();
            ?>
          </div><!-- .recent-posts -->
        <?php endif; ?>
      <?php endif; ?>

    </div><!-- .wrap -->
  </div><!-- .panel-content -->

</article><!-- #post-<?php the_ID(); ?> -->
