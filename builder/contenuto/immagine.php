<figure class="image">
    <?php if( !get_field('immagine') ): ?>
        <?php var_dump(the_field('immagine')); ?>
    <img class="" src="<?php the_field('immagine'); ?>">
    <?php endif ?>
</figure>