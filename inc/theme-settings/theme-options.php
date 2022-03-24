<?php
/**
 * Hook in and register a metabox to handle a theme options page and adds a menu item.
 */
function sast_register_main_options_metabox() {

	/**
	 * Registers main options page menu item and form.
	 */
	$args = array(
		'id'           => 'sast_main_options_page',
		'title'        => 'Theme Settings',
		'object_types' => array( 'options-page' ),
		'option_key'   => 'sast_main_options',
		'tab_group'    => 'sast_main_options',
		'tab_title'    => 'Main',
	);

	// 'tab_group' property is supported in > 2.4.0.
	if ( version_compare( CMB2_VERSION, '2.4.0' ) ) {
		$args['display_cb'] = 'sast_options_display_with_tabs';
	}

	$main_options = new_cmb2_box( $args );

	/**
	 * Options fields ids only need
	 * to be unique within this box.
	 * Prefix is not needed.
	 */
	$main_options->add_field( array(
		'name'    => 'Site Background Color',
		'desc'    => 'field description (optional)',
		'id'      => 'bg_color',
		'type'    => 'colorpicker',
		'default' => '#ffffff',
	) );

	/**
	 * Registers secondary options page, and set main item as parent.
	 */
	$args = array(
		'id'           => 'sast_secondary_options_page',
		'menu_title'   => 'Secondary Options', // Use menu title, & not title to hide main h2.
		'object_types' => array( 'options-page' ),
		'option_key'   => 'sast_secondary_options',
		'parent_slug'  => 'sast_main_options',
		'tab_group'    => 'sast_main_options',
		'tab_title'    => 'Secondary',
	);

	// 'tab_group' property is supported in > 2.4.0.
	if ( version_compare( CMB2_VERSION, '2.4.0' ) ) {
		$args['display_cb'] = 'sast_options_display_with_tabs';
	}

	$secondary_options = new_cmb2_box( $args );

	$secondary_options->add_field( array(
		'name'    => 'Test Radio',
		'desc'    => 'field description (optional)',
		'id'      => 'radio',
		'type'    => 'radio',
		'options' => array(
			'option1' => 'Option One',
			'option2' => 'Option Two',
			'option3' => 'Option Three',
		),
	) );

	/**
	 * Registers tertiary options page, and set main item as parent.
	 */
	$args = array(
		'id'           => 'sast_tertiary_options_page',
		'menu_title'   => 'Tertiary Options', // Use menu title, & not title to hide main h2.
		'object_types' => array( 'options-page' ),
		'option_key'   => 'sast_tertiary_options',
		'parent_slug'  => 'sast_main_options',
		'tab_group'    => 'sast_main_options',
		'tab_title'    => 'Tertiary',
	);

	// 'tab_group' property is supported in > 2.4.0.
	if ( version_compare( CMB2_VERSION, '2.4.0' ) ) {
		$args['display_cb'] = 'sast_options_display_with_tabs';
	}

	$tertiary_options = new_cmb2_box( $args );

	$tertiary_options->add_field( array(
		'name' => 'Test Text Area for Code',
		'desc' => 'field description (optional)',
		'id'   => 'textarea_code',
		'type' => 'textarea_code',
	) );

}
add_action( 'cmb2_admin_init', 'sast_register_main_options_metabox' );

/**
 * A CMB2 options-page display callback override which adds tab navigation among
 * CMB2 options pages which share this same display callback.
 *
 * @param CMB2_Options_Hookup $cmb_options The CMB2_Options_Hookup object.
 */
function sast_options_display_with_tabs( $cmb_options ) {
	$tabs = sast_options_page_tabs( $cmb_options );
	?>
	<div class="wrap cmb2-options-page option-<?php echo $cmb_options->option_key; ?>">
		<?php if ( get_admin_page_title() ) : ?>
			<h2><?php echo wp_kses_post( get_admin_page_title() ); ?></h2>
		<?php endif; ?>
		<h2 class="nav-tab-wrapper">
			<?php foreach ( $tabs as $option_key => $tab_title ) : ?>
				<a class="nav-tab<?php if ( isset( $_GET['page'] ) && $option_key === $_GET['page'] ) : ?> nav-tab-active<?php endif; ?>" href="<?php menu_page_url( $option_key ); ?>"><?php echo wp_kses_post( $tab_title ); ?></a>
			<?php endforeach; ?>
		</h2>
		<form class="cmb-form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="POST" id="<?php echo $cmb_options->cmb->cmb_id; ?>" enctype="multipart/form-data" encoding="multipart/form-data">
			<input type="hidden" name="action" value="<?php echo esc_attr( $cmb_options->option_key ); ?>">
			<?php $cmb_options->options_page_metabox(); ?>
			<?php submit_button( esc_attr( $cmb_options->cmb->prop( 'save_button' ) ), 'primary', 'submit-cmb' ); ?>
		</form>
	</div>
	<?php
}

/**
 * Gets navigation tabs array for CMB2 options pages which share the given
 * display_cb param.
 *
 * @param CMB2_Options_Hookup $cmb_options The CMB2_Options_Hookup object.
 *
 * @return array Array of tab information.
 */
function sast_options_page_tabs( $cmb_options ) {
	$tab_group = $cmb_options->cmb->prop( 'tab_group' );
	$tabs      = array();

	foreach ( CMB2_Boxes::get_all() as $cmb_id => $cmb ) {
		if ( $tab_group === $cmb->prop( 'tab_group' ) ) {
			$tabs[ $cmb->options_page_keys()[0] ] = $cmb->prop( 'tab_title' )
				? $cmb->prop( 'tab_title' )
				: $cmb->prop( 'title' );
		}
	}

	return $tabs;
}