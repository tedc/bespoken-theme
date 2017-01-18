<div class="grid-12">
    <?php if (have_rows('colonna')) : ?>
        <?php while (have_rows('colonna')) : the_row(); ?>
            <?php include(locate_template('builder/' . get_row_layout() . '.php', false, false)); ?>
        <?php endwhile; ?>
    <?php elseif (have_rows('correlati')) : ?>
        <?php while (have_rows('correlati')) : the_row(); ?>
            <?php include(locate_template('builder/' . get_row_layout() . '.php', false, false)); ?>
        <?php endwhile; ?>
    <?php elseif (have_rows('team')) : ?>
        <?php while (have_rows('team')) : the_row(); ?>
            <?php include(locate_template('builder/' . get_row_layout() . '.php', false, false)); ?>
        <?php endwhile; ?>
    <?php elseif (have_rows('jobs')) : ?>
        <?php while (have_rows('jobs')) : the_row(); ?>
            <?php include(locate_template('builder/' . get_row_layout() . '.php', false, false)); ?>
        <?php endwhile; ?>
    <?php endif ?>
</div>