<?php if (have_rows('team')) : ?>
    <?php while (have_rows('team')) : the_row(); ?>
        <div class="col-<?php the_sub_field("n_cols")?>">
        </div>
    <?php endwhile; ?>
<?php endif; ?>