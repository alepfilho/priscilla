"use strict";
// product-magnifier var
var monsta_magnifier_vars;
var yith_magnifier_options = {
		
		sliderOptions: {
			responsive: monsta_magnifier_vars.responsive,
			circular: monsta_magnifier_vars.circular,
			infinite: monsta_magnifier_vars.infinite,
			direction: 'left',
			debug: false,
			auto: false,
			align: 'left',
			height: 'auto', 
			//height: "100%", //turn vertical
			//width: 72,
			prev    : {
				button  : "#slider-prev",
				key     : "left"
			},
			next    : {
				button  : "#slider-next",
				key     : "right"
			},
			scroll : {
				items     : 1,
				pauseOnHover: true
			},
			items   : {
				visible: Number(monsta_magnifier_vars.visible),
			},
			swipe : {
				onTouch:    true,
				onMouse:    true
			},
			mousewheel : {
				items: 1
			}
		},
		
		showTitle: false,
		zoomWidth: monsta_magnifier_vars.zoomWidth,
		zoomHeight: monsta_magnifier_vars.zoomHeight,
		position: monsta_magnifier_vars.position,
		lensOpacity: monsta_magnifier_vars.lensOpacity,
		softFocus: monsta_magnifier_vars.softFocus,
		adjustY: 0,
		disableRightClick: false,
		phoneBehavior: monsta_magnifier_vars.phoneBehavior,
		loadingLabel: monsta_magnifier_vars.loadingLabel,
	};