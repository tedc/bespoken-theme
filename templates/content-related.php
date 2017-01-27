<div class="carousel-item">
	<div class="cover" style="background-image: url(<?php the_post_thumbnail_url('full'); ?>)"></div>
	<div class="carousel-item-content row-lg">
		<?php if(get_field('icon_white')) : ?>
		<figure class="logo">
			<img src="<?php the_field('icon_white'); ?>" class="logo" />
		</figure>
		<?php endif; ?>
		<h2 class="title"><?php the_title(); ?></h2>
		<div class="excerpt">
			<?php the_excerpt(); ?>		
		</div>
		<span class="btn"><span class="btn-text"><?php _e('Scopri', 'bspkn'); ?></span></span>
	</div>
	<a href="<?php the_permalink(); ?>" class="permalink"></a>
</div>