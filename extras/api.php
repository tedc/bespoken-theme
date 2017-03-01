<?php
	add_action( 'rest_api_init', 'bspkn_rest_api');
	function bspkn_rest_api() {
		register_rest_route( 'bspkn/v1', 'page/(?P<name>.+)', array(
			'methods' => 'GET',
			'callback' => 'get_bspkn_page'
		));
	}

	function get_bspkn_page(WP_REST_Request $request) {
		$args = array(
				'name' => $request['name'],
				'posts_per_page' => -1,
				'post_status' => 'publish',
				'post_type' => 'any'
			);
		$file = '';
		$q = new WP_Query($args);
		while($q->have_posts()) : $q->the_post();
		ob_start();
		if( get_post_type() == 'page' ) :
			get_template_part('templates/'. (is_page_template('about.php')) ? 'about' : 'page', 'header');
			get_template_part('templates/page', 'layout');
		else :
			get_template_part('single');
		endif;
    	$file = ob_get_contents();
    	ob_end_clean();
    	endwhile;
    	$content = $file;
    	return $content;
	}