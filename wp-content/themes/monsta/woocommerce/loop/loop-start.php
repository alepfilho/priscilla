<?php
/**
 * Product Loop Start
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.3.0
 */
global $wp_query, $woocommerce_loop;

$monsta_opt = get_option( 'monsta_opt' );

$shoplayout = 'sidebar';
if(isset($monsta_opt['shop_layout']) && $monsta_opt['shop_layout']!=''){
	$shoplayout = $monsta_opt['shop_layout'];
}
if(isset($_GET['layout']) && $_GET['layout']!=''){
	$shoplayout = $_GET['layout'];
}
$shopsidebar = 'left';
if(isset($monsta_opt['sidebarshop_pos']) && $monsta_opt['sidebarshop_pos']!=''){
	$shopsidebar = $monsta_opt['sidebarshop_pos'];
}
if(isset($_GET['sidebar']) && $_GET['sidebar']!=''){
	$shopsidebar = $_GET['sidebar'];
}
switch($shoplayout) {
	case 'fullwidth':
		Monsta_Class::monsta_shop_class('shop-fullwidth');
		$shopcolclass = 12;
		$shopsidebar = 'none';
		$productcols = 4;
		break;
	default:
		Monsta_Class::monsta_shop_class('shop-sidebar');
		$shopcolclass = 9;
		$productcols = 3;
}
$monsta_viewmode = Monsta_Class::monsta_show_view_mode();
?> 

<div class="shop-products products <?php echo esc_attr($monsta_viewmode);?> <?php echo esc_attr($shoplayout);?>">