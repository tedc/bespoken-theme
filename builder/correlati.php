<?php 
	$ids = array();
	$posts = get_sub_field('related');
	$type = $posts[0]->post_type;
	foreach ($posts as $o) {
		array_push($ids, $p->ID);
	}
	$query = new WP_Query(
		'post_type' => $type,
		'post__in' => $ids,
		'posts_per_page' => count($posts)
	);
	carousel($query, get_sub_field('n_cols'), 'false'); ?>