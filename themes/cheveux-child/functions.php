<?php
function cheveux_theme_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );

	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'cheveux-child' ),
		'footer'  => __( 'Footer Menu', 'cheveux-child' ),
	) );
}
add_action( 'after_setup_theme', 'cheveux_theme_setup' );

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
