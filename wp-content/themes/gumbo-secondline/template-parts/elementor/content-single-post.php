<?php
/**
 * @package slt
 */

?>




<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="secondline-themes-default-blog-index">

		<?php if(has_post_thumbnail()): ?>
			<div class="secondline-themes-feaured-image">
				<?php secondline_themes_blog_link(); ?>
					<?php
						if(get_theme_mod('secondline_themes_image_cropping', 'secondline-themes-crop') == 'secondline-themes-uncrop') {
							the_post_thumbnail('secondline-themes-single-post-addon-uncropped');
						} else {
							the_post_thumbnail('secondline-themes-single-post-addon');
						}
					;?>
				</a>
			</div><!-- close .secondline-themes-feaured-image -->
		<?php else: ?>

			<?php if( has_post_format( 'gallery' ) && get_post_meta($post->ID, 'secondline_themes_gallery', true)  ): ?>
				<div class="secondline-themes-feaured-image">
					<div class="flexslider secondline-themes-gallery">
					  <ul class="slides">
							<?php $files = get_post_meta( get_the_ID(),'secondline_themes_gallery', 1 ); ?>
							<?php foreach ( (array) $files as $attachment_id => $attachment_url ) : ?>
							<?php $lightbox_slt = wp_get_attachment_image_src($attachment_id, 'large'); ?>
							<li>
								<a <?php echo secondline_themes_blog_index_gallery(); ?> <?php $get_description = get_post($attachment_id)->post_excerpt; if(!empty($get_description)){ echo 'title="' . $get_description . '"'; } ?>>
								<?php echo wp_get_attachment_image( $attachment_id, 'secondline-themes-single-post-addon' ); ?>


								</a></li>
							<?php endforeach;  ?>
						</ul>
					</div><!-- close .flexslider -->

				</div><!-- close .secondline-themes-feaured-image -->

			<?php endif; ?><!-- close featured thumbnail -->

		<?php endif; ?><!-- close gallery -->


		<div class="secondline-blog-content">

			<h2 class="secondline-blog-title"><?php secondline_themes_blog_post_title(); ?><?php the_title(); ?></a></h2>

			<?php if ( 'post' == get_post_type() || 'podcast' == get_post_type() || 'episode' == get_post_type()) : ?>
				<div class="secondline-post-meta">

					<span class="blog-meta-date-display"><?php the_time(get_option('date_format')); ?></span>

					<span class="blog-meta-serie-display">
						<?php if( (get_post_meta($post->ID, 'secondline_themes_episode_number', true) && get_post_meta($post->ID, 'secondline_themes_episode_number', true) !== '') || (get_post_meta($post->ID, 'secondline_themes_season_number', true) && get_post_meta($post->ID, 'secondline_themes_season_number', true) !== '') ) {							
													
							if( get_post_meta($post->ID, 'secondline_themes_season_number', true) ) {
							  echo '<div class="blog-meta-serie-season"> ' .esc_html__('Season', 'gumbo-secondline') . ' ' . esc_attr(get_post_meta($post->ID, 'secondline_themes_season_number', true)).'</div>';
							  if( get_post_meta($post->ID, 'secondline_themes_episode_number', true) ) {
								echo '<div class="serie-separator"></div>';
							  }
							}
							
							if( get_post_meta($post->ID, 'secondline_themes_episode_number', true) ) {
							  echo '<div class="blog-meta-serie-episode">' . esc_html__('Episode', 'gumbo-secondline') . ' ' .esc_html(get_post_meta($post->ID, 'secondline_themes_episode_number', true)).'</div>';
							}
						
						} elseif( function_exists('powerpress_get_enclosure_data') ) {
							$slt_episode_data = powerpress_get_enclosure_data( $post->ID );
							if( !empty($slt_episode_data['season']) ) {
							  echo '<div class="blog-meta-serie-season">' .esc_html__('Season', 'gumbo-secondline') . ' ' . esc_attr($slt_episode_data['season']).'</div>';
							  if( !empty($slt_episode_data['episode_no']) ) {
								echo '<div class="serie-separator"></div>';
							  }
							}
							if( !empty($slt_episode_data['episode_no']) ) {
							  echo '<div class="blog-meta-serie-episode">' . esc_html__('Episode', 'gumbo-secondline') . ' ' . esc_attr($slt_episode_data['episode_no']).'</div>';							  
							}
						} ?>
					</span>				

					<span class="blog-meta-author-display"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a></span>

					<?php if(get_post_type() == 'podcast') :?>
						<span class="blog-meta-category-list">
							<?php $terms = get_the_terms( $post->ID , 'series' );
								if($terms) {
									$len = count($terms);
									$i = 0;
									foreach ( $terms as $term ) {
										$term_link = get_term_link( $term, 'series' );
										if( is_wp_error( $term_link ) )
										continue;
										echo esc_attr($term->name);
										if($i != $len - 1) {
											echo ', ';
										}
										$i++;
									}
								}
							;?>
						</span>
					<?php else: ?>
						<span class="blog-meta-category-list"><?php the_category(', '); ?></span>
					<?php endif;?>




					<?php
					if( function_exists('powerpress_get_enclosure_data') ) {
						$slt_episode_data = powerpress_get_enclosure_data( $post->ID );
						if( !empty($slt_episode_data['duration']) ) {
						  echo '<span class="blog-meta-time-slt">'.esc_attr($slt_episode_data['duration']).'</span>';
						}
					}
					if(function_exists('ssp_episodes')) {
						$duration = get_post_meta( $post->ID, 'duration', true );
						if ( !empty($duration) ) {
							$duration = apply_filters( 'ssp_file_duration', $duration, $post->ID );
							echo '<span class="blog-meta-time-slt">'. esc_attr($duration).'</span>';
						}
					}
					;?>

					<span class="blog-meta-comments"><?php comments_popup_link( '' . wp_kses( __( '0 Comments', 'gumbo-secondline' ), true ) . '', wp_kses( __( '1 Comment', 'gumbo-secondline' ), true), wp_kses( __( '% Comments', 'gumbo-secondline' ), true ) ); ?></span>

				</div>
			<?php endif; ?>


			<div class="secondline-themes-blog-excerpt">
				<?php if ( ! empty( $settings['secondline_elements_single_post_excerpt'] ) ) : ?>
					<div class="slt-addon-excerpt">
						<?php if(has_excerpt() ): ?><?php the_excerpt(); ?><?php else: ?><p><?php echo secondline_addons_excerpt($settings['slt_excerpt_length'] ); ?></p><?php endif; ?>
					</div>
				<?php endif; ?>
				<a class="more-link" href="<?php the_permalink();?>"><i class="fa <?php echo esc_attr($settings['slt_read_more_icon_single']);?>" aria-hidden="true"></i> <?php echo esc_attr($settings['slt_read_more_txt']);?></a>
			</div>


			<div class="single-player-container-secondline">			
				<?php get_template_part( 'template-parts/audio-components/audio', 'logic'); ?>
			</div>



		</div><!-- close .secondline-blog-content -->


	<div class="clearfix-slt"></div>
	</div><!-- close .secondline-themes-default-blog-index -->
</div><!-- #post-## -->
