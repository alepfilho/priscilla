<?php
/**
 * The template for displaying Author Archive pages
 *
 * Used to display archive-type pages for posts by an author.
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
			<?php endif; ?>
			<div class="col-xs-12 <?php echo 'col-md-'.$monsta_blogcolclass; ?>">
				<div class="page-content blog-page <?php echo esc_attr($monsta_blogclass.' '.$monsta_blogstyle); if($monsta_blogsidebar=='left') {echo ' left-sidebar'; } if($monsta_blogsidebar=='right') {echo ' right-sidebar'; } ?>">
					<?php if ( have_posts() ) : ?>

						<?php
							/* Queue the first post, that way we know
							 * what author we're dealing with (if that is the case).
							 *
							 * We reset this later so we can run the loop
							 * properly with a call to rewind_posts().
							 */
							the_post();
						?>

						<header class="archive-header">
							<h1 class="archive-title"><?php printf( esc_html__( 'Author Archives: %s', 'monsta' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' ); ?></h1>
						</header><!-- .archive-header -->

						<?php
							/* Since we called the_post() above, we need to
							 * rewind the loop back to the beginning that way
							 * we can run the loop properly, in full.
							 */
							rewind_posts();
						?>

						<?php
						// If a user has filled out their description, show a bio on their entries.
						if ( get_the_author_meta( 'description' ) ) : ?>
						<div class="author-info archives">
							<div class="author-avatar">
								<?php
								/**
								 * Filter the author bio avatar size.
								 *
								 * @since Monsta 1.0
								 *
								 * @param int $size The height and width of the avatar in pixels.
								 */
								$author_bio_avatar_size = apply_filters( 'monsta_author_bio_avatar_size', 68 );
								echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
								?>
							</div><!-- .author-avatar -->
							<div class="author-description">
								<h2><?php printf( esc_html__( 'About %s', 'monsta' ), get_the_author() ); ?></h2>
								<p><?php the_author_meta( 'description' ); ?></p>
							</div><!-- .author-description	-->
						</div><!-- .author-info -->
						<?php endif; ?>

						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>
							<?php get_template_part( 'content', get_post_format() ); ?>
						<?php endwhile; ?>
						
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