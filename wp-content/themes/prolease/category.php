<?php include (TEMPLATEPATH . '/meta.php' ); ?>
<?php include (TEMPLATEPATH . '/google.php' ); ?>
</head>

<?php get_header(); ?> 

<section class="single-post-section">
	<div class="container">
		<?php include (TEMPLATEPATH . '/includes/blog-dropdowns.php' ); ?>
		<?php
			$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
		    $counter = 1;
		    $category = get_query_var( 'category_name' );
		    $args = array( 
		        'post_type' => 'post', 
		        'posts_per_page' => 5,
		        'paged' => $paged,
		        'category_name' => get_query_var('category_name'),
		    ); 
			

		    $loop = new WP_Query($args);
		?>
		<?php if ( $loop->have_posts() ) : ?>
			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
			<?php 
				$link = get_post_permalink($loop->ID);
				$post_author = get_field("post_author");
				$date_month = get_the_date('M', $loop->ID);
				$date_day = get_the_date('d', $loop->ID);
				$post_category = get_the_category($post->ID);
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
			
			<?php endwhile; ?>
				
			<?php if ($loop->max_num_pages > 1) { // check if the max number of pages is greater than 1  ?>
			<div class="clearfix"></div>
			  <div class="col-md-12 text-center">
			  	<nav class="prev-next-posts">
			  	  <div class="prev-posts-link">
			  	    <?php echo get_next_posts_link( '< Older Entries', $loop->max_num_pages ); // display older posts link ?>
			  	  </div>
			  	  <div class="next-posts-link">
			  	    <?php echo get_previous_posts_link( 'Newer Entries >' ); // display newer posts link ?>
			  	  </div>
			  	</nav>
			  </div>
			<?php } ?>
			
		<?php endif; wp_reset_query(); ?>
		
	</div>
</section>


<?php get_footer(); ?>
<?php include (TEMPLATEPATH . '/meta-footer.php' ); ?>