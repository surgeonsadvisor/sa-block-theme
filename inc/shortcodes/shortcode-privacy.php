<?php

/**
 * 
 * Shortcode to get data from given URL
 * 
 * NOTE: 	[sa_privacy_content url="www.domain.com"]
 * 			url is optional
 * 
 * DEMO:	http://git-test.surgeonsadvisor.com/shortcodes/privacy
 * 
 */

function sa_shortcode_privacy( $atts ) {
	$a = shortcode_atts( array(
		'url' 	=>	'https://www.surgeonsadvisor.com/legal/privacy'
	), $atts );

	$url = $a['url'];

	if ( filter_var($url, FILTER_VALIDATE_URL) ) {
		$headers = get_headers($url);
		if($headers && strpos( $headers[0], '200')) { 
			$content_website = file_get_contents($url);
			$content_page = explode(  '<div class="entry-content">' , $content_website );
			$content_privacy = explode("</div>" , $content_page[1] );
			$content_sanitize = $content_privacy[0];
		} else {
			$content_sanitize = "URL Doesn't Exist";
		}
	} else {
		$content_sanitize = "Please enter a valid URL";
	}	
	
	return $content_sanitize;
}
add_shortcode( 'sa_privacy_content', 'sa_shortcode_privacy' );