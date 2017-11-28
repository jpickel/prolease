<body class="home">

	<?php include (TEMPLATEPATH . '/header.php' ); ?>
	<div class="clearfix"></div>
	<?php if (get_field("full_bleed_image")) { ?>
		<div class="background--img-bleed full-bleed-image--home" style="background-image: url(<?php echo get_field("full_bleed_image"); ?>)"></div>
	<?php } ?>

	<?php include (TEMPLATEPATH . '/includes/sections.php' ); ?>

	<?php get_footer(); ?>
	
	<?php include (TEMPLATEPATH . '/meta-footer.php' ); ?>

</body>