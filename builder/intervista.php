<div class="col-12 <?php echo get_sub_field('colore_sfondo') ?>">
<div class="video<?php echo get_sub_field('full') ? ' full' : 'row-lg'?>">
    <?php if (get_sub_field('cornice') == true) :
        get_template_part('templates/cornice');
    endif; ?>
    <div class="container-player">
        <img class="screenshot" src="<?php echo  get_sub_field('video') ?>">
        <div class="video-foreground">
            <?php $oembed = get_sub_field('video_embed');
            echo $oembed; ?>
        </div>
        <h3 class="title-video"><?php _e('La parola del cliente', 'bspkn') ?></h3>
        <span class="clients">
            <h3><?php the_sub_field('titolo') ?></h3>
            <h4><?php the_sub_field('sottotitolo') ?></h4>
        </span>
    </div>
    <?php if (get_sub_field('video_embed') != "") { ?>
        <div class="container-play">
            <div class="icon-play play"></div>
        </div>
        <div class="container-close">
            <div class="close"><?php _e("CHIUDI", "bspkn") ?></div>
        </div>
    <?php } ?>
</div>
</div>
