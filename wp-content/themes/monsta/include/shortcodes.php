<?php 
function monsta_logo_shortcode( $atts ) {
	$monsta_opt = get_option( 'monsta_opt' );

	$atts = shortcode_atts( array(
							'logo_main' => '',
							'w_logo' => '',
							), $atts, 'roadlogo' );
	$html = '';
	$wl = '';
	if( isset($atts['w_logo']) && $atts['w_logo']!='') {
		$wl = $atts['w_logo'];
	}

	if( isset($atts['logo_main']) && $atts['logo_main']!=''){ 
		$html .= '<div class="logo">'; 
			$html .= '<a href="'.esc_url( home_url( '/' ) ).'" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" rel="home">'; 
			$html .= '<img src="'.esc_url(wp_get_attachment_url( $atts['logo_main'])).'" alt="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" width="'.esc_attr($wl).'" />'; 
			$html .= '</a>';  
		$html .= '</div>'; 
	} else {
		$html .= '<h1 class="logo">'; 
			$html .= '<a href="'.esc_url( home_url( '/' ) ).'" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" rel="home">'; 
				$html .= bloginfo( 'name' ); 
			$html .= '</a>';  
		$html .= '</h1>';
	}
	
	return $html;
}

function monsta_mainmenu_shortcode( $atts ) {
	$monsta_opt = get_option( 'monsta_opt' );

	$atts = shortcode_atts( array(
							'sticky_logoimage' => '',
							'w_logo_sticky' => '',
							), $atts, 'roadmainmenu' );
	$html = '';
	$wl_sticky = '';
	if( isset($atts['w_logo_sticky']) && $atts['w_logo_sticky']!='') {
		$wl_sticky = $atts['w_logo_sticky'];
	}
	
	ob_start(); ?>
	<div class="main-menu-wrapper"> 
		<div class="<?php if(isset($monsta_opt['sticky_header']) && $monsta_opt['sticky_header']) {echo 'header-sticky';} ?> <?php if ( is_admin_bar_showing() ) {echo 'with-admin-bar';} ?>">
			<div class="nav-container">
				<?php if( isset($atts['sticky_logoimage']) && $atts['sticky_logoimage']!=''){ ?>
					<div class="logo-sticky"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo  esc_url(wp_get_attachment_url( $atts['sticky_logoimage']));?>" alt=" <?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?> " width="<?php echo esc_attr($wl_sticky); ?>" /></a></div>
				<?php } ?>
				<div class="horizontal-menu visible-large">
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container_class' => 'primary-menu-container', 'menu_class' => 'nav-menu' ) ); ?>
				</div> 
			</div>
		</div>  
	</div>	
	<?php
	$html .= ob_get_contents();

	ob_end_clean();
	
	return $html;
}

function monsta_mainmenumobile_shortcode( $atts ) {
	$monsta_opt = get_option( 'monsta_opt' );

	$atts = shortcode_atts( array( 
							), $atts, 'roadmainmenumobile' );
	$html = '';
	
	ob_start(); ?>  
	<div class="main-menu-wrapper"> 
		<div class="visible-small mobile-menu"> 
			<div class="mbmenu-toggler"><?php echo esc_html($monsta_opt['mobile_menu_label']);?><span class="mbmenu-icon"><i class="ion-android-menu"></i></span></div>
			<div class="clearfix"></div>
			<?php wp_nav_menu( array( 'theme_location' => 'mobilemenu', 'container_class' => 'mobile-menu-container', 'menu_class' => 'nav-menu' ) ); ?>
		</div>
	</div>  
	<?php
	$html .= ob_get_contents();

	ob_end_clean();
	
	return $html;
}

