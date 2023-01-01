<?php
/**
 * Displays header site branding
 *
 * @package WordPress
 * @subpackage TailKick
 * @since TailKick 0.1
 * @version 0.1
 */

?>
<div class="site-branding">
	<div class="wrap">

		<?php the_custom_logo(); ?>

		<div class="site-branding-text">
			<?php if ( is_front_page() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php endif; ?>

			<?php
			$description = get_bloginfo( 'description', 'display' );

			if ( $description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $description; ?></p>
			<?php endif; ?>
		</div><!-- .site-branding-text -->

		<?php if ( ( tailkick_is_frontpage() || ( is_home() && is_front_page() ) ) && ! has_nav_menu( 'top' ) ) : ?>
		<a href="#content" class="menu-scroll-down"><?php echo tailkick_get_svg( array( 'icon' => 'arrow-right' ) ); ?><span class="sr-only focus:not-sr-only focus:bg-gray-50 focus:rounded focus:shadow focus:text-sky-800 focus:text-sm focus:font-bold focus:left-1.5 focus:leading:normal focus:py-3.5 focus:pr-6 focus:no-underline focus:top-1.5 focus:z-[100000] screen-reader-text"><?php _e( 'Scroll down to content', 'tailkick' ); ?></span></a>
	<?php endif; ?>

	</div><!-- .wrap -->
</div><!-- .site-branding -->
