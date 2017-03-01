<?php
	add_action( 'rest_api_init', 'bspkn_rest_api');
	function bspkn_rest_api() {
		register_rest_route( 'bspkn/v1', 'page/(?P<name>.+)', array(
			'methods' => 'GET',
			'callback' => 'get_bspkn_page'
		));
	}

	function get_bspkn_page(WP_REST_Request $request) {
		$post = get_posts(
			array(
				'post_name' => $request['name'],
				'posts_per_page' => -1,
				'post_status' => 'publish',
				'post_type' => 'any'
			)
		);
		 ob_start();
		 get_template_part( ( $post[0]->post_type == 'page' ) ? 'page' : 'single' );
    	$file = ob_get_contents();
    	ob_end_clean();
    	$content = array('content' => $file);
    	return $content;
	}