function monsta_roadcategoriesmenu_shortcode ( $atts ) {

	$monsta_opt = get_option( 'monsta_opt' );

	$html = '';

	ob_start();

	$cat_menu_class = '';

	if(isset($monsta_opt['categories_menu_home']) && $monsta_opt['categories_menu_home']) {
		$cat_menu_class .=' show_home';
	}
	if(isset($monsta_opt['categories_menu_sub']) && $monsta_opt['categories_menu_sub']) {
		$cat_menu_class .=' show_inner';
	}
	?>
	<div class="categories-menu visible-large <?php echo esc_attr($cat_menu_class); ?>">
		<div class="catemenu-toggler"><i class="ion-android-menu"></i><span><?php if(isset($monsta_opt)) { echo esc_html($monsta_opt['categories_menu_label']); } else { _e('Category', 'monsta'); } ?></span></div>
		<?php wp_nav_menu( array( 'theme_location' => 'categories', 'container_class' => 'categories-menu-container', 'menu_class' => 'categories-menu' ) ); ?>
		<div class="morelesscate">
			<span class="morecate"><i class="ion-ios-more-outline"></i><?php if ( isset($monsta_opt['categories_more_label']) && $monsta_opt['categories_more_label']!='' ) { echo esc_html($monsta_opt['categories_more_label']); } else { _e('More Categories', 'monsta'); } ?></span>
			<span class="lesscate"><i class="ion-ios-more-outline"></i><?php if ( isset($monsta_opt['categories_less_label']) && $monsta_opt['categories_less_label']!='' ) { echo esc_html($monsta_opt['categories_less_label']); } else { _e('Close Menu', 'monsta'); } ?></span>
		</div>
	</div>
	<?php

	$html .= ob_get_contents();

	ob_end_clean();
	
	return $html;
}

function monsta_roadlangswitch_shortcode( $atts ) {
	$monsta_opt = get_option( 'monsta_opt' );

	$html = '';

	ob_start();

	if (class_exists('SitePress')) { ?>
		<div class="switcher">
			<div class="language"><label><?php echo esc_html_e('language:','monsta')?></label><?php do_action('icl_language_selector'); ?></div> 
			<div class="currency"><label><?php echo esc_html_e('currency:','monsta')?></label><?php do_action('currency_switcher'); ?></div> 
		</div> 
	<?php }

	$html .= ob_get_contents();

	ob_end_clean();
	
	return $html;
}

function monsta_roadsocialicons_shortcode( $atts ) {
	$monsta_opt = get_option( 'monsta_opt' );

	$html = '';

	ob_start();

	if(isset($monsta_opt['social_icons'])) {
		echo '<ul class="social-icons">';
		foreach($monsta_opt['social_icons'] as $key=>$value ) {
			if($value!=''){
				if($key=='vimeo'){
					echo '<li><a class="'.esc_attr($key).' social-icon" href="'.esc_url($value).'" title="'.ucwords(esc_attr($key)).'" target="_blank"><i class="fa fa-vimeo-square"></i></a></li>';
				} else {
					echo '<li><a class="'.esc_attr($key).' social-icon" href="'.esc_url($value).'" title="'.ucwords(esc_attr($key)).'" target="_blank"><i class="fa fa-'.esc_attr($key).'"></i></a></li>';
				}
			}
		}
		echo '</ul>';
	}

	$html .= ob_get_contents();

	ob_end_clean();
	
	return $html;
}

function monsta_roadminicart_shortcode( $atts ) {

	$html = '';

	ob_start();

	if ( class_exists( 'WC_Widget_Cart' ) ) {
		the_widget('Custom_WC_Widget_Cart');
	}

	$html .= ob_get_contents();

	ob_end_clean();
	
	return $html;
}

function monsta_roadproductssearch_shortcode( $atts ) {

	$html = '';

	ob_start();

	if( class_exists('WC_Widget_Product_Categories') && class_exists('WC_Widget_Product_Search') ) { ?>
	  	<div class="header-search">  
	   		<?php the_widget('WC_Widget_Product_Search', array('title' => 'Search')); ?>
	 	</div>
	<?php }

	$html .= ob_get_contents();

	ob_end_clean();
	 
 return $html;
}

