<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-ML7NBTP"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<header class="header">

    <div class="container">
        <div class="header__logo pull-left">
            <a class="header-logo-link" href="<?php echo site_url(); ?>"><img src="<?php echo get_theme_mod( 'themesimages_logo' ); ?>"></a>
        </div>
    </div>
    
    <div class="header__contact hidden-xs text-nowrap">
        <div class="nav navbar-nav schedule-wrap">
            <a href="<?php echo site_url() . '/schedule-a-demo'; ?>" class="schedule-demo"><span class="btn-main__text--white">Schedule a Demo</span></a>
        </div>
    </div>
    
</header>

<nav class="navbar navbar-default navbar-main">
    <div class="container">
    
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#primary-navigation" aria-expanded="false" onclick="jQuery('.collapse.in').collapse('hide')">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        
        <div class="collapse navbar-collapse" id="primary-navigation">
            
            <?php wp_nav_menu( array( 
                'theme_location' => 'primary',
                'depth'             => 2,
                'container'         => 'div',
                'container_class'   => 'xhidden-xs col-md-10 col-lg-9 no-padding--horizontal',
                'container_id'      => '',
                'menu_class'        => 'nav navbar-nav',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker()
            ) ); ?>
        
        </div>
        
    </div>
</nav>

<?php include (TEMPLATEPATH . '/includes/toolbar.php' );  ?>