<div class="grid-12">
    <?php while (have_rows('riga')) : the_row(); ?>
        <div class="grid-2">
            <?php var_dump(get_row_layout() == 'colonna') ?>
            <?php if (get_row_layout() == 'colonna'): ?>

               <!-- <?php /*while (have_rows('colonna')) : the_row(); */?>
                    <?php /*echo get_sub_field('n_cols'); */?>
                    <?php /*include(locate_template(get_row_layout() . '.php', false, false)); */?>
                --><?php /*endwhile; */?>

            <?php endif ?>
        </div>
    <?php endwhile; ?>
</div>