function monsta_roadproductssearchmobile_shortcode( $atts ) {

	$html = '';

	ob_start(); 
	if(get_search_query()!=''){
		$search_str = get_search_query();
	} else {
		$search_str = esc_html__( 'Search product...', 'monsta' );
	} ?>
		<div class="header-search"> 
			<form role="search" method="get" class="searchform" action="<?php echo esc_url( home_url( '/'  ) );?>">
				<div class="form-input">
					<input type="text" value="<?php echo esc_attr($search_str)?>" name="s" class="ws" />
					<button class="btn btn-primary wsearchsubmit" type="submit"><i class="ion-ios-search-strong"></i></button>
					<input type="hidden" name="post_type" value="product" />
				</div>
			</form>
		</div>
	<?php 

	$html .= ob_get_contents();

	ob_end_clean();
	
	return $html;
}

function monsta_brands_shortcode( $atts ) {
	global $monsta_opt;
	$brand_index = 0;
	
	if(isset($monsta_opt['brand_logos'])) {
		$brandfound = count($monsta_opt['brand_logos']);
	}
	$atts = shortcode_atts( array(
							'rowsnumber' => '1',
							'colsnumber' => '6',
							), $atts, 'ourbrands' );
	$html = '';
	
	if(isset($monsta_opt['brand_logos']) && $monsta_opt['brand_logos']) {
		$html .= '<div class="brands-carousel" data-col="'.$atts['colsnumber'].'">';
			foreach($monsta_opt['brand_logos'] as $brand) {
				if(is_ssl()){
					$brand['image'] = str_replace('http:', 'https:', $brand['image']);
				}
				$brand_index ++;
				if ( (0 == ( $brand_index - 1 ) % $atts['rowsnumber'] ) || $brand_index == 1) {
					$html .= '<div class="group">';
				}
				$html .= '<div>';
				$html .= '<a href="'.esc_url($brand['url']).'" title="'.esc_attr($brand['title']).'">';
					$html .= '<img src="'.esc_url($brand['image']).'" alt="'.esc_attr($brand['title']).'" />';
				$html .= '</a>';
				$html .= '</div>';
				if ( ( ( 0 == $brand_index % $atts['rowsnumber'] || $brandfound == $brand_index ))  ) {
					$html .= '</div>';
				}
			}
		$html .= '</div>';
	}
	
	return $html;
}

function monsta_counter_shortcode( $atts ) {
	
	$atts = shortcode_atts( array(
							'image' => '',
							'number' => '100',
							'text' => 'Demo text',
							), $atts, 'monsta_counter' );
	$html = '';
	$html.='<div class="monsta-counter">';
		$html.='<div class="counter-image">';
			$html.='<img src="'.esc_url(wp_get_attachment_url($atts['image'])).'" />';
		$html.='</div>';
		$html.='<div class="counter-info">';
			$html.='<div class="counter-number">';
				$html.='<span>'.$atts['number'].'</span>';
			$html.='</div>';
			$html.='<div class="counter-text">';
				$html.='<span>'.$atts['text'].'</span>';
			$html.='</div>';
		$html.='</div>';
	$html.='</div>';
	
	return $html;
}

function monsta_list_categories_shortcode( $atts ) {

	$atts = shortcode_atts( array(
		'category' => '', 
	), $atts, 'list_categories' );
	
	$html = '';
	
	$html .= '<div class="category-wrapper">';
		$pcategory = get_term_by( 'slug', $atts['category'], 'product_cat', 'ARRAY_A' );
		if($pcategory){
			$html .= '<div class="category-list">';
				$html .= '<h3><a href="'. esc_url(get_term_link($pcategory['slug'], 'product_cat') ).'">'. $pcategory['name'] .'</a></h3>';
				
				$html .= '<ul>';
					$args2 = array(
						'taxonomy'     => 'product_cat',
						'child_of'     => 0,
						'parent'       => $pcategory['term_id'],
						'orderby'      => 'name',
						'show_count'   => 0,
						'pad_counts'   => 0,
						'hierarchical' => 0,
						'title_li'     => '',
						'hide_empty'   => 0
					);
					$sub_cats = get_categories( $args2 );

					if($sub_cats) {
						foreach($sub_cats as $sub_category) {
							$html .= '<li><a href="'.esc_url(get_term_link($sub_category->slug, 'product_cat')).'">'.$sub_category->name.'</a></li>';
						}
					}
					$html .= '<li class="view-all"><a href="'. esc_url(get_term_link($pcategory['slug'], 'product_cat')) .'">'. esc_html_e('View all', 'monsta') .'</a></li>';
				$html .= '</ul>';
			$html .= '</div>'; 
		}
	$html .= '</div>';
	
	return $html;
}

