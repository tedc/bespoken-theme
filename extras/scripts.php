<?php
	use Roots\Sage\Assets;
	function vars()
	{
	    ?>
	    <script>
	    	var WebFontConfig = {
			  custom: {
			    families: ['din']
			  }
			};
			(function(d) {
				var wf = d.createElement('script'), s = d.scripts[0];
				wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js';
				wf.async = true;
				s.parentNode.insertBefore(wf, s);
		   	})(document);

	    </script>
	    <?php
	}
	//add_action('wp_footer', 'vars');
