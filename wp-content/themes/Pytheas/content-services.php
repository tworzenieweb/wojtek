<?php
/**
 * @package WordPress
 * @subpackage Pytheas WordPress Theme
 * This file contains the styling for services entries.
 */


/******************************************************
 * Single Posts
 * @since 1.0
*****************************************************/
if ( is_singular() && is_main_query() ) { ?>


	<div id="service-media">
        <div id="service-media-inner">
        
            <?php
            $get_attachments = get_children( array( 'post_parent' => $post->ID ) );
            $attachments_count = count( $get_attachments );
			
            if( $attachments_count <= '1' && has_post_thumbnail() ) { ?>
                
                <div class="post-thumbnail">
                    <a href="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>" title="<?php the_title_attribute(); ?>" class="prettyphoto-link"><img src="<?php echo aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ), wpex_img('service_post_width'),  wpex_img('service_post_height'),  wpex_img('service_post_crop') ) ?>" alt="<?php echo the_title(); ?>" /></a>
                </div><!-- /post-thumbnail -->
                    
            <?php }
         
            elseif ( $attachments_count > '1' ) {
                $attachments = get_children (
					array(
						'post_type' => 'attachment',
						'post_parent' => get_the_ID(),
						'post_mime_type' => 'image',
						'posts_per_page' => -1,
						'no_found_rows' => true,
					)
				);

                wp_enqueue_script('flexslider', get_template_directory_uri() .'/js/flexslider.js', array('jquery'), '2.0', true);
                wp_enqueue_script('wpex-slider-home', get_template_directory_uri() .'/js/slider-service.js', array('jquery','flexslider'), '1.0', true); ?>                
                <div id="service-slider" class="flexslider-container">
                    <div id="service-slider-loader"><i class="icon-spinner icon-spin"></i></div>
                    <div id="slider-<?php get_the_ID(); ?>" class="flexslider">
                        <ul class="slides">              
                            <?php
                            foreach ($attachments as $attachment) :
                            $attachment_caption = $attachment->post_excerpt; ?>
                                <li class="slide"><a href="<?php echo wp_get_attachment_url( $attachment->ID ); ?>" title="<?php the_title_attribute(); ?>" rel="prettyPhoto[services_gallery]"><img src="<?php echo aq_resize( wp_get_attachment_url($attachment->ID), wpex_img('service_post_width'),  wpex_img('service_post_height'),  wpex_img('service_post_crop') ) ?>" alt="<?php echo the_title(); ?>" /></a> </li>                     
                            <?php endforeach; ?>
                        </ul><!-- .slides -->
                    </div><!-- /.flexslider -->
                </div><!-- .flexslider-container -->
                
            <?php } else { /* Nothing to show here*/ } ?>
            
        </div><!-- #single-services-media-inner -->
	</div><!-- #single-services-media -->



<?php
/******************************************************
 * Entries
 * @since 1.0
*****************************************************/
} else {
	
	global $wpex_count;
	$wpex_clr_margin = ( $wpex_count == 1 ) ? 'clr-margin' : NULL; ?>
        
    <article id="#post-<?php the_ID(); ?>" <?php post_class('service-entry span_8 col '. $wpex_clr_margin); ?>>
    
    	<?php if( get_post_meta(get_the_ID(), 'wpex_services_icon', TRUE ) !== 'Select' ) { ?>
            <div class="service-icon">
                <i class="icon-<?php echo get_post_meta( get_the_ID(), 'wpex_services_icon', TRUE ); ?>"></i>
            </div><!-- .service-icon -->
		<?php } ?>
        
        <div class="service-entry-details clr">
        	<h3 class="service-entry-title"><?php the_title(); ?></h3>
			<?php
            // Display excerpt
            echo ( !empty( $post->post_excerpt ) ) ?
                apply_filters('the_content', get_the_excerpt() ) :
                    wp_trim_words( strip_shortcodes( get_the_excerpt() ), of_get_option('services_entry_excerpt_length','12') ); ?>
       </div><!-- .service-entry-details -->
       
    </article><!-- .service-entry -->

<?php
}