<div class="grid-12">
<?php if (have_rows('colonna')) : ?>
    <?php while (have_rows('colonna')) : the_row(); ?>
        <?php include(locate_template('builder/' . get_row_layout() . '.php', false, false)); ?>
    <?php endwhile; ?>
<?php endif ?>
</div>
