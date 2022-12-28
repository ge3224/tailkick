<?php
  /** 
   * TailKick: customize_register
   *
   * GUI options for modifying TailKick — using the WordPress Customizer — are
   * intended for end users. For developers, we recommend using Tailwind
   * utility classes in the theme's markup and recompiling the CSS. (More
   * information about using Tailwind is available in the README.) 
   *
   * NOTE: Modifications set in the Customizer are implemented by appending
   * inline style attributes to targeted HTML elements. Because inline styles
   * have greater specificity than CSS classes, changes made in the customizer
   * will always override Tailwind styles. To fallback to Tailwind styling, GUI
   * mods must be 'cleared.' This is why the certain settings in the following
   * customize_register have defaults set to `null` (e.g. color settings).
   *
   * @package WordPress
   * @subpackage TailKick
   *
   * @param WP_Customize_Manager $wp_customize Theme Customizer object.
   */

  /**
   * Add postMessage support for site title and description for the Theme Customizer.
   *
   * @param WP_Customize_Manager $wp_customize Theme Customizer object.
   */
  function tk_customize_register( $wp_customize ){
    $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

    /**
     * Component colors 
     *
     * Customizer defaults are `null`, since color defaults are defined using a precompiled palletwhich allows Tailwind 
     */
    $wp_customize->add_section('global_colors', array(
      'title'       => esc_html__( 'Global Colors', 'tailkick'),
      'description' => sprintf(esc_html__( 'Options for global colors', 'tailkick')),
      'priority'    => 130 // before additional CSS
    ));

    $wp_customize->add_setting('global_background', array(
      'default' => esc_attr__( null, 'tailkick' ),
      'type'    => 'theme_mod'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'global_background', array(
      'label' => esc_html__('Background', 'tailkick'),
      'section' => 'global_colors',
      'priority' => 1
    )));

    $wp_customize->add_setting('global_foreground', array(
      'default' => esc_attr__( null , 'tailkick' ),
      'type'    => 'theme_mod'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'global_foreground', array(
      'label' => esc_html__('Foreground (Text)', 'tailkick'),
      'section' => 'global_colors',
      'priority' => 1
    )));

    $wp_customize->add_setting('global_color_primary', array(
      'default' => esc_attr__(null, 'tailkick'),
      'type'    => 'theme_mod',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'global_color_primary', array(
      'label' => esc_html__('Primary', 'tailkick'),
      'section' => 'global_colors',
      'priority' => 1
    )));

    $wp_customize->add_setting('global_colors_secondary', array(
      'default' => esc_attr__( null , 'tailkick'),
      'type'    => 'theme_mod',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'global_colors_secondary', array(
      'label' => esc_html__('Secondary', 'tailkick'),
      'section' => 'global_colors',
      'priority' => 2
    )));

    $wp_customize->add_setting('global_colors_tertiary', array(
      'default' => esc_attr__( null, 'tailkick'),
      'type'    => 'theme_mod',
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
      'description' => sprintf(esc_html__('Options for the hero section of the homepage','tailkick')),
      'priority'    => 130 // before additional CSS
    ));

    /**
     * Custom homepage hero heading
     */
    $wp_customize->add_setting('hero_home_heading', array(
      'default'   => _x('Buy. Sell. Discover.', 'tailkick'),
      'type'      => 'theme_mod'
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
      'default'   => _x('Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum luctus gravida neque, et fringilla erat aliquet id.', 'tailkick'),
      'type'      => 'theme_mod'
    ));

    $wp_customize->add_control('hero_home_text', array(
      'label'     => esc_html__('Text', 'tailkick'),
      'section'   => 'hero_home',
      'priority'  => 2
    ));

    $wp_customize->add_setting('btn_text', array(
      'default'   => _x('Download', 'tailkick'),
      'type'      => 'theme_mod'
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
      'default'   => _x('https://github.com/ge3224/tailkick', 'tailkick'),
      'type'      => 'theme_mod'
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
      'default'   => get_bloginfo('template_directory').'/assets/images/tailkick-hero-home-wide.jpg',
      'type'      => 'theme_mod'
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
      'default' => _x('center', 'tailkick'),
      'type'    => 'theme_mod'
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
      'default' => _x('35%', 'tailkick'),
      'type'    => 'theme_mod'
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
      'default' => esc_html__('48.5rem', 'tailkick'),
      'type'    => 'theme_mod'
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
      'default' => _x('true', 'tailkick'),
      'type'    => 'theme_mod'
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'showcase_panel_include', array(
      'label' => esc_html__('Include Showcase Panel', 'tailkick'),
      'section' => 'showcase_panel',
      'type' => 'checkbox', 
      'priority' => 1
    ) ));
    
    /** 
    * Custom feature image in showcase box one
    */
    $wp_customize->add_setting('showcase_box1_img', array(
      'default' => get_bloginfo('template_directory').'/assets/images/tk-heart-ico.png',
      'type'    => 'theme_mod'
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
      'type'  => 'theme_mod'
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
      'default' => get_bloginfo('template_directory').'/assets/images/tk-boombox-ico.png',
      'type'    => 'theme_mod'
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
      'default' => get_bloginfo('template_directory').'/assets/images/tk-check-ico.png',
      'type'    => 'theme_mod'
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
    ));

    $wp_customize->add_control('showcase_box3_text', array(
     'label' => esc_html__('Showcase Box 3: text', 'tailkick'),
     'section' => 'showcase_panel',
     'priority' => 10
    ));
  }

  add_action('customize_register', 'tk_customize_register');
