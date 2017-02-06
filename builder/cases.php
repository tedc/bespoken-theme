
<?php 
$pattern = '/[\w\-]+\.(svg)/';
$query = new WP_Query(
			array(
				'post_type' => 'lavori',
				'post__in' => get_sub_field('cases'),
				'posts_per_page' => count(get_sub_field('cases'))
			)
		);
if(get_sub_field('case_kind') == 0) : ?>
	<?php $colClass = get_sub_field('cols'); ?>
	<div class="grid-12 alternate cases">
		<?php 
		
		while($query->have_posts()) : $query->the_post(); ?>
		<div <?php post_class('col-'.$colClass . ' content row-lg'); ?>">
			<?php if(preg_match($pattern, get_field('icon', get_the_ID()))) : ?>
			<a href="<?php the_permalink(); ?>">
			<?php 
                    $svg = file_get_contents(get_field('icon'));
                    $svg = str_replace('id', 'class="case-svg" id', $svg);
                    echo $svg;
                ?>
            </a>
            <?php else : ?>
            <figure class="case-figure">
	          	<a href="<?php the_permalink(); ?>">
		            <img src="<?php the_field('icon', $post->ID) ?>" class="case-image">
	                <img src="<?php the_field('icon_white', $post->ID) ?>" class="case-image-overlay">
                </a>
             </figure>
            <?php endif; ?>
		</div>
		<?php endwhile; wp_reset_query(); ?>
	</div>
<?php else ; ?>

<?php endif; ?>