<?php $postClass = ($count%2 == 0) ? '' : 'alt'; ?>
<article <?php post_class($postClass); ?>>
	<figure class="entry-figure" style="background-image: url(<?php the_post_thumbnail_url('large'); ?>)">
		<?php the_post_thumbnail('large'); ?>
	</figure>
	<div class="entry-content">
		<header>
			<?php the_category(', '); ?>
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<?php get_template_part('templates/entry-meta'); ?>
		</header>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div>
	</div>
</article>
