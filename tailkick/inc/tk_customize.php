<?php
  /** 
   * TailKick: customize_register
   *
   * @package WordPress
   * @subpackage TailKick
   *
   * @param WP_Customize_Manager $wp_customize Theme Customizer object.
   */
  function tk_customize_register( $wp_customize ){

    /** 
    * Customize the homepage hero section
    */
    $wp_customize->add_section('hero_home', array(
      'title'       => esc_html__('Homepage Hero', 'tailkick'),
      'description' => sprintf(esc_html__('Options for the hero section of the homepage','tailkick')),
      'priority'    => 130 // before additional CSS
    ));

    /** 
     * Custom background image for the homepage hero section
     */
    $wp_customize->add_setting('hero_home_image', array(
      'default'   => get_bloginfo('template_directory').'/images/tailkick-hero-home-wide.jpg',
      'type'      => 'theme_mod'
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_home_image', array(
      'label'     => esc_html__('Hero Image', 'tailkick'),
      'section'   => 'hero_home',
      'settings'  => 'hero_home_image',
      'priority'  => 1
    )));

    /**
     * Custom homepage hero heading
     */
    $wp_customize->add_setting('hero_home_heading', array(
      'default'   => _x('Buy. Sell. Discover.', 'tailkick'),
      'type'      => 'theme_mod'
    ));

    $wp_customize->add_control('hero_home_heading', array(
      'label'     => esc_html__('Heading', 'tailkick'),
      'section'   => 'hero_home',
      'priority'  => 2
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
      'priority'  => 3
    ));

    /**
     * Custom button actions
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

    $wp_customize->add_setting('btn_text', array(
      'default'   => _x('Download', 'tailkick'),
      'type'      => 'theme_mod'
    ));

    $wp_customize->add_control('btn_text', array(
      'label'     => esc_html__('Button Text', 'tailkick'),
      'section'   => 'hero_home',
      'priority'  => 5
    ));

    /** 
    * Customize the showcase panel
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
      'default' => get_bloginfo('template_directory').'/images/tk-heart-ico.png',
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
      'default' => get_bloginfo('template_directory').'/images/tk-boombox-ico.png',
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
      'default' => get_bloginfo('template_directory').'/images/tk-check-ico.png',
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
