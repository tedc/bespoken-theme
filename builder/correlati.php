<?php
	$last = ($row === $count_row) ? true : false;
	var_dump($last);
	if(get_post_type() == 'servizi') :
		$array_query = array(
			'post_type' => 'servizi',
			'post_parent' => ($post->post_parent > 0) ? $post->post_parent : $post->ID,
			'posts_per_page' => -1,
			'orderby' => 'name'
		);
	else :
	$ids = array();
	$types = array();
	$posts = get_sub_field('related');
	foreach ($posts as $p) {
		array_push($ids, $p->ID);
		array_push($types, $p->post_type);
	}
	$array_query = array(
			'post_type' => $types,
			'post__in' => $ids,
			'posts_per_page' => count($posts),
			'orderby' => 'post__in'
		);
	endif;
	$query = new WP_Query(
		$array_query
	);
	if(get_post_type() == 'servizi') {
		?>
	<div class="grid-12 alternate row-md-btm">
		<div class="col-12 aligncenter">
			<h3 class="title title-normal-important"><?php _e('Le attività da svolgere', 'bspkn'); ?></h3>
		</div>
	</div>
	<?php }
	carousel($query, get_sub_field('n_cols'), 'false', $last);

	?>
