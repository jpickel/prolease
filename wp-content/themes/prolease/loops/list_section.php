<section class="list-section">
	<?php 
		$if_background_image = get_sub_field("if_background_image");
		$background_image = get_sub_field("background_image");
		$list_column_width = get_sub_field("list_column_width");
		$list_column_position = get_sub_field("list_column_position");
		$list_banner_heading = get_sub_field("list_banner_heading");
		$list_column_count = get_sub_field("list_column_count");
		$list_wysiwyg = get_sub_field("list_wysiwyg");
	?>
	<?php if($if_background_image) { ?>
		<div class="background--img-top list-section__bg" style="background-image: url(<?php echo $background_image; ?>)">
	<?php } ?>

		<div class="container">
			<div class="col-md-<?php echo $list_column_width; ?> <?php echo $list_column_position; ?>">
				<div class="list-section__wrap">
					<div class="list-section__heading-wrap">
						<h3 class="color--white list-section__heading"><?php echo $list_banner_heading; ?></h3>
					</div>
					<div class="list-section__wiz col-count--<?php echo $list_column_count; ?>">
						<?php if(!empty($list_wysiwyg)) { echo $list_wysiwyg; } ?>
					</div>
				</div>
			</div>
		</div>

	<?php if($if_background_image) { ?>
		</div>
	<?php } ?>
</section>