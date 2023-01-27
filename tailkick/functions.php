<?php

/**
 * TailKick functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage TailKick
 * @since TailKick 0.1
 */

/**
 * TailKick only works in WordPress 4.7 or later.
 */
if (version_compare($GLOBALS['wp_version'], '4.7-alpha', '<')) {
  require get_template_directory() . '/inc/back-compat.php';
  return;
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function tailkick_setup()
{
  /*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/tailkick
	 * If you're building a theme based on TailKick, use a find and replace
	 * to change 'tailkick' to the name of your theme in all the template files.
	 */
  load_theme_textdomain('tailkick');

  // Add default posts and comments RSS feed links to head.
  add_theme_support('automatic-feed-links');

  /*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
  add_theme_support('title-tag');

  /*
	 * Enables custom line height for blocks
	 */
  add_theme_support('custom-line-height');

  /*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
  add_theme_support('post-thumbnails');

  add_image_size('tailkick-featured-image', 2000, 1200, true);

  add_image_size('tailkick-thumbnail-avatar', 100, 100, true);

  // Set the default content width.
  $GLOBALS['content_width'] = 525;

  // This theme uses wp_nav_menu() in two locations.
  register_nav_menus(
    array(
      'primary' => __('Primary Menu', 'tailkick'),
      'top'    => __('Top Menu', 'tailkick'),
      'social' => __('Social Links Menu', 'tailkick'),
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
      'script',
      'style',
      'navigation-widgets',
    )
  );

  /*
	 * Enable support for Post Formats.
	 *
	 * See: https://wordpress.org/support/article/post-formats/
	 */
  add_theme_support(
    'post-formats',
    array(
      'aside',
      'image',
      'video',
      'quote',
      'link',
      'gallery',
      'status',
      'audio',
      'chat',
    )
  );

  // Add theme support for Custom Logo.
  add_theme_support(
    'custom-logo',
    array(
      'width'      => 250,
      'height'     => 250,
      'flex-width' => true,
    )
  );

  // Add theme support for selective refresh for widgets.
  add_theme_support('customize-selective-refresh-widgets');

  /*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
	  */
  add_editor_style(array('assets/css/editor-style.css', tailkick_fonts_url()));

  // Load regular editor styles into the new block-based editor.
  add_theme_support('editor-styles');

  // Load default block styles.
  add_theme_support('wp-block-styles');

  // Add support for responsive embeds.
  add_theme_support('responsive-embeds');

  // Define and register starter content to showcase the theme on new sites.
  $starter_content = array(
    'widgets'     => array(
      // Place three core-defined widgets in the sidebar area.
      'sidebar-1' => array(
        'text_business_info',
        'search',
        'text_about',
      ),

      // Add the core-defined business info widget to the footer 1 area.
      'sidebar-2' => array(
        'text_business_info',
      ),

      // Put two core-defined widgets in the footer 2 area.
      'sidebar-3' => array(
        'text_about',
        'search',
      ),
    ),

    // Specify the core-defined pages to create and add custom thumbnails to some of them.
    'posts'       => array(
      'home',
      'about'            => array(
        'thumbnail' => '{{image-sandwich}}',
      ),
      'contact'          => array(
        'thumbnail' => '{{image-espresso}}',
      ),
      'blog'             => array(
        'thumbnail' => '{{image-coffee}}',
      ),
      'homepage-section' => array(
        'thumbnail' => '{{image-espresso}}',
      ),
    ),

    // Create the custom image attachments used as post thumbnails for pages.
    'attachments' => array(
      'image-espresso' => array(
        'post_title' => _x('Espresso', 'Theme starter content', 'tailkick'),
        'file'       => 'assets/images/espresso.jpg', // URL relative to the template directory.
      ),
      'image-sandwich' => array(
        'post_title' => _x('Sandwich', 'Theme starter content', 'tailkick'),
        'file'       => 'assets/images/sandwich.jpg',
      ),
      'image-coffee'   => array(
        'post_title' => _x('Coffee', 'Theme starter content', 'tailkick'),
        'file'       => 'assets/images/coffee.jpg',
      ),
    ),

    // Default to a static front page and assign the front and posts pages.
    'options'     => array(
      'show_on_front'  => 'page',
      'page_on_front'  => '{{home}}',
      'page_for_posts' => '{{blog}}',
    ),

    // Set the front page section theme mods to the IDs of the core-registered pages.
    'theme_mods'  => array(
      'panel_1' => '{{homepage-section}}',
      'panel_2' => '{{about}}',
      'panel_3' => '{{blog}}',
      'panel_4' => '{{contact}}',
    ),

    // Set up nav menus for each of the two areas registered in the theme.
    'nav_menus'   => array(
      // Assign a menu to the "top" location.
      'top'    => array(
        'name'  => __('Top Menu', 'tailkick'),
        'items' => array(
          'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
          'page_about',
          'page_blog',
          'page_contact',
        ),
      ),

      // Assign a menu to the "social" location.
      'social' => array(
        'name'  => __('Social Links Menu', 'tailkick'),
        'items' => array(
          'link_yelp',
          'link_facebook',
          'link_twitter',
          'link_instagram',
          'link_email',
        ),
      ),
    ),
  );

  /**
   * Filters TailKick array of starter content.
   *
   * @since TailKick 0.1
   *
   * @param array $starter_content Array of starter content.
   */
  $starter_content = apply_filters('tailkick_starter_content', $starter_content);

  add_theme_support('starter-content', $starter_content);
}
add_action('after_setup_theme', 'tailkick_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function tailkick_content_width()
{

  $content_width = $GLOBALS['content_width'];

  // Get layout.
  $page_layout = get_theme_mod('page_layout');

  // Check if layout is one column.
  if ('one-column' === $page_layout) {
    if (tailkick_is_frontpage()) {
      $content_width = 644;
    } elseif (is_page()) {
      $content_width = 740;
    }
  }

  // Check if is single post and there is no sidebar.
  if (is_single() && !is_active_sidebar('sidebar-1')) {
    $content_width = 740;
  }

  /**
   * Filters TailKick content width of the theme.
   *
   * @since TailKick 0.1
   *
   * @param int $content_width Content width in pixels.
   */
  $GLOBALS['content_width'] = apply_filters('tailkick_content_width', $content_width);
}
add_action('template_redirect', 'tailkick_content_width', 0);

/**
 * Register custom fonts.
 */
function tailkick_fonts_url()
{
  $fonts_url = '';

  /*
	 * translators: If there are characters in your language that are not supported
	 * by Libre Franklin, translate this to 'off'. Do not translate into your own language.
	 */
  $libre_franklin = _x('on', 'Libre Franklin font: on or off', 'tailkick');

  if ('off' !== $libre_franklin) {
    $font_families = array();

    $font_families[] = 'Libre Franklin:300,300i,400,400i,600,600i,800,800i';

    $query_args = array(
      'family'  => urlencode(implode('|', $font_families)),
      'subset'  => urlencode('latin,latin-ext'),
      'display' => urlencode('fallback'),
    );

    $fonts_url = add_query_arg($query_args, 'https://fonts.googleapis.com/css');
  }

  return esc_url_raw($fonts_url);
}

/**
 * Add preconnect for Google Fonts.
 *
 * @since TailKick 0.1
 *
 * @param array  $urls          URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed.
 * @return array URLs to print for resource hints.
 */
function tailkick_resource_hints($urls, $relation_type)
{
  if (wp_style_is('tailkick-fonts', 'queue') && 'preconnect' === $relation_type) {
    $urls[] = array(
      'href' => 'https://fonts.gstatic.com',
      'crossorigin',
    );
  }

  return $urls;
}
add_filter('wp_resource_hints', 'tailkick_resource_hints', 10, 2);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function tailkick_widgets_init()
{
  register_sidebar(
    array(
      'name'          => __('Blog Sidebar', 'tailkick'),
      'id'            => 'sidebar-1',
      'description'   => __('Add widgets here to appear in your sidebar on blog posts and archive pages.', 'tailkick'),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h2 class="widget-title">',
      'after_title'   => '</h2>',
    )
  );

  register_sidebar(
    array(
      'name'          => __('Footer 1', 'tailkick'),
      'id'            => 'sidebar-2',
      'description'   => __('Add widgets here to appear in your footer.', 'tailkick'),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h2 class="widget-title">',
      'after_title'   => '</h2>',
    )
  );

  register_sidebar(
    array(
      'name'          => __('Footer 2', 'tailkick'),
      'id'            => 'sidebar-3',
      'description'   => __('Add widgets here to appear in your footer.', 'tailkick'),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h2 class="widget-title">',
      'after_title'   => '</h2>',
    )
  );
}
add_action('widgets_init', 'tailkick_widgets_init');

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * @since TailKick 0.1
 *
 * @param string $link Link to single post/page.
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function tailkick_excerpt_more($link)
{
  if (is_admin()) {
    return $link;
  }

  $link = sprintf(
    '<p class="link-more"><a href="%1$s" class="more-link">%2$s</a></p>',
    esc_url(get_permalink(get_the_ID())),
    /* translators: %s: Post title. Only visible to screen readers. */
    sprintf(__('<span class="underline text-sm text-teal-600 visited:text-teal-600 hover:text-teal-500 active:text-teal-400">Continue Reading</span><span class="' . sr_only_classes(array('screen-reader-text')) . '"> "%s"</span>', 'tailkick'), get_the_title(get_the_ID()))
  );
  return ' &hellip; ' . $link;
}
add_filter('excerpt_more', 'tailkick_excerpt_more');

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since TailKick 0.1
 */
function tailkick_javascript_detection()
{
  echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action('wp_head', 'tailkick_javascript_detection', 0);

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function tailkick_pingback_header()
{
  if (is_singular() && pings_open()) {
    printf('<link rel="pingback" href="%s">' . "\n", esc_url(get_bloginfo('pingback_url')));
  }
}
add_action('wp_head', 'tailkick_pingback_header');

/**
 * Display custom color CSS.
 */
function tailkick_colors_css_wrap()
{
  if ('custom' !== get_theme_mod('colorscheme') && !is_customize_preview()) {
    return;
  }

  require_once get_parent_theme_file_path('/inc/color-patterns.php');
  $hue = absint(get_theme_mod('colorscheme_hue', 250));

  $customize_preview_data_hue = '';
  if (is_customize_preview()) {
    $customize_preview_data_hue = 'data-hue="' . $hue . '"';
  }
?>
  <style type="text/css" id="custom-theme-colors" <?php echo $customize_preview_data_hue; ?>>
    <?php echo tailkick_custom_colors_css(); ?>
  </style>
<?php
}
add_action('wp_head', 'tailkick_colors_css_wrap');

/**
 * Enqueues scripts and styles.
 *
 * See * https://developer.wordpress.org/themes/basics/including-css-javascript/
 */
function tailkick_scripts()
{
  // Add main CSS file, compiled with Tailwind CSS
  wp_enqueue_style('tailkick', get_template_directory_uri() . '/assets/css/tailkick.css', array(), '1.1', 'all');

  // Add global JS
  wp_enqueue_script('tailkick', get_template_directory_uri() . '/assets/js/tailkick.js', array(), 1.1, true);

  // Add custom fonts, used in the main stylesheet.
  wp_enqueue_style('tailkick-fonts', tailkick_fonts_url(), array(), null);

  // Theme stylesheet.
  wp_enqueue_style('tailkick-style', get_stylesheet_uri(), array(), '20221101');

  // Theme block stylesheet.
  wp_enqueue_style('tailkick-block-style', get_theme_file_uri('/assets/css/blocks.css'), array('tailkick-style'), '20220912');

  // Load the dark colorscheme.
  if ('dark' === get_theme_mod('colorscheme', 'light') || is_customize_preview()) {
    wp_enqueue_style('tailkick-colors-dark', get_theme_file_uri('/assets/css/colors-dark.css'), array('tailkick-style'), '20191025');
  }

  // Load the Internet Explorer 9 specific stylesheet, to fix display issues in the Customizer.
  if (is_customize_preview()) {
    wp_enqueue_style('tailkick-ie9', get_theme_file_uri('/assets/css/ie9.css'), array('tailkick-style'), '20161202');
    wp_style_add_data('tailkick-ie9', 'conditional', 'IE 9');
  }

  // Load the Internet Explorer 8 specific stylesheet.
  wp_enqueue_style('tailkick-ie8', get_theme_file_uri('/assets/css/ie8.css'), array('tailkick-style'), '20161202');
  wp_style_add_data('tailkick-ie8', 'conditional', 'lt IE 9');

  // Load the html5 shiv.
  wp_enqueue_script('html5', get_theme_file_uri('/assets/js/html5.js'), array(), '20161020');
  wp_script_add_data('html5', 'conditional', 'lt IE 9');

  wp_enqueue_script('tailkick-skip-link-focus-fix', get_theme_file_uri('/assets/js/skip-link-focus-fix.js'), array(), '20161114', true);

  $tailkick_l10n = array(
    'quote' => tailkick_get_svg(array('icon' => 'quote-right')),
  );

  if (has_nav_menu('top')) {
    wp_enqueue_script('tailkick-navigation', get_theme_file_uri('/assets/js/navigation.js'), array('jquery'), '20210122', true);
    $tailkick_l10n['expand']   = __('Expand child menu', 'tailkick');
    $tailkick_l10n['collapse'] = __('Collapse child menu', 'tailkick');
    $tailkick_l10n['icon']     = tailkick_get_svg(
      array(
        'icon'     => 'angle-down',
        'fallback' => true,
      )
    );
  }

  wp_enqueue_script('tailkick-global', get_theme_file_uri('/assets/js/global.js'), array('jquery'), '20211130', true);

  wp_enqueue_script('jquery-scrollto', get_theme_file_uri('/assets/js/jquery.scrollTo.js'), array('jquery'), '2.1.3', true);

  wp_localize_script('tailkick-skip-link-focus-fix', 'tailkickScreenReaderText', $tailkick_l10n);

  if (is_singular() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }
}
add_action('wp_enqueue_scripts', 'tailkick_scripts');

/**
 * Enqueues styles for the block-based editor.
 *
 * @since TailKick 0.1
 */
function tailkick_block_editor_styles()
{
  // Block styles.
  wp_enqueue_style('tailkick-block-editor-style', get_theme_file_uri('/assets/css/editor-blocks.css'), array(), '20220912');
  // Add custom fonts.
  wp_enqueue_style('tailkick-fonts', tailkick_fonts_url(), array(), null);
}
add_action('enqueue_block_editor_assets', 'tailkick_block_editor_styles');

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images.
 *
 * @since TailKick 0.1
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function tailkick_content_image_sizes_attr($sizes, $size)
{
  $width = $size[0];

  if (740 <= $width) {
    $sizes = '(max-width: 706px) 89vw, (max-width: 767px) 82vw, 740px';
  }

  if (is_active_sidebar('sidebar-1') || is_archive() || is_search() || is_home() || is_page()) {
    if (!(is_page() && 'one-column' === get_theme_mod('page_options')) && 767 <= $width) {
      $sizes = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
    }
  }

  return $sizes;
}
add_filter('wp_calculate_image_sizes', 'tailkick_content_image_sizes_attr', 10, 2);

/**
 * Filters the `sizes` value in the header image markup.
 *
 * @since TailKick 0.1
 *
 * @param string $html   The HTML image tag markup being filtered.
 * @param object $header The custom header object returned by 'get_custom_header()'.
 * @param array  $attr   Array of the attributes for the image tag.
 * @return string The filtered header image HTML.
 */
function tailkick_header_image_tag($html, $header, $attr)
{
  if (isset($attr['sizes'])) {
    $html = str_replace($attr['sizes'], '100vw', $html);
  }
  return $html;
}
add_filter('get_header_image_tag', 'tailkick_header_image_tag', 10, 3);

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails.
 *
 * @since TailKick 0.1
 *
 * @param string[]     $attr       Array of attribute values for the image markup, keyed by attribute name.
 *                                 See wp_get_attachment_image().
 * @param WP_Post      $attachment Image attachment post.
 * @param string|int[] $size       Requested image size. Can be any registered image size name, or
 *                                 an array of width and height values in pixels (in that order).
 * @return string[] The filtered attributes for the image markup.
 */
function tailkick_post_thumbnail_sizes_attr($attr, $attachment, $size)
{
  if (is_archive() || is_search() || is_home()) {
    $attr['sizes'] = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
  } else {
    $attr['sizes'] = '100vw';
  }

  return $attr;
}
add_filter('wp_get_attachment_image_attributes', 'tailkick_post_thumbnail_sizes_attr', 10, 3);

/**
 * Use front-page.php when Front page displays is set to a static page.
 *
 * @since TailKick 0.1
 *
 * @param string $template front-page.php.
 * @return string The template to be used: blank if is_home() is true (defaults to index.php),
 *                otherwise $template.
 */
function tailkick_front_page_template($template)
{
  return is_home() ? '' : $template;
}
add_filter('frontpage_template', 'tailkick_front_page_template');

/**
 * Modifies tag cloud widget arguments to display all tags in the same font size
 * and use list format for better accessibility.
 *
 * @since TailKick 0.1
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array The filtered arguments for tag cloud widget.
 */
function tailkick_widget_tag_cloud_args($args)
{
  $args['largest']  = 1;
  $args['smallest'] = 1;
  $args['unit']     = 'em';
  $args['format']   = 'list';

  return $args;
}
add_filter('widget_tag_cloud_args', 'tailkick_widget_tag_cloud_args');

/**
 * Gets unique ID.
 *
 * This is a PHP implementation of Underscore's uniqueId method. A static variable
 * contains an integer that is incremented with each call. This number is returned
 * with the optional prefix. As such the returned value is not universally unique,
 * but it is unique across the life of the PHP process.
 *
 * @since TailKick 0.1
 *
 * @see wp_unique_id() Themes requiring WordPress 5.0.3 and greater should use this instead.
 *
 * @param string $prefix Prefix for the returned ID.
 * @return string Unique ID.
 */
function tailkick_unique_id($prefix = '')
{
  static $id_counter = 0;
  if (function_exists('wp_unique_id')) {
    return wp_unique_id($prefix);
  }
  return $prefix . (string) ++$id_counter;
}

if (!function_exists('wp_get_list_item_separator')) :
  /**
   * Retrieves the list item separator based on the locale.
   *
   * Added for backward compatibility to support pre-6.0.0 WordPress versions.
   *
   * @since 6.0.0
   */
  function wp_get_list_item_separator()
  {
    /* translators: Used between list items, there is a space after the comma. */
    return __(', ', 'tailkick');
  }
endif;

/**
 * Implement the Custom Header feature.
 */
require get_parent_theme_file_path('/inc/custom-header.php');

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path('/inc/template-tags.php');

/**
 * Additional features to allow styling of the templates.
 */
require get_parent_theme_file_path('/inc/template-functions.php');

/**
 * Customizer additions.
 */
require get_parent_theme_file_path('/inc/customizer.php');

/**
 * SVG icons functions and filters.
 */
require get_parent_theme_file_path('/inc/icon-functions.php');

/**
 * Block Patterns.
 */
require get_template_directory() . '/inc/block-patterns.php';

/**
 * Custom nav walker for Tailkick
 */
require_once('tk_walker_nav.php');
require_once('tk_walker_comment.php');

function get_custom_styles_btn()
{
  //  see tk_customize
  $bg = get_theme_mod('global_color_primary');
  $fg = get_theme_mod('global_foreground');

  $output = '';
  if ($bg != "" || $fg != "") {
    $output .= ' style="';
    // background of the button is customizable
    if ($bg != '') $output .= 'background-color: ' . $bg . ';';
    // border color and text color are customizable
    if ($fg != '') $output .= 'color: ' . $fg . ';border-color: ' . $fg . ';';
    $output .= '"';
  }
  return $output;
}

/**
 * Function for styling screen reader only elements.
 *
 * @param array $append add more class names to be returned in the string.
 *
 * @return string
 */
function sr_only_classes(array $append): string
{
  $default = array(
    'sr-only',
    'focus:not-sr-only',
    'focus:bg-gray-50',
    'focus:rounded',
    'focus:shadow',
    'focus:text-sky-800',
    'focus:text-sm',
    'focus:font-bold',
    'focus:left-1.5',
    'focus:leading:normal',
    'focus:py-3.5',
    'focus:pr-6',
    'focus:no-underline',
    'focus:top-1.5',
    'focus:z-[100000]',
  );

  if ($append !== null) {
    $default = array_merge(
      $default,
      $append,
    );
  }

  return implode(' ', $default);
}

/**
 * Function for `next_post_link` filter-hook.
 * 
 * @param string  $output   The adjacent post link.
 * @param string  $format   Link anchor format.
 * @param string  $link     Link permalink format.
 * @param WP_Post $post     The adjacent post.
 * @param string  $adjacent Whether the post is previous or next.
 *
 * @return string
 */
function tailkick_next_post_link_filter($output, $format, $link, $post, $adjacent)
{

  $stage_1 = str_replace('nav-next', 'ml-auto mr-0 nav-next', $output);
  return $stage_1;
}
add_filter('next_post_link', 'tailkick_next_post_link_filter', 10, 5);

/**
 * Function for `comment_form_field_cookies` filter-hook.
 * 
 * @param string $field The HTML-formatted output of the comment form field.
 *
 * @return string
 */
function tailkick_comment_form_field_cookies_filter($field)
{
  $stage_1 = str_replace('comment-form-cookies-consent', 'flex items-center comment-form-cookies-consent', $field);
  $stage_2 = str_replace('label', 'label class="m-0 p-0"', $stage_1);

  return $stage_2;
}
add_filter('comment_form_field_cookies', 'tailkick_comment_form_field_cookies_filter');

/**
 * Function for checking if a post format has a special handling of the featured image.
 *
 * @param string $post_format_type The result of 
 */
function featured_image_exception(string $post_format_type): bool
{

  $format_exceptions = array(
    'aside',
    'audio',
    'chat',
    'image',
    'link',
    'quote',
    'status',
    'video',
  );

  return in_array($post_format_type, $format_exceptions);
}

/**
 * Function for `render_block` filter-hook.
 * 
 * @param string   $block_content The block content.
 * @param array    $block         The full block, including name and attributes.
 * @param WP_Block $instance      The block instance.
 *
 * @return string
 */
function tailkick_render_block_filter($block_content, $block)
{

  $link_style = 'text-teal-600 visited:text-teal-600 hover:text-teal-500 active:text-teal-400';

  if ('core/heading' === $block['blockName']) {
    $block_content = str_replace('<h2>', '<h2 class="font-bold text-gray-900">', $block_content);
  }

  if ('core/paragraph' === $block['blockName']) {
    $block_content = str_replace('<a href', '<a class="underline ' . $link_style . '" href', $block_content);
  }

  if ('core/quote' === $block['blockName']) {
    $block_content = str_replace('<p>', '<p class="text-2xl">', $block_content);
  }

  if ('core/group' === $block['blockName']) {
    $block_content = str_replace('is-layout-flow wp-block-group', 'mb-0 is-layout-flow wp-block-group', $block_content);
    $block_content = str_replace('wp-block-latest-posts__post-title', $link_style . ' wp-block-latest-posts__post-title', $block_content);
    $block_content = str_replace('wp-block-latest-comments__comment"', 'mb-2 leading-5 wp-block-latest-comments__comment"', $block_content);
    $block_content = str_replace('wp-block-latest-comments__comment-link', $link_style . ' wp-block-latest-comments__comment-link', $block_content);
    $block_content = str_replace('<a href', '<a class="' . $link_style . '" href', $block_content);
  }

  if ('core/image' === $block['blockName']) {
    $block_content = str_replace('wp-image', 'rounded wp-image', $block_content);
  }

  if ('core/gallery' === $block['blockName']) {
    $block_content = str_replace('wp-element-caption', 'rounded-b wp-element-caption', $block_content);
  }

  if ('core/button' === $block['blockName']) {
    $block_content = str_replace('wp-block-button__link', tailkick_button_classes_primary() . ' text-black wp-block-button__link', $block_content);
  }

  return $block_content;
}

add_filter('render_block', 'tailkick_render_block_filter', 10, 3);
