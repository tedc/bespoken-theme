<?php $nCols = get_sub_field('n_cols'); ?>
<div class="grid-12">
    <?php while(have_rows('riga')) : the_row(); ?>
        <div class="grid-2">
        <?php while(have_rows('colonna')) : the_row(); ?>
            <?php echo get_sub_field('n_cols');?>
            <?php include(locate_template( get_row_layout().'.php', false, false)); ?>
        <?php endwhile; ?>
        </div>
    <?php endwhile; ?>
</div>