<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Monsta_Theme
 * @since Monsta 1.0
 */

$monsta_opt = get_option( 'monsta_opt' );

get_header();
$monsta_blogstyle = Monsta_Class::monsta_show_style_blog();

$monsta_bloglayout = 'sidebar';
if(isset($monsta_opt['blog_layout']) && $monsta_opt['blog_layout']!=''){
	$monsta_bloglayout = $monsta_opt['blog_layout'];
}
if(isset($_GET['layout']) && $_GET['layout']!=''){
	$monsta_bloglayout = $_GET['layout'];
}
$monsta_blogsidebar = 'right';
if(isset($monsta_opt['sidebarblog_pos']) && $monsta_opt['sidebarblog_pos']!=''){
	$monsta_blogsidebar = $monsta_opt['sidebarblog_pos'];
}
if(isset($_GET['sidebar']) && $_GET['sidebar']!=''){
	$monsta_blogsidebar = $_GET['sidebar'];
}
if ( !is_active_sidebar( 'sidebar-1' ) )  {
	$monsta_bloglayout = 'nosidebar';
}
switch($monsta_bloglayout) {
	case 'sidebar':
		$monsta_blogclass = 'blog-sidebar';
		$monsta_blogcolclass = 9;
		break;
	default:
		$monsta_blogclass = 'blog-nosidebar'; //for both fullwidth and no sidebar
		$monsta_blogcolclass = 12;
		$monsta_blogsidebar = 'none';
}
?>
<div class="main-container page-wrapper">
	<div class="container">
		<div class="title-breadcrumb"> 
			<div class="title-breadcrumb-inner">
				
				<header class="entry-header">
					<h1 class="entry-title"><?php if(isset($monsta_opt)) { echo esc_html($monsta_opt['blog_header_text']); } else { esc_html_e('Blog', 'monsta');}  ?></h1>
				</header> 
				<?php Monsta_Class::monsta_breadcrumb(); ?>
			</div>
		</div>
		
	</div>
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
				if($monsta_blogsidebar=='left') {
					get_sidebar();
				}
			} ?>
			
			<div class="col-xs-12 <?php echo 'col-md-'.$monsta_blogcolclass; ?>">
				<div class="page-content blog-page single <?php echo esc_attr($monsta_blogclass.' '.$monsta_blogstyle); if($monsta_blogsidebar=='left') {echo ' left-sidebar'; } if($monsta_blogsidebar=='right') {echo ' right-sidebar'; } ?>">
					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'content', get_post_format() ); ?>

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
				if($monsta_blogsidebar=='right') {
					get_sidebar();
				}
			} ?>
		</div>
	</div> 
</div>

<?php get_footer(); ?>