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
		'class' =>	'',
		'mobile'=>	'',
    ), $atts );

    wp_enqueue_script( 'sast-lazyload-youtube');
    wp_enqueue_style( 'sast-lazyload-youtube');

	$mobile_image = '';

	if ( !empty( $a['mobile'] ) ) {
		$mobile_image = '<source srcset="'. esc_attr( $a['mobile'] ) .'" media="(max-width: 480px)">';
	}	

    return '<div class="youtube__wrapper">
				<div class="youtube wp-block-cover" data-id="'. esc_attr( $a['id'] ) .'">
					<div class="play-button"></div>
					<picture>
						'. $mobile_image .'
						<img loading="lazy" src="'. esc_attr( $a['image'] ) .'" class="wp-block-cover__image-background '. esc_attr( $a['class'] ) .'" data-object-fit="cover">
					</picture>
				</div>
			</div>';
	

    
}
add_shortcode( 'lazy_video', 'sa_lazy_youtube_video' );