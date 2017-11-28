<body class="secondary blog">
	<?php include (TEMPLATEPATH . '/header.php' ); ?>
	<?php 
		$full_bleed_image = get_field("full_bleed_image");
		$intro_section = get_field("intro_section");
	 ?>

	<?php if ($full_bleed_image != false ) { ?>
		<div class="background--img-bleed full-bleed-image" style="background-image: url(<?php echo get_field("full_bleed_image"); ?>)"></div>
	<?php } ?>
		<section class="intro-section">
			<div class="container">
				<div class="col-md-12">
					<?php if (!empty($intro_section)) { ?>
						<?php echo $intro_section; ?>
					<?php } ?>
				</div>
			</div>
		</section>

	<?php include (TEMPLATEPATH . '/loops/blog_loop.php' ); ?>
	<div class="clearfix"></div>
	<?php include (TEMPLATEPATH . '/includes/sections.php' ); ?>

	<?php get_footer(); ?>
	
	<?php include (TEMPLATEPATH . '/meta-footer.php' ); ?>

</body>

