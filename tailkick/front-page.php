<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
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
    <?php get_template_part( 'template-parts/header/header', 'image' ); ?>
	</header>

	<?php

	/*
	 * If a regular post or page, and not the front page, show the featured image.
	 * Using get_queried_object_id() here since the $post global may not be set before a call to the_post().
	 */
	if ( ( is_single() || ( is_page() && ! tailkick_is_frontpage() ) ) && has_post_thumbnail( get_queried_object_id() ) ) :
		echo '<div class="single-featured-image-header">';
		echo get_the_post_thumbnail( get_queried_object_id(), 'tailkick-featured-image' );
		echo '</div><!-- .single-featured-image-header -->';
	endif;
	?>

	<div class="site-content-contain">
		<div id="content" class="site-content">

      <!---------------------------------------------------------------------------->

      <div id="primary" class="content-area">
        <main id="main" class="site-main">

          <?php
          // Show the selected front page content.
          if ( have_posts() ) :
            while ( have_posts() ) :
              the_post();
              get_template_part( 'template-parts/page/content', 'front-page' );
            endwhile;
          else :
            get_template_part( 'template-parts/post/content', 'none' );
          endif;
          ?>

          <?php
          // Get each of our panels and show the post data.
          if ( 0 !== tailkick_panel_count() || is_customize_preview() ) : // If we have pages to show.

            /**
             * Filters the number of front page sections in TailKick.
             *
             * @since TailKick 0.1
             *
             * @param int $num_sections Number of front page sections.
             */
            $num_sections = apply_filters( 'tailkick_front_page_sections', 4 );
            global $tailkickcounter;

            // Create a setting and control for each of the sections available in the theme.
            for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
              $tailkickcounter = $i;
              tailkick_front_page_section( null, $i );
            }

        endif; // The if ( 0 !== tailkick_panel_count() ) ends here.
          ?>

        </main><!-- #main -->
      </div><!-- #primary -->

<!---------------------------------------------------------------------------->

		</div><!-- #content -->

    <?php get_footer(); ?>
	</div><!-- .site-content-contain -->
</div><!-- #page -->

</body>
</html>
