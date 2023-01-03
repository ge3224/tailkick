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
    if ( ( is_single() || ( is_page() && ! tailkick_is_frontpage() ) ) && has_post_thumbnail( get_queried_object_id() ) ) :
      echo '<div class="overflow-hidden max-h-96 single-featured-image-header">';
      echo get_the_post_thumbnail( get_queried_object_id(), 'tailkick-featured-image', array('class' => 'object-cover object-center') );
      echo '</div>';
    endif;

	?>

	<div class="py-6 max-w-6xl mx-auto site-content-contain">
		<div id="content" class="site-content">
      <div class="wrap">
        <div id="primary" class="content-area">
          <main id="main" class="site-main">

            <?php

              while ( have_posts() ) :
                the_post();

                get_template_part( 'template-parts/page/content', 'page' );

                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                  comments_template();
                endif;

              endwhile; // End the loop.

            ?>

          </main>
        </div>
      </div>
		</div>
	</div>
  <?php get_footer(); ?>
</div>

</body>
</html>
