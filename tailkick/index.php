<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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
    <a class="<?php echo sr_only_classes( array('skip-link', 'screen-reader-text') ); ?>" href="#content"><?php _e( 'Skip to content', 'tailkick' ); ?></a>

    <header id="masthead" class="site-header">
      <?php if ( has_nav_menu( 'primary' ) ) : ?>
        <div class="navigation-top">
          <div class="relative wrap">
            <?php get_template_part( 'template-parts/navigation/navigation', 'primary' ); ?>
          </div>
        </div>
      <?php endif; ?>
    </header>

    <?php

      /*
      * If a regular post or page, and not the front page, show the featured image.
      * Using get_queried_object_id() here since the $post global may not be set before a call to the_post().
      */
      if ( ( is_single() || ( is_page() && ! tailkick_is_frontpage() ) ) && has_post_thumbnail( get_queried_object_id() ) ) :
        echo '<div class="single-featured-image-header">';
        echo get_the_post_thumbnail( get_queried_object_id(), 'tailkick-featured-image' );
        echo '</div>';
      endif;
    ?>

    <div class="site-content-contain">
      <div id="content" class="<?php echo ( has_post_thumbnail() ) ? 'py-8' : 'pt-32 pb-8'; ?> site-content">
        <div class="wrap">
          <?php if ( is_home() && ! is_front_page() ) : ?>
          <header class="w-full max-w-6xl mx-auto page-header">
            <h1 class="page-title"><?php single_post_title(); ?></h1>
          </header>
          <?php else : ?>
          <header class="w-full max-w-6xl mx-auto page-header">
            <h2 class="page-title"><?php _e( 'Posts', 'tailkick' ); ?></h2>
          </header>
          <?php endif; ?>
          <div id="primary" class="content-area">
            <main id="main" class="site-main">
              <div class="w-full max-w-6xl mx-auto">
                <div class="grid grid-cols-6">
                  <div class="col-span-5 pr-24">
                    <?php

                    if ( have_posts() ) :

                      // Start the Loop.
                      while ( have_posts() ) :
                        the_post();

                        /** Include the Post-Format-specific template for the
                         * content. If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Format name) and that will be
                         * used instead.
                         */
                        get_template_part( 'template-parts/post/content', get_post_format() );

                      endwhile;

                      the_posts_pagination(
                        array(
                          'prev_text'          => tailkick_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="' . sr_only_classes( array('screen-reader-text') ) . '">' . __( 'Previous page', 'tailkick' ) . '</span>',
                          'next_text'          => '<span class="' . sr_only_classes( array('screen-reader-text') ) . '">' . __( 'Next page', 'tailkick' ) . '</span>' . tailkick_get_svg( array( 'icon' => 'arrow-right' ) ),
                          'before_page_number' => '<span class="' . sr_only_classes( array('meta-nav', 'screen-reader-text') ) . '">' . __( 'Page', 'tailkick' ) . ' </span>',
                        )
                      );

                    else :

                      get_template_part( 'template-parts/post/content', 'none' );

                    endif;

                    ?>
                  </div>
                  <div><?php get_sidebar(); ?></div>
                </div>
              </div>
            </main>
          </div>
          <?php get_sidebar(); ?>
        </div>
      </div>
      <?php get_footer(); ?>
    </div>
  </div>
</body>
</html>
