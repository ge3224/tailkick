<?php

  function tk_customize_register($wp_customize){

    // Hero-home Section
    $wp_customize->add_section('hero_home', array(
      'title'   => esc_html__('Homepage Hero Section', 'tailkick'),
      'description' => sprintf(esc_html__('Options for the hero section of the homepage','tailkick')),
      'priority'    => 130
    ));

    $wp_customize->add_setting('hero_home_image', array(
      'default'   => get_bloginfo('template_directory').'/images/tailkick-hero-home-wide.jpg',
      'type'      => 'theme_mod'
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_home_image', array(
      'label'   => esc_html__('Hero Image', 'tailkick'),
      'section' => 'hero_home',
      'settings' => 'hero_home_image',
      'priority'  => 1
    )));

    $wp_customize->add_setting('hero_home_heading', array(
      'default'   => _x('Buy. Sell. Discover.', 'tailkick'),
      'type'      => 'theme_mod'
    ));

    $wp_customize->add_control('hero_home_heading', array(
      'label'   => esc_html__('Heading', 'tailkick'),
      'section' => 'hero_home',
      'priority'  => 2
    ));


    $wp_customize->add_setting('hero_home_text', array(
      'default'   => _x('Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum luctus gravida neque, et fringilla erat aliquet id.', 'tailkick'),
      'type'      => 'theme_mod'
    ));

    $wp_customize->add_control('hero_home_text', array(
      'label'   => esc_html__('Text', 'tailkick'),
      'section' => 'hero_home',
      'priority'  => 3
    ));

    $wp_customize->add_setting('btn_url', array(
      'default'   => _x('https://github.com/ge3224/tailkick', 'tailkick'),
      'type'      => 'theme_mod'
    ));

    $wp_customize->add_control('btn_url', array(
      'label'   => esc_html__('Button URL', 'tailkick'),
      'section' => 'hero_home',
      'priority'  => 4
    ));

    $wp_customize->add_setting('btn_text', array(
      'default'   => _x('Download', 'tailkick'),
      'type'      => 'theme_mod'
    ));

    $wp_customize->add_control('btn_text', array(
      'label'   => esc_html__('Button Text', 'tailkick'),
      'section' => 'hero_home',
      'priority'  => 5
    ));
  }

  add_action('customize_register', 'tk_customize_register');
