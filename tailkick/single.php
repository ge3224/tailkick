<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage TailKick
 * @since TailKick 0.1
 * @version 0.1
 */
?>

<!DOCTYPE html>
<html class="h-full no-js no-svg" <?php language_attributes(); ?>>
<?php get_header(); ?>

<body <?php body_class('min-h-full flex flex-col'); ?>>
  <?php wp_body_open(); ?>
  <div id="page" class="site">
    <a class="<?php echo sr_only_classes(array('skip-link', 'screen-reader-text')); ?>" href="#content"><?php _e('Skip to content', 'tailkick'); ?></a>
    <header id="masthead" class="site-header">
      <?php if (has_nav_menu('primary')) : ?>
        <div class="navigation-top">
          <div class="relative wrap">
            <?php get_template_part('template-parts/navigation/navigation', 'primary'); ?>
          </div>
        </div>
      <?php endif; ?>
    </header>

    <?php

    /*
     * If a regular post or page, and not the front page, show the featured image.
     * Using get_queried_object_id() here since the $post global may not be set before a call to the_post().
     */
    if ((is_single() || (is_page() && !tailkick_is_frontpage())) && has_post_thumbnail(get_queried_object_id()) &&  !featured_image_exception(get_post_format())) :
      echo '<div class="px-4 xl:px-0 mt-28 w-full max-w-6xl mx-auto single-featured-image-header">';
      echo get_the_post_thumbnail(get_queried_object_id(), 'tailkick-featured-image', array('class' => 'rounded-sm'));
      echo '</div>';
    endif;
    ?>

    <div class="w-full max-w-6xl mx-auto px-4 xl:px-0 site-content-contain">
      <div id="content" class="<?php echo (has_post_thumbnail() &&  !featured_image_exception(get_post_format())) ? 'py-8' : 'pt-24 md:pt-32 pb-8'; ?> site-content">
        <div class="wrap">
          <div id="primary" class="content-area">
            <main id="main" class="site-main">
              <div class="lg:grid lg:grid-cols-6">
                <div class="lg:col-span-5 lg:pr-24">
                  <?php
                  // Start the Loop.
                  while (have_posts()) :

                    the_post();

                    get_template_part('template-parts/post/content', get_post_format());

                    // If comments are open or we have at least one comment, load up the comment template.
                    if (comments_open() || get_comments_number()) :
                      comments_template();
                    endif;

                    tailkick_posts_navigation();

                  endwhile; // End the loop.
                  ?>
                </div>
                <div class="mt-3 md:mt-0 border-t md:border-none pt-3 md:pt-0">
                  <?php get_sidebar(); ?>
                </div>
              </div>
            </main>
          </div>
          <div class="md:col-span-2 lg:col-span-1 mt-3 md:mt-0 border-t md:border-none pt-3 md:pt-0">
            <?php get_sidebar(); ?>
          </div>
        </div>
      </div>
    </div>
    <?php get_footer(); ?>
  </div>
</body>

</html>
