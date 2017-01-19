<?php if (get_sub_field('cornice') == 'cornice') :
    $frame = ' frame';
elseif (get_sub_field('cornice') == 'cornice browser'):
    $frame = ' browser';
else :
    $frame = '';
endif;
?>


<?php if((get_sub_field('titolo') != '')) : ?>
<h3 class="title"><?php echo get_sub_field('titolo') ?></h3>
<?php endif ?>
<div class="container-slider<?php echo $frame ?><?php echo get_sub_field('full') ? ' full' : '' ?>">
<ul class="slider">
    <?php if (get_sub_field('tipologia') == 'immagini') : ?>
        <?php $images = get_sub_field('galleria_immagini'); ?>
        <?php if ($images): ?>
            <?php foreach ($images as $image): ?>
                <li class="slider-item slider-item-img">
                    <img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>"/>
                </li>
            <?php endforeach; ?>
        <?php endif ?>
    <?php elseif (get_sub_field('tipologia') == 'testo') : ?>
        <?php if (have_rows('galleria_testo')): ?>
            <?php while (have_rows('galleria_testo')) : the_row(); ?>
                <li class="slider-item slider-item-txt">
                    <span class="page"><?php the_sub_field('pagine'); ?></span>
                </li>
            <?php endwhile ?>
        <?php endif ?>
    <?php endif ?>
    <div class="block-transition"></div>
</ul>
</div>