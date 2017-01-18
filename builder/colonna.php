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

<?php $bg_src = get_sub_field('bg_img')['url'] ?>

<?php if (get_sub_field('bg_kind') == 'cover') :
    $bg_kind = 'background-size: cover;';
elseif (get_sub_field('bg_kind') == 'contain'):
    $bg_kind = 'background-size: contain;';
elseif (get_sub_field('bg_kind') == 'repeat'):
    $bg_kind = 'background-size: contain; background-repeat: repeat;';
else :
$bg_kind = '';
endif;
?>

<div class="col-<?php echo $col ?> <?php echo get_sub_field('colore_sfondo') ?> <?php echo get_sub_field('posizione_verticale') ?> <?php echo get_sub_field('no_padding') ? 'no-padding' : '' ?>"<?php echo (get_sub_field('bg_img') != '') ? ' style="background-image:url(' . $bg_src . ');' . $bg_kind . '"' : '' ; ?>>
    <?php while (have_rows('contenuto')) : the_row(); ?>
        <?php include(locate_template('builder/contenuto/' . get_row_layout() . '.php', false, false)); ?>
    <?php endwhile; ?>
</div>
