<?php 
	$team_heading = get_sub_field("team_heading");
 ?>
<section class="team-section">
	<div class="container">
		<?php if ($team_heading != false) { ?>
			<div class="col-md-12"><h2 class="team-heading color--red"><?php echo $team_heading; ?></h2></div>
		<?php } ?>
		<?php if( have_rows('team_members') ): ?>
			<div class="clearfix"></div>
			<div class="team row-eq-height">
				   <?php  while ( have_rows('team_members') ) : the_row(); ?>
				   		<?php 
				   			$team_member_object = get_sub_field("team_member");
				   			if( $team_member_object ) {
								$post = $team_member_object;
								setup_postdata( $post );
								$team_member_name = get_field("team_member_name");
								$team_member_title = get_field("team_member_title");
								$team_member_bio = get_field("team_member_bio");
								$team_member_image = get_field("team_member_image");
				   		?>
							<div class="col-sm-6 col-md-3 team__wrap">
									<div class="tm__offset-square"></div>
                        			<div class="tm__image-wrap">
									<a class="tm__modal-link" data-toggle="modal" data-target="#<?php echo sanitize_title(strtolower($team_member_name)); ?>" data-bio-modal="<?php echo $team_member_name; ?>" data-event="bioModal" title="View <?php echo $team_member_name; ?> Bio">
										<div class="tm__image" style="background-image: url(<?php echo $team_member_image['url']; ?>)"></div>
									</a>
									</div>
									<h2 class="tm__name color--red text-center"><?php echo $team_member_name; ?></h2>
									<p class="tm__title color--black text-center"><?php echo $team_member_title; ?></p>
								<div class="clearfix"></div>
							</div>
							<script>
							$(".tm__image").hover(function () {
								    $(this).parent().parent().siblings('.tm__offset-square').addClass('hover'); 
								    $(this).parent().parent().addClass('hover');
								}, 
								function () {
								    $(this).parent().parent().siblings('.tm__offset-square').removeClass('hover');
								    $(this).parent().parent().removeClass('hover');
							});
							</script>
							<div class="modal fade" data-backdrop="true" id="<?php echo sanitize_title(strtolower($team_member_name)); ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo sanitize_title(strtolower($team_member_name)); ?>">
	                          <div class="modal-dialog modal-dialog-cont" role="document">
	                            <div class="modal-content modal-content-cont">

	                              <div class="modal-close">
	                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="close__span" aria-hidden="true">&times;</span></button>
	                              </div>
	                              <div class="modal-body">
	                                <div class="row">
	                                	<div class="col-md-4">
	                                		<div class="tm__offset-square"></div>
                                			<div class="tm__image-wrap">
												<div class="tm__image" style="background-image: url(<?php echo $team_member_image['url']; ?>)"></div>
                                			</div>
	                                	</div>
	                                	<div class="col-md-8">
	                                        <h2 class="tm__name color--red no-margin--top"><?php echo $team_member_name; ?></h2>
	                                        <p class="tm__title color--black"><?php echo $team_member_title; ?></p>
	                                        <p class="tm__bio"><?php echo $team_member_bio; ?></p>
	                                    </div>
	                                </div>
	                              </div>
	                            </div>
	                          </div>
                        	</div>
		    				<?php wp_reset_postdata(); ?>
						<?php } ?>
				   <?php endwhile; ?>
			<?php else : ?>
			
			    <!-- no rows found -->
			
			</div>
		<?php endif; ?>
	</div>
</section>