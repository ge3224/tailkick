<?php
/**
 * The header for the TailKick theme
 *
 * This is the template that displays all fo the <head> section.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage TailKick
 * @since TailKick 0.1
 * @version 0.1
 */
?>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="<?php echo get_bloginfo('template_url').'assets/images/tailkick-favicon.ico'; ?>" />
  <title>
    <?php bloginfo('name'); ?> | 
    <?php is_front_page() ? bloginfo('description') : wp_title(); ?>
  </title>
  <meta name="author" content="TailKick by Jacob Benison">
  <meta name="description" content="<?php bloginfo('description'); ?>">
  <?php wp_head(); ?>
</head>
