<div class="video contain">
    <?php $file = preg_replace('/\\.[^.\\s]{3,4}$/', '', get_sub_field('file')); ?>
    <div class="container-flow" style="background-image: url(<?php echo $file ?>.jpg)">
        <video poster="<?php echo $file ?>.jpg" class="flowplayer" id="player" loop muted>
            <source src="<?php echo $file ?>.mp4" type="video/mp4">
            <source src="<?php echo $file ?>.webm" type="video/webm">
            <source src="<?php echo $file ?>.ogv" type="video/ogv">
        </video>
        <div class="video-foreground">
            <?php $oembed = get_sub_field('video_embed');
            echo $oembed;?>
        </div>
    </div>
    <h3 class="title-video"><?php the_sub_field('titolo') ?></h3>
    <?php if (get_sub_field('video_embed') != ""){?>
        <div class="container-play">
            <div id="play-button" class="icon-play play">PLAY</div>
        </div>
        <div class="container-close">
            <div class="close-button"><?php _e("chiudi", "bspkn")?></div>
        </div>
    <?php } ?>
</div>
