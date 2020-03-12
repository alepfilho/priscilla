<?php 

if( ! function_exists( 'road_get_slider_setting' ) ) {
	function road_get_slider_setting() {
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
				'heading' => __( 'Enable slider', 'monsta' ),
				'param_name' => 'enable_slider',
				'value' => true,
				'save_always' => true, 
				'group' => __( 'Slider Options', 'monsta' ),
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Items Large Screen', 'organicfood' ),
				'param_name' => 'item_large',
				'group' => __( 'Slider Options', 'organicfood' ),
				'value' => 5,
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Items Default', 'monsta' ),
				'param_name' => 'items',
				'group' => __( 'Slider Options', 'monsta' ),
				'value' => 5,
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Item Desktop', 'monsta' ),
				'param_name' => 'item_desktop',
				'group' => __( 'Slider Options', 'monsta' ),
				'value' => 4,
			), 
			array(
				'type' => 'textfield',
				'heading' => __( 'Item Small', 'monsta' ),
				'param_name' => 'item_small',
				'group' => __( 'Slider Options', 'monsta' ),
				'value' => 3,
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Item Tablet', 'monsta' ),
				'param_name' => 'item_tablet',
				'group' => __( 'Slider Options', 'monsta' ),
				'value' => 2,
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Item Mobile', 'monsta' ),
				'param_name' => 'item_mobile',
				'group' => __( 'Slider Options', 'monsta' ),
				'value' => 1,
			),
			array(
				'type' => 'dropdown',
				'heading' => __( 'Navigation', 'monsta' ),
				'param_name' => 'navigation',
				'value' => $status_opt,
				'save_always' => true,
				'group' => __( 'Slider Options', 'monsta' ),
			),
			array(
				'type' => 'dropdown',
				'heading' => __( 'Pagination', 'monsta' ),
				'param_name' => 'pagination',
				'value' => $status_opt,
				'save_always' => true,
				'group' => __( 'Slider Options', 'monsta' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Speed sider', 'monsta' ),
				'param_name' => 'speed',
				'value' => '500',
				'save_always' => true,
				'group' => __( 'Slider Options', 'monsta' )
			),
			array(
				'type' => 'checkbox',
				'heading' => __( 'Slider Auto', 'monsta' ),
				'param_name' => 'auto',
				'value' => false, 
				'group' => __( 'Slider Options', 'monsta' )
			),
			array(
				'type' => 'checkbox',
				'heading' => __( 'Slider loop', 'monsta' ),
				'param_name' => 'loop',
				'value' => false, 
				'group' => __( 'Slider Options', 'monsta' )
			),
			array(
				'type' => 'checkbox',
				'heading' => __( 'Slider center', 'monsta' ),
				'param_name' => 'center',
				'value' => false, 
				'dependency' => array(
				    'element' => 'loop',
				    'value' => array ('true'),
				    'not_empty' => true,
				),
				'group' => __( 'Slider Options', 'monsta' )
			),
			array(
				'type' => 'dropdown',
				'heading' => __( 'Effects', 'monsta' ),
				'param_name' => 'effect',
				'value' => $effect_opt,
				'save_always' => true,
				'group' => __( 'Slider Options', 'monsta' )
			), 
		);
	}
}