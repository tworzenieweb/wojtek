<?php
/**
 * This file is used to display your homepage slides
 *
 * @package Fresh & Clean WordPress Theme
 * @since 1.0
 */

if ( of_get_option('slides_alt') !== '' ) {
	
	echo do_shortcode( of_get_option('slides_alt') );
	
} else {

	if ( class_exists( 'Symple_Slides_Post_Type' ) ) {
		global $post;
		$slides = get_posts( array(
			'post_type' => 'slides',
			'numberposts' => '-1',
			'order' => 'ASC'
		));
		if( $slides ) {
			
			// Load slider scripts
			wp_enqueue_script('flexslider', get_template_directory_uri() .'/js/flexslider.js', array('jquery'), '2.0', true);
			wp_enqueue_script('wpex-slider-home', get_template_directory_uri() .'/js/slider-home.js', array('jquery','flexslider'), '1.0', true);
			
			// Set slider options
			$flex_params = array(
				'slideshow' => of_get_option('slides_slideshow', '0'),
				'randomize' => of_get_option('slides_randomize', '0'),			
				'animation' => of_get_option('slides_animation', 'slide'),
				'direction' => of_get_option('slides_direction', 'horizontal'),
				'slideshowSpeed' => of_get_option('slideshow_speed', '7000'),
				'animationSpeed' => of_get_option('animation_speed', '600')
			);
			
			// Localize slider script
			wp_localize_script( 'wpex-slider-home', 'flexLocalize', $flex_params );?>        
			<div id="home-slider-wrap" class="clr flexslider-container">
				<div id="home-slider" class="flexslider">
					<div id="home-slider-loader"><i class="icon-spinner icon-spin"></i></div>
					<ul class="slides">
						<?php foreach( $slides as $post ) :	setup_postdata($post); ?>
						<?php if( has_post_thumbnail() || get_post_meta( get_the_ID(), 'wpex_slides_video', true) ){ ?>
							<li>
								<div class="slide-inner fitvids">
									<?php if( get_post_meta( get_the_ID(), 'wpex_slides_video', true) !== '' ) {
										echo wp_oembed_get( get_post_meta( get_the_ID(), 'wpex_slides_video', true ) );
									} else {
										if( get_post_meta( get_the_ID(), 'wpex_slides_url', true) !== '' ) { ?>
										<a href="<?php echo get_post_meta( get_the_ID(), 'wpex_slides_url', true); ?>" title="<?php the_title_attribute(); ?>" target="_<?php echo get_post_meta( get_the_ID(), 'wpex_slides_url_target', true); ?>">
											<img src="<?php echo aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ),  wpex_img( 'slider_width' ), wpex_img( 'slider_height' ), wpex_img( 'slider_crop' ) ); ?>" alt="<?php the_title(); ?>" />
										</a>
										<?php } else { ?>
											<img src="<?php echo aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ),  wpex_img( 'slider_width' ), wpex_img( 'slider_height' ), wpex_img( 'slider_crop' ) ); ?>" alt="<?php the_title(); ?>" />
									<?php }
									 }
									 if( $post->post_content !=='' ) { ?>
										<div class="flex-caption"><?php the_content(); ?></div>
									<?php } ?>
								</div><!--/ slide-inner -->
							</li>
						<?php } ?>
						<?php endforeach; wp_reset_postdata(); ?>
					</ul><!-- /slides -->
				</div><!-- /home-slider -->
			</div><!-- /home-slider-wrap -->
		<?php } 
	}
	
}