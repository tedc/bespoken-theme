<?php if(get_field('icon')) : ?>
<figure class="logo-related">
	<?php 
	if(preg_match($pattern, get_field('icon', get_the_ID()))) : 
            $svg = file_get_contents(get_field('icon'));
            $svg = str_replace('id', 'class="carousel-svg" id', $svg);
            echo $svg;
    else : ?>
	<img src="<?php the_field('icon_white'); ?>" />
	<?php endif; ?>
</figure>
<?php endif; ?>