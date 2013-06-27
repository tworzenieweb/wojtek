<?php
/**
 * File used to display related posts for single.php
 *
 * @package WordPress
 * @subpackage Pytheas
 * @since Pytheas 1.0
 */
 
$category = get_the_category();
$related_query = NULL;
$related_query = new WP_Query(
	array(
		'post_type' => 'post',
		'posts_per_page' => '3',
		'category' =>  $category[0]->cat_ID,
		'exclude' => get_the_ID(),
		'no_found_rows' => true,
		)
	);
		
if( $related_query->posts ) { ?>

	<section class="related-posts row clr">
    
		<h4 class="heading"><span><?php _e('Related Articles','wpex'); ?></span></h4>
        
		<?php while( $related_query->have_posts() ) : $related_query->the_post(); ?>
        
            <article id="post-<?php the_ID(); ?>" class="related-entry clr row">
            
                <?php if( has_post_thumbnail() ) { ?>
                    <div class="related-entry-img span_6 col clr-margin">
                         <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
                            <img class="related-post-image blog-entry-img" src="<?php echo aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ), wpex_img('blog_related_entry_width'),  wpex_img('blog_related_entry_height'),  wpex_img('blog_related_entry_crop') ); ?>" alt="<?php echo the_title(); ?>" />
                         </a>
                     </div><!-- .related-entry-img -->
                <?php } ?>
                
                <div class="related-entry-content span_18 col <?php if ( !has_post_thumbnail() ) { echo 'full-width clr-margin'; } ?>">
                    <h5 class="related-entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title()?></a></h5>
                    <p><?php echo wp_trim_words( get_the_content(), 30, '...' ); ?></p>
                </div><!-- .related-entry-content -->
                
            </article><!-- .related-entry -->
        
		<?php endwhile; wp_reset_postdata(); $related_query = NULL; ?>
        
	</section><!-- #related-posts --> 
        
<?php }