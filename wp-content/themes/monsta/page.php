<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage monsta_Theme
 * @since monsta 1.0
 */
$monsta_opt = get_option( 'monsta_opt' );

get_header(); 

?>
<div class="main-container default-page">
	<div class="container"> 
		<div class="title-breadcrumb"> 
			<div class="title-breadcrumb-inner">
				
				<header class="entry-header"> 
					<h1 class="entry-title"><?php the_title(); ?></h1> 
				</header> 
				<?php monsta_Class::monsta_breadcrumb(); ?>  
			</div> 
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="container">
		
		<div class="row"> 
			<?php
			$customsidebar = get_post_meta( $post->ID, '_monsta_custom_sidebar', true );
			$customsidebar_pos = get_post_meta( $post->ID, '_monsta_custom_sidebar_pos', true ); 
			if($customsidebar != ''){
				if($customsidebar_pos == 'left' && is_active_sidebar( $customsidebar ) ) {
					echo '<div id="secondary" class="col-xs-12 col-md-3">';
						dynamic_sidebar( $customsidebar );
					echo '</div>';
				} 
			} else {
				if( $monsta_opt['sidebarse_pos']=='left'  || !isset($monsta_opt['sidebarse_pos']) ) {
					get_sidebar('page');
				}
			} ?>
			<div class="col-xs-12 <?php if ( $customsidebar!='' || is_active_sidebar( 'sidebar-page' ) ) : ?>col-md-9<?php endif; ?>">
				<div class="page-content default-page">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'content', 'page' ); ?>
						<?php comments_template( '', true ); ?>
					<?php endwhile; // end of the loop. ?>
				</div>
			</div>
			<?php
			if($customsidebar != ''){
				if($customsidebar_pos == 'right' && is_active_sidebar( $customsidebar ) ) {
					echo '<div id="secondary" class="col-xs-12 col-md-3">';
						dynamic_sidebar( $customsidebar );
					echo '</div>';
				} 
			} else {
				if( $monsta_opt['sidebarse_pos']=='right' ) {
					get_sidebar('page');
				}
			} ?>
		</div>
	</div> 
</div>
<?php get_footer(); ?>