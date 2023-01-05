<?php
/**
 * Template part for displaying posts
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
	if ( is_sticky() && is_home() ) :
		echo tailkick_get_svg( array( 'icon' => 'thumb-tack' ) );
	endif;
	?>

	<div class="border border-gray-300 bg-none rounded-sm pt-4 px-4 pb-0.5 flex items-center entry-content">
    <?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
      <div class="post-thumbnail">
        <a href="<?php the_permalink(); ?>">
          <?php the_post_thumbnail( 'tailkick-featured-image', array ( 'class' => 'w-36 h-auto rounded-sm') ); ?>
        </a>
      </div>
    <?php endif; ?>

    <div>

    <div class="w-full flex items-center mb-2">
      <div class="mr-2 w-10 h-10 rounded-full overflow-hidden bg-gray-300"><?php echo get_avatar(get_the_author_meta('ID'), 40, 'mm', 'avatar'); ?></div>
      <div>
        <div class="text-base my-0 py-0">
          <a class="font-bold text-black hover:text-gray-600 active:text-gray-500" href="<?php get_author_posts_url(get_the_author_meta('ID')); ?>">
            <?php the_author(); ?>
          </a>
        </div>
        <div class="text-xs text-gray-500 mr-2 my-0 py-0"> 
          <span>
            <?php
              if ( ! is_single() ) {
                echo tailkick_time_link();
              } else {
                tailkick_posted_on();
              }
            ?>
          </span>
        </div> 
      </div>
      <div class="ml-auto mr-0"><?php tailkick_edit_link(); ?></div>
    </div>

		<?php
		the_content(
			sprintf(
				/* translators: %s: Post title. Only visible to screen readers. */
				__( 'Continue reading<span class="sr-only focus:not-sr-only focus:bg-gray-50 focus:rounded focus:shadow focus:text-sky-800 focus:text-sm focus:font-bold focus:left-1.5 focus:leading:normal focus:py-3.5 focus:pr-6 focus:no-underline focus:top-1.5 focus:z-[100000] screen-reader-text">"%s"</span>', 'tailkick' ),
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
		?>
    </div>
	</div>

	<?php
	if ( is_single() ) {
		tailkick_entry_footer();
	}
	?>

</article>