function monsta_roadtimesale_shortcode( $atts ) {  
	$monsta_opt = get_option( 'monsta_opt' );

	$atts = shortcode_atts( array(
							'sale-date-time' => '',
							), $atts, 'roadtimesale' );

	$html = '';

	ob_start();
	if(isset($monsta_opt['sale-date-time'])) {
		echo '<div class="countdownsale" data-date="'.esc_attr($monsta_opt['sale-date-time']).' 00:00:00" style="width: 470px; height: 117px;"></div>';
	}
	$html .= ob_get_contents();

	ob_end_clean();
	
	return $html;
}

function monsta_categoriescarousel_shortcode( $atts ) {
	global $monsta_opt;
	$categories_index = 0;
	if(isset($monsta_opt['cate_images'])){
		$categoriesfound = count($monsta_opt['cate_images']);
	}
	
	$atts = shortcode_atts( array(
							'rowsnumber' => '1',
							'colsnumber' => '6',
							), $atts, 'categoriescarousel' );
	$html = '';
	
	if(isset($monsta_opt['cate_images'])){
		$html .= '<div class="categories-carousel" data-col="'.$atts['colsnumber'].'">';
			foreach($monsta_opt['cate_images'] as $categories) {
				if(is_ssl()){
					$categories['image'] = str_replace('http:', 'https:', $categories['image']);
				}
				$categories_index ++;
				if ( (0 == ( $categories_index - 1 ) % $atts['rowsnumber'] ) || $categories_index == 1) {
					$html .= '<div class="group">';
				}
				$html .= '<div class="item">';
					$html .= '<div class="item-inner">';
						$html .= '<a href="'.esc_url($categories['url']).'" class="image" title="'.esc_attr($categories['title']).'">';
							$html .= '<img src="'. esc_url($categories['image']).'" alt="'.esc_attr($categories['title']).'" />';
						$html .= '</a>'; 
						$html .= '<div class="description">';
							$html .= '<h3 class="title">'.$categories['title'].'</h3>';
							$html .= '<div class="des">'.$categories['description'].'</div>';
						$html .= '</div>'; 
					$html .= '</div>';
				$html .= '</div>';
				if ( ( ( 0 == $categories_index % $atts['rowsnumber'] || $categoriesfound == $categories_index ))  ) {
					$html .= '</div>';
				}
			}
		$html .= '</div>';
	}
	
	return $html;
}

