<nav class="collapse toolbar-nav background--midnight-grey <?php if (get_field('include_toolbar')) { echo "module-page"; } ?>" id="collapseToolbar">
	<div class="container">
		<ul class="toolbar-nav__list flex">
			<?php wp_nav_menu( array( 
		        'theme_location' => 'toolbar',
		        'container'        => '',
		        'items_wrap'        => '%3$s',
		    ) ); ?>
		    <li class="lease-accounting-item <?php if (is_page('lease-accounting')) { echo 'current-menu-item';} ?>">
		    	<a href="<?php echo site_url() . '/lease-accounting'; ?>">
		    		<p class="menu-image-title lease-accounting-item__title">Lease Accounting</p>
		    		<p class="lease-accounting-text">Learn how ProLease can help</p>
		    		<p class="lease-accounting-text">keep you FASB/IASB compliant.</p>
		    	</a>
		    </li>
		</ul>
	</div>
</nav>
