<?php
/* ----------------------------------------------------------- *
 * Start the engine
 * ----------------------------------------------------------- */
include_once( get_template_directory() . '/lib/init.php' );

/* ----------------------------------------------------------- *
 * Child theme (do not remove)
 * ----------------------------------------------------------- */
define( 'CHILD_THEME_NAME', 'Archetype for Genesis' );
define( 'CHILD_THEME_URL', 'http://logoscreative.co' );
define( 'CHILD_THEME_VERSION', '1.0.7' );

/* ----------------------------------------------------------- *
 * Styles & Scripts
 * ----------------------------------------------------------- */

function archetype_enqueue_bootstrap() {

	if ( !defined('ARCHETYPE_ENQUEUE') ) {

		wp_enqueue_style( 'bootstrap-latest', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css' );

		wp_enqueue_script( 'bootstrap-latest', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js', array( 'jquery' ) );

		wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' );

	} elseif ( defined('ARCHETYPE_ENQUEUE') && ARCHETYPE_ENQUEUE === 'bower' ) {

		wp_enqueue_style( 'archetype-styles', get_stylesheet_directory_uri() . '/assets/dist/css/main.min.css' );

		wp_enqueue_script( 'archetype-scripts', get_stylesheet_directory_uri() . '/assets/dist/js/scripts.min.js', array('jquery'), false, true );

	}

}

add_action( 'wp_enqueue_scripts', 'archetype_enqueue_bootstrap' );

/* ----------------------------------------------------------- *
 * Non-equeuable Scripts
 * ----------------------------------------------------------- */

function archetype_head_markup() {

	// Touch Icon
	$output = '<link rel="apple-touch-icon-precomposed" sizes="144x144" href="' . apply_filters( 'archetype_touch_icon', get_stylesheet_directory_uri() . '/assets/dist/img/touch-icon.png' ) . '" />';

	if ( !defined('ARCHETYPE_ENQUEUE') ) {

		// Help IE
		$output .= '
		<!--[if lt IE 9]>
			<script type="text/javascript" src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script type="text/javascript" src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
			<link href="http://maxcdn.bootstrapcdn.com/respond-proxy.html" id="respond-proxy" rel="respond-proxy" />
			<link href="' . get_template_directory_uri() . '/cross-domain/respond.proxy.gif" id="respond-redirect" rel="respond-redirect" />
			<script src="' . get_template_directory_uri() . '/cross-domain/respond.proxy.js"></script>
			<![endif]-->';

	} else {

		// Help IE
		$output .= '
		<!--[if lt IE 9]>
			<script type="text/javascript" src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script type="text/javascript" src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
			<![endif]-->';

	}

	echo $output;

}

add_action( 'wp_head', 'archetype_head_markup' );

/* ----------------------------------------------------------- *
 * Add Custom Favicon
 * ----------------------------------------------------------- */

function archetype_favicon_filter( $favicon_url ) {

	return apply_filters( 'archetype_shortcut_icon', get_stylesheet_directory_uri() . '/assets/dist/img/favicon.ico' );

}

add_filter( 'genesis_pre_load_favicon', 'archetype_favicon_filter' );

/* ----------------------------------------------------------- *
 * Add HTML5 markup structure
 * ----------------------------------------------------------- */
add_theme_support( 'html5', array( 'search-form', 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

/* ----------------------------------------------------------- *
 * Add viewport meta tag for mobile browsers
 * ----------------------------------------------------------- */
add_theme_support( 'genesis-responsive-viewport' );

/* ----------------------------------------------------------- *
 * Add support for custom background
 * ----------------------------------------------------------- */
add_theme_support( 'custom-background' );

/* ----------------------------------------------------------- *
 * Add support for 3-column footer widgets
 * ----------------------------------------------------------- */
add_theme_support( 'genesis-footer-widgets', 3 );
