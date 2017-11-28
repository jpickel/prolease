<div class="clearfix"></div>
    
<footer id="footer" class="footer background--dark-grey">
    <div class="container">
    
        <div class="footer__center-wrap">
            <div class="copyright"><ul class="list--none list--inline"><li class="list--inline">Copyright © 2017 Link Systems, Inc.</li></ul></div>
            <div class="copyright"><ul class="list--none list--inline"><li class="list--inline"><a href="tel:<?php echo get_theme_mod( 'phone_number' ); ?>"><?php echo get_theme_mod( 'phone_number' ); ?></a></li></ul></div>
            <div class="footer__social-wrap">
                <ul class="list--none list--inline">
                    <li class="list--inline"><a href="https://www.facebook.com/proleasesoftware" title="Facebook" target="_blank" data-main-nav-fb="mainNavFb"><span class="fa fa-facebook background--facebook" aria-label="Facebook"></span></a></li>
                    <li class="list--inline"><a href="https://twitter.com/ProLeaseTech" title="Twitter" target="_blank" data-main-nav-twitter="mainNavTwitter"><span class="fa fa-twitter background--twitter" aria-label="Twitter"></span></a></li>
                    <li class="list--inline"><a href="https://www.linkedin.com/company/link-systems-l-prolease" title="LinkedIn" target="_blank" data-main-nav-linkedin="mainNavLinkedin"><span class="fa fa-linkedin background--linkedin" aria-label="Linkedin"></span></a></li>
                </ul>
                <ul class="list--none list--inline">
                    <li class="list--inline"><img src="<?php echo get_template_directory_uri(); ?>/images/5000.png" alt=""></li>
                </ul>
            </div>
        </div>
    
    </div>
</footer>

<?php 
    // Form Success Message Modal
    // Activated when ?form=submit is part of the URL
?>

<?php $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?>

<?php if (false !== strpos($url,'?form=submit')) { ?>

    <div class="modal fade" id="successModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document" style="width: 400px;">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: none;">
                    <div class="text-right" data-dismiss="modal">
                        <span class="glyphicon glyphicon-remove"></span>
                    </div>
                </div>
                <div class="modal-body text-center" style="margin: 25px;">
                    <p>Your form has been successfully submitted.</p>
                </div>
            </div>
        </div>
    </div>
    
    <script type="text/javascript">
        $(window).load(function(){
            $('#successModal').modal('show');
            setTimeout(function() {$('#successModal').modal('hide');}, 8000);
        });
    </script>

<?php } ?>

<?php wp_footer(); ?>