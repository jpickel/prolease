<?php 
	$ninja_form_id = get_sub_field("ninja_form_id");
	$form_column_width = get_sub_field("form_column_width");
	$include_contact_info = get_sub_field("include_contact_info");
	$form_image = get_sub_field("form_image");
	$contact_column_width = 11 - $form_column_width; // leaving 1 column for offset.
 ?>
<section class="form-section">
	<div class="container">
		<div class="col-md-<?php echo $form_column_width; ?>">
			<div class="form xl-margin--bottom">
				<?php ninja_forms()->display($ninja_form_id); ?>
			</div>
		</div>
		<?php if ($include_contact_info) { ?>
		
		    <div class="hidden-md hidden-lg">
		    	<div class="clearfix"></div>
		    </div>
			<div class="col-md-<?php echo $contact_column_width; ?> col-md-offset-1">
				<ul class="contact-list no-padding--left">
					<li class="contact-list__item">
						<div class="contact-list__img-wrap col-xs-4 col-md-5">
							<img src="<?php echo get_template_directory_uri(); ?>/images/phone-icon.png" alt="" class="contact-list__img">
						</div>
						<ul class="col-xs-8 col-md-7">
							<li class="contact-list__title">Call Us</li>
							<li class="contact-list__value"><?php echo get_theme_mod( 'phone_number' ); ?></li>
						</ul>
						<div class="clearfix"></div>
					</li>
					<li class="contact-list__item">
						<div class="contact-list__img-wrap col-xs-4 col-md-5">
							<img src="<?php echo get_template_directory_uri(); ?>/images/head-icon.png" alt="" class="contact-list__img">
						</div>
						<ul class="col-xs-8 col-md-7">
							<li class="contact-list__title">Headquarters</li>
							<li class="contact-list__value"><?php echo get_theme_mod( 'company_address' ); ?></li>
						</ul>
						<div class="clearfix"></div>
					</li>
					<li class="contact-list__item">
						<div class="contact-list__img-wrap col-xs-4 col-md-5">
							<img src="<?php echo get_template_directory_uri(); ?>/images/building-icon.png" alt="" class="contact-list__img">
						</div>
						<ul class="col-xs-8 col-md-7">
							<li class="contact-list__title">Additional Offices</li>
							<li class="contact-list__value"><?php echo get_theme_mod( 'other_offices' ); ?></li>
						</ul>
						<div class="clearfix"></div>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>

		<?php } ?>
	</div>
	<?php if (!empty($form_image)) { ?>
		<div><img src="<?php echo $form_image; ?>" alt="" class="form-image"></div>
	<?php } ?>
</section>