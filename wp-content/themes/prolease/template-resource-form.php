<?php
/**
 * Template Name: Resource Form
 */
?>
<?php include (TEMPLATEPATH . '/meta.php' ); ?>
<?php include (TEMPLATEPATH . '/google.php' ); ?>
</head>

<?php get_header(); ?> 
<?php 
	$resource_id = get_query_var( 'rsrc', false );
	if ($resource_id) {
		$post = get_post($resource_id);
		setup_postdata( $post );
	}
	$resource_logo_color = "dark";
	$resource_type = get_field("resource_type");
	$resource_file = get_field("resource_file");
	
 ?>
<section class="resource-form-section">
	<div class="container">
		<div class="col-md-8">
			<h2 class="color--red resource-title"><strong><?php the_title(); ?></strong></h2>
			<p class="form-paragraph">To receive the <?php the_title(); ?> <?php echo $resource_type; ?>, please fill in the following fields and hit submit.</p>
		</div>
	</div>
</section>

<div class="container">
	<div class="col-md-12">
		<div class="file-wrap">
			<div class="resource col-md-4 col-sm-6 flex">
				<img class="resource__logo" src="<?php echo get_theme_mod( 'themesimages_' . $resource_logo_color . '_' . $resource_type ); ?>" alt="">
				<img class="resource__logo-hover" src="<?php echo get_theme_mod( 'themesimages_red_' . $resource_type ); ?>" alt="">
				<div class="resource__content">
					<div class="resource__type color--black"><?php echo $resource_type; ?>:</div>
					<a class="resource__link file-download" href="<?php echo $resource_file['url']; ?>" data-resource-download="download" download>
						<h4 class="resource__title color--black"><?php the_title(); ?></h4>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php wp_reset_postdata(); ?>

<?php include (TEMPLATEPATH . '/includes/sections.php' ); ?>
<section class="resource-section hid">
	<div class="container">
		<?php
			$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
		    $counter = 1;
		    $category = get_query_var( 'category_name' );
		    $args = array( 
		        'post_type' => 'resource', 
		        'posts_per_page' => 3,
		        'post__not_in' => array($resource_id),
		    ); 
			
		
		    $loop = new WP_Query($args);
		?>
		<?php if ( $loop->have_posts() ) : ?>
		<div class="col-md-12">
			<h2>Other resources you might like:</h2>
		</div>
			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<?php 
					$resource_logo_color = "dark";
					$resource_type = get_field("resource_type");
					$resource_file = get_field("resource_file");
				 ?>
				<div class="resource col-md-4 col-sm-6 flex">
					<img class="resource__logo" src="<?php echo get_theme_mod( 'themesimages_' . $resource_logo_color . '_' . $resource_type ); ?>" alt="">
					<img class="resource__logo-hover" src="<?php echo get_theme_mod( 'themesimages_red_' . $resource_type ); ?>" alt="">
					<div class="resource__content">
						<div class="resource__type color--black"><?php echo $resource_type; ?>:</div>
						<a class="resource__link" href="<?php echo $resource_file['url']; ?>" data-resource-download="download" download>
							<h4 class="resource__title color--black"><?php the_title(); ?></h4>
						</a>
					</div>
				</div>
			<?php endwhile; ?>
		<?php endif; wp_reset_postdata(); ?>
	</div>
</section>
	



<?php get_footer(); ?>

<?php include (TEMPLATEPATH . '/meta-footer.php' ); ?>
