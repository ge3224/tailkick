<?php

/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage TailKick
 */

require_once('tk_navwalker.php');

// This theme requires WordPress 5.3 or later.
if ( version_compare( $GLOBALS['wp_version'], '5.3', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

/**
 * tk_register_menus is fired via the init hook, after WordPress has finished 
 * loading but before any headers are sent.
 */
if ( ! function_exists( 'tk_theme_setup' ) ) {

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 *
	 * @return void
	 */
  function tk_theme_setup() {

		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on TailKick, use a find and replace
		 * to change 'tailkick' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'tailkick', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * This theme does not use a hard-coded <title> tag in the document head,
		 * WordPress will provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/**
		 * Add post-formats support.
		 */
		add_theme_support(
			'post-formats',
			array(
				'link',
				'aside',
				'gallery',
				'image',
				'quote',
				'status',
				'video',
				'audio',
				'chat',
			)
		);

    add_theme_support('post-thumbnails');

		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary menu', 'tailkick' ),
				'footer'  => esc_html__( 'Secondary menu', 'tailkick' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'navigation-widgets',
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		// add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Add support for custom line height controls.
		add_theme_support( 'custom-line-height' );

		// Add support for experimental link color control.
		add_theme_support( 'experimental-link-color' );

		// Add support for experimental cover block spacing.
		add_theme_support( 'custom-spacing' );

		// Add support for custom units.
		// This was removed in WordPress 5.6 but is still required to properly support WP 5.5.
		add_theme_support( 'custom-units' );

		// Remove feed icon link from legacy RSS widget.
		add_filter( 'rss_widget_feed_link', '__return_false' );

    add_theme_support('post-formats', array('aside', 'gallery'));
  }
}
add_action('after_setup_theme', 'tk_theme_setup');

/**
 * Register widget area.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 *
 * @return void
 */
function tk_widgets_init($id) {
  register_sidebar(array(
    'name' => esc_html__( 'Sidebar', 'tailkick' ),
    'id' => 'sidebar',
    'description' => esc_html__( 'Add widgets here to appear in your sidebar', 'tailkick' ),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget' => '</section>',
    'before_title' => '<h2 class="widget-title">',
    'after_title' => '</h2>',
  ));

  register_sidebar(array(
    'name' => esc_html__( 'Box1', 'tailkick' ),
    'id' => 'box1',
    'description' => esc_html__('Add widgets here to appear', 'tailkick' ),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget' => '</section>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ));

  register_sidebar(array(
    'name' => esc_html__( 'Box2', 'tailkick' ),
    'id' => 'box2',
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget' => '</section>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ));

  register_sidebar(array(
    'name' => esc_html__( 'Box3', 'tailkick' ),
    'id' => 'box3',
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget' => '</section>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ));
}
add_action('widgets_init', 'tk_widgets_init');

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

// Customizer additions.
require get_template_directory() . '/inc/tk_customize.php';

/**
 * set_excerpt_length handles excerpt length control
 */
function set_excerpt_length() {
  return 45;
}

add_filter('excerpt_length', 'set_excerpt_length');

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
