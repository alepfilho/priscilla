		"use strict";
		var monsta_brandnumber = 6,
			monsta_brandscrollnumber = 2,
			monsta_brandpause = 3000,
			monsta_brandanimate = 2000;
		var monsta_brandscroll = false;
							monsta_brandscroll = true;
					var monsta_categoriesnumber = 6,
			monsta_categoriesscrollnumber = 2,
			monsta_categoriespause = 3000,
			monsta_categoriesanimate = 2000;
		var monsta_categoriesscroll = false;
					var monsta_blogpause = 3000,
			monsta_blmonstamate = 2000;
		var monsta_blogscroll = false;
							monsta_blogscroll = true;
					var monsta_testipause = 3000,
			monsta_testianimate = 2000;
		var monsta_testiscroll = false; 
							monsta_testiscroll = false;
					var monsta_catenumber = 6,
			monsta_catescrollnumber = 2,
			monsta_catepause = 3000,
			monsta_cateanimate = 700;
		var monsta_catescroll = false;
					var monsta_menu_number = 10; 

		var monsta_sticky_header = false;
							monsta_sticky_header = true;
			
		var monsta_item_first = 12,
			monsta_moreless_products = 4;

		jQuery(document).ready(function(){
			jQuery("#ws").focus(function(){
				if(jQuery(this).val()=="Search product..."){
					jQuery(this).val("");
				}
			});
			jQuery("#ws").focusout(function(){
				if(jQuery(this).val()==""){
					jQuery(this).val("Search product...");
				}
			});
			jQuery("#wsearchsubmit").on('click',function(){
				if(jQuery("#ws").val()=="Search product..." || jQuery("#ws").val()==""){
					jQuery("#ws").focus();
					return false;
				}
			});
			jQuery("#search_input").focus(function(){
				if(jQuery(this).val()=="Search..."){
					jQuery(this).val("");
				}
			});
			jQuery("#search_input").focusout(function(){
				if(jQuery(this).val()==""){
					jQuery(this).val("Search...");
				}
			});
			jQuery("#blogsearchsubmit").on('click',function(){
				if(jQuery("#search_input").val()=="Search..." || jQuery("#search_input").val()==""){
					jQuery("#search_input").focus();
					return false;
				}
			});
		});
		