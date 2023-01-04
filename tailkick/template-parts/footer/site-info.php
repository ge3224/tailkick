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
<div class="flex flex-col space-y-0.5 site-info">
  <span><strong>Theme: <?php bloginfo('name'); ?></strong> &copy; <?php echo Date('Y'); ?></span>
  <span>Powered by
    <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'tailkick' ) ); ?>" class="imprint">
      <?php
        /* translators: %s: WordPress */
      printf( esc_html__( '%s', 'tailkick' ), 'WordPress' );
      ?>
    </a>
    &nbsp;&&nbsp;
    <a href="<?php echo esc_url( __( 'https://tailwindcss.com/', 'tailkick' ) ); ?>" class="imprint">
      <?php
      /* translators: %s: Tailwind CSS */
      printf( esc_html__( '%s', 'tailkick' ), 'Tailwind CSS' );
      ?>
    </a>
  </span>
	<?php
	if ( function_exists( 'the_privacy_policy_link' ) ) {
		the_privacy_policy_link( '', '<span role="separator" aria-hidden="true"></span>' );
	}
	?>
</div>
