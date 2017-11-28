<?php include (TEMPLATEPATH . '/meta.php' ); ?>
<?php include (TEMPLATEPATH . '/google.php' ); ?>
</head>

<?php get_header(); ?> 

<section class="single-post-section">
	<div class="container">
		<div class="col-md-8">
			<?php include (TEMPLATEPATH . '/includes/blog-dropdowns.php' ); ?>
			<h1 class="color--red"><strong><?php the_title(); ?></strong></h1>
			<h2 class="color-midnight-grey"><strong><?php the_field('post_author'); ?></strong></h2>
			<?php the_content(); ?>
		</div>
	</div>
</section>


<?php get_footer(); ?>
<?php include (TEMPLATEPATH . '/meta-footer.php' ); ?>