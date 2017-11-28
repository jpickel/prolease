<div class="blog-dropdown">
	<?php wp_dropdown_categories( 'show_option_none=Category' ); ?>
	<script type="text/javascript">
	    var dropdown = document.getElementById("cat");
	    function onCatChange() {
	        if ( dropdown.options[dropdown.selectedIndex].value > 0 ) {
	            location.href = "<?php echo esc_url( home_url( '/' ) ); ?>?cat="+dropdown.options[dropdown.selectedIndex].value;
	        }
	    }
	    dropdown.onchange = onCatChange;
	</script>
	<select name=\"archive-dropdown\" onChange='document.location.href=this.options[this.selectedIndex].value;'>
	<option value=\"\"><?php echo esc_attr(__('Archives')); ?></option>
	<?php wp_get_archives('type=monthly&format=option'); ?> </select>
</div>