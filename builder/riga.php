<?php $nCols = get_sub_field('n_cols'); ?>
<div class="grid-12">
    <?php while(have_rows('riga')) : the_row(); ?>
        <div class="grid-2">
        <?php get_template_part('builder/colonna') ?>
        </div>
    <?php endwhile; ?>
</div>