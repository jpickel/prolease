<?php 
	$event_heading = get_field("event_heading");
 ?>
<section class="blog-section">
	<div class="container">
		<?php
		    $image_counter = 0;
		    $args = array( 
		        'post_type' => 'post', 
		        'posts_per_page' => 3,
		        'paged' => $paged
		    ); 
		    $loop = new WP_Query($args);
		?>
		
		<?php if ( $loop->have_posts() ) : ?>
		
			<div class="col-md-7">
				<?php include (TEMPLATEPATH . '/includes/blog-dropdowns.php' ); ?>
				<?php $counter = 1; ?>
				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
				
					<?php 
						$link = get_post_permalink($loop->ID);
						$post_author = get_field("post_author");
						$date_month = get_the_date('M', $loop->ID);
						$date_day = get_the_date('d', $loop->ID);
					?>
					<?php if( $counter === 1) : ?>
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
									<p class="blog-post__author color--dark-grey">by <?php echo $post_author; ?></p>
									<p class="color--medium-grey"><?php echo wp_strip_all_tags( get_the_excerpt()); ?></p>
									<span><a href="<?php the_permalink(); ?>" class="page-link">Read More</a></span>
								</div>
							</div>
						</div>
						<?php $counter++; ?>
					<?php else : ?>
						<div class="col-md-12 blog-post" id="blog-post-<?php echo $counter; ?>">
							<div class="blog-post__content">
								<div class="blog-post__date pull-right">
									<span class="date__month"><?php echo $date_month; ?></span>
									<span class="date__day"><?php echo $date_day; ?></span>
								</div>
								<div class="col-md-8">
									<h3 class="blog-post__title"><strong><a href="<?php the_permalink(); ?>" class="blog-post__link"><?php the_title(); ?></a></strong></h3>
								</div>
								<div class="col-md-10">
									<p class="blog-post__author color--dark-grey">by <?php echo $post_author; ?></p>
								</div>
							</div>
						</div>
						<?php $counter++; ?>
					<?php endif; ?>
					
				<?php endwhile;  wp_reset_postdata(); ?>
				<div class="col-md-12 xl-margin--bottom">
					<a href="<?php echo get_permalink('747'); ?>" class="page-link">All Articles</a>
				</div>
				</div>
				<div class="col-md-5">
					<div class="row events">
						<?php if (!empty($event_heading)) { ?>
							<h4 class="event__heading"><?php echo $event_heading; ?></h4>
						<?php } ?>
						<?php if( have_rows('events') ): ?>
		   					<?php  while ( have_rows('events') ) : the_row(); ?>
		   						<?php 
		   							$event_date = get_sub_field("event_date");
		   							$event_date = new DateTime($event_date);
		   							$event_month = $event_date->format('M');
		   							$event_day = $event_date->format('d');
		   							$event_title = get_sub_field("event_title");
		   							$event_location = get_sub_field("event_location");
		   						 ?>
		   						<div class="event">
		   							<div class="event__date">
		   								<div class="event__month"><?php echo $event_month; ?></div>
		   								<div class="event__day"><?php echo $event_day; ?></div>
		   							</div>
		   							<div class="event__content">
		   								<h3 class="event__title"><?php echo $event_title; ?></h3>
		   								<p class="event__location"><?php echo $event_location; ?></p>
		   							</div>
		   						</div>
			   				<?php endwhile; ?>
			   			<?php endif; ?>
					</div>
				</div>
		
		<?php endif; wp_reset_query(); ?>
	</div>
</section>