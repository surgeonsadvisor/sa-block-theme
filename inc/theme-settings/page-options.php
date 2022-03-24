<?php

add_action( 'cmb2_admin_init', 'sast_page_options' );
/**
 * Define the metabox and field configurations.
 */
function sast_page_options() {

	/**
	 * Initiate the metabox
	 */
	$cmb = new_cmb2_box( array(
		'id'            => 'sast_scripts_metabox',
		'title'         => __( 'Scripts', 'sast_block_theme' ),
		'object_types'  => array( 'page', 'post' ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true,
	) );

    $cmb->add_field( array(
        'name' => __('Header Scripts', 'sast_block_theme'),
        'desc' => __('Output before the closing <code>head</code> tag, after sitewide header scripts.', 'sast_block_theme'),
        'id' => 'sast_scripts_header_ind',
        'type' => 'textarea_code'
    ) );

    $cmb->add_field( array(
        'name' => __('Footer Scripts', 'sast_block_theme'),
        'id' => 'sast_scripts_body_ind',
        'type' => 'textarea_code'
    ) );

}