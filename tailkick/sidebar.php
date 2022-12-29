<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage TailKick
 * @since TailKick 0.1
 * @version 0.1
 */
if ( ! is_active_sidebar('primary_sidebar') ) {
  return;
}
?>

<aside>
  <?php dynamic_sidebar('primary_sidebar'); ?>
</aside>
