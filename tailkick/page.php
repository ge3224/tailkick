<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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
    if ((is_single() || (is_page() && !tailkick_is_frontpage())) && has_post_thumbnail(get_queried_object_id())) :
      echo '<div class="relative h-64 py-6 flex overflow-hidden items-end single-featured-image-header">';
      echo '<div class="absolute top-0 left-0 -z-10">';
      echo get_the_post_thumbnail(get_queried_object_id(), 'tailkick-featured-image', array('class' => 'w-full h-auto object-cover object-center'));
      echo '</div>';
      echo '<div class="w-full max-w-6xl mx-auto">';
      echo the_title('<h2 class="font-bold text-3xl text-black z-10">', '</h2>');
      echo '</div>';
      echo '</div>';
    endif;
    /*    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?> */
    ?>

    <div class="w-full max-w-6xl mx-auto site-content-contain">
      <div id="content" class="<?php echo (has_post_thumbnail()) ? 'py-8' : 'pt-32 pb-8'; ?> site-content">
        <div class="wrap">
          <div id="primary" class="content-area">
            <main id="main" class="site-main">
              <?php if ((is_single() || (is_page() && !tailkick_is_frontpage())) && !has_post_thumbnail(get_queried_object_id())) : ?>
                <?php the_title('<h1 class="font-bold text-4xl">', '</h2>'); ?>
              <?php endif; ?>
              <div class="grid grid-cols-6">
                <div class="col-span-5 pr-24">
                  <?php

                  while (have_posts()) :
                    the_post();

                    get_template_part('template-parts/page/content', 'page');

                    // If comments are open or we have at least one comment, load up the comment template.
                    if (comments_open() || get_comments_number()) :
                      comments_template();
                    endif;

                  endwhile; // End the loop.

                  ?>
                </div>
                <div>
                  <?php get_sidebar(); ?>
                </div>
              </div>
            </main>
          </div>
        </div>
      </div>
    </div>
    <?php get_footer(); ?>
  </div>

</body>

</html>
