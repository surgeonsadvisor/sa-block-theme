<?php

function sast_page_options() {

	$cmb = new_cmb2_box( array(
		'id'            => 'sast_scripts_metabox',
		'title'         => __( 'Scripts', 'sast_block_theme' ),
		'object_types'  => array( 'page', 'post' ),
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true,
        'show_on_cb'    => ''
	) );

    $cmb->add_field( array(
        'name' => __( 'Header Scripts', 'sast_block_theme'),
        'desc' => __( 'Output before the closing <code>head</code> tag, after sitewide header scripts.', 'sast_block_theme'),
        'id' => 'sast_scripts_header_ind',
        'type' => 'textarea_code',
        'options' => array( 'disable_codemirror' => true ),
    ) );

    $cmb->add_field( array(
        'name' => __('Footer Scripts', 'sast_block_theme'),
        'id' => 'sast_scripts_footer_ind',
        'type' => 'textarea_code',
        'options' => array( 'disable_codemirror' => true ),
    ) );

}

add_action( 'cmb2_admin_init', 'sast_page_options' );

function sast_output_header_scripts_ind() {

    $code = get_post_meta( get_the_ID(), 'sast_scripts_header_ind', true);

    if ( !empty( $code ) ) {
        echo  $code;
    }   

}
add_action( 'wp_head', 'sast_output_header_scripts_ind', 10, 0 );

function sast_output_footer_scripts_ind() {

    $code = get_post_meta( get_the_ID(), 'sast_scripts_footer_ind', true);

    if ( !empty( $code ) ) {
        echo  $code;
    }   

}
add_action( 'wp_footer', 'sast_output_footer_scripts_ind', 9999999, 0 );