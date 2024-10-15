<?php

/**
 * Theme setup
 */
function tailmint_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 */
	load_theme_textdomain( 'tailmint', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	/*
	 * Register primary menu
	 *
	 */
	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'tailmint' ),
		)
	);

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	add_theme_support( 'custom-logo' );

}

add_action( 'after_setup_theme', 'tailmint_setup' );

/**
 * Disable image scaling
 *
 * @param string  $scale.
 *
 * @return boolean
 *
 */
function disable_image_scaling( $scale ) {
    return false;
}

add_filter( 'big_image_size_threshold', 'disable_image_scaling' );

/**
 * Enable classic editor
 *
 * @param string  $user.
 *
 */
function tailmint_enable_classic_editor( $user ) {
    add_filter( 'use_block_editor_for_post', '__return_false' );
}

add_action( 'init', 'tailmint_enable_classic_editor' );

/**
 * Get asset path.
 *
 * @param string  $path Path to asset.
 *
 * @return string
 */
function tailmint_asset( $path ) {
	if ( wp_get_environment_type() === 'production' ) {
		return get_stylesheet_directory_uri() . '/' . $path;
	}

	return add_query_arg( 'time', time(),  get_stylesheet_directory_uri() . '/' . $path );
}

/**
 * Allow SVG in upload media.
 *
 * @param string  $mimes
 *
 * @return mixed
 */

function tailmint_alow_svg_upload( $mimes ) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

add_filter( 'upload_mimes', 'tailmint_alow_svg_upload' );

/**
 * Enqueue theme assets
 *
 */
function tailmint_enqueue() {
	$theme = wp_get_theme();
	$theme_version = $theme->get( 'Version' );
	wp_enqueue_style( 'tailmint', tailmint_asset( 'dist/css/app.css' ), array(), $theme_version );
	wp_enqueue_script( 'tailmint', tailmint_asset( 'dist/js/app.js' ), array(), $theme_version, true);
	wp_enqueue_script( 'slick', tailmint_asset( 'node_modules/slick-carousel/slick/slick.min.js' ), array('jquery'), $theme_version, array());
	wp_enqueue_style( 'slick', tailmint_asset( 'node_modules/slick-carousel/slick/slick.css' ), array(), $theme_version );
}

add_action('wp_enqueue_scripts', 'tailmint_enqueue');