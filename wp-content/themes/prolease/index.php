<?php include (TEMPLATEPATH . '/meta.php' ); ?>
<?php include (TEMPLATEPATH . '/google.php' ); ?>
</head>

<?php if ( is_front_page() ) { ?>

    <?php include (TEMPLATEPATH . '/home-page.php' ); ?>
    
<?php } elseif ( is_page('news-resources') ) { ?>

    <?php include (TEMPLATEPATH . '/blog.php' ); ?>

<?php } else { ?>

    <?php include (TEMPLATEPATH . '/default-page.php' ); ?>

<?php } ?>

</html>