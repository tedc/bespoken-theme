<?php if (have_rows('jobs')) : ?>
    <?php while (have_rows('jobs')) : the_row(); ?>
    <?php endwhile; ?>
<?php endif ?>