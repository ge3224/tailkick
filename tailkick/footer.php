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

<footer id="colophon" class="px-4 xl:px-0 py-6 lg:py-12 bg-gray-100 site-footer">
  <div class="w-full max-w-6xl mx-auto text-sm text-gray-600 flex flex-col lg:flex-row wrap">
    <?php
    get_template_part('template-parts/footer/footer', 'widgets'); ?>

    <?php get_template_part('template-parts/footer/site', 'info'); ?>
  </div>
</footer>
<?php wp_footer(); ?>
