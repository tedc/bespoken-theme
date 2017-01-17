<?php $nCols = get_sub_field('n_cols'); ?>
<div class="grid-12">
    <?php while(have_rows('riga')) : the_row(); ?>
        <div class="grid-2">
            <?php echo get_row_layout() ?>
            <?php var_dump(get_row_layout()) ?>
        </div>
    <?php endwhile; ?>
</div>