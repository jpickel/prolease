<?php
	$module_background = get_sub_field("module_background");
	if($module_background == "color") {
		$section_background = get_sub_field("module_background_color");
	} elseif($module_background == "image") {
		$section_background = get_sub_field("module_background_image");
	} else {
		$section_background = "";
	}
	$background_image = get_sub_field("module_background_image");
	$background_color = get_sub_field("module_background_color");
	$if_banner_heading = get_sub_field("if_module_banner_heading");
	$banner_color = get_sub_field("module_banner_color");
	$module_intro_text = get_sub_field("module_intro_text");
	$module_title_color = get_sub_field("module_title_color");
?>
<section class="module-section" style="<?php if($module_background == 'color') { echo 'background: ' . $background_color; } elseif($module_background == 'image') { echo 'background-image: url(' . $background_image . ')'; } ?>">
	<div class="container">
		<div class="col-md-8">
			<?php echo $module_intro_text; ?>
		</div>
		<div class="clearfix"></div>
		<?php if( have_rows('modules') ): ?>
			<div class="modules flex">
			   <?php  while ( have_rows('modules') ) : the_row(); ?>
			   		<?php 
			   			$module_title = get_sub_field("module_title");
			   			$module_description = get_sub_field("module_description");
			   			$module_page_link = get_sub_field("module_page_link");
			   			$module_logo = get_sub_field("module_logo");
			   			$module_hover_logo = get_sub_field("module_hover_logo");
			   		 ?>
					<div class="module col-md-4 col-sm-6">
				   		<?php if (!empty($module_page_link)) { ?>
							<a href="<?php echo $module_page_link; ?>" class="module-page-link" data-module-click="<?php echo $module_title; ?>">
				   		<?php } ?>
						<div class="col-sm-3">
							<img class="module-logo" src="<?php echo $module_logo['url']; ?>" alt="">
							<img class="module-logo-hover" src="<?php echo $module_hover_logo['url']; ?>" alt="">
							<div class="clearfix"></div>
						</div>
						<div class="col-sm-9 module-description">
							<h3 class="module-title color--<?php echo $module_title_color; ?>"><?php echo $module_title; ?></h3>
							<?php echo $module_description; ?>
						</div>
						<?php if (!empty($module_page_link)) { echo '</a>'; } ?>
					</div>
			   <?php endwhile; ?>
			</div>
		<?php else : ?>
		
		    <!-- no rows found -->
		
		<?php endif; ?>
	</div>
</section>