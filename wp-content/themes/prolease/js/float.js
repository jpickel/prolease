$(document).ready(function( $ ) {

	setTimeout(function() { $(function () {
	  var showClass = 'show';
	  
	  $('input').focus( function () {
	    var label = $(this).parent().prev('.nf-field-label');
      	label.addClass(showClass);
	  });
	  $('input').on('checkval', function () {
	    var label = $(this).parent().prev('.nf-field-label');
	    if(this.value === '') {
	      label.removeClass(showClass);
	    }
	  }).focusout( function () {
	    $(this).trigger('checkval');
	  });
	})}, 1000);
})
