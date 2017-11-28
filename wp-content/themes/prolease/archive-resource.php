<?php include (TEMPLATEPATH . '/meta.php' ); ?>
<?php include (TEMPLATEPATH . '/google.php' ); ?>
</head>

<?php get_header(); ?> 

<section class="resource-archive-section">
	<div class="container">
		<div class="col-md-12">
			<h2><strong>Resources</strong></h2>
		</div>
		<?php if (have_posts()) : ?>
					<?php while (have_posts()) : the_post(); ?>
						<?php 
							$resource_type = get_field("resource_type");
							$resource_logo_color = "dark";
							$resource_file = get_field("resource_file");
						 ?>
						 <div class="resource col-md-12 flex">
							<a class="resource__link flex" href="<?php echo add_query_arg( 'rsrc', $post->ID, get_permalink(774) ); ?>">
								<img class="resource__logo" src="<?php echo get_theme_mod( 'themesimages_' . $resource_logo_color . '_' . $resource_type ); ?>" alt="">
								<img class="resource__logo-hover" src="<?php echo get_theme_mod( 'themesimages_red_' . $resource_type ); ?>" alt="">
								<div class="resource__content">
									<div class="resource__type color--medium-grey"><?php echo $resource_type; ?>:</div>
									<h4 class="resource__title color--midnight-grey"><?php the_title(); ?></h4>
								</div>
							</a>
						</div>
					<?php endwhile; ?>
		<?php endif; ?>
	</div>
</section>


<?php get_footer(); ?>