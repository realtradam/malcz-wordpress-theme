<?php

$theme = wp_get_theme();
define('THEME_VERSION', $theme->get('Version'));

function malcz_theme_setup() {
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'malcz_theme_setup');

function load_css() {
	wp_enqueue_style(
		'picocss',
		get_template_directory_uri() . '/css/pico.min.css',
		array(),
		THEME_VERSION,
		'all'
	);

	wp_enqueue_style(
		'header',
		get_template_directory_uri() . '/css/header.css',
		array('picocss'),
		THEME_VERSION,
		'all'
	);
}
add_action('wp_enqueue_scripts', 'load_css');

function load_js() {
    wp_enqueue_script(
        'theme-switcher',
        get_template_directory_uri() . '/js/minimal-theme-switcher-picocss.js',
        array(),
        THEME_VERSION,
        true
    );

	
    wp_enqueue_script(
        'parallax-header',
        get_template_directory_uri() . '/js/parallax-header.js',
        array(),
        THEME_VERSION,
        true
    );
}
add_action('wp_enqueue_scripts', 'load_js');

add_theme_support('menus');

register_nav_menus(

	array(
		'top-menu' => 'Top Menu Location',
		'mobile-menu' => 'Mobile Menu Location'
	)

);

add_filter('nav_menu_link_attributes', function($atts, $item, $args, $depth) {
    // Only target the top-menu
    if ($args->theme_location === 'top-menu') {
        // Add 'contrast' only to links that are NOT the current page
        if (empty($atts['aria-current']) || $atts['aria-current'] === 'false') {
            if (!empty($atts['class'])) {
                $atts['class'] .= ' contrast';
            } else {
                $atts['class'] = 'contrast';
            }
        }
    }
    return $atts;
}, 10, 4);

