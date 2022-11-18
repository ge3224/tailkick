<?php

require_once('tk_navwalker.php');

/**
 * tk_register_menus is fired via the init hook, after WordPress has finished 
 * loading but before any headers are sent.
 */
function tk_theme_setup()
{
  add_theme_support('post-thumbnails');

  register_nav_menus(array(
    'primary' => __('Primary Menu')
  ));
}

add_action('after_setup_theme', 'tk_theme_setup');


// Excerpt Length Control
function set_excerpt_length() {
  return 45;
}

add_filter('excerpt_length', 'set_excerpt_length');
