<?php $gridClass= (get_sub_field('col_inverted')) ? 'grid-12 grid-inverted' : 'grid-12'; ?>
<div class="<?php echo $gridClass; ?>">
<?php if (have_rows('colonna')) : ?>
    <?php while (have_rows('colonna')) : the_row(); ?>
        <?php include(locate_template('builder/' . get_row_layout() . '.php', false, false)); ?>
    <?php endwhile; ?>
<?php endif ?>
</div>
