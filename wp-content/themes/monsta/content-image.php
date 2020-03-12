<?php
/**
 * The template for displaying posts in the Image post format
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Monsta_Theme
 * @since Monsta 1.0
 */

$monsta_opt = get_option( 'monsta_opt' );

$monsta_postthumb = Monsta_Class::monsta_post_thumbnail_size('');

if(Monsta_Class::monsta_post_odd_event() == 1){
	$monsta_postclass='even';
} else {
	$monsta_postclass='odd';
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class($monsta_postclass); ?>>
	
	<?php if ( ! post_password_required() && ! is_attachment() ) : ?>
		<?php 
			if ( is_single() ) { ?>
				<?php if ( has_post_thumbnail() ) { ?>
					<div class="post-thumbnail">
						<?php the_post_thumbnail(); ?> 
					</div>
				<?php } ?>
			<?php }
		?>
		<?php if ( !is_single() ) { ?>
			<?php if ( has_post_thumbnail() ) { ?>
			<div class="post-thumbnail">
				<a href="<?php echo esc_url(the_permalink() ); ?>"><?php the_post_thumbnail($monsta_postthumb); ?></a>
				 
			</div>
			<?php } ?>
		<?php } ?>
	<?php endif; ?>
	
	<div class="postinfo-wrapper <?php if ( !has_post_thumbnail() ) { echo 'no-thumbnail';} ?>">
		<header class="entry-header">
			<?php if ( is_single() ) : ?>
				<span class="post-category"> 
					<?php echo get_the_category_list( ', ' ); ?>
				</span>
				<h2 class="entry-title"><?php the_title(); ?></h2> 
			<?php else : ?>
				<span class="post-category"> 
					<?php echo get_the_category_list( ', ' ); ?>
				</span> 
				<h2 class="entry-title">
					<a href="<?php echo esc_url(the_permalink()); ?>" rel="bookmark"><?php the_title(); ?></a>
				</h2>
				 
			<?php endif; ?>
		</header>
		<div class="post-info"> 
			<?php if (is_home() && is_page_template('page-templates/front-page.php')){ ?>
				<header class="entry-header"> 
					<div class="link-top">
						<span class="post-category"> 
							<?php echo get_the_category_list( ', ' ); ?>
						</span>
						<div class="post-meta">
							<span class="post-author">
								<span class="post-by"><?php esc_html_e('Posted by', 'monsta');?> : </span>
								<?php printf( get_the_author() ); ?>
							</span>
							<span class="post-separator">|</span>
							<span class="post-date">
								<span><?php esc_html_e('Posted on', 'monsta');?> </span>
								<?php echo get_the_date(get_option('date_format'), $post->ID) ;?>
							</span>
						</div>
					</div> 
					<h2 class="entry-title">
						<a href="<?php echo esc_url(the_permalink()); ?>" rel="bookmark"><?php the_title(); ?></a>
					</h2>
				</header>
			<?php }?>
			<?php if ( is_single() ) : ?>
				<div class="entry-content">
					<div class="post-meta">
						<span class="post-author">
							<span class="post-by"><?php esc_html_e('Posted by', 'monsta');?>&nbsp;</span>
							<?php printf( get_the_author() ); ?>
						</span>
						<span class="post-separator">|</span>
						<span class="post-date">
							<span><?php esc_html_e('Posted on', 'monsta');?> </span>
							<?php echo get_the_date(get_option('date_format'), $post->ID) ;?>
						</span>
					</div>
					<?php the_content( wp_kses(__( 'Continue reading <span class="meta-nav">&rarr;</span>', 'monsta' ), array('span'=>array('class'=>array())) )); ?>
					<?php wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'monsta' ), 'after' => '</div>', 'pagelink' => '<span>%</span>' ) ); ?>
				</div>
			<?php else : ?>
				<div class="entry-summary">
					<div class="post-meta">
						<span class="post-author">
							<span class="post-by"><?php esc_html_e('Posted by', 'monsta');?>&nbsp;</span>
							<?php printf( get_the_author() ); ?>
						</span>
						<span class="post-separator">|</span>
						<span class="post-date">
							<span><?php esc_html_e('Posted on', 'monsta');?> </span>
							<?php echo get_the_date(get_option('date_format'), $post->ID) ;?>
						</span>
					</div>
					<?php the_excerpt(); ?>
					<a class="readmore button" href="<?php echo esc_url(the_permalink()); ?>"><?php if(isset($monsta_opt['readmore_text']) && $monsta_opt['readmore_text']!=''){ echo esc_html($monsta_opt['readmore_text']); } else { esc_html_e('Read more', 'monsta');}  ?></a>
				</div>
				<div class="social-comment">
					<?php if( function_exists('monsta_blog_sharing') ) { ?>
						<div class="social-sharing"><?php monsta_blog_sharing(); ?></div>
					<?php } ?>

					<!-- start comment in post page -->
					<?php
					$num_comments = (int)get_comments_number();
					if ( comments_open() ) {
						if ( $num_comments == 0 ) {
							$comments = esc_html__('0 comments', 'monsta');
						} elseif ( $num_comments > 1 ) {
							$comments = $num_comments . esc_html__(' comments', 'monsta');
						} else {
							$comments = esc_html__('1 comment', 'monsta');
						}
						echo '<a class="comment" href="' .esc_url(get_comments_link() ) .'">'. $comments.'</a>';
					}
					?>
					<!-- end comment in post page -->
				</div>
			<?php endif; ?>
			
			<?php if ( is_single() ) : ?>
				<div class="entry-meta">
					<?php Monsta_Class::monsta_entry_meta(); ?>
				</div>
			
				<?php if( function_exists('monsta_blog_sharing') ) { ?>
					<div class="social-sharing"><?php monsta_blog_sharing(); ?></div>
				<?php } ?>
				<?php if(get_the_author_meta()!="") { ?>
				<div class="author-info">
					<div class="author-avatar">
						<?php
						$author_bio_avatar_size = apply_filters( 'monsta_author_bio_avatar_size', 68 );
						echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
						?>
					</div>
					<div class="author-description">
						<h2><?php esc_html_e( 'About the Author:', 'monsta'); printf( '<a href="'.esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ).'" rel="author">%s</a>' , get_the_author()); ?></h2>
						<p><?php the_author_meta( 'description' ); ?></p>
					</div>
				</div>
				<?php } 
				$orig_post = $post;
			    global $post;
			    $tags = wp_get_post_tags($post->ID);
			     
			    if ($tags) {
				?>
				<div class="relatedposts">
					<h3><?php esc_html_e('Related posts', 'monsta');?></h3>
					<div class="row">
						<?php 
						    $tag_ids = array();
						    foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
						    $args=array(
						    'tag__in' => $tag_ids,
						    'post__not_in' => array($post->ID),
						    'posts_per_page'=>3, // Number of related posts to display.
						    'ignore_sticky_posts'=>1
						    );
						     
						    $my_query = new wp_query( $args );
						 
						    while( $my_query->have_posts() ) {
						    $my_query->the_post();
						    ?>
			    	    	<div class="relatedthumb col-md-4">
			    	    		<?php if ( has_post_thumbnail() ) { ?>
			    	    			<div class="image">
				    	    			<a href="<?php echo esc_url(the_permalink())?>">
				    	    				<?php the_post_thumbnail('monsta-post-thumb'); ?>
				    	    			</a>
				    	    		</div>
			    	    		<?php }?>  
			    	    		
			    		        <h4><a rel="external" href="<?php echo esc_url(the_permalink())?>"><?php the_title(); ?></a></h4>
			    		        <span class="post-date">
			    					<?php echo get_the_date(get_option('date_format'), $post->ID) ;?>
			    				</span>
			    		        
			    		    </div>
						     
						    <?php } 
						    $post = $orig_post;
						    wp_reset_postdata();
						?>
					</div> 
				</div>

			<?php } endif; ?>
		</div>
	</div>
</article>