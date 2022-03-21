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
    
    wp_enqueue_style( 'sast-main-style', get_stylesheet_directory_uri( )."/dist/main.css", array(), SA_BLOCK_THEME_VERSION );
    wp_enqueue_style( 'sast-fonts', "https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&family=Open+Sans:wght@300;400;700&family=Raleway:wght@300;400;700&display=swap", array(), SA_BLOCK_THEME_VERSION );

    wp_enqueue_script( 'sast-mobile-menu', get_stylesheet_directory_uri()."/dist/mobile-menu.js", array(), SA_BLOCK_THEME_VERSION, true );

}
add_action( 'wp_enqueue_scripts', 'sast_theme_styles_scripts' );


/**
 * 
 * Add custom styles and scripts for gutenberg blocks
 * 
 */
function sast_theme_customize_gutenberg_blocks() {

	wp_enqueue_script('sast-button-blocks-extended', get_stylesheet_directory_uri() . '/admin/gutenberg/block-button/block-button.js', array( 'wp-blocks', 'wp-dom' ), SA_BLOCK_THEME_VERSION, true);
	
}
add_action( 'enqueue_block_editor_assets', 'sast_theme_customize_gutenberg_blocks' );