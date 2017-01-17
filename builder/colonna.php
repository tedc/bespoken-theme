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
<?php $color = get_sub_field_object('colore_sfondo') ?>

<div class="col-<?php echo $col?> <?php echo $color['value']?>">
prova
</div>
