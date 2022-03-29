<?php

define( "SA_BLOCK_THEME_VERSION", "0.1.1" );

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
    wp_enqueue_style( 'sast-mobile-fonts', get_stylesheet_directory_uri(  )."/dist/mobile-fonts.css", array(), SA_BLOCK_THEME_VERSION );
    wp_enqueue_style( 'sast-desktop-fonts', get_stylesheet_directory_uri(  )."/dist/desktop-fonts.css", array(), SA_BLOCK_THEME_VERSION );

    wp_enqueue_script( 'sast-mobile-menu', get_stylesheet_directory_uri()."/dist/mobile-menu.js", array(), SA_BLOCK_THEME_VERSION, true );

}
add_action( 'wp_enqueue_scripts', 'sast_theme_styles_scripts' );


/**
 * 
 * Add custom styles and scripts for gutenberg blocks
 * 
 */
function sast_theme_customize_gutenberg_blocks() {

    wp_enqueue_style( 'sast-button-blocks-extended', get_stylesheet_directory_uri() . '/dist/admin.css',  array( ), SA_BLOCK_THEME_VERSION );
    wp_enqueue_style( 'sast-button-blocks-extended', get_stylesheet_directory_uri() . '/admin/gutenberg/block-button/block-button.js', array( 'wp-blocks', 'wp-dom' ), SA_BLOCK_THEME_VERSION, true);
    wp_enqueue_style( 'sast-cover-blocks-extended', get_stylesheet_directory_uri() . '/admin/gutenberg/block-cover/dist/block-cover-extended.js', array( 'wp-blocks', 'wp-dom' ), SA_BLOCK_THEME_VERSION, true);
	
}
add_action( 'enqueue_block_editor_assets', 'sast_theme_customize_gutenberg_blocks' );


//* CMB2
if ( file_exists( __DIR__.'/vendor/cmb2/init.php' ) ) {
    require_once __DIR__.'/vendor/cmb2/init.php';
}

include_once( __DIR__.'/inc/theme-settings/functions.php' );
include_once( __DIR__.'/inc/theme-settings/theme-options.php' );
include_once( __DIR__.'/inc/theme-settings/page-options.php' );


/**
 * Disable the emoji's
 */
function sast_disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );	
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );	
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	
	// Remove from TinyMCE
	add_filter( 'tiny_mce_plugins', 'sast_disable_emojis_tinymce' );
}
add_action( 'init', 'sast_disable_emojis' );

/**
 * Filter out the tinymce emoji plugin.
 */
function sast_disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}

// Removes RSS feed URL
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'feed_links', 2 );