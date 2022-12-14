<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage TailKick
 * @since TailKick 0.1
 * @version 0.1
 */

?>

<section class="mb-8 no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php _e( 'Nothing Found', 'tailkick' ); ?></h1>
	</header>
	<div class="page-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
			<p>
			<?php

        /* translators: %s: Post editor URL. */
        printf( __( 'Ready to publish your first post? <a href="%s">Get started here</a>.', 'tailkick' ), esc_url( admin_url( 'post-new.php' ) ) );

			?>
			</p>
		<?php else : ?>
			<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'tailkick' ); ?></p>
      <?php get_search_form(); ?>
    <?php endif; ?>
	</div>
</section>
