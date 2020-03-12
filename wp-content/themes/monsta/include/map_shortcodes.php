<?php
if( ! function_exists( 'monsta_get_slider_setting' ) ) {
	function monsta_get_slider_setting() {
		$status_opt = array(
			'',
			__( 'Yes', 'monsta' ) => true,
			__( 'No', 'monsta' ) => false,
		);
		
		$effect_opt = array(
			'',
			__( 'Fade', 'monsta' ) => 'fade',
			__( 'Slide', 'monsta' ) => 'slide',
		);
	 
		return array( 
			array(
				'type' => 'checkbox',
				'heading' => esc_html__( 'Enable slider', 'monsta' ),
				'param_name' => 'enable_slider',
				'value' => true,
				'save_always' => true, 
				'group' => esc_html__( 'Slider Options', 'monsta' ),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Items Default', 'monsta' ),
				'param_name' => 'items',
				'group' => esc_html__( 'Slider Options', 'monsta' ),
				'value' => 5,
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Item Desktop', 'monsta' ),
				'param_name' => 'item_desktop',
				'group' => esc_html__( 'Slider Options', 'monsta' ),
				'value' => 4,
			), 
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Item Small', 'monsta' ),
				'param_name' => 'item_small',
				'group' => esc_html__( 'Slider Options', 'monsta' ),
				'value' => 3,
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Item Tablet', 'monsta' ),
				'param_name' => 'item_tablet',
				'group' => esc_html__( 'Slider Options', 'monsta' ),
				'value' => 2,
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Item Mobile', 'monsta' ),
				'param_name' => 'item_mobile',
				'group' => esc_html__( 'Slider Options', 'monsta' ),
				'value' => 1,
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Navigation', 'monsta' ),
				'param_name' => 'navigation',
				'value' => $status_opt,
				'save_always' => true,
				'group' => esc_html__( 'Slider Options', 'monsta' ),
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Pagination', 'monsta' ),
				'param_name' => 'pagination',
				'value' => $status_opt,
				'save_always' => true,
				'group' => esc_html__( 'Slider Options', 'monsta' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Speed sider', 'monsta' ),
				'param_name' => 'speed',
				'value' => '500',
				'save_always' => true,
				'group' => esc_html__( 'Slider Options', 'monsta' )
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__( 'Slider Auto', 'monsta' ),
				'param_name' => 'auto',
				'value' => false, 
				'group' => esc_html__( 'Slider Options', 'monsta' )
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__( 'Slider loop', 'monsta' ),
				'param_name' => 'loop',
				'value' => false, 
				'group' => esc_html__( 'Slider Options', 'monsta' )
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Effects', 'monsta' ),
				'param_name' => 'effect',
				'value' => $effect_opt,
				'save_always' => true,
				'group' => esc_html__( 'Slider Options', 'monsta' )
			), 
		);
	}
}

//Shortcodes for Visual Composer

