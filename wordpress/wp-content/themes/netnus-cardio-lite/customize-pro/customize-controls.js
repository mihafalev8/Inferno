( function( api ) {

	// Extends our custom "netnus-cardio-lite" section.
	api.sectionConstructor['netnus-cardio-lite'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );