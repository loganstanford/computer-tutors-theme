<?php

function theme_enqueue_styles() {
    wp_enqueue_style( 'child-style', get_template_directory_uri() . '/style.css', array( 'avada-stylesheet' ) );
      wp_enqueue_style( 'ctstyle', get_stylesheet_directory_uri() . '/style.css' );
//    wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri() . '/includes/bootstrap/css/bootstrap.min.css' );
    wp_enqueue_style( 'bootstrap-theme', get_stylesheet_directory_uri() . '/includes/bootstrap/css/bootstrap-theme.min.css' );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

function avada_lang_setup() {
	$lang = get_stylesheet_directory() . '/languages';
	load_child_theme_textdomain( 'Avada', $lang );
}
add_action( 'after_setup_theme', 'avada_lang_setup' );

?>
