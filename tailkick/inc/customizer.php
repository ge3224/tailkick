<?php

/**
 * TailKick: Customizer
 *
 * GUI options for modifying TailKick — using the WordPress Customizer — are
 * intended for end users. For developers, we recommend using Tailwind
 * utility classes in the theme's markup and recompiling the CSS. (More
 * information about using Tailwind is available in the README.) 
 *
 * NOTE: Modifications set in the Customizer are implemented by appending
 * inline style attributes to targeted HTML elements. Because inline styles
 * have greater specificity than CSS class selectors, changes made in the
 * customizer will always override Tailwind styles. To fallback to Tailwind
 * styling, GUI mods must be 'cleared.' This is why the certain settings in
 * the following customize_register have defaults set to `null` (e.g. color
 * settings).
 *
 * @package WordPress
 * @subpackage TailKick
 * @since TailKick 0.1
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function tailkick_customize_register($wp_customize)
{
  $wp_customize->get_setting('blogname')->transport         = 'postMessage';
  $wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
  $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

  $wp_customize->selective_refresh->add_partial(
    'blogname',
    array(
      'selector'        => '.site-title a',
      'render_callback' => 'tailkick_customize_partial_blogname',
    )
  );
  $wp_customize->selective_refresh->add_partial(
    'blogdescription',
    array(
      'selector'        => '.site-description',
      'render_callback' => 'tailkick_customize_partial_blogdescription',
    )
  );

  /**
   * Component colors 
   *
   * Customizer defaults are `null`, since color defaults are defined using a precompiled palletwhich allows Tailwind 
   */
  $wp_customize->add_section('global_colors', array(
    'title'       => esc_html__('Global Colors', 'tailkick'),
    'description' => sprintf(esc_html__('Options for global colors', 'tailkick')),
    'priority'    => 130 // before additional CSS
  ));

  $wp_customize->add_setting('global_background', array(
    'default' => null,
    'type'    => 'theme_mod',
    'sanitize_callback' => 'sanitize_hex_color',
  ));

  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'global_background', array(
    'label' => esc_html__('Background', 'tailkick'),
    'section' => 'global_colors',
    'priority' => 1
  )));

  $wp_customize->add_setting('global_foreground', array(
    'default' => null,
    'type'    => 'theme_mod',
    'sanitize_callback' => 'sanitize_hex_color',
  ));

  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'global_foreground', array(
    'label' => esc_html__('Foreground (Text)', 'tailkick'),
    'section' => 'global_colors',
    'priority' => 1
  )));

  $wp_customize->add_setting('global_color_primary', array(
    'default' => null,
    'type'    => 'theme_mod',
    'sanitize_callback' => 'sanitize_callback',
  ));

  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'global_color_primary', array(
    'label' => esc_html__('Primary', 'tailkick'),
    'section' => 'global_colors',
    'priority' => 1
  )));

  $wp_customize->add_setting('global_colors_secondary', array(
    'default' => null,
    'type'    => 'theme_mod',
    'sanitize_callback' => 'sanitize_hex_color',
  ));

  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'global_colors_secondary', array(
    'label' => esc_html__('Secondary', 'tailkick'),
    'section' => 'global_colors',
    'priority' => 2
  )));

  $wp_customize->add_setting('global_colors_tertiary', array(
    'default' => null,
    'type'    => 'theme_mod',
    'sanitize_callback' => 'sanitize_hex_color',
  ));

  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'global_colors_tertiary', array(
    'label' => esc_html__('Tertiary', 'tailkick'),
    'section' => 'global_colors',
    'priority' => 3
  )));

  /** 
   * Customize the homepage hero section
   */
  $wp_customize->add_section('hero_home', array(
    'title'       => esc_html__('Homepage Hero', 'tailkick'),
    'description' => sprintf(esc_html__('Options for the hero section of the homepage', 'tailkick')),
    'priority'    => 130 // before additional CSS
  ));

  /**
   * Custom homepage hero heading
   */
  $wp_customize->add_setting('hero_home_heading', array(
    'default'   => esc_html__('Buy. Sell. Discover.', 'tailkick'),
    'type'      => 'theme_mod',
    'sanitize_callback' => 'sanitize_text_field',
  ));

  $wp_customize->add_control('hero_home_heading', array(
    'label'     => esc_html__('Hero Heading', 'tailkick'),
    'section'   => 'hero_home',
    'priority'  => 1
  ));

  /**
   * Custom homepage hero nutgraf
   */
  $wp_customize->add_setting('hero_home_text', array(
    'default'   => esc_html__('Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum luctus gravida neque, et fringilla erat aliquet id.', 'tailkick'),
    'type'      => 'theme_mod',
    'sanitize_callback' => 'sanitize_text_field',
  ));

  $wp_customize->add_control('hero_home_text', array(
    'label'     => esc_html__('Text', 'tailkick'),
    'section'   => 'hero_home',
    'priority'  => 2
  ));

  $wp_customize->add_setting('btn_text', array(
    'default'   => esc_html__('Download', 'tailkick'),
    'type'      => 'theme_mod',
    'sanitize_callback' => 'sanitize_text_field',
  ));

  $wp_customize->add_control('btn_text', array(
    'label'     => esc_html__('Button Text', 'tailkick'),
    'section'   => 'hero_home',
    'priority'  => 3
  ));

  /**
   * Custom hompage hero button actions
   */
  $wp_customize->add_setting('btn_url', array(
    'default'   => 'https://github.com/ge3224/tailkick',
    'type'      => 'theme_mod',
    'sanitize_callback' => 'sanitize_url',
  ));

  $wp_customize->add_control('btn_url', array(
    'label'     => esc_html__('Button URL', 'tailkick'),
    'section'   => 'hero_home',
    'priority'  => 4
  ));

  /** 
   * Custom background image for the homepage hero section
   */
  $wp_customize->add_setting('hero_home_image', array(
    'default'   => get_template_directory_uri('template_directory') . '/assets/images/tailkick-hero-home-wide.jpg',
    'type'      => 'theme_mod',
    'sanitize_callback' => 'sanitize_url',
  ));

  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_home_image', array(
    'label'     => esc_html__('Hero Image', 'tailkick'),
    'section'   => 'hero_home',
    'settings'  => 'hero_home_image',
    'priority'  => 5
  )));

  /** 
   * Custom background-position x value
   */
  $wp_customize->add_setting('hero_home_image_position_x', array(
    'default' => esc_html__('center', 'tailkick'),
    'type'    => 'theme_mod',
    'sanitize_callback' => 'tailkick_sanitize_hero_image_position_x',
  ));

  $wp_customize->add_control('hero_home_image_position_x', array(
    'label'    => esc_html__('Image Position: X', 'tailkick'),
    'description' => 'Options for the horizontal position of the homepage hero section\'s background image',
    'section'  => 'hero_home',
    'priority' => 6
  ));

  /** 
   * Custom background-position y value
   */
  $wp_customize->add_setting('hero_home_image_position_y', array(
    'default' => '35%',
    'type'    => 'theme_mod',
    'sanitize_callback' => 'tailkick_sanitize_hero_image_position_y',
  ));

  $wp_customize->add_control('hero_home_image_position_y', array(
    'label'    => esc_html__('Image Position: Y', 'tailkick'),
    'description' => 'The vertical position of the homepage hero section\'s background image',
    'section'  => 'hero_home',
    'priority' => 7
  ));

  /**
   * Custom homepage hero height
   */
  $wp_customize->add_setting('home_hero_height', array(
    'default' => '48.5rem',
    'type'    => 'theme_mod',
    'sanitize_callback' => 'sanitize_text_field',
  ));

  $wp_customize->add_control('home_hero_height', array(
    'label' => esc_html__('Hero Height', 'tailkick'),
    'section' => 'hero_home',
    'priority' => 8
  ));

  /** 
   * Showcase Panel section
   */
  $wp_customize->add_section('showcase_panel', array(
    'title'       => esc_html__('Showcase Panel', 'tailkick'),
    'description' => sprintf(esc_html('Options for the showcase panel', 'tailkick')),
    'priority'    => 130
  ));

  /**
   * Option for including the showcase panel or not
   */
  $wp_customize->add_setting('showcase_panel_include', array(
    'default' => 'true',
    'type'    => 'theme_mod',
    'sanitize_callback' => 'tailwind_sanitize_boolean',
  ));

  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'showcase_panel_include', array(
    'label' => esc_html__('Include Showcase Panel', 'tailkick'),
    'section' => 'showcase_panel',
    'type' => 'checkbox',
    'priority' => 1
  )));

  /** 
   * Custom feature image in showcase box one
   */
  $wp_customize->add_setting('showcase_box1_img', array(
    'default' => get_template_directory_uri('template_directory') . '/assets/images/tk-heart-ico.png',
    'type'    => 'theme_mod',
    'sanitize_callback' => 'sanitize_url',
  ));

  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'showcase_box1_img', array(
    'label'    => esc_html__('Showcase Box1: Image', 'tailkick'),
    'section'  => 'showcase_panel',
    'settings' => 'showcase_box1_img',
    'priority' => 2
  )));

  /**
   * Custom headline for showcase box one
   */
  $wp_customize->add_setting('showcase_box1_heading', array(
    'default'     => esc_html__('Show It', 'tailkick'),
    'type'  => 'theme_mod',
    'sanitize_callback' => 'sanitize_text_field',
  ));

  $wp_customize->add_control('showcase_box1_heading', array(
    'label' => esc_html__('Showcase Box: heading', 'tailkick'),
    'section' => 'showcase_panel',
    'priority' => 3
  ));

  /**
   * Custom text for showcase box one
   */
  $wp_customize->add_setting('showcase_box1_text', array(
    'default'     => esc_html__('Duis nec ante lorem. Ut vestibulum nibh id auctor semper. Etiam consectetur accumsan dui sed malesuada.', 'tailkick'),
    'type'   => 'theme_mod',
    'sanitize_callback' => 'sanitize_text_field',
  ));

  $wp_customize->add_control('showcase_box1_text', array(
    'label' => esc_html__('Showcase Box 1: text', 'tailkick'),
    'section' => 'showcase_panel',
    'priority' => 4
  ));

  /** 
   * Custom feature image in showcase box two
   */
  $wp_customize->add_setting('showcase_box2_img', array(
    'default' => get_template_directory_uri('template_directory') . '/assets/images/tk-boombox-ico.png',
    'type'    => 'theme_mod',
    'sanitize_callback' => 'sanitize_url',
  ));

  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'showcase_box2_img', array(
    'label'    => esc_html__('Showcase Box2: Image', 'tailkick'),
    'section'  => 'showcase_panel',
    'settings' => 'showcase_box2_img',
    'priority' => 5
  )));

  /**
   * Custom headline for showcase box two
   */
  $wp_customize->add_setting('showcase_box2_heading', array(
    'default'     => esc_html__('Sing It', 'tailkick'),
    'type'   => 'theme_mod',
    'sanitize_callback' => 'sanitize_text_field',
  ));

  $wp_customize->add_control('showcase_box2_heading', array(
    'label' => esc_html__('Showcase Box 2: heading', 'tailkick'),
    'section' => 'showcase_panel',
    'priority' => 6
  ));

  /**
   * Custom text for showcase box two
   */
  $wp_customize->add_setting('showcase_box2_text', array(
    'default'     => esc_html__('Curabitur ut ligula at turpis efficitur auctor elementum sed risus. Morbi egestas consectetur suscipit. Sed vitae lobortis purus.', 'tailkick'),
    'type'   => 'theme_mod',
    'sanitize_callback' => 'sanitize_text_field',
  ));

  $wp_customize->add_control('showcase_box2_text', array(
    'label' => esc_html__('Showcase Box 2: text', 'tailkick'),
    'section' => 'showcase_panel',
    'priority' => 7
  ));

  /** 
   * Custom feature image in showcase box three
   */
  $wp_customize->add_setting('showcase_box3_img', array(
    'default' => get_template_directory_uri('template_directory') . '/assets/images/tk-check-ico.png',
    'type'    => 'theme_mod',
    'sanitize_callback' => 'sanitize_url',
  ));

  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'showcase_box3_img', array(
    'label'    => esc_html__('Showcase Box3: Image', 'tailkick'),
    'section'  => 'showcase_panel',
    'settings' => 'showcase_box3_img',
    'priority' => 8
  )));

  /**
   * Custom headline for showcase box three
   */
  $wp_customize->add_setting('showcase_box3_heading', array(
    'default'     => esc_html__('Share It', 'tailkick'),
    'type'   => 'theme_mod',
    'sanitize_callback' => 'sanitize_text_field',
  ));

  $wp_customize->add_control('showcase_box3_heading', array(
    'label' => esc_html__('Showcase Box 3: heading', 'tailkick'),
    'section' => 'showcase_panel',
    'priority' => 9
  ));

  /**
   * Custom text for showcase box three
   */
  $wp_customize->add_setting('showcase_box3_text', array(
    'default'     => esc_html__('Quisque efficitur finibus nibh sit amet varius. Etiam ante purus, ullamcorper vitae massa vel, ornare euismod sapien.', 'tailkick'),
    'type'   => 'theme_mod',
    'sanitize_callback' => 'sanitize_text_field',
  ));

  $wp_customize->add_control('showcase_box3_text', array(
    'label' => esc_html__('Showcase Box 3: text', 'tailkick'),
    'section' => 'showcase_panel',
    'priority' => 10
  ));

  /**
   * Custom colors.
   */
  $wp_customize->add_setting(
    'colorscheme',
    array(
      'default'           => 'light',
      'transport'         => 'postMessage',
      'sanitize_callback' => 'tailkick_sanitize_colorscheme',
    )
  );

  $wp_customize->add_setting(
    'colorscheme_hue',
    array(
      'default'           => 250,
      'transport'         => 'postMessage',
      'sanitize_callback' => 'absint', // The hue is stored as a positive integer.
    )
  );

  $wp_customize->add_control(
    'colorscheme',
    array(
      'type'     => 'radio',
      'label'    => esc_html__('Color Scheme', 'tailkick'),
      'choices'  => array(
        'light'  => esc_html__('Light', 'tailkick'),
        'dark'   => esc_html__('Dark', 'tailkick'),
        'custom' => esc_html__('Custom', 'tailkick'),
      ),
      'section'  => 'colors',
      'priority' => 5,
    )
  );

  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      'colorscheme_hue',
      array(
        'mode'     => 'hue',
        'section'  => 'colors',
        'priority' => 6,
      )
    )
  );

  /**
   * Theme options.
   */
  $wp_customize->add_section(
    'theme_options',
    array(
      'title'    => esc_html__('Theme Options', 'tailkick'),
      'priority' => 130, // Before Additional CSS.
    )
  );

  $wp_customize->add_setting(
    'page_layout',
    array(
      'default'           => 'two-column',
      'sanitize_callback' => 'tailkick_sanitize_page_layout',
      'transport'         => 'postMessage',
    )
  );

  $wp_customize->add_control(
    'page_layout',
    array(
      'label'           => esc_html__('Page Layout', 'tailkick'),
      'section'         => 'theme_options',
      'type'            => 'radio',
      'description'     => esc_html__('When the two-column layout is assigned, the page title is in one column and content is in the other.', 'tailkick'),
      'choices'         => array(
        'one-column' => esc_html__('One Column', 'tailkick'),
        'two-column' => esc_html__('Two Column', 'tailkick'),
      ),
      'active_callback' => 'tailkick_is_view_with_layout_option',
    )
  );

  /**
   * Filters the number of front page sections in TailKick.
   *
   * @since TailKick 0.1
   *
   * @param int $num_sections Number of front page sections.
   */
  $num_sections = apply_filters('tailkick_front_page_sections', 4);

  // Create a setting and control for each of the sections available in the theme.
  for ($i = 1; $i < (1 + $num_sections); $i++) {
    $wp_customize->add_setting(
      'panel_' . $i,
      array(
        'default'           => false,
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage',
      )
    );

    $wp_customize->add_control(
      'panel_' . $i,
      array(
        /* translators: %d: The front page section number. */
        'label'           => sprintf(esc_html__('Front Page Section %d Content', 'tailkick'), $i),
        'description'     => (1 !== $i ? '' : esc_html__('Select pages to feature in each area from the dropdowns. Add an image to a section by setting a featured image in the page editor. Empty sections will not be displayed.', 'tailkick')),
        'section'         => 'theme_options',
        'type'            => 'dropdown-pages',
        'allow_addition'  => true,
        'active_callback' => 'tailkick_is_static_front_page',
      )
    );

    $wp_customize->selective_refresh->add_partial(
      'panel_' . $i,
      array(
        'selector'            => '#panel' . $i,
        'render_callback'     => 'tailkick_front_page_section',
        'container_inclusive' => true,
      )
    );
  }
}
add_action('customize_register', 'tailkick_customize_register');

