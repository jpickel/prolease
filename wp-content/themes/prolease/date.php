<?php include (TEMPLATEPATH . '/meta.php' ); ?>
<?php include (TEMPLATEPATH . '/google.php' ); ?>
</head>
 <?php get_header(); ?>
<?php 
	$year     = get_query_var('year');
	$monthnum = get_query_var('monthnum');
 ?>
 <section class="blog-section">
	<div class="container">
		<?php
		    $image_counter = 0;
		    $args = array(
				'date_query' => array(
					array(
						'year'  => $year,
						'month' => $monthnum,
					),
				),
		    	'post_type' => 'post', 
		        'posts_per_page' => 10,
		        'paged' => $paged
			);
		    $loop = new WP_Query($args);
		?>
		
		<?php if ( $loop->have_posts() ) : ?>
		
		<div class="col-md-12">
			<?php include (TEMPLATEPATH . '/includes/blog-dropdowns.php' ); ?>
			<?php $counter = 1; ?>
			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
			
				<?php 
					$link = get_post_permalink($loop->ID);
					$post_author = get_field("post_author");
					$date_month = get_the_date('M', $loop->ID);
					$date_day = get_the_date('d', $loop->ID);
				?>
			
				<div class="col-md-12 blog-post" id="blog-post-<?php echo $counter; ?>">
					<div class="blog-post__content">
						<div class="blog-post__date pull-right">
							<span class="date__month"><?php echo $date_month; ?></span>
							<span class="date__day"><?php echo $date_day; ?></span>
						</div>
						<div class="col-md-8">
							<h2 class="blog-post__title"><strong><a href="<?php the_permalink(); ?>" class="blog-post__link"><?php the_title(); ?></a></strong></h2>
						</div>
						<div class="col-md-10">
							<p class="blog-post__author color--dark-grey">Author: <?php echo $post_author; ?></p>
							<p class="color--medium-grey"><?php echo wp_strip_all_tags( get_the_excerpt()); ?></p>
							<span><a href="<?php the_permalink(); ?>">Read More ></a></span>
						</div>
					</div>
				</div>
				<?php $counter++; ?>
			<?php endwhile;  wp_reset_postdata(); ?>
					
			<?php endif; wp_reset_query(); ?>
		</div>
	</div>
</section>

<?php get_footer(); ?>
<?php include (TEMPLATEPATH . '/meta-footer.php' ); ?>