function monsta_latestposts_shortcode( $atts ) {
	global $monsta_opt;
	$post_index = 0;
	wp_localize_script('monsta-jquery', 'latestposts_options', array(
			'atts' => $atts
		)
	);
	$atts = shortcode_atts( array(
		'posts_per_page' => 5,
		'order' => 'DESC',
		'orderby' => 'post_date',
		'image' => 'wide', //square
		'length' => 20,
		'rowsnumber' => '1',
		'colsnumber' => '4',
		'enable_slider' => false,
		'image1' => 'square',
		'post_styles' => '',
	), $atts, 'latestposts' );
	
	if($atts['image']=='wide'){
		$imagesize = 'monsta-post-thumbwide';
	} else {
		$imagesize = 'monsta-post-thumb';
	}

	$slider = '';
	if ($atts["enable_slider"] == true) {
		$slider = 'slide owl-carousel owl-theme';
	}
	$style= '';
	switch ($atts["post_styles"]) {
		case 'style_2': 
	        $style = 'style_2';
	        break;  
	}
	$html = '';

	$postargs = array(
		'posts_per_page'   => $atts['posts_per_page'],
		'offset'           => 0,
		'category'         => '',
		'category_name'    => '',
		'orderby'          => $atts['orderby'],
		'order'            => $atts['order'],
		'exclude'          => '',
		'meta_key'         => '',
		'meta_value'       => '',
		'post_type'        => 'post',
		'post_mime_type'   => '',
		'post_parent'      => '',
		'post_status'      => 'publish',
		'suppress_filters' => true );
	
	$postslist = get_posts( $postargs );

	$html.='<div class="posts-carousel '.esc_attr($slider).' '.esc_attr($style).'" data-col="'.$atts['colsnumber'].'">';

			foreach ( $postslist as $post ) {
				$post_index ++;
				if ( (0 == ( $post_index - 1 ) % $atts['rowsnumber'] ) || $post_index == 1) {
					$html .= '<div class="group">';
				} 
				$html.='<div class="item-col">';
					$html.='<div class="post-wrapper">';

					// author link
					$author_id = $post->post_author;
					$author_url = get_author_posts_url( get_the_author_meta( 'ID', $author_id ) );
					$author_name = get_the_author_meta( 'user_nicename', $author_id );
					
					//comment variables
					$num_comments = (int)get_comments_number($post->ID);
					$write_comments = '';
					if ( comments_open($post->ID) ) {
						if ( $num_comments == 0 ) {
							$comments = __('<span>0</span> comments', 'monsta');
						} elseif ( $num_comments > 1 ) {
							$comments = '<span>'.$num_comments .'</span>'. esc_html__(' comments', 'monsta');
						} else {
							$comments = __('<span>1</span> comment', 'monsta');
						}
						$write_comments = '<a href="' .esc_url(get_comments_link($post->ID) ).'">'.$comments.'</a>';
					}
					// Read more text
					if(!isset($monsta_opt['readmore_text'])){
						$monsta_opt['readmore_text'] = 'Read more';
					}
					
					$html.='<div class="post-thumb">'; 
						$html.='<a href="'.esc_url(get_the_permalink($post->ID)).'">'.get_the_post_thumbnail($post->ID, $imagesize).'</a>';  
					$html.='</div>';
					
					$html.='<div class="post-info">';    
						$html.='<h3 class="post-title"><a href="'.esc_url(get_the_permalink($post->ID)).'">'.get_the_title($post->ID).'</a></h3>';	  
						$html.='<div class="post-meta">';  
							$html.='<span class="post-author">';
								$html.= sprintf( wp_kses(__( '%s', 'monsta' ), array('a'=>array('href'=>array()))),'By <a href="'.esc_url($author_url).'">'.$author_name.'</a>' );
							$html.='</span>';   
							$html.='<span class="post-slash"> / </span>'; 
							$html.='<div class="post-date"><div class="post-date-inner"><span class="day">'.get_the_date('d', $post->ID).'</span> <span class="month">' .get_the_date('M', $post->ID).'</span> <span class="year">' .get_the_date('Y', $post->ID).'</span></div></div>';   
						$html.='</div>'; 
						$html.='<div class="post-excerpt">';
							$html.= Monsta_Class::monsta_excerpt_by_id($post, $length = $atts['length']);
						$html.='</div>';   
						$html.='<a class="readmore" href="'.esc_url(get_the_permalink($post->ID)).'">'.'<span>' .esc_html($monsta_opt['readmore_text']). '</span>'.'</a>';
					$html.='</div>';

				$html.='</div>';
			$html.='</div>';
			if ( ( ( 0 == $post_index % $atts['rowsnumber'] || $atts['posts_per_page'] == $post_index ))  ) {
				$html .= '</div>';
			}
		}
	$html.='</div>';

	wp_reset_postdata();
	
	return $html;
}