/**
 * Sanitize the page layout options.
 *
 * @param string $input Page layout.
 */
function tailkick_sanitize_page_layout($input)
{
  $valid = array(
    'one-column' => esc_html__('One Column', 'tailkick'),
    'two-column' => esc_html__('Two Column', 'tailkick'),
  );

  if (array_key_exists($input, $valid)) {
    return $input;
  }

  return '';
}

/**
 * Sanitize the colorscheme.
 *
 * @param string $input Color scheme.
 */
function tailkick_sanitize_colorscheme($input)
{
  $valid = array('light', 'dark', 'custom');

  if (in_array($input, $valid, true)) {
    return $input;
  }

  return 'light';
}

/**
 * Sanitize hero image's background position, horizontal args
 */
function tailkick_sanitize_hero_image_position_x($input)
{
  $valid_inputs = array(
    'center',
    'left',
    'right',
  );
  if (in_array($input, $valid_inputs)) {
    return $input;
  }
  return 'center';
}

/**
 * Sanitize hero image's background position, vertical arguments
 */
function tailkick_sanitize_hero_image_position_y(string $input): string
{
  $valid_inputs = array(
    'center',
    'top',
    'bottom',
  );

  if (in_array($input, $valid_inputs)) {
    return $input;
  }
  return 'center';
}

