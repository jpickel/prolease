<?php
	$background_color = get_sub_field("resource_background_color");
	$resource_logo_color = get_sub_field("resource_logo_color");
	$heading_text = get_sub_field("heading_text");
	$if_center_resources = get_sub_field("if_center_resources");
	$add_resource_pattern = get_sub_field("add_resource_pattern");
	$resource_title_text_color = get_sub_field("resource_title_text_color");
	$resource_type_text_color = get_sub_field("resource_type_text_color");
	$include_view_all_resources_link = get_sub_field("include_view_all_resources_link");
	$resource_count = count(get_sub_field("resource_repeater"));
	$resource_width = 12/$resource_count;
?>
<section class="resource-section background--<?php echo $background_color; ?>">
	<div class="container">
		<?php if (!empty($heading_text)) { ?>
			<?php echo $heading_text; ?>
		<?php } ?>
		<?php if( have_rows('resource_repeater') ): ?>
			<div class="resources flex" <?php echo ($if_center_resources ? "style= 'justify-content: center;'" : ""); ?>>
			   <?php  while ( have_rows('resource_repeater') ) : the_row(); ?>
			   		<?php 
			   			$resource_object = get_sub_field("resource");
			   			if( $resource_object ) {
							$post = $resource_object;
							setup_postdata( $post );
							$resource_type = get_field("resource_type");
							$resource_file = get_field("resource_file");
							$url_title = sanitize_title( get_the_title() );
			   		 ?>
						<div class="resource col-md-<?php echo $resource_width; ?> col-sm-6 flex">
							<img class="resource__logo" src="<?php echo get_theme_mod( 'themesimages_' . $resource_logo_color . '_' . $resource_type ); ?>" alt="">
							<img class="resource__logo-hover" src="<?php echo get_theme_mod( 'themesimages_red_' . $resource_type ); ?>" alt="">
							<div class="resource__content">
								<div class="resource__type color--<?php echo $resource_type_text_color; ?>"><?php echo $resource_type; ?>:</div>
								<a class="resource__link" href="<?php echo add_query_arg( 'rsrc', $post->ID, get_permalink(774) ); ?>&<?php echo $url_title; ?>" data-resource-download="click">
									<h4 class="resource__title color--<?php echo $resource_title_text_color; ?>"><?php the_title(); ?></h4>
								</a>
							</div>
						</div>
						<?php if ($add_resource_pattern) { ?>
							<img class="resource-wrap__pattern hidden-xs" src="<?php echo get_template_directory_uri() . "/images/resource-pattern.png"; ?>" alt="">
						<?php } ?>
	    				<?php wp_reset_postdata(); ?>
					<?php } ?>
			   <?php endwhile; ?>
			</div>
		<?php else : ?>
		
		    <!-- no rows found -->
		
		<?php endif; ?>
		<?php if ($include_view_all_resources_link) { ?>
			<div class="text-center">
				<a href="<?php echo get_post_type_archive_link( 'resource' ); ?>" class="page-link">View All Resources</a>
			</div>
		<?php } ?>
	</div>
</section>