<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Monsta_Theme
 * @since Monsta 1.0
 */
 
$monsta_opt = get_option( 'monsta_opt' );
?>
			<?php if(isset($monsta_opt['footer_layout']) && $monsta_opt['footer_layout']!=''){
				$footer_class = str_replace(' ', '-', strtolower($monsta_opt['footer_layout']));
			} else {
				$footer_class = '';
			} ?>

			<div class="footer <?php echo esc_html($footer_class);?>">
				<?php
				if ( isset($monsta_opt['footer_layout']) && $monsta_opt['footer_layout']!="" ) {

					$jscomposer_templates_args = array(
						'orderby'          => 'title',
						'order'            => 'ASC',
						'post_type'        => 'templatera',
						'post_status'      => 'publish',
						'posts_per_page'   => 30,
					);
					$jscomposer_templates = get_posts( $jscomposer_templates_args );

					if(count($jscomposer_templates) > 0) {
						foreach($jscomposer_templates as $jscomposer_template){
							if($jscomposer_template->post_title == $monsta_opt['footer_layout']){
								echo do_shortcode(apply_filters( 'the_content', $jscomposer_template->post_content ));
							}
						}
					}
				} else { ?>
					<div class="footer-default widget-copyright copyright">
						<?php esc_html_e( "Copyright", 'monsta' ); ?> <a href="<?php echo esc_url( home_url( '/' ) ) ?>"> <?php echo get_bloginfo('name') ?></a> <?php echo date('Y') ?>. <?php esc_html_e( "All Rights Reserved", 'monsta' ); ?>
					</div>
				<?php
				}
				?>
			</div>
		</div><!-- .page -->
	</div><!-- .wrapper -->
	<!--<div class="monsta_loading"></div>-->
	<?php if ( isset($monsta_opt['back_to_top']) && $monsta_opt['back_to_top'] ) { ?>
	<div id="back-top" class="hidden-xs hidden-sm hidden-md"></div>
	<?php } ?>
	<?php wp_footer(); ?> 
</body>
</html>