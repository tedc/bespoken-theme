<?php $dim = get_sub_field('dim') ?>
<?php switch ($dim) {
    case '1':
        $col = '12';
        break;
    case '1/2':
        $col = '6';
        break;
    case '1/3':
        $col = '4';
        break;
    case '2/3':
        $col = '8';
        break;
} ?>

<div class="col-<?php echo $col?> <?php echo get_sub_field('colore_sfondo')?>">
    <?php while(have_rows('contenuto')) : the_row(); ?>
        <?php include(locate_template('builder/contenuto/' . get_row_layout() . '.php', false, false)); ?>
    <?php endwhile; ?>
</div>
