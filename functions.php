<?php

define( "SA_BLOCK_THEME_VERSION", "0.0.1" );

if ( ! function_exists( 'sast_theme_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which runs
     * before the init hook. The init hook is too late for some features, such as indicating
     * support for post thumbnails.
     */
    function sast_theme_setup() { 
        /**
         * Enable support for post thumbnails and featured images.
         */
        add_theme_support( 'post-thumbnails' );
 
        add_theme_support( 'editor-styles' );
 
        add_theme_support( 'wp-block-styles' );
    }
endif;
add_action( 'after_setup_theme', 'sast_theme_setup' );

/**
 * Enqueue theme scripts and styles.
 */
function sast_theme_styles_scripts() {
    wp_enqueue_style( 'sast-style', get_stylesheet_uri() );
    wp_enqueue_style( 'sast-fonts', "https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&family=Open+Sans:wght@300;400;700&family=Raleway:wght@300;400;700&display=swap", array(), SA_BLOCK_THEME_VERSION );

}
add_action( 'wp_enqueue_scripts', 'sast_theme_styles_scripts' );