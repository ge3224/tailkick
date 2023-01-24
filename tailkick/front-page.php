<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear. Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage TailKick
 * @since TailKick 0.1
 * @version 0.1
 */

/**
 * Check for theme modifications pertaining to the hero background image
 *
 * A user may have made modifications to the theme using WordPress's Customize
 * API. If so, these will be implemented by appending inline style attributes
 * to the targeted HTML elements. Because inline styles have greater
 * specificity than CSS class selectors, changes made in the customizer will
 * override Tailwind styles. To fallback to Tailwind styling, modifications
 * made in the Customize API must be be 'cleared.'
 */
function get_hero_bg_image_mods() {
  // See ./inc/tk_customize.php
  $img = get_theme_mod('hero_home_image');
  $x = get_theme_mod('hero_home_image_position_x');
  $y = get_theme_mod('hero_home_image_position_y');

  $output = '';
  if ($img != "") {
    $output .= ' style="';
    if ($img != '') {
      $output .= 'background: url(\'' . $img . '\') no-repeat';

      if ( $x != "" ) {
        $output .= ' '. $x;
      } else {
        $output .= ' center';
      }

      if ( $y != "" ) {
        $output .= ' ' . $y . ';';
      } else {
        $output .= ' center;';
      }
      $output .= ' background-size: cover;"';
    }
  }
  return $output;
}

?> 

<!DOCTYPE html>
<html class="h-full no-js no-svg" <?php language_attributes(); ?>>
<?php get_header(); ?>

<body <?php body_class('min-h-full flex flex-col'); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="<?php echo sr_only_classes( array('skip-link', 'screen-reader-text') ); ?>" href="#content"><?php _e( 'Skip to content', 'tailkick' ); ?></a>
	<header id="masthead" class="site-header">
		<?php if ( has_nav_menu( 'primary' ) ) : ?>
			<div class="navigation-top">
				<div class="relative wrap">
					<?php get_template_part( 'template-parts/navigation/navigation', 'primary' ); ?>
				</div>
			</div>
		<?php endif; ?>
    <section id="hero" class="bg-gray-200 bg-hero-home bg-cover bg-center lg:bg-[center_top_35%] bg-no-repeat lg:h-2/3 xl:h-[<?php echo get_theme_mod('home_hero_height', '48.5rem'); ?>] w-full" <?php echo get_hero_bg_image_mods(); ?>>
      <div class="w-full h-[767px] max-w-6xl mx-auto flex flex-col justify-center items-start">
        <div class="w-1/5 ml-auto mr-0">
          <h1 class="text-6xl font-bold"><?php echo get_theme_mod('hero_home_heading', 'Buy. Sell. Discover.'); ?></h1>
          <p class="mt-3"><?php echo get_theme_mod('hero_home_text', 'Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum luctus gravida neque, et fringilla erat aliquet id.'); ?></p>
          <a class="<?php echo get_tailkick_btn_classes(); ?>" href="https://github.com/ge3224/tailkick" target="_blank" type="button"<?php echo get_custom_styles_btn(); ?>>Download</a>
        </div>
      </div>
    </section>
	</header>
	<div class="py-6 max-w-6xl mx-auto site-content-contain">
		<div id="content" class="site-content">
      <div id="primary" class="content-area">
        <main id="main" class="site-main">

          <?php

            // Display the showcase panel unless disabled in the Customize API
            if (get_theme_mod('showcase_panel_include') == "true") : 
              get_template_part('template-parts/page/content', 'front-page-showcase'); 
            endif; 

            // Show the selected front page content.
            if ( have_posts() ) :
              while ( have_posts() ) :
                the_post();
                get_template_part( 'template-parts/page/content', 'front-page' );
              endwhile;
            else :
              get_template_part( 'template-parts/post/content', 'none' );
            endif;

          ?>

          <?php
            
            // Get each of our panels and show the post data.
            if ( 0 !== tailkick_panel_count() || is_customize_preview() ) : // If we have pages to show.

              /**
               * Filters the number of front page sections in TailKick.
               *
               * @since TailKick 0.1
               *
               * @param int $num_sections Number of front page sections.
               */
              $num_sections = apply_filters( 'tailkick_front_page_sections', 4 );
              global $tailkickcounter;

              // Create a setting and control for each of the sections available in the theme.
              for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
                $tailkickcounter = $i;
                tailkick_front_page_section( null, $i );
              }

            endif;

          ?>

        </main>
      </div>
		</div>
	</div>
  <?php get_footer(); ?>
</div>

</body>
</html>
