<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
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
    <a class="<?php echo sr_only_classes(array('skip-link', 'screen-reader-text')); ?>" href="#content"><?php esc_html_e('Skip to content', 'tailkick'); ?></a>
    <header id="masthead" class="site-header">
      <?php if (has_nav_menu('primary')) : ?>
        <div class="navigation-top">
          <div class="relative wrap">
            <?php get_template_part('template-parts/navigation/navigation', 'primary'); ?>
          </div>
        </div>
      <?php endif; ?>
      <?php get_template_part('template-parts/header/header', 'image'); ?>
    </header>

    <?php

    /*
	 * If a regular post or page, and not the front page, show the featured image.
	 * Using get_queried_object_id() here since the $post global may not be set before a call to the_post().
	 */
    if ((is_single() || (is_page() && !tailkick_is_frontpage())) && has_post_thumbnail(get_queried_object_id())) :
      echo '<div class="single-featured-image-header">';
      echo get_the_post_thumbnail(get_queried_object_id(), 'tailkick-featured-image');
      echo '</div>';
    endif;
    ?>

    <div class="site-content-contain">
      <div id="content" class="site-content">
        <div class="wrap">
          <div id="primary" class="content-area">
            <main id="main" class="site-main">

              <section class="error-404 not-found">
                <header class="page-header">
                  <h1 class="page-title"><?php _e('Oops! That page can&rsquo;t be found.', 'tailkick'); ?></h1>
                </header>
                <div class="page-content">
                  <p><?php _e('It looks like nothing was found at this location. Maybe try a search?', 'tailkick'); ?></p>

                  <?php get_search_form(); ?>

                </div>
              </section>
            </main>
          </div>
        </div>
      </div>

      <?php get_footer(); ?>
    </div>
  </div>

</body>

</html>
