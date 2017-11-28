<?php
	$include_filter_options = get_sub_field("include_filter_options");
	$include_link_to_customers_page = get_sub_field("include_link_to_customers_page");
	$client_heading = get_sub_field("client_heading");
?>
<section class="client-section">

		<div class="container">
			<?php if ($include_filter_options) { ?>
				<?php $terms = get_terms('client_category'); ?>
				<?php $active = true; ?>
				<?php if( have_rows('category_order') ) { ?>
					 <div class="col-md-12">
					 	<p class="color--red text-center">Choose a category to filter clients</p>
					 </div>
					 <nav class="col-md-12 filter-nav flex">
				 		<ul class="filter-list">
	    					<?php  while ( have_rows('category_order') ) { the_row(); ?>
								<?php 
					    			$category = get_sub_field('category');
					    		?>
								<li class="filter-button <?php echo ($active ? 'active' : ''); ?>" data-filter="<?php echo '.' . $category->slug; ?>" data-client-category="<?php echo $category->name; ?>"><?php echo $category->name; ?></li>
								<?php $active = false; ?>
							<?php } ?>
				 		</ul>
				 		<script>
				 			$(".filter-button").click(function(){
				 				$(".filter-button").removeClass("active");
				 				$(this).toggleClass("active");
				 			});
				 		</script>
					 </nav>
					 <div class="clearfix"></div>
				<?php } ?>
			<?php } ?>

			<?php if ($client_heading != ''): ?>
				<h4 class="client__heading text-center color--medium-grey"><?php echo $client_heading; ?></h4>
			<?php endif; ?>
		 <div class="grid">
			<div class="clients row">
				<?php if( have_rows('category_order') ) { ?>
					<?php  while ( have_rows('category_order') ) { the_row(); ?>
						<?php if( have_rows('category_clients') ) { ?>
							<?php  while ( have_rows('category_clients') ) { the_row(); ?>
						   		<?php 
						   			$client_object = get_sub_field("category_client");
						   			if( $client_object ) {
										$post = $client_object;
										setup_postdata( $post );
										$client_logo = get_field("client_logo");
										$client_terms = get_the_terms($post->ID, 'client_category');
						   		?>
						   			<div class="grid-item<?php foreach ($client_terms as $client_term) { echo " " . $client_term->slug; } ?>"><div class="client__logo" style="background-image: url(<?php echo $client_logo['url']; ?>)"></div></div>
				    				<?php wp_reset_postdata(); ?>
								<?php } ?>
						    <?php } ?>
					    <?php } ?>
				    <?php } ?>
			    <?php } ?>
			</div>
		</div>
		<?php if ($include_link_to_customers_page): ?>
			<div class="col-md-12">
				<div class="text-center">
					<a class="page-link" href="<?php echo get_site_url() . '/customers-solutions-for'; ?>">See More Customers</a>
				</div>
			</div>
		<?php endif; ?>

</section>