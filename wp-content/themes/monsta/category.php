<?php
/**
 * The template for displaying Category pages
 *
 * Used to display archive-type pages for posts in a category.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
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
	$monsta_blogsidebar = 'nosidebar';
}
switch($monsta_bloglayout) {
	case 'sidebar':
		$monsta_blogclass = 'blog-sidebar';
		$monsta_blogcolclass = 9;
		Monsta_Class::monsta_post_thumbnail_size('monsta-category-thumb');
		break;
	case 'largeimage':
		$monsta_blogclass = 'blog-large';
		$monsta_blogcolclass = 9;
		$monsta_postthumb = '';
		break;
	default:
		$monsta_blogclass = 'blog-nosidebar';
		$monsta_blogcolclass = 12;
		$monsta_blogsidebar = 'none';
		Monsta_Class::monsta_post_thumbnail_size('monsta-post-thumb');
}
?>
<div class="main-container">
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
			
			<?php if($monsta_blogsidebar=='left') : ?>
				<?php get_sidebar(); ?>
			<?php endif;?>

			<div class="col-xs-12 <?php echo 'col-md-'.$monsta_blogcolclass; ?>">
			
				<div class="page-content blog-page <?php echo esc_attr($monsta_blogclass.' '.$monsta_blogstyle); if($monsta_blogsidebar=='left') {echo ' left-sidebar'; } if($monsta_blogsidebar=='right') {echo ' right-sidebar'; } ?>">
				
					<?php if ( have_posts() ) : ?>
						<header class="archive-header">
							<h1 class="archive-title"><?php printf( esc_html__( 'Category Archives: %s', 'monsta' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h1>

						<?php if ( category_description() ) : // Show an optional category description ?>
							<div class="archive-meta"><?php echo category_description(); ?></div>
						<?php endif; ?>
						</header><!-- .archive-header -->

						<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post();

							/* Include the post format-specific template for the content. If you want to
							 * this in a child theme then include a file called called content-___.php
							 * (where ___ is the post format) and that will be used instead.
							 */
							get_template_part( 'content', get_post_format() );

						endwhile;
						?>
						
						<div class="pagination">
							<?php Monsta_Class::monsta_pagination(); ?>
						</div>
						
					<?php else : ?>
						<?php get_template_part( 'content', 'none' ); ?>
					<?php endif; ?>
				</div>
			</div>
			<?php if( $monsta_blogsidebar=='right') : ?>
				<?php get_sidebar(); ?>
			<?php endif; ?>
		</div>
		
	</div> 
</div>

<?php get_footer(); ?>