<?php
/**
 * Template part for displaying video posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage TailKick
 * @since TailKick 0.1
 * @version 0.1
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	if ( is_sticky() && is_home() ) {
		echo tailkick_get_svg( array( 'icon' => 'thumb-tack' ) );
	}
	?>
	<header class="entry-header">
		<?php
		if ( 'post' === get_post_type() ) {
			echo '<div class="entry-meta">';
			if ( is_single() ) {
				tailkick_posted_on();
			} else {
				echo tailkick_time_link();
				tailkick_edit_link();
			}
			echo '</div><!-- .entry-meta -->';
		}

		if ( is_single() ) {
			the_title( '<h1 class="entry-title">', '</h1>' );
		} elseif ( is_front_page() && is_home() ) {
			the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
		} else {
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		}
		?>
	</header><!-- .entry-header -->

	<?php
		$content = apply_filters( 'the_content', get_the_content() );
		$video   = false;

		// Only get video from the content if a playlist isn't present.
	if ( false === strpos( $content, 'wp-playlist-script' ) ) {
		$video = get_media_embedded_in_content( $content, array( 'video', 'object', 'embed', 'iframe' ) );
	}
	?>

	<?php if ( '' !== get_the_post_thumbnail() && ! is_single() && empty( $video ) ) : ?>
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'tailkick-featured-image' ); ?>
			</a>
		</div><!-- .post-thumbnail -->
	<?php endif; ?>

	<div class="entry-content">

		<?php
		if ( ! is_single() ) {

			// If not a single post, highlight the video file.
			if ( ! empty( $video ) ) {
				foreach ( $video as $video_html ) {
					echo '<div class="entry-video">';
						echo $video_html;
					echo '</div>';
				}
			}
		}

		if ( is_single() || empty( $video ) ) {

			the_content(
				sprintf(
					/* translators: %s: Post title. Only visible to screen readers. */
					__( 'Continue reading<span class="sr-only focus:not-sr-only focus:bg-gray-50 focus:rounded focus:shadow focus:text-sky-800 focus:text-sm focus:font-bold focus:left-1.5 focus:leading:normal focus:py-3.5 focus:pr-6 focus:no-underline focus:top-1.5 focus:z-[100000] screen-reader-text"> "%s"</span>', 'tailkick' ),
					get_the_title()
				)
			);

			wp_link_pages(
				array(
					'before'      => '<div class="page-links">' . __( 'Pages:', 'tailkick' ),
					'after'       => '</div>',
					'link_before' => '<span class="page-number">',
					'link_after'  => '</span>',
				)
			);
		}
		?>

	</div><!-- .entry-content -->

	<?php
	if ( is_single() ) {
		tailkick_entry_footer();
	}
	?>

</article><!-- #post-<?php the_ID(); ?> -->
