<?php

function load_css() {
	wp_register_style('picocss', get_template_directory_uri() . '/css/pico.css.min', array(), false, 'all' );
	wp_enqueue_style('picocss');
}
add_action('wp_enqueue_scripts', 'load_css');


