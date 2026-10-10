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
	// Grow or shrink the calendar to fit each Calendly step (no inner scroll bar).
	wp_add_inline_script(
		'calendly-widget',
		"window.addEventListener('message',function(e){if(!/^https:\\/\\/([a-z0-9-]+\\.)?calendly\\.com$/.test(e.origin))return;var d=e.data;if(!d||d.event!=='calendly.page_height'||!d.payload)return;var h=parseInt(d.payload.height,10);if(!h)return;document.querySelectorAll('.calendly-inline-widget').forEach(function(w){w.style.height=(h+10)+'px';});});",
		'before'
	);
}
add_action( 'wp_enqueue_scripts', 'the_growth_room_calendly_script' );

/**
 * The Calendly scheduling page shown in the Booking section.
 *
 * @return string
 */
function the_growth_room_calendly_url() {
	return apply_filters( 'the_growth_room_calendly_url', 'https://calendly.com/cecily_therese' );
}

/**
 * Put the Calendly calendar into the Booking card even when the home page
 * was saved in the Site Editor before the calendar was added to the theme.
 *
 * @param string $block_content Rendered block.
 * @param array  $block         Parsed block.
 * @return string
 */
function the_growth_room_booking_calendar( $block_content, $block ) {
	$class = isset( $block['attrs']['className'] ) ? $block['attrs']['className'] : '';
	if ( false === strpos( $class, 'tgr-booking' ) || false !== strpos( $block_content, 'calendly-inline-widget' ) ) {
		return $block_content;
	}
	if ( ! preg_match( '/^(\s*<div\b[^>]*>)(.*)(<\/div>\s*)$/s', $block_content, $parts ) ) {
		return $block_content;
	}

	$url    = add_query_arg(
		array(
			'hide_gdpr_banner' => '1',
			'primary_color'    => '004aad',
		),
		the_growth_room_calendly_url()
	);
	$widget = sprintf(
		'<div class="calendly-inline-widget" data-url="%s" data-resize="true" style="min-width:300px;height:700px;"></div>',
		esc_url( $url )
	);

	return $parts[1] . $widget . $parts[3];
}
add_filter( 'render_block_core/group', 'the_growth_room_booking_calendar', 10, 2 );
