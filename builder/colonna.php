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
<?php echo get_sub_field('colore_sfondo') ?>
<?php switch (get_sub_field('colore_sfondo')) {
    case 'Bianco':
        $color_bg = 'bg-white';
        break;
    case 'Light':
        $color_bg = 'bg-light';
        break;
    case 'Dark':
        $color_bg = 'bg-dark';
        break;
    case 'Gradiente':
        $color_bg = 'bg-gradient';
        break;
} ?>

<div class="col-<?php echo $col?> <?php echo $color_bg?>">
prova
</div>
