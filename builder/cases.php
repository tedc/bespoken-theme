
<?php 
$query = new WP_Query(
			array(
				'post_type' => 'lavori',
				'post__in' => get_sub_field('cases'),
				'posts_per_page' => count(get_sub_field('cases'))
			)
		);
if(get_sub_field('tipo') == 0) : ?>
	<?php $colClass = get_sub_field('cols'); ?>
	<div class="grid-12 row-lg">
		<?php 
		
		while($query->have_posts) : $query->the_post(); ?>
		<li class="col-<?php the_sub_field('cols'); ?>">
			<?php if(preg_match($pattern, get_field('icon', get_the_ID()))) : ?>
                
			<?php 
                    $svg = file_get_contents(get_field('icon'));
                    $svg = str_replace('id', 'class="case-svg" id', $svg);
                    echo $svg;
                ?>

            <?php else : ?>
	            <img src="<?php the_field('icon', $post->ID) ?>" class="case-image">
                <img src="<?php the_field('icon_white', $post->ID) ?>" class="case-image-overlay">
            <?php endif; ?>
		</li>
		<?php endwhile; wp_reset_query(); ?>
	</div>
<?php endif ; ?>