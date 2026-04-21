<?php
function cheveux_theme_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo' );

	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'cheveux-child' ),
		'footer' => __( 'Footer Menu', 'cheveux-child' ),
	) );
}
add_action( 'after_setup_theme', 'cheveux_theme_setup' );

function cheveux_customize_register( $wp_customize ) {

	$wp_customize->add_section( 'cheveux_booking_section', array(
		'title'    => __( 'Booking Settings', 'cheveux-child' ),
		'priority' => 30,
	) );

	$wp_customize->add_setting( 'cheveux_booking_url', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( 'cheveux_booking_url', array(
		'label'   => __( 'Booking URL', 'cheveux-child' ),
		'section' => 'cheveux_booking_section',
		'type'    => 'url',
	) );
}
add_action( 'customize_register', 'cheveux_customize_register' );

function cheveux_child_enqueue_styles() {
	wp_enqueue_style(
		'understrap-parent-style',
		get_template_directory_uri() . '/style.css'
	);

	wp_enqueue_style(
		'cheveux-child-style',
		get_stylesheet_uri(),
		array('understrap-parent-style'),
		wp_get_theme()->get('Version')
	);
}
add_action('wp_enqueue_scripts', 'cheveux_child_enqueue_styles');
