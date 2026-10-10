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

/**
 * Use the bundled logo until a custom logo is uploaded in the Site Editor.
 *
 * @param string $block_content Rendered block.
 * @param array  $block         Parsed block.
 * @return string
 */
function the_growth_room_default_logo( $block_content, $block ) {
	if ( '' !== trim( $block_content ) || has_custom_logo() ) {
		return $block_content;
	}

	$width = isset( $block['attrs']['width'] ) ? (int) $block['attrs']['width'] : 120;
	$class = 'wp-block-site-logo';
	if ( ! empty( $block['attrs']['className'] ) ) {
		$class .= ' ' . $block['attrs']['className'];
	}

	return sprintf(
		'<div class="%1$s"><a href="%2$s" class="custom-logo-link" rel="home"><img class="custom-logo" src="%3$s" width="%4$d" height="%5$d" alt="%6$s"></a></div>',
		esc_attr( $class ),
		esc_url( home_url( '/' ) ),
		esc_url( get_theme_file_uri( 'assets/images/logo.png' ) ),
		$width,
		(int) round( $width * 174 / 297 ),
		esc_attr( get_bloginfo( 'name' ) )
	);
}
add_filter( 'render_block_core/site-logo', 'the_growth_room_default_logo', 10, 2 );

/**
 * Load Calendly's widget script wherever an inline Calendly embed is used.
 * Loaded from the theme so it still works if WordPress strips <script>
 * tags from pasted embed code.
 */
function the_growth_room_calendly_script() {
	$post    = get_post();
	$content = $post ? $post->post_content : '';
	if ( ! is_front_page() && false === strpos( $content, 'calendly-inline-widget' ) ) {
		return;
	}
	wp_enqueue_script(
		'calendly-widget',
		'https://assets.calendly.com/assets/external/widget.js',
		array(),
		null,
		array(
			'in_footer' => true,
			'strategy'  => 'async',
		)
	);
}
add_action( 'wp_enqueue_scripts', 'the_growth_room_calendly_script' );
