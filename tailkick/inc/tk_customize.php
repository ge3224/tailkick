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
   * have greater specificity than CSS class selectors, changes made in the
   * customizer will always override Tailwind styles. To fallback to Tailwind
   * styling, GUI mods must be 'cleared.' This is why the certain settings in
   * the following customize_register have defaults set to `null` (e.g. color
   * settings).
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
function tailkick_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

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
			'label'    => __( 'Color Scheme', 'tailkick' ),
			'choices'  => array(
				'light'  => __( 'Light', 'tailkick' ),
				'dark'   => __( 'Dark', 'tailkick' ),
				'custom' => __( 'Custom', 'tailkick' ),
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
			'title'    => __( 'Theme Options', 'tailkick' ),
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
			'label'           => __( 'Page Layout', 'tailkick' ),
			'section'         => 'theme_options',
			'type'            => 'radio',
			'description'     => __( 'When the two-column layout is assigned, the page title is in one column and content is in the other.', 'tailkick' ),
			'choices'         => array(
				'one-column' => __( 'One Column', 'tailkick' ),
				'two-column' => __( 'Two Column', 'tailkick' ),
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
	$num_sections = apply_filters( 'tailkick_front_page_sections', 4 );

	// Create a setting and control for each of the sections available in the theme.
	for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
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
				'label'           => sprintf( __( 'Front Page Section %d Content', 'tailkick' ), $i ),
				'description'     => ( 1 !== $i ? '' : __( 'Select pages to feature in each area from the dropdowns. Add an image to a section by setting a featured image in the page editor. Empty sections will not be displayed.', 'tailkick' ) ),
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
add_action( 'customize_register', 'tailkick_customize_register' );

/**
 * Sanitize the page layout options.
 *
 * @param string $input Page layout.
 */
function tailkick_sanitize_page_layout( $input ) {
	$valid = array(
		'one-column' => __( 'One Column', 'tailkick' ),
		'two-column' => __( 'Two Column', 'tailkick' ),
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	}

	return '';
}

/**
 * Sanitize the colorscheme.
 *
 * @param string $input Color scheme.
 */
function tailkick_sanitize_colorscheme( $input ) {
	$valid = array( 'light', 'dark', 'custom' );

	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}

	return 'light';
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
function tailkick_customize_partial_blogname() {
	bloginfo( 'name' );
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
function tailkick_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Return whether we're previewing the front page and it's a static page.
 */
function tailkick_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}

/**
 * Return whether we're on a view that supports a one or two column layout.
 */
function tailkick_is_view_with_layout_option() {
	// This option is available on all pages. It's also available on archives when there isn't a sidebar.
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}

/**
 * Bind JS handlers to instantly live-preview changes.
 */
function tailkick_customize_preview_js() {
	wp_enqueue_script( 'tailkick-customize-preview', get_theme_file_uri( '/assets/js/customize-preview.js' ), array( 'customize-preview' ), '20161002', true );
}
add_action( 'customize_preview_init', 'tailkick_customize_preview_js' );

/**
 * Load dynamic logic for the customizer controls area.
 */
function tailkick_panels_js() {
	wp_enqueue_script( 'tailkick-customize-controls', get_theme_file_uri( '/assets/js/customize-controls.js' ), array(), '20161020', true );
}
add_action( 'customize_controls_enqueue_scripts', 'tailkick_panels_js' );
