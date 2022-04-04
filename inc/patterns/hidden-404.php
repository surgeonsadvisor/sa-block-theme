<?php
/**
 * 404 content.
 */
return array(
	'title'    => __( '404 content', 'sast-theme' ),
	'inserter' => false,
	'content'  => '<!-- wp:heading {"textAlign":"center","level":1} -->
                    <h1 class="has-text-align-center">'.  esc_html__( 'THIS PAGE IS NO LONGER AVAILABLE.', 'sast-theme').'</h1>
                    <!-- /wp:heading -->                    
                    <!-- wp:paragraph {"align":"center"} -->
                    <p class="has-text-align-center">'. esc_html__( 'The page you are looking for no longer exists. Perhaps you can return back to the site\'s', 'sast-theme' ) .' <a href="/">'. esc_html__( 'homepage', 'sast-theme' ) .'</a> '. esc_html__( 'and see if you can find what you are looking for. Or, you can try finding it by using the search form below.', 'sast-theme' ) .'</p>
                    <!-- /wp:paragraph -->                    
                    <!-- wp:search {"label":"'. esc_html_x( 'Search', 'label', 'sast-theme' ) .'","showLabel":false,"placeholder":"'. esc_html_x( 'Search this website', 'placeholder', 'sast-theme' ) .'","buttonText":"'. esc_html_x( 'Search', 'buttonText', 'sast-theme' ) .'"} /-->                   
                    <!-- wp:columns -->
                    <div class="wp-block-columns"><!-- wp:column -->
                    <div class="wp-block-column"><!-- wp:image { "sizeSlug":"full","linkDestination":"none"} -->
                    <figure class="wp-block-image size-full"><img src="/wp-content/themes/sa-block-theme/assets/img/placeholder-image.jpg" alt="'. esc_html__( 'Placeholder', 'sast-theme' ) .'"/></figure>
                    <!-- /wp:image -->                    
                    <!-- wp:heading -->
                    <h2>'. esc_html__( 'Procedure Category', 'sast-theme' ) .'</h2>
                    <!-- /wp:heading -->                    
                    <!-- wp:list -->
                    <ul><li>'. esc_html__( 'Procedure 1', 'sast-theme' ) .'</li><li>'. esc_html__( 'Procedure 2', 'sast-theme' ) .'</li><li>'. esc_html__( 'Procedure 3', 'sast-theme' ) .'</li><li>'. esc_html__( 'Procedure 4', 'sast-theme' ) .'</li><li>'. esc_html__( 'Procedure 5', 'sast-theme' ) .'</li></ul>
                    <!-- /wp:list --></div>
                    <!-- /wp:column -->                    
                    <!-- wp:column -->
                    <div class="wp-block-column"><!-- wp:image { "sizeSlug":"full","linkDestination":"none"} -->
                    <figure class="wp-block-image size-full"><img src="/wp-content/themes/sa-block-theme/assets/img/placeholder-image.jpg" alt="'. esc_html__( 'Placeholder', 'sast-theme' ) .'"/></figure>
                    <!-- /wp:image -->                    
                    <!-- wp:heading -->
                    <h2>'. esc_html__( 'Procedure Category', 'sast-theme' ) .'</h2>
                    <!-- /wp:heading -->                    
                    <!-- wp:list -->
                    <ul><li>'. esc_html__( 'Procedure 1', 'sast-theme' ) .'</li><li>'. esc_html__( 'Procedure 2', 'sast-theme' ) .'</li><li>'. esc_html__( 'Procedure 3', 'sast-theme' ) .'</li><li>'. esc_html__( 'Procedure 4', 'sast-theme' ) .'</li><li>'. esc_html__( 'Procedure 5', 'sast-theme' ) .'</li></ul>
                    <!-- /wp:list --></div>
                    <!-- /wp:column --></div>
                    <!-- /wp:columns -->',
);