function monsta_contact_map( $atts ) {
	global $monsta_mapid;
	
	if(!isset($monsta_mapid)){
		$monsta_mapid = 1;
	} else {
		$monsta_mapid++;
	}
	$atts = shortcode_atts( array(
		'map_height' => 400,
		'map_zoom' => 17,
		'lat1' => '',
		'long1' => '',
		'address1' => '',
		'marker1' => '',
		'description1' => '',
		
	), $atts, 'monsta_map' );
	
	$map_zoom = 17;
	if(intval($atts['map_zoom'])){
		$map_zoom = intval($atts['map_zoom']);
	}
	$map_height = 400;
	if(intval($atts['map_height'])){
		$map_height = intval($atts['map_height']);
	}
	
	$markers = array(
		array(
			'lat1' => $atts['lat1'],
			'long1' => $atts['long1'],
			'address1' => $atts['address1'],
			'marker1' => $atts['marker1'],
			'description1' => $atts['description1'],
		),
	);
	
	$html = '';
	
	$html.='<div class="map-wrapper">';
		$html.='<div id="map'.$monsta_mapid.'" class="map" style="height: '.$map_height.'px"></div>';
	$html.='</div>';
	
	//Add google map API
	wp_enqueue_script( 'gmap-api-js', 'http://maps.google.com/maps/api/js?sensor=false' , array(), '3', false );
	// Add jquery.gmap.js file
	wp_enqueue_script( 'jquery-gmap-js', get_template_directory_uri() . '/js/jquery.gmap.js', array(), '2.1.5', false );

	?>
	
	<?php 
	    $mark_array = array();
	    $markeridx = 0;
	    foreach($markers as $marker){
	    $markeridx++;
	      
	    $map_desc = str_replace(array("\r\n", "\r", "\n"), "", $marker['description'.$markeridx]);
	    $map_desc = addslashes($map_desc);
			
	    if( $marker['address'.$markeridx]!='' || ($marker['lat'.$markeridx]!='' && $marker['long'.$markeridx]!='') ){

	    	$mark_latitude = esc_js($marker['lat'.$markeridx]);
	    	$mark_longitude = esc_js($marker['long'.$markeridx]);
			  
			$icon = get_template_directory_uri() . '/images/marker.png'; 	
		  	if( isset($marker['marker'.$markeridx]) && $marker['marker'.$markeridx]!='') {
			  $icon =  wp_get_attachment_url( $marker['marker'.$markeridx]); 
		  	}		 
			$mark_options = " {latitude:".$mark_latitude.",longitude:".$mark_longitude.",popup: true,html: '".$map_desc."',icon:{image:'".$icon."',iconsize:[40, 46],iconanchor:[40, 40]}}, ";

			$mark_array  = array(
				'latitude' => $mark_latitude,
				'longitude' => $mark_longitude,
				'html' => $map_desc, 
				'icon' => $icon

			);
      	}
    } 

    wp_enqueue_script('monsta-contact-map-script', get_template_directory_uri() . '/js/contact-map-var.js');
    wp_localize_script('monsta_contact_map_script', 'monsta_contact_vars', array(
    		'monsta_mapid' => esc_attr($monsta_mapid),
    		'zoom' => esc_js($map_zoom),
    		'markers' => $mark_array,
    	)
    );
   
  	?>
	
	<?php
	
	return $html;
}
function monsta_magnifier_options($att) {  
	$enable_slider 	= get_option('yith_wcmg_enableslider') == 'yes' ? true : false;
	$slider_items = get_option( 'yith_wcmg_slider_items', 3 ); 
	if ( !isset($slider_items) || ( $slider_items == null ) ) $slider_items = 3;

	wp_enqueue_script('monsta_magnifier', get_template_directory_uri() . '/js/product-magnifier-var.js');
	wp_localize_script('monsta_magnifier', 'monsta_magnifier_vars', array(
		
			'responsive' => get_option('yith_wcmg_slider_responsive') == 'yes' ? 'true' : 'false',
			'circular' => get_option('yith_wcmg_slider_circular') == 'yes' ? 'true' : 'false',
			'infinite' => get_option('yith_wcmg_slider_infinite') == 'yes' ? 'true' : 'false',

			'visible' => esc_js(apply_filters( 'woocommerce_product_thumbnails_columns', $slider_items )),

			'zoomWidth' => get_option('yith_wcmg_zoom_width'),
			'zoomHeight' => get_option('yith_wcmg_zoom_height'),
			'position' => get_option('yith_wcmg_zoom_position'),

			'lensOpacity' => get_option('yith_wcmg_lens_opacity'),
			'softFocus' => get_option('yith_wcmg_softfocus') == 'yes' ? 'true' : 'false',
			'phoneBehavior' => get_option('yith_wcmg_zoom_mobile_position'),
			'loadingLabel' => stripslashes(get_option('yith_wcmg_loading_label')),
		)
	);
}
?>