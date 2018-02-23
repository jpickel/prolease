<!DOCTYPE html>

<!--[if lt IE 7 ]> <html class="ie ie6 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->
<!-- the "no-js" class is for Modernizr. --><head id="<?php echo get_option('home'); ?>" profile="http://gmpg.org/xfn/11">

	<meta charset="<?php bloginfo('charset'); ?>">
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<!-- Meta Data -->
	<?php if ( is_home() ) { ?>
		<!-- Home Page -->
	    <title><?php if(get_field('seo_title_tag' )) { echo get_field('seo_title_tag' ); } else { bloginfo('name'); } ?></title>
	    <meta name="description" content="<?php if(get_field('seo_description')) { echo get_field('seo_description'); } else { bloginfo('description'); } ?>">
	    <meta name="keywords" content="<?php the_field('seo_keywords'); ?>">
	<?php } else if ( is_archive() ) { ?>
		<!-- Blog Archive Page -->
	    <title><?php if(get_field('seo_title_tag' )) { echo get_field('seo_title_tag' ); } else { bloginfo('name'); } ?> | <?php single_cat_title() ?></title>
	    <meta name="description" content="<?php if(get_field('seo_description')) { echo get_field('seo_description'); } else { bloginfo('description'); } ?>">
	    <meta name="keywords" content="<?php single_cat_title() ?>, <?php bloginfo('name'); ?>">
	<?php } else if ( is_single() ) { ?>
		<!-- Blog Posts -->
	    <title><?php if(get_field('seo_title_tag')) { echo get_field('seo_title_tag'); } else { the_title(); } ?></title>
	    <meta name="description" content="<?php if(get_field('seo_description')) { echo get_field('seo_description'); } else { setup_postdata( $post ); $excerpt = get_the_excerpt(); 
	    // echo get_the_excerpt(); 
	    } ?>">
	    <meta name="keywords" content="<?php if(get_field('seo_keywords')) { echo get_field('seo_keywords'); } else { $posttags = get_the_tags(); if ($posttags) { foreach($posttags as $tag) { echo $tag->name . ', '; } }; } ?>">
	<?php } else { ?>
		<!-- All Other Items -- Uses SEO Content in CMS -->
	    <title><?php if(get_field('seo_title_tag' )) { echo get_field('seo_title_tag' ); } else { bloginfo('name'); } ?></title>
	    <meta name="description" content="<?php if(get_field('seo_description')) { echo get_field('seo_description'); } else { bloginfo('description'); } ?>">
	    <meta name="keywords" content="<?php the_field('seo_keywords'); ?>">
	<?php } ?>
    
    <!-- iPhone & iPad Viewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	
	<!-- Main Style Sheets -->
    <link href="<?php bloginfo('template_directory'); ?>/style.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    	
    <!-- Framework JavaScript -->
    
    <!-- Facebook -->
    <meta property="og:image" content="<?php the_post_thumbnail_url(); ?>" />
        
	<?php wp_head(); ?>
	
	<!-- WP Admin Bar Relocated to Bottom -->
	<style><!-- 
		html {
			margin-top:  0px !important;
		}
		.recaptcha-wrap label {
		    display: none !important;
		}
	--></style>
	
	<!-- Multiview Page Tracking -->
	<script src="//assets.adobedtm.com/c876840ac68fc41c08a580a3fb1869c51ca83380/satelliteLib-471e522de44fdc14606a3d077ac3063350d2ac04.js"></script>
    
</head>