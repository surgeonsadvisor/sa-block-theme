<?php

/**
 * 
 * shortcode for lazy load youtube videos 
 * 
 * NOTE:    [lazy_video id="VIDEO_ID" image="IMAGE_PATH"]
 *   
 * 
 */

function sa_lazy_youtube_video($atts){

	$a = shortcode_atts( array(
		'id' 	=>	'',
		'image'	=>	'',
    ), $atts );

    wp_enqueue_script( 'lazyload-youtube-js');
    wp_enqueue_style( 'lazyload-youtube-css');

    return '<div class="youtube__wrapper">
				<div class="youtube" data-id="'. esc_attr( $a['id'] ) .'" style="background-image: url('. esc_attr( $a['image'] ) .')"; >
					<div class="play-button"></div>
				</div>
			</div>';
    
}
add_shortcode( 'lazy_video', 'sa_lazy_youtube_video' );