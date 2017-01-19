<?php if (get_sub_field('cornice') == 'cornice') :
    $frame = ' frame';
elseif (get_sub_field('cornice') == 'cornice browser'):
    $frame = ' browser';
else :
    $frame = '';
endif;
?>


<?php if ((get_sub_field('titolo') != '')) : ?>
    <h3 class="title"><?php echo get_sub_field('titolo') ?></h3>
<?php endif ?>
<div class="slider" ng-slider>
    <ul class="slider-wrapper<?php echo $frame ?><?php echo get_sub_field('full') ? ' full' : '' ?>">
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
                <?php $n_page = 0;
                while (have_rows('galleria_testo')) : the_row(); ?>
                    <li class="slider-item slider-item-txt">
                        <span class="page"><?php the_sub_field('pagine'); ?></span>
                    </li>
                    <?php $n_page++; endwhile ?>
            <?php endif ?>
        <?php endif ?>
        <div class="block-transition"></div>
    </ul>
    <?php if (get_sub_field('navigatore') == 'number') : ?>
        <nav class="nav-number">
            <span class="arrow-left">
                  <span class="btn-line reverse">
                    <span class="btn-arrow-up"></span>
                    <span class="btn-arrow-down"></span>
                </span>
            </span>
            <span class="gallery_count"><span class="current-slide ng-binding"
                                              ng-bind-html="pos + 1">1</span><?php echo $n_page ?></span>
            <span class="arrow-right">
                 <span class="btn-line">
                    <span class="btn-arrow-up"></span>
                    <span class="btn-arrow-down"></span>
                </span>
            </span>
        </nav>
    <?php elseif (get_sub_field('navigatore') == 'arrow') : ?>
        <nav class="nav-arrow">
            <span class="btn reverse btn-left">
                <span class="btn-line">
                    <span class="btn-arrow-up"></span>
                    <span class="btn-arrow-down"></span>
                </span>
            </span>
            <span class="btn btn-right">
                <span class="btn-line">
                    <span class="btn-arrow-up"></span>
                    <span class="btn-arrow-down"></span>
                </span>
            </span>
        </nav>
    <?php endif ?>
</div>