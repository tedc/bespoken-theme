<?php $dim = get_sub_field('dim') ?>

<?php switch ($dim) {
    case '1':
        $perc = (100);
        break;
    case '1/2':
        $perc = (100 / 2);
        break;
    case '1/3':
        $perc = ((100 / 3) * 1);
        break;
    case '2/3':
        $perc = ((100 / 3) * 2);
        break;
} ?>
<?php echo $perc ?>
