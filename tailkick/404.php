<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage TailKick
 * @since TailKick 0.1
 * @version 0.1
 */
?>

<!DOCTYPE html>
<html class="h-full" <?php language_attributes(); ?>>
<?php get_header(); ?>

<body <?php body_class('min-h-full flex flex-col'); ?>>
  <?php get_template_part('template-parts/nav-primary', get_post_format()); ?>
  <main class="m-auto max-w-6xl ">
     <section>
      <header>
        <h1><?php _e( 'Oops! That page can&rsquo;t be found.', 'tailkick' ); ?></h1>
      </header> 
      <div>
        <p>
          <?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'twentyseventeen' ); ?>
        </p>
        <?php get_search_form(); ?>
      </div>
     </section> 
  </main>
  <?php get_footer(); ?>
</body>