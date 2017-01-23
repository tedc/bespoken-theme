<?php $align = ((get_sub_field('allineamento_testo') == 'align-right') ? ' align-right' : (get_sub_field('allineamento_testo') == 'align-center') ? ' align-center' : ''); ?>

<?php if (get_sub_field('spaziatura')== '') :
    $padding = 'row-lg';
elseif (get_sub_field('spaziatura') == '0'):
    $padding = get_sub_field('grandezza_spaziatura');
elseif (get_sub_field('spaziatura') == '1'):
    $padding = get_sub_field('grandezza_spaziatura_sopra');
elseif (get_sub_field('spaziatura') == '2'):
    $padding = get_sub_field('grandezza_spaziatura_sotto');
endif;?>

<div class="<?php echo get_sub_field('full') ? ' full' : 'content '.$padding ?> ">
    <?php if ((get_sub_field('titolo') != '')) : ?>
        <h3 class="title<?php echo(get_sub_field('enfasi_titolo') ? ' emphasis' : '') ?><?php echo $align ?>"><?php echo get_sub_field('titolo') ?></h3>
    <?php endif ?>
    <?php if (get_sub_field('cornice')== true) :
        get_template_part('templates/cornice');
    endif;
    ?>
    <div class="slider" ng-slider>
        <ul class="slider-wrapper">
            <?php if (get_sub_field('tipologia') == 'immagini') : ?>
                <?php $images = get_sub_field('galleria_immagini'); ?>
                <?php if ($images): ?>
                    <?php $n_page = 0;
                    foreach ($images as $image): ?>
                        <li class="slider-item" ng-class="{current:pos==<?php echo $n_page ?>}">
                            <figure><?php echo wp_get_attachment_image($image["id"], "large"); ?></figure>
                        </li>
                        <?php $n_page++; endforeach; ?>
                <?php endif ?>
            <?php elseif (get_sub_field('tipologia') == 'testo') : ?>
                <?php if (have_rows('galleria_testo')): ?>
                    <?php $n_page = 0;
                    while (have_rows('galleria_testo')) : the_row(); ?>
                        <li class="slider-item" ng-class="{current:pos==<?php echo $n_page ?>}">
                            <?php the_sub_field('pagine'); ?>
                        </li>
                        <?php $n_page++; endwhile ?>
                <?php endif ?>
            <?php endif ?>
            <div class="mask"></div>
        </ul>
        <?php if (get_sub_field('navigatore') == 'number') : ?>
            <nav class="nav-number">
            <span class="arrow-prev">
                  <span class="btn-line">
                    <span class="btn-arrow-up"></span>
                    <span class="btn-arrow-down"></span>
                </span>
            </span>
            <span class="gallery-count"><span class="current-slide ng-binding"
                                              ng-bind-html="pos + 1">1</span>/<?php echo $n_page ?></span>
            <span class="arrow-next">
                 <span class="btn-line">
                    <span class="btn-arrow-up"></span>
                    <span class="btn-arrow-down"></span>
                </span>
            </span>
            </nav>
        <?php elseif (get_sub_field('navigatore') == 'arrow') : ?>
            <nav class="nav-arrow <?php echo get_sub_field('colore_navigatore')== 'purple'? 'emphasis' : ''?>">
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
</div>