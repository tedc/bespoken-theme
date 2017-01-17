
<div class="grid-12">
    <?php while(have_rows('riga')) : the_row(); ?>
        <div class="grid-2">
            <?php the_sub_field('n_cols'); ?>

        <?php while(have_rows('colonna')) : the_row(); ?>
            <div class="prova">
            <?php include(locate_template( get_row_layout().'.php', false, false)); ?>
            </div>
        <?php endwhile; ?>
        </div>
    <?php endwhile; ?>
</div>