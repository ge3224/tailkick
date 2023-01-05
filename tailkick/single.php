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
    <a class="sr-only focus:not-sr-only focus:bg-gray-50 focus:rounded focus:shadow focus:text-sky-800 focus:text-sm focus:font-bold focus:left-1.5 focus:leading:normal focus:py-3.5 focus:pr-6 focus:no-underline focus:top-1.5 focus:z-[100000] skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'tailkick' ); ?></a>
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
    if ( ( is_single() || ( is_page() && ! tailkick_is_frontpage() ) ) && has_post_thumbnail( get_queried_object_id() ) &&  get_post_format() !== 'aside' ) :
        echo '<div class="mt-28 w-full max-w-6xl mx-auto single-featured-image-header">';
        echo get_the_post_thumbnail( get_queried_object_id(), 'tailkick-featured-image', array( 'class' => 'rounded-sm') );
        echo '</div>';
    endif;
    ?>

    <div class="w-full max-w-6xl mx-auto site-content-contain">
      <div id="content" class="<?php echo ( has_post_thumbnail() && get_post_format() !== 'aside' ) ? 'py-8' : 'pt-32 pb-8'; ?> site-content">
        <div class="wrap">
          <div id="primary" class="content-area">
            <main id="main" class="site-main">
              <div class="grid grid-cols-6">
                <div class="col-span-5 pr-24">
                  <?php
                  // Start the Loop.
                  while ( have_posts() ) :
                    the_post();

                    get_template_part( 'template-parts/post/content', get_post_format() );

                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) :
                      comments_template();
                    endif;

                    the_post_navigation(
                      array(
                        'prev_text' => '<span class="sr-only focus:not-sr-only focus:bg-gray-50 focus:rounded focus:shadow focus:text-sky-800 focus:text-sm focus:font-bold focus:left-1.5 focus:leading:normal focus:py-3.5 focus:pr-6 focus:no-underline focus:top-1.5 focus:z-[100000] screen-reader-text">' . __( 'Previous Post', 'tailkick' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'tailkick' ) . '</span> <span class="nav-title"><span class="nav-title-icon-wrapper">' . tailkick_get_svg( array( 'icon' => 'arrow-left' ) ) . '</span>%title</span>',
                        'next_text' => '<span class="sr-only focus:not-sr-only focus:bg-gray-50 focus:rounded focus:shadow focus:text-sky-800 focus:text-sm focus:font-bold focus:left-1.5 focus:leading:normal focus:py-3.5 focus:pr-6 focus:no-underline focus:top-1.5 focus:z-[100000] screen-reader-text">' . __( 'Next Post', 'tailkick' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'tailkick' ) . '</span> <span class="nav-title">%title<span class="nav-title-icon-wrapper">' . tailkick_get_svg( array( 'icon' => 'arrow-right' ) ) . '</span></span>',
                      )
                    );

                  endwhile; // End the loop.
                  ?>
                </div>
                <div><?php get_sidebar(); ?></div>
              </div>
            </main>
          </div>
          <?php get_sidebar(); ?>
        </div>
      </div>
    </div>
    <?php get_footer(); ?>
  </div>
</body>
</html>
