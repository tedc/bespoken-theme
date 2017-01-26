<div class="video row-lg <?php echo get_sub_field('colore_sfondo') ?>">
    <div class="container-player">
        <img class="screenshot" src="<?php echo get_sub_field('video') ?>">
        <div class="video-foreground">
            <?php $oembed = get_sub_field('video_embed');
            echo $oembed; ?>
        </div>
        <h3 class="title-video"><?php _e('La parola del cliente', 'bspkn') ?></h3>
    <span class="clients">
        <h3><?php the_sub_field('titolo') ?></h3>
        <h4><?php the_sub_field('sottotitolo') ?></h4>
    </span>
        <?php if (get_sub_field('video_embed') != "") { ?>
            <span class="icon-play play"></span>
            <?php close('isModal=false;isMenu=false'); ?>
        <?php } ?>
    </div>
</div>