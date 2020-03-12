(function($) {
	"use strict";
	// contact map
	jQuery(document).ready(function(){
		var contact_mark = monsta_contact_vars.markers;
		var link = '#map'+ monsta_contact_vars.monsta_mapid;
		jQuery(link).gMap({
			scrollwheel: false,
			zoom: Number(monsta_contact_vars.zoom),
			markers:[ 
				{
					latitude:contact_mark.latitude,
					longitude:contact_mark.longitude,
					popup: true,
					html: contact_mark.html,
					icon:{
						image:contact_mark.icon,
						iconsize:[40, 46],
						iconanchor:[40, 40]
					}
				}, 
			],
		});
	});
})(jQuery);