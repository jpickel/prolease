<body class="secondary default">

	<?php include (TEMPLATEPATH . '/header.php' ); ?>
	<?php 
		$full_bleed_image = get_field("full_bleed_image");
	 ?>

	<?php if ($full_bleed_image != false ) { ?>
		<div class="background--img-bleed full-bleed-image" style="background-image: url(<?php echo get_field("full_bleed_image"); ?>)"></div>
	<?php } ?>

	<?php include (TEMPLATEPATH . '/includes/sections.php' ); ?>

	<?php get_footer(); ?>
	
	<?php include (TEMPLATEPATH . '/meta-footer.php' ); ?>

</body>