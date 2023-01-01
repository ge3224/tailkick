<?php
/**
 * Displays footer site info
 *
 * @package WordPress
 * @subpackage TailKick
 * @since TailKick 0.1
 * @version 0.1
 */

?>
<div class="site-info">
	<?php
	if ( function_exists( 'the_privacy_policy_link' ) ) {
		the_privacy_policy_link( '', '<span role="separator" aria-hidden="true"></span>' );
	}
	?>
	<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'tailkick' ) ); ?>" class="imprint">
		<?php
			/* translators: %s: WordPress */
		printf( __( 'Proudly powered by %s', 'tailkick' ), 'WordPress' );
		?>
	</a>
</div><!-- .site-info -->
