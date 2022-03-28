function sastAddCoverAttribute(settings, name) {
	if (typeof settings.attributes !== 'undefined') {
		if (name == 'core/cover') {
			settings.attributes = Object.assign(settings.attributes, {
				hideOnMobile: {
					type: 'boolean',
				}
			});
		}
	}
	return settings;
}

const sastCoverAdvancedControls = wp.compose.createHigherOrderComponent((BlockEdit) => {
	return (props) => {
		const { Fragment } = wp.element;
		const { ToggleControl } = wp.components;
		const { InspectorAdvancedControls } = wp.blockEditor;
		const { attributes, setAttributes, isSelected } = props;
		return (
			<Fragment>
				<BlockEdit {...props} />
				{isSelected && (props.name == 'core/cover') && 
					<InspectorAdvancedControls>
						<ToggleControl
							label={wp.i18n.__('Hide image on mobile', 'awp')}
							checked={!!attributes.hideOnMobile}
							onChange={(newval) => setAttributes({ hideOnMobile: !attributes.hideOnMobile })}
						/>
					</InspectorAdvancedControls>
				}
			</Fragment>
		);
	};
}, 'sastCoverAdvancedControls');

function sastCoverApplyExtraClass(extraProps, blockType, attributes) {
	const { hideOnMobile } = attributes;
 
	if (typeof hideOnMobile !== 'undefined' && hideOnMobile) {
		extraProps.className = extraProps.className + ' hide-on-mobile';
	}
	return extraProps;
}

wp.hooks.addFilter(
	'editor.BlockEdit',
	'sast/cover-advanced-control',
	sastCoverAdvancedControls
);

wp.hooks.addFilter(
	'blocks.getSaveContent.extraProps',
	'sast/cover-apply-class',
	sastCoverApplyExtraClass
);
 
wp.hooks.addFilter(
	'blocks.registerBlockType',
	'sast/cover-custom-attribute',
	sastAddCoverAttribute
);