add_action( 'vc_before_init', 'monsta_vc_shortcodes' );
function monsta_vc_shortcodes() {
	
	//Site logo
	vc_map( array(
		'name' => esc_html__( 'Logo', 'monsta'),
		'base' => 'roadlogo',
		'class' => '',
		'category' => esc_html__( 'Theme', 'monsta'),
		'params' => array(
			array(
				'type' => 'attach_image',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Upload logo image', 'monsta' ),
				'param_name' => 'logo_main',
				'value' => '',
			), 
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Width of logo', 'monsta' ),
				'param_name' => 'w_logo', 
			),
		)
	) );

	//Main Menu
	vc_map( array(
		'name' => esc_html__( 'Main Menu', 'monsta'),
		'base' => 'roadmainmenu',
		'class' => '',
		'category' => esc_html__( 'Theme', 'monsta'),
		'params' => array(
			array(
				'type' => 'attach_image',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Upload sticky logo image', 'monsta' ),
				'param_name' => 'sticky_logoimage',
				'value' => '',
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Width of logo sticky', 'monsta' ),
				'param_name' => 'w_logo_sticky', 
			),
		)
	) );

	//Main Menu Mobile
	vc_map( array(
		'name' => esc_html__( 'Main Menu Mobile', 'monsta'),
		'base' => 'roadmainmenumobile',
		'class' => '',
		'category' => esc_html__( 'Theme', 'monsta'), 
		'params' => array()
	) );

	//Categories Menu
	vc_map( array(
		'name' => esc_html__( 'Categories Menu', 'monsta'),
		'base' => 'roadcategoriesmenu',
		'class' => '',
		'category' => esc_html__( 'Theme', 'monsta'),
		'params' => array(
		)
	) );

	//Language Currency Switcher
	vc_map( array(
		'name' => esc_html__( 'Language, Currency Switcher', 'monsta'),
		'base' => 'roadlangswitch',
		'class' => '',
		'category' => esc_html__( 'Theme', 'monsta'),
		'params' => array(
		)
	) );

	//Date time sale
	vc_map( array(
		'name' => esc_html__( 'Countdown time', 'monsta'),
		'base' => 'roadtimesale',
		'class' => '',
		'category' => esc_html__( 'Theme', 'monsta'), 
	) );

	//Social Icons
	vc_map( array(
		'name' => esc_html__( 'Social Icons', 'monsta'),
		'base' => 'roadsocialicons',
		'class' => '',
		'category' => esc_html__( 'Theme', 'monsta'),
		'params' => array(
		)
	) );

	//Mini Cart
	vc_map( array(
		'name' => esc_html__( 'Mini Cart', 'monsta'),
		'base' => 'roadminicart',
		'class' => '',
		'category' => esc_html__( 'Theme', 'monsta'),
		'params' => array(
		)
	) );

	//Products Search
	vc_map( array(
		'name' => esc_html__( 'Product Search', 'monsta'),
		'base' => 'roadproductssearch',
		'class' => '',
		'category' => esc_html__( 'Theme', 'monsta'),
		'params' => array(
		)
	) );

	//Products Search Mobile
	vc_map( array(
		'name' => esc_html__( 'Product Search Mobile', 'monsta'),
		'base' => 'roadproductssearchmobile',
		'class' => '',
		'category' => esc_html__( 'Theme', 'monsta'),
		'params' => array(
		)
	) );
	//Brand logos
	vc_map( array(
		'name' => esc_html__( 'Brand Logos', 'monsta' ),
		'base' => 'ourbrands',
		'class' => '',
		'category' => esc_html__( 'Theme', 'monsta'),
		'params' => array(
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Number of columns', 'monsta' ),
				'param_name' => 'colsnumber',
				'value' => esc_html__( '6', 'monsta' ),
			),
			array(
				'type' => 'dropdown',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Number of rows', 'monsta' ),
				'param_name' => 'rowsnumber',
				'value' => array(
						'1'	=> '1',
						'2'	=> '2',
						'3'	=> '3',
						'4'	=> '4',
					),
			),
		)
	) );

	//popular category
	vc_map( array(
		"name" => esc_html__( "List Sub Categories", "monsta" ),
		"base" => "list_categories",
		"class" => "",
		"category" => esc_html__( "Theme", "monsta"),
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Category slug", "monsta" ),
				"param_name" => "category",
				"value" => "",
			), 
		)
	) );

	//Categories carousel
	vc_map( array(
		'name' => esc_html__( 'Categories Carousel', 'monsta' ),
		'base' => 'categoriescarousel',
		'class' => '',
		'category' => esc_html__( 'Theme', 'monsta'),
		'params' => array(
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Number of columns', 'monsta' ),
				'param_name' => 'colsnumber',
				'value' => esc_html__( '6', 'monsta' ),
			),
			array(
				'type' => 'dropdown',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Number of rows', 'monsta' ),
				'param_name' => 'rowsnumber',
				'value' => array(
						'1'	=> '1',
						'2'	=> '2',
						'3'	=> '3',
						'4'	=> '4',
					),
			),
		)
	) );
	
	//MailPoet Newsletter Form
	vc_map( array(
		'name' => esc_html__( 'Newsletter Form (MailPoet)', 'monsta' ),
		'base' => 'wysija_form',
		'class' => '',
		'category' => esc_html__( 'Theme', 'monsta'),
		'params' => array(
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Form ID', 'monsta' ),
				'param_name' => 'id',
				'value' => '',
				'description' => esc_html__( 'Enter form ID here', 'monsta' ),
			),
		)
	) );
	$post_style_values = array(
		'Default', 
		__( 'Post Styles 2', 'monsta' ) => 'style_2', 
	); 
	//Latest posts
	vc_map( array(
		'name' => esc_html__( 'Latest posts', 'monsta' ),
		'base' => 'latestposts',
		'class' => '',
		'category' => esc_html__( 'Theme', 'monsta'),
		'params' =>  array_merge(array(
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Number of posts', 'monsta' ),
				'param_name' => 'posts_per_page',
				'value' => esc_html__( '5', 'monsta' ),
			),
			  
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Excerpt length', 'monsta' ),
				'param_name' => 'length',
				'value' => esc_html__( '20', 'monsta' ),
			),
			array(
				'type' => 'dropdown',
				'heading' => __( 'Post Styles', 'monsta' ),
				'param_name' => 'post_styles',
				'value' => $post_style_values,
				'save_always' => true,
				'description' => __( 'Select Styles for posts', 'monsta' ),
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Number of columns', 'monsta' ),
				'param_name' => 'colsnumber',
				'value' => esc_html__( '4', 'monsta' ),
			), 
			array(
				'type' => 'dropdown',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Number of rows', 'monsta' ),
				'param_name' => 'rowsnumber',
				'value' => array(
						'1'	=> '1',
						'2'	=> '2',
						'3'	=> '3',
						'4'	=> '4',
					),
			), 
		),monsta_get_slider_setting() )
	) );
	
	//Testimonials
	vc_map( array(
		'name' => esc_html__( 'Testimonials', 'monsta' ),
		'base' => 'woothemes_testimonials',
		'class' => '',
		'category' => esc_html__( 'Theme', 'monsta'),
		'params' => array(
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Number of testimonial', 'monsta' ),
				'param_name' => 'limit',
				'value' => esc_html__( '10', 'monsta' ),
			),
			array(
				'type' => 'dropdown',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Display Author', 'monsta' ),
				'param_name' => 'display_author',
				'value' => array(
					'Yes'	=> 'true',
					'No'	=> 'false',
				),
			),
			array(
				'type' => 'dropdown',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Display Avatar', 'monsta' ),
				'param_name' => 'display_avatar',
				'value' => array(
					'Yes'	=> 'true',
					'No'	=> 'false',
				),
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Avatar image size', 'monsta' ),
				'param_name' => 'size',
				'value' => '',
				'description' => esc_html__( 'Avatar image size in pixels. Default is 50', 'monsta' ),
			),
			array(
				'type' => 'dropdown',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Display URL', 'monsta' ),
				'param_name' => 'display_url',
				'value' => array(
					'Yes'	=> 'true',
					'No'	=> 'false',
				),
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Category', 'monsta' ),
				'param_name' => 'category',
				'value' => esc_html__( '0', 'monsta' ),
				'description' => esc_html__( 'ID/slug of the category. Default is 0', 'monsta' ),
			),
		)
	) );
	
	
	//Rotating tweets
	vc_map( array(
		'name' => esc_html__( 'Rotating tweets', 'monsta' ),
		'base' => 'rotatingtweets',
		'class' => '',
		'category' => esc_html__( 'Theme', 'monsta'),
		'params' => array(
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Twitter user name', 'monsta' ),
				'param_name' => 'screen_name',
				'value' => '',
			),
		)
	) );

	//Twitter feed
	vc_map( array(
		'name' => esc_html__( 'Twitter feed', 'monsta' ),
		'base' => 'AIGetTwitterFeeds',
		'class' => '',
		'category' => esc_html__( 'Theme', 'monsta'),
		'params' => array(
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Your Twitter Name(Without the "@" symbol)', 'monsta' ),
				'param_name' => 'ai_username',
				'value' => '',
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Number Of Tweets', 'monsta' ),
				'param_name' => 'ai_numberoftweets',
				'value' => '',
			),
			// array(
			// 	'type' => 'textfield',
			// 	'holder' => 'div',
			// 	'class' => '',
			// 	'heading' => esc_html__( 'Your Title', 'monsta' ),
			// 	'param_name' => 'ai_tweet_title',
			// 	'value' => '',
			// ),
		)
	) );
	
	//Google map
	vc_map( array(
		'name' => esc_html__( 'Google map', 'monsta' ),
		'base' => 'monsta_map',
		'class' => '',
		'category' => esc_html__( 'Theme', 'monsta'),
		'params' => array(
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Map Height', 'monsta' ),
				'param_name' => 'map_height',
				'value' => esc_html__( '400', 'monsta' ),
				'description' => esc_html__( 'Map height in pixels. Default is 400', 'monsta' ),
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Map Zoom', 'monsta' ),
				'param_name' => 'map_zoom',
				'value' => esc_html__( '17', 'monsta' ),
				'description' => esc_html__( 'Map zoom level, min 0, max 21. Default is 17', 'monsta' ),
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Latitude', 'monsta' ),
				'param_name' => 'lat1',
				'value' => '',
				'group' => 'Marker 1'
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Longtitude', 'monsta' ),
				'param_name' => 'long1',
				'value' => '',
				'group' => 'Marker 1'
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Address', 'monsta' ),
				'param_name' => 'address1',
				'value' => '',
				'description' => esc_html__( 'If you donot enter coordinate, enter address here', 'monsta' ),
				'group' => 'Marker 1'
			),
			array(
				'type' => 'attach_image',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Marker image', 'monsta' ),
				'param_name' => 'marker1',
				'value' => '',
				'description' => esc_html__( 'Upload marker image, image size: 40x46 px', 'monsta' ),
				'group' => 'Marker 1'
			),
			array(
				'type' => 'textarea',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Description', 'monsta' ),
				'param_name' => 'description1',
				'value' => '',
				'description' => esc_html__( 'Allowed HTML tags: a, i, em, br, strong, h1, h2, h3', 'monsta' ),
				'group' => 'Marker 1'
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Latitude', 'monsta' ),
				'param_name' => 'lat2',
				'value' => '',
				'group' => 'Marker 2'
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Longtitude', 'monsta' ),
				'param_name' => 'long2',
				'value' => '',
				'group' => 'Marker 2'
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Address', 'monsta' ),
				'param_name' => 'address2',
				'value' => '',
				'description' => esc_html__( 'If you donot enter coordinate, enter address here', 'monsta' ),
				'group' => 'Marker 2'
			),
			array(
				'type' => 'attach_image',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Marker image', 'monsta' ),
				'param_name' => 'marker2',
				'value' => '',
				'description' => esc_html__( 'Upload marker image', 'monsta' ),
				'group' => 'Marker 2'
			),
			array(
				'type' => 'textarea',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Description', 'monsta' ),
				'param_name' => 'description2',
				'value' => '',
				'description' => esc_html__( 'Allowed HTML tags: a, i, em, br, strong, p, h2, h2, h3', 'monsta' ),
				'group' => 'Marker 2'
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Latitude', 'monsta' ),
				'param_name' => 'lat3',
				'value' => '',
				'group' => 'Marker 3'
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Longtitude', 'monsta' ),
				'param_name' => 'long3',
				'value' => '',
				'group' => 'Marker 3'
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Address', 'monsta' ),
				'param_name' => 'address3',
				'value' => '',
				'description' => esc_html__( 'If you donot enter coordinate, enter address here', 'monsta' ),
				'group' => 'Marker 3'
			),
			array(
				'type' => 'attach_image',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Marker image', 'monsta' ),
				'param_name' => 'marker3',
				'value' => '',
				'description' => esc_html__( 'Upload marker image', 'monsta' ),
				'group' => 'Marker 3'
			),
			array(
				'type' => 'textarea',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Description', 'monsta' ),
				'param_name' => 'description3',
				'value' => '',
				'description' => esc_html__( 'Allowed HTML tags: a, i, em, br, strong, p, h3, h3, h3', 'monsta' ),
				'group' => 'Marker 3'
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Latitude', 'monsta' ),
				'param_name' => 'lat4',
				'value' => '',
				'group' => 'Marker 4'
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Longtitude', 'monsta' ),
				'param_name' => 'long4',
				'value' => '',
				'group' => 'Marker 4'
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Address', 'monsta' ),
				'param_name' => 'address4',
				'value' => '',
				'description' => esc_html__( 'If you donot enter coordinate, enter address here', 'monsta' ),
				'group' => 'Marker 4'
			),
			array(
				'type' => 'attach_image',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Marker image', 'monsta' ),
				'param_name' => 'marker4',
				'value' => '',
				'description' => esc_html__( 'Upload marker image', 'monsta' ),
				'group' => 'Marker 4'
			),
			array(
				'type' => 'textarea',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Description', 'monsta' ),
				'param_name' => 'description4',
				'value' => '',
				'description' => esc_html__( 'Allowed HTML tags: a, i, em, br, strong, p, h4, h4, h4', 'monsta' ),
				'group' => 'Marker 4'
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Latitude', 'monsta' ),
				'param_name' => 'lat5',
				'value' => '',
				'group' => 'Marker 5'
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Longtitude', 'monsta' ),
				'param_name' => 'long5',
				'value' => '',
				'group' => 'Marker 5'
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Address', 'monsta' ),
				'param_name' => 'address5',
				'value' => '',
				'description' => esc_html__( 'If you donot enter coordinate, enter address here', 'monsta' ),
				'group' => 'Marker 5'
			),
			array(
				'type' => 'attach_image',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Marker image', 'monsta' ),
				'param_name' => 'marker5',
				'value' => '',
				'description' => esc_html__( 'Upload marker image', 'monsta' ),
				'group' => 'Marker 5'
			),
			array(
				'type' => 'textarea',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Description', 'monsta' ),
				'param_name' => 'description5',
				'value' => '',
				'description' => esc_html__( 'Allowed HTML tags: a, i, em, br, strong, p, h5, h5, h5', 'monsta' ),
				'group' => 'Marker 5'
			),
		)
	) );
	
	//Counter
	vc_map( array(
		'name' => esc_html__( 'Counter', 'monsta' ),
		'base' => 'monsta_counter',
		'class' => '',
		'category' => esc_html__( 'Theme', 'monsta'),
		'params' => array(
			array(
				'type' => 'attach_image',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Image icon', 'monsta' ),
				'param_name' => 'image',
				'value' => '',
				'description' => esc_html__( 'Upload icon image', 'monsta' ),
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Number', 'monsta' ),
				'param_name' => 'number',
				'value' => '',
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Text', 'monsta' ),
				'param_name' => 'text',
				'value' => '',
			),
		)
	) );
}
?>