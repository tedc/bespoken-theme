<?php
            $pattern = '/embed\/(\w+)\?\w+/';
            $oembed = get_sub_field('video_embed');
            $iframe = preg_match($pattern, $oembed, $matches);
?>
<div class="video row-lg <?php echo get_sub_field('colore_sfondo') ?>" ng-player player="<?php echo $matches[1]; ?>">
    <div class="container-player">
        <img class="screenshot" src="<?php echo get_sub_field('video') ?>">
        <div class="video-foreground">
            <youtube-video video-id="playerId"></youtube-video>
        </div>
        <h3 class="title-video"><?php _e('La parola del cliente', 'bspkn') ?></h3>
        <div class="clients row">
            <h4 class="name"><?php the_sub_field('titolo') ?></h4>
            <h5 class="company"><?php the_sub_field('sottotitolo') ?></h5>
        </div>
        <?php if (get_sub_field('video_embed') != "") { ?>
            <span class="icon-play play"></span>
            <?php close('isModal=false;isMenu=false'); ?>
        <?php } ?>
    </div>
</div>