/**
 * Sanitize booleans
 */
function tailwind_sanitize_boolean($input)
{
  $valid_inputs = array(
    'true',
    'false',
  );
  if (in_array($input, $valid_inputs)) {
    return $input;
  }
  return 'false';
}

/**
 * Render the site title for the selective refresh partial.
 *
 * @since TailKick 0.1
 *
 * @see tailkick_customize_register()
 *
 * @return void
 */
function tailkick_customize_partial_blogname()
{
  bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since TailKick 0.1
 *
 * @see tailkick_customize_register()
 *
 * @return void
 */
function tailkick_customize_partial_blogdescription()
{
  bloginfo('description');
}

/**
 * Return whether we're previewing the front page and it's a static page.
 */
function tailkick_is_static_front_page()
{
  return (is_front_page() && !is_home());
}

/**
 * Return whether we're on a view that supports a one or two column layout.
 */
function tailkick_is_view_with_layout_option()
{
  // This option is available on all pages. It's also available on archives when there isn't a sidebar.
  return (is_page() || (is_archive() && !is_active_sidebar('sidebar-1')));
}

/**
 * Bind JS handlers to instantly live-preview changes.
 */
function tailkick_customize_preview_js()
{
  wp_enqueue_script('tailkick-customize-preview', get_theme_file_uri('/assets/js/customize-preview.js'), array('customize-preview'), '20161002', true);
}
add_action('customize_preview_init', 'tailkick_customize_preview_js');

/**
 * Load dynamic logic for the customizer controls area.
 */
function tailkick_panels_js()
{
  wp_enqueue_script('tailkick-customize-controls', get_theme_file_uri('/assets/js/customize-controls.js'), array(), '20161020', true);
}
add_action('customize_controls_enqueue_scripts', 'tailkick_panels_js');
