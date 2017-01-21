<?php while ( have_rows('testo') ) : the_row(); ?>

<?php /*if (!get_sub_field('spaziatura')) :
    $padding = 'row-lg';
elseif (!get_sub_field('spaziatura') == 0):
    $padding = get_sub_field('grandezza_spaziatura');
elseif (!get_sub_field('spaziatura') == 1):
    $padding = get_sub_field('grandezza_spaziatura_sopra');
elseif (!get_sub_field('spaziatura') == 2):
    $padding = get_sub_field('grandezza_spaziatura_sotto');
endif;*/?><!--
    <?php /*var_dump(get_sub_field('spaziatura'))*/?>
--><?php /*var_dump($padding)*/?>
    <?php the_sub_field('spaziatura') ?>

<div class="content <?php echo $padding ?>">
    <?php $align = ((get_sub_field('allineamento_testo'))); ?>
    <?php if(!get_sub_field('titolo_precompilato') && trim(get_sub_field('titolo'))!='') :?>

        <h3 class="title <?php echo $align ?> <?php echo (get_sub_field('enfasi_titolo')? ' emphasis' : '' )  ?>"><?php the_sub_field('titolo') ?> </h3>
        <?php else : ?>
        <h2 class="title emphasis"><em><?php the_sub_field('titolo_precompilato');?></em></h2>
        <?php endif ?>
<div class="description <?php echo $align ?>"><?php the_sub_field('contenuto') ?></div>
    </div>
<?php endwhile ?>