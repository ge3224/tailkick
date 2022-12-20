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

  add_theme_support('post-formats', array('aside', 'gallery'));
}

add_action('after_setup_theme', 'tk_theme_setup');

/**
 * tk_theme_scripts is used to enqueue all scripts and styles to WordPress. See
 * https://developer.wordpress.org/themes/basics/including-css-javascript/
 */
function tk_theme_scripts() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );

	wp_enqueue_style( 'tailkick_css', get_template_directory_uri() . '/css/tailkick.css', array(), '1.1', 'all' );

	wp_enqueue_script( 'tailkick_js', get_template_directory_uri() . '/js/tailkick1.js', array(), 1.1, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'tk_theme_scripts' );

/**
 * set_excerpt_length handles excerpt length control
 */
function set_excerpt_length() {
  return 45;
}

add_filter('excerpt_length', 'set_excerpt_length');

/**
 * tk_init_widgets registers widgets including sidebars
 */
function tk_init_widgets($id) {
  register_sidebar(array(
    'id' => 'sidebar',
    'name' => __( 'Sidebar' ),
    'description' => __( 'This is TailKick\'s standard sidebar.' ),
    'before_widget' => '<div id="sidebar-%1$s" class="mt-3">',
    'after_widget' => '</div>',
    'before_title' => '<h4>',
    'after_title' => '</h4>',
  ));

  register_sidebar(array(
    'name' => 'Box1',
    'id' => 'box1',
    'before_widget' => '<div class="box">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  ));

  register_sidebar(array(
    'name' => 'Box2',
    'id' => 'box2',
    'before_widget' => '<div class="box">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  ));

  register_sidebar(array(
    'name' => 'Box3',
    'id' => 'box3',
    'before_widget' => '<div class="box">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  ));
}

add_action('widgets_init', 'tk_init_widgets');

/**
 * debug_to_console is a helper function for development
 */
function debug_to_console($data) {
  $output = $data;
  if(is_array($output))
    $output = implode(',', $output);

  echo "<script>console.log('PHP debug:\\n" . json_encode($output) . "');</script>";
}

function tk_custom_widget_callback_function() {

    global $wp_registered_widgets;
    $original_callback_params = func_get_args();
    $widget_id = $original_callback_params[0]['widget_id'];

    $original_callback = $wp_registered_widgets[ $widget_id ]['original_callback'];
    $wp_registered_widgets[ $widget_id ]['callback'] = $original_callback;

    $widget_id_base = $wp_registered_widgets[ $widget_id ]['callback'][0]->id_base;

    if ( is_callable( $original_callback ) ) {

        ob_start();
        call_user_func_array( $original_callback, $original_callback_params );
        $widget_output = ob_get_clean();

        echo apply_filters( 'widget_output', $widget_output, $widget_id_base, $widget_id );

    }

}

function tk_filter_dynamic_sidebar_params( $sidebar_params ) {

    if ( is_admin() ) {
        return $sidebar_params;
    }

    global $wp_registered_widgets;
    $widget_id = $sidebar_params[0]['widget_id'];

    $wp_registered_widgets[ $widget_id ]['original_callback'] = $wp_registered_widgets[ $widget_id ]['callback'];
    $wp_registered_widgets[ $widget_id ]['callback'] = 'tk_custom_widget_callback_function';

    return $sidebar_params;

}
add_filter( 'dynamic_sidebar_params', 'tk_filter_dynamic_sidebar_params' );

function tk_widget_id_base_instance_filter( $instance, $args, $widget ){

	// filter...
	return $instance;
}

function tk_widget_output_filter( $widget_output, $widget_id_base, $widget_id ) {

    /* To target a specific widget ID: */
    if (preg_match('/block-\d/i', $widget_id)) {

      global $wp_registered_widgets;
      $w = $wp_registered_widgets[ $widget_id ]; 


      $output = str_replace('<h2>', '<h2 class="font-bold">', $widget_output); 

      $sidebar_links_classes = 'text-teal-500 visited:text-teal-500 hover:text-teal-400 active:text-teal-300';

      if(preg_match_all('/<a.+?>/i', $output, $matches)) {
          foreach ($matches[0] as $match) {
            if(preg_match('/class="(.+?)"/', $match, $ms)) {
              $merged = 'class="'. $sidebar_links_classes . ' ' . $ms[1] . '"';
              $output = str_replace($ms[0], $merged, $output);
            } else {
              $output = str_replace('<a', '<a class="' . $sidebar_links_classes . '"', $output);
            }
          }
      }
      return $output;
  
    }

    return $widget_output;

}
add_filter( 'widget_output', 'tk_widget_output_filter', 10, 3 );
