<?php 
	$if_background_image = get_sub_field("if_background_image");
	$if_quote_box = get_sub_field("if_quote_box");
	$background_image = get_sub_field("background_image");
	$background_color = get_sub_field("background_color");
	$background_image_height = get_sub_field("background_image_height");
?>
<section class="primary-section background--<?php echo $background_color; ?>">
	<?php if($if_background_image) { ?>
		<div class="background--img-top" style="background-image: url(<?php echo $background_image; ?>);<?php echo ($background_image_height != '' ? ' height: ' . $background_image_height . 'px;' : ''); ?>">
	<?php } ?>

	<?php if( have_rows('add_column') ): ?>
		<?php if (!$if_quote_box) { ?>
			<div class="container">
		<?php } ?>
		
	   <?php  while ( have_rows('add_column') ) : the_row(); ?>

			<?php
				$if_background_image = get_sub_field("if_column_background_image");
				$background_image = get_sub_field("column_background_image");
				$primary_column_width = get_sub_field("primary_column_width");
				$column_width_diff = 12 - $primary_column_width;
				$primary_align_right = get_sub_field("primary_align_right");
				$primary_content_type = get_sub_field("primary_content_type");
				$primary_wysiwyg = get_sub_field("primary_wysiwyg");
				$primary_image = get_sub_field("primary_image");
				$primary_background_color = get_sub_field("primary_background_color");
				$primary_image_style = get_sub_field("primary_image_style");
				$primary_cta_border_color = get_sub_field("primary_cta_border_color");
				$primary_cta_button_color = get_sub_field("primary_cta_button_color");
				$primary_cta_button_text_color = get_sub_field("primary_cta_button_text_color");
				$primary_cta_link = get_sub_field("primary_cta_link");
				$primary_cta_link_text = get_sub_field("primary_cta_link_text");
				$primary_cta_image = get_sub_field("primary_cta_image");
				$image_size = get_sub_field("image_size");
			 ?>
			
			
				<?php if($primary_content_type == "wysiwyg") { ?>
				<!-- WYSIWYG Column -->
					<div class="col-sm-12 col-sm-offset-0 col-md-<?php echo $primary_column_width; ?><?php echo ($primary_align_right ? ' col-md-offset-' . $column_width_diff : ''); ?> primary-wiz">
						<?php if(!empty($primary_wysiwyg)) { echo $primary_wysiwyg; } ?>
					</div>

				<?php } elseif($primary_content_type == "quote") { ?>
				<!-- Quote Column -->
					
					<!-- <div class="quote-wiz__bg"> -->
						<div class="col-md-<?php echo $primary_column_width; ?> quote-wiz">
							<?php if(!empty($primary_wysiwyg)) { echo $primary_wysiwyg; } ?>
							<div class="clearfix"></div>
						</div>
					<!-- </div> -->

				<?php } elseif($primary_content_type == "image") { ?>
				<!-- Image Column -->

					<?php if ($primary_image_style == "bleed") { ?>
						<div class="col-md-<?php echo $primary_column_width; ?> img-col">
						<div class="primary-image--bleed" style="background-image: url(<?php echo $primary_image['url']; ?>); height: <?php echo $image_size; ?>px; width: <?php echo $image_size; ?>px"></div>
						</div>
					<?php } elseif ($primary_image_style == "hidden") { ?>
						<div class="col-md-<?php echo $primary_column_width; ?>">
							<div class="primary-image--hidden" style="background-image: url(<?php echo $primary_image['url']; ?>)"></div>
						</div>
					<?php } ?>
				
				<?php } elseif($primary_content_type == "case_study") { ?>
					<!-- Case Study Column -->
					<div class="col-md-<?php echo $primary_column_width; ?> primary-case-study">

						<?php if( have_rows('primary_case_studies') ): ?>
							<div class="case-study-wrap">
								<?php  while ( have_rows('primary_case_studies') ) : the_row(); ?>
									<?php 
							   			$case_study_object = get_sub_field("case_study");
							   			if( $case_study_object ) {
											$post = $case_study_object;
											setup_postdata( $post );
											$case_study_year = get_field("case_study_year");
							   		 	?>
						   		 		<div class="case-study">
						   		 			<a href="<?php the_permalink(); ?>" class="case-study__link">
							   		 			<p class="color--red case-study__title"><strong><?php the_title(); ?></strong></p>
							   		 			<span class="color--medium-grey"><?php echo $case_study_year; ?> Case Study</span>
					   		 				</a>
						   		 		</div>
							   		 	<?php } ?>
						   		 <?php wp_reset_postdata(); ?>
								<?php endwhile; ?>
							</div>
						<?php endif; ?>
					</div>
				<?php } elseif($primary_content_type == "cta") { ?>
				<!-- CTA Column -->
					<div class="col-sm-12 col-md-<?php echo $primary_column_width; ?> primary-wiz">
						<div class="cta-box--<?php echo $primary_cta_border_color; ?>">
							<?php if(!empty($primary_wysiwyg)) { echo $primary_wysiwyg; } ?>
							<div class="text-center">
								<a class="btn btn-main--<?php echo $primary_cta_button_color; ?>" href="<?php echo $primary_cta_link; ?>" data-schedule-demo="scheduleDemo"><span class="btn-main__text--<?php echo $primary_cta_button_text_color; ?>"><?php echo $primary_cta_link_text; ?></span></a>
							</div>
						</div>
						<?php if (!empty($primary_cta_image)) { ?>
							<div class="cta-image-wrap">
								<img class="cta-image" src="<?php echo $primary_cta_image['url']; ?>" alt="">
							</div>
						<?php } ?>
					</div>
				
				<?php } elseif($primary_content_type == "empty") { ?>
				<!-- Empty Column -->
				
				<?php } ?>
			
	    <?php endwhile; ?>

		<?php if (!$if_quote_box) { ?>
			</div>
		<?php } ?>
	<?php else : ?>

	    <!-- no rows found -->

	<?php endif; ?>

	<?php if($if_background_image) { ?>
		</div>
	<?php } ?>
</section>