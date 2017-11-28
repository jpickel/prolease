<?php if( have_rows('section') ): ?>

    <?php while ( have_rows('section') ) : the_row(); ?>

        <?php if( get_row_layout() == 'primary_section' ): ?>

            <?php include (TEMPLATEPATH . '/loops/primary_section.php' );  ?>
        
        <?php elseif( get_row_layout() == 'list_section' ): ?>

        	<?php include (TEMPLATEPATH . '/loops/list_section.php' );  ?>

        <?php elseif( get_row_layout() == 'module_section' ): ?>

        	<?php include (TEMPLATEPATH . '/loops/module_section.php' );  ?>

        <?php elseif( get_row_layout() == 'resource_section' ): ?>

            <?php include (TEMPLATEPATH . '/loops/resource_section.php' );  ?>

        <?php elseif( get_row_layout() == 'block_section' ): ?>

            <?php include (TEMPLATEPATH . '/loops/block_section.php' );  ?>

        <?php elseif( get_row_layout() == 'client_section' ): ?>

            <?php include (TEMPLATEPATH . '/loops/client_section.php' );  ?>

        <?php elseif( get_row_layout() == 'team_section' ): ?>

            <?php include (TEMPLATEPATH . '/loops/team_section.php' );  ?>

        <?php elseif( get_row_layout() == 'form_section' ): ?>

        	<?php include (TEMPLATEPATH . '/loops/form_section.php' );  ?>

        <?php endif; ?>

    <?php endwhile; ?>

<?php else : ?>

    <!-- no layouts found -->

<?php endif; ?>