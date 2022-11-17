<?php

require_once('tk_navwalker.php');

/**
 * tk_register_menus is fired via the init hook, after WordPress has finished 
 * loading but before any headers are sent.
 */
function tk_register_menus()
{
  register_nav_menus(array(
    'primary' => __('Primary Menu')
  ));
}

add_action('init', 'tk_register_menus');
