<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
	<a class="<?php echo sr_only_classes( array('skip-link', 'screen-reader-text') ); ?>" href="#content"><?php esc_html_e( 'Skip to content', 'tailkick' ); ?></a>

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

<div class="wrap">

	<header class="page-header">
		<?php if ( have_posts() ) : ?>
			<h1 class="page-title">
			<?php
			/* translators: Search query. */
			printf( __( 'Search Results for: %s', 'tailkick' ), '<span>' . get_search_query() . '</span>' );
			?>
			</h1>
		<?php else : ?>
			<h1 class="page-title"><?php _e( 'Nothing Found', 'tailkick' ); ?></h1>
		<?php endif; ?>
	</header><!-- .page-header -->

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		if ( have_posts() ) :
			// Start the Loop.
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/post/content', 'excerpt' );

			endwhile; // End the loop.

			the_posts_pagination(
				array(
					'prev_text'          => tailkick_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="' . sr_only_classes( array('screen-reader-text') ) . '">' . esc_html__( 'Previous page', 'tailkick' ) . '</span>',
					'next_text'          => '<span class="' . sr_only_classes( array('screen-reader-text') ) . '">' . esc_html__( 'Next page', 'tailkick' ) . '</span>' . tailkick_get_svg( array( 'icon' => 'arrow-right' ) ),
					'before_page_number' => '<span class="' . sr_only_classes( array('meta-nav', 'screen-reader-text') ) . '">' . esc_html__( 'Page', 'tailkick' ) . ' </span>',
				)
			);

		else :
			?>

			<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'tailkick' ); ?></p>
			<?php
				get_search_form();

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div><!-- .wrap -->

<!---------------------------------------------------------------------------->

		</div><!-- #content -->

    <?php get_footer(); ?>
	</div><!-- .site-content-contain -->
</div><!-- #page -->

</body>
</html>
