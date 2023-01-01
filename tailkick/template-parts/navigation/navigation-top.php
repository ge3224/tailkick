<?php
/**
 * Displays top navigation
 *
 * @package WordPress
 * @subpackage TailKick
 * @since TailKick 0.1
 * @version 0.1
 */

?>
<nav id="site-navigation" class="main-navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'tailkick' ); ?>">
	<button class="menu-toggle" aria-controls="top-menu" aria-expanded="false">
		<?php
		echo tailkick_get_svg( array( 'icon' => 'bars' ) );
		echo tailkick_get_svg( array( 'icon' => 'close' ) );
		_e( 'Menu', 'tailkick' );
		?>
	</button>

	<?php
	wp_nav_menu(
		array(
			'theme_location' => 'top',
			'menu_id'        => 'top-menu',
		)
	);
	?>

	<?php if ( ( tailkick_is_frontpage() || ( is_home() && is_front_page() ) ) && has_custom_header() ) : ?>
		<a href="#content" class="menu-scroll-down"><?php echo tailkick_get_svg( array( 'icon' => 'arrow-right' ) ); ?><span class="sr-only focus:not-sr-only focus:bg-gray-50 focus:rounded focus:shadow focus:text-sky-800 focus:text-sm focus:font-bold focus:left-1.5 focus:leading:normal focus:py-3.5 focus:pr-6 focus:no-underline focus:top-1.5 focus:z-[100000] screen-reader-text"><?php _e( 'Scroll down to content', 'tailkick' ); ?></span></a>
	<?php endif; ?>
</nav><!-- #site-navigation -->
