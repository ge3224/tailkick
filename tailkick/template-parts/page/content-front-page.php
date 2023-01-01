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
<article id="post-<?php the_ID(); ?>" <?php post_class( 'tailkick-panel ' ); ?> >

	<?php
	if ( has_post_thumbnail() ) :
		$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'tailkick-featured-image' );

		// Calculate aspect ratio: h / w * 100%.
		$ratio = $thumbnail[2] / $thumbnail[1] * 100;
		?>

		<div class="panel-image" style="background-image: url(<?php echo esc_url( $thumbnail[0] ); ?>);">
			<div class="panel-image-prop" style="padding-top: <?php echo esc_attr( $ratio ); ?>%"></div>
		</div><!-- .panel-image -->

	<?php endif; ?>

	<div class="panel-content">
		<div class="wrap">
			<header class="entry-header">
				<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>

				<?php tailkick_edit_link( get_the_ID() ); ?>

			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php
					the_content(
						sprintf(
							/* translators: %s: Post title. Only visible to screen readers. */
							__( 'Continue reading<span class="sr-only focus:not-sr-only focus:bg-gray-50 focus:rounded focus:shadow focus:text-sky-800 focus:text-sm focus:font-bold focus:left-1.5 focus:leading:normal focus:py-3.5 focus:pr-6 focus:no-underline focus:top-1.5 focus:z-[100000] screen-reader-text"> "%s"</span>', 'tailkick' ),
							get_the_title()
						)
					);
					wp_link_pages(
						array(
							'before' => '<div class="page-links">' . __( 'Pages:', 'tailkick' ),
							'after'  => '</div>',
						)
					);
					?>
			</div><!-- .entry-content -->

		</div><!-- .wrap -->
	</div><!-- .panel-content -->

</article><!-- #post-<?php the_ID(); ?> -->
