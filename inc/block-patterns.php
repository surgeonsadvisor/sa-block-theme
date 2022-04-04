<?php


function sast_register_block_patterns() {
	$block_pattern_categories = array(
		'featured' => array( 'label' => __( 'Featured', 'sast-theme' ) ),
		'footer'   => array( 'label' => __( 'Footers', 'sast-theme' ) ),
		'header'   => array( 'label' => __( 'Headers', 'sast-theme' ) ),
		'query'    => array( 'label' => __( 'Query', 'sast-theme' ) ),
		'pages'    => array( 'label' => __( 'Pages', 'sast-theme' ) ),
	);
	
	$block_pattern_categories = apply_filters( 'sast_register_block_patterns', $block_pattern_categories );

	foreach ( $block_pattern_categories as $name => $properties ) {
		if ( ! WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) {
			register_block_pattern_category( $name, $properties );
		}
	}

	$block_patterns = array(
		'hidden-404'
	);

	/**
	 * Filters the theme block patterns.
	 *
	 * @since Twenty Twenty-Two 1.0
	 *
	 * @param array $block_patterns List of block patterns by name.
	 */
	$block_patterns = apply_filters( 'sast_block_patterns', $block_patterns );

	foreach ( $block_patterns as $block_pattern ) {
		$pattern_file = get_theme_file_path( '/inc/patterns/' . $block_pattern . '.php' );

		register_block_pattern(
			'sast-theme/' . $block_pattern,
			require $pattern_file
		);
	}
}
add_action( 'init', 'sast_register_block_patterns', 9 );
