<?php
	function vars()
	{
	    ?>
	    <script>
	    	var isLoaded = false;
	    	var WebFontConfig = {
			  custom: {
			    families: ['din']
			  },
			  active : function() {
			  	isLoaded = true
			  },
			  inactive : function() {
			  	isLoaded = true
			  },
			  timeout : 2000
			};
			(function(d) {
				var wf = d.createElement('script'), s = d.scripts[0];
				wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js';
				wf.async = true;
				s.parentNode.insertBefore(wf, s);
		   	})(document);
		   	var isMobile = <?php echo (is_handheld) ? 'true' : 'false'; ?>;
	    </script>
	    <?php
	}
	add_action('wp_footer', 'vars');
