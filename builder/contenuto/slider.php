<?php $max = 0; ?>

<?php if (get_sub_field('spaziatura')== '') :
    $padding = 'row-lg';
elseif (get_sub_field('spaziatura') == '0'):
    $padding = get_sub_field('grandezza_spaziatura');
elseif (get_sub_field('spaziatura') == '1'):
    $padding = get_sub_field('grandezza_spaziatura_sopra');
elseif (get_sub_field('spaziatura') == '2'):
    $padding = get_sub_field('grandezza_spaziatura_sotto');
endif;?>

<div class="<?php echo (get_sub_field('full') && get_sub_field('navigatore') != 'number') ? ' full' : 'content '.$padding ?> ">
    <?php if ((get_sub_field('titolo') != '')) : ?>
        <h3 class="title<?php echo(get_sub_field('enfasi_titolo') ? ' emphasis' : '') ?><?php echo $align ?>"><?php echo get_sub_field('titolo') ?></h3>
    <?php 

    endif;
    
    if (get_sub_field('cornice')== true) :
        get_template_part('templates/cornice');
    endif;

    if (get_sub_field('tipologia') == 'immagini') {
        $max = count(get_sub_field('galleria_immagini')) - 1; 
    }
    if (get_sub_field('tipologia') == 'testo') {
        $max = count(get_sub_field('galleria_testo')) - 1; 
    } 
?>

    <div class="slider" ng-slider ng-swipe-left="dir(true, pos, <?php echo $max; ?>)" ng-swipe-right="dir(false, pos, <?php echo $max; ?>)">
        <?php $itemClass = (get_sub_field('navigatore') == 'number') ? ' slider-wrapper-contain' : ''; ?>
        <div class="slider-wrapper<?php echo $itemClass; ?>">
            <?php if (get_sub_field('tipologia') == 'immagini') : ?>
                <?php $images = get_sub_field('galleria_immagini'); ?>
                <?php if ($images): ?>
                    <?php 
                    $n_page = 0;
                    foreach ($images as $image): ?>
                        <?php $style = ' style="background-image:url('.wp_get_attachment_image_url( $image['id'], 'full' ).')"'; ?>         
                        <div class="slider-item" ng-class="{current:pos==<?php echo $n_page ?>}"<?php echo $style; ?> id="slide_<?php echo $row; ?>_<?php $n; ?>">
                            <style type="text/css">
                                #slide_<?php echo $row; ?>_<?php $n; ?> {
                                    background-image:url('.wp_get_attachment_image_url( $image['id'], 'medium' ).');
                                }
                                @media screen and (min-width: <?php echo 640/16; ?>em) {
                                    background-image:url(<?php echo wp_get_attachment_image_url( $image['id'], 'large' ); ?>);
                                }
                                @media screen and (min-width: <?php echo 850/16; ?>em) {
                                    background-image:url(<?php echo wp_get_attachment_image_url( $image['id'], 'full' ); ?>);
                                }
                            </style>
                            <figure><?php echo wp_get_attachment_image($image["id"], "large"); ?></figure>
                        </div>
                        <?php $n_page++; endforeach; ?>
                <?php endif ?>
            <?php elseif (get_sub_field('tipologia') == 'testo') :
             ?>
                <?php if (have_rows('galleria_testo')): ?>
                    <?php $n_page = 0;
                    while (have_rows('galleria_testo')) : the_row(); ?>
                        <?php var_dump(get_sub_field('allineamento_testo')) ?>
                        <div class="slider-item <?php if(get_sub_field('allineamento_testo')=='v-top' ? '' : the_sub_field('allineamento_testo'))?>" ng-class="{current:pos==<?php echo $n_page ?>}">
                            <?php the_sub_field('pagine'); ?>
                        </div>
                        <?php $n_page++; endwhile ?>
                <?php endif ?>
            <?php endif ?>
            <div class="mask"></div>
        </div>
        <?php if (get_sub_field('navigatore') == 'number') : ?>
            <nav class="nav-number">
            <span class="arrow-prev" ng-click="dir(false, pos, <?php echo $max; ?>)">
                  <span class="btn-line">
                    <span class="btn-arrow-up"></span>
                    <span class="btn-arrow-down"></span>
                </span>
            </span>
            <span class="gallery-count"><span class="current-slide" ng-bind-html="pos + 1">1</span> / <?php echo $n_page ?></span>
            <span class="arrow-next" ng-click="dir(true, pos, <?php echo $max; ?>)">
                 <span class="btn-line">
                    <span class="btn-arrow-up"></span>
                    <span class="btn-arrow-down"></span>
                </span>
            </span>
            </nav>
        <?php elseif (get_sub_field('navigatore') == 'arrow') : ?>
            <nav class="nav-arrow <?php echo get_sub_field('colore_navigatore')== 'purple'? 'emphasis' : ''?>">
            <span class="btn reverse btn-prev" ng-click="dir(false, pos, <?php echo $max; ?>)">
                <span class="btn-line">
                    <span class="btn-arrow-up"></span>
                    <span class="btn-arrow-down"></span>
                </span>
            </span>
            <span class="btn btn-next" ng-click="dir(false, pos, <?php echo $max; ?>)">
                <span class="btn-line">
                    <span class="btn-arrow-up"></span>
                    <span class="btn-arrow-down"></span>
                </span>
            </span>
            </nav>
        <?php endif ?>
    </div>
</div>