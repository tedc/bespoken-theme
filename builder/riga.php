
<div class="grid-12">

    <?php var_dump(the_sub_field('n_cols'))?>
    <?php while(have_rows('colonna')) : the_row(); ?>
        <div></div>
        <?php include(locate_template('builder/' . get_row_layout() . '.php', false, false)); ?>
        <?php endwhile; ?>

</div>