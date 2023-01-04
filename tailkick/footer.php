<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage TailKick
 * @since TailKick 0.1
 * @version 0.1
 */

?>

<footer id="colophon" class="py-12 bg-gray-100 site-footer">
  <div class="max-w-6xl mx-auto text-sm text-gray-600 wrap">
    <?php
      get_template_part( 'template-parts/footer/footer', 'widgets' );

      if ( has_nav_menu( 'social' ) ) :
    ?>
    <nav class="social-navigation" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'tailkick' ); ?>">
      <?php
        wp_nav_menu(
          array(
            'theme_location' => 'social',
            'menu_class'     => 'social-links-menu',
            'depth'          => 1,
            'link_before'    => '<span class="sr-only focus:not-sr-only focus:bg-gray-50 focus:rounded focus:shadow focus:text-sky-800 focus:text-sm focus:font-bold focus:left-1.5 focus:leading:normal focus:py-3.5 focus:pr-6 focus:no-underline focus:top-1.5 focus:z-[100000] screen-reader-text">',
            'link_after'     => '</span>' . tailkick_get_svg( array( 'icon' => 'chain' ) ),
          )
        );
      ?>
    </nav>
    <?php
      endif;

      get_template_part( 'template-parts/footer/site', 'info' );
    ?>
  </div>
</footer>
<?php wp_footer(); ?>

