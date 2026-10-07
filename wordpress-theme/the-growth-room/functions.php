<?php
/**
 * The Growth Room theme functions.
 *
 * @package the-growth-room
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Theme setup: editor styles.
 */
function the_growth_room_setup() {
	add_theme_support( 'editor-styles' );
	add_editor_style( 'assets/css/theme.css' );
}
add_action( 'after_setup_theme', 'the_growth_room_setup' );

/**
 * Front-end styles.
 */
function the_growth_room_enqueue() {
	wp_enqueue_style(
		'the-growth-room',
		get_theme_file_uri( 'assets/css/theme.css' ),
		array(),
		wp_get_theme()->get( 'Version' )
	);
}
add_action( 'wp_enqueue_scripts', 'the_growth_room_enqueue' );

/**
 * Pattern category so the sections are easy to find in the inserter.
 */
function the_growth_room_pattern_category() {
	register_block_pattern_category(
		'the-growth-room',
		array( 'label' => __( 'The Growth Room', 'the-growth-room' ) )
	);
}
add_action( 'init', 'the_growth_room_pattern_category' );
