<script>
    $(document).ready(function(){
      $('.add-toolbar>a').attr('data-toggle', 'collapse');
      $('.add-toolbar>a').attr('data-target', '#collapseToolbar');
      $('.add-toolbar>a').attr('aria-expanded', 'false');
      $('.add-toolbar>a').attr('aria-controls', 'collapseToolbar');
    });
</script>

<script>
	// Client filter using isotope.js
	$('.grid').isotope({
	  // options
	  itemSelector: '.grid-item',
	  filter: $('.filter-button').first().attr('data-filter'),
	  // layoutMode: 'fitRows'
	});
	var $grid = $('.grid').isotope({  });
	$('.filter-button').on( 'click', function() {
	  var filterValue = $(this).attr('data-filter');
	  $grid.isotope({ filter: filterValue });
	});
</script>

<script>
// About page hover effect on bio images.
$(".tm__image").hover(function () {
	    $(this).parent().parent().siblings('.tm__offset-square').addClass('hover'); 
	    $(this).parent().parent().addClass('hover');
	}, 
	function () {
	    $(this).parent().parent().siblings('.tm__offset-square').removeClass('hover');
	    $(this).parent().parent().removeClass('hover');
});

// Resources hover effect.
$(".resource__link").hover(function () {
		$(this).prev().addClass('hover');
	    $(this).parent().siblings('.resource__logo').addClass('hover');
	    $(this).parent().siblings('.resource__logo-hover').addClass('hover');
	}, 
	function () {
	    $(this).prev().removeClass('hover');
	    $(this).parent().siblings('.resource__logo').removeClass('hover');
	    $(this).parent().siblings('.resource__logo-hover').removeClass('hover');
});

</script>

<?php if (is_page_template('template-resource-form.php')) { ?>
	<script>
		function createCookie(name,value,days) {
			if (days) {
			var date = new Date();
			date.setTime(date.getTime()+(days*24*60*60*1000));
			var expires = "; expires="+date.toGMTString();
			}
			else var expires = "";
			document.cookie = name+"="+value+expires+"; path=/";
	    }
	    function checkCookie(a) {
		    for (var d = document.cookie.split(";"), b = 0; b < d.length; b++) {
		        var e = d[b].substring(0, d[b].indexOf("=")).trim();
		        if(e == a) return true;
		    }
		    return false;
		}

		// Check if the user has already filled out the form. If so, display available downloads
		if(checkCookie('prl_resource')) {
			$('.form').hide();
			$('.resource-section').removeClass('hid');
			$('.file-wrap').addClass('show');
			$('.form-paragraph').text("Your form has been successfully submitted. Please click the link below to download.");
		}

		// Create a new object for custom validation of a custom field.
		var mySubmitController = Marionette.Object.extend( {
		  
		  initialize: function() {
		    this.listenTo( Backbone.Radio.channel( 'forms' ), 'submit:response', this.actionSubmit );
		  },

		  actionSubmit: function( response ) {
		  	// Event pushed into dataLayer to trigger the Validated Form Submission.
		  	if (typeof dataLayer !== 'undefined') {
				dataLayer.push({'event': 'formSubmit'});
			};
		  	$('.form').hide();
		  	$('.form-image').css("margin-top", "0px");
		    $('.file-wrap').addClass('show');
		    <?php 
		    	$resource_id = get_query_var( 'rsrc', false );
				if ($resource_id) {
					$post = get_post($resource_id);
					setup_postdata( $post );
					$resource_file = get_field("resource_file");
				}
		     ?>
		    $('.file-download').attr("href", "<?php echo $resource_file['url']; ?>");
		    <?php wp_reset_postdata(); ?>
		    $('.form-paragraph').text("Your form has been successfully submitted. Please click the link below to download.");
		    $('.resource-section').removeClass('hid');
		    createCookie('prl_resource', 'submitted', 60);
		  },

		});

		// On Document Ready...
		jQuery( document ).ready( function( $ ) {

		    // Instantiate our custom field's controller, defined above.
		    new mySubmitController();
		});
	</script>
<?php } else { ?>
	<script>
		// Listens for form submission response.
		var mySubmitController = Marionette.Object.extend( {
		  
		  initialize: function() {
		    this.listenTo( Backbone.Radio.channel( 'forms' ), 'submit:response', this.actionSubmit );
		  },

		  actionSubmit: function( response ) {
		  	$('.form-image').css("margin-top", "0px");
		  	// Event pushed into dataLayer to trigger the Validated Form Submission.
		  	if (typeof dataLayer !== 'undefined') {
				dataLayer.push({'event': 'formSubmit'});
			};
	  	  },

		});

		jQuery( document ).ready( function( $ ) {

		    // Instantiate our custom field's controller, defined above.
		    new mySubmitController();
		});
	</script>
<?php } ?>
<script>
	$("#menu-mobile-navigation").find('li').first().on('click', function() {
		$(this).toggleClass('mobile-expanded');
	})
</script>
<?php if (is_page_template('template-resource-form.php')) { ?>
<script>
	// Listens for form rendering.
var nameSpaceController = Marionette.Object.extend( {
  
  initialize: function() {
    this.listenTo( nfRadio.channel( 'form' ), 'render:view', this.doCustomStuff );
  },
  // Sets the value of the hidden field of the form to the name of the resource being downloaded.
  doCustomStuff: function( view ) {
  	var resourceName = $('.resource-title').text();
  	var formModel = view.model; // formModel will be a Backbone model with all of our form data.
  	var formID = formModel.get( 'id' ); // We can use .get( 'setting' ) get get any of our form settings.
	var fieldModel = formModel.get( 'fields' ).findWhere( { key: 'resource_1503583086307' } )
	fieldModel.set( 'value', resourceName );
    fieldModel.trigger( 'reRender' ); // Tells the field to re-draw itself.
    // Sets the resource hidden field value to yes, telling Emma which resource the contact has downloaded.
	var fieldModel = formModel.get( 'fields' ).findWhere( { label: resourceName } )
	fieldModel.set( 'value', 'Checked' );
    fieldModel.trigger( 'reRender' ); // Tells the field to re-draw itself.

  },

});

jQuery( document ).ready( function( $ ) {
    new nameSpaceController();
});
</script>
<?php } ?>