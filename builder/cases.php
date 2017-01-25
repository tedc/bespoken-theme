<?php if(get_sub_field('tipo') == 0) : ?>
	<?php $colClass = get_sub_field('cols'); ?>
	<div class="grid-12 row-lg">
		<?php 
		$query = new WP_Query(
			array(
				'post_type' => 'lavori',
				'post__in' => get_sub_field('cases'),
				'posts_per_page' => count(get_sub_field('cases'))
			)
		);
		while($query->have_posts) : $query->the_post(); ?>
		<li class="col-<?php the_sub_field('cols'); ?>">
			<img src="<?php the_field("logo"); ?>" />
		</li>
		<?php endwhile; wp_reset_query(); ?>
	</div>
<?php endif ?>