<?php
	$background_color = get_sub_field("blocks_background_color");
	$number = count( get_sub_field( 'blocks' ) );
	$column = 12 / $number;
?>
<section class="block-section background--<?php echo $background_color; ?>">
	<div class="container">
		<?php if( have_rows('blocks') ): ?>
			<div class="blocks">
			   <?php  while ( have_rows('blocks') ) : the_row(); ?>
			   		<?php 
			   			$block_content = get_sub_field("block_content");
			   		 ?>
						<div class="block col-md-<?php echo $column; ?> col-sm-6">
							<div class="block__content">
								<?php echo $block_content; ?>
							</div>
						</div>
			   <?php endwhile; ?>
			</div>
		<?php else : ?>
		
		    <!-- no rows found -->
		
		<?php endif; ?>
	</div>
</section>