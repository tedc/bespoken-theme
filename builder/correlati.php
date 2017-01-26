<?php 
	$ids = array();
	$types = array();
	$last = ($row == $count_row) ? true : false;
	$posts = get_sub_field('related');
	foreach ($posts as $p) {
		array_push($ids, $p->ID);
		array_push($types, $p->post_type);
	}
	$query = new WP_Query(
		array(
			'post_type' => $types,
			'post__in' => $ids,
			'posts_per_page' => count($posts),
			'orderby' => 'post__in'
		)
	);
	carousel($query, get_sub_field('n_cols'), 'false', $last); ?>