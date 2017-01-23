<?php if (get_sub_field('spaziatura')== '') :
    $padding = 'row-lg';
elseif (get_sub_field('spaziatura') == '0'):
    $padding = get_sub_field('grandezza_spaziatura');
elseif (get_sub_field('spaziatura') == '1'):
    $padding = get_sub_field('grandezza_spaziatura_sopra');
elseif (get_sub_field('spaziatura') == '2'):
    $padding = get_sub_field('grandezza_spaziatura_sotto');
endif;?>

<div class="video <?php echo get_sub_field('full') ? ' full' : 'content '.$padding ?> ">
    <?php $file = preg_replace('/\\.[^.\\s]{3,4}$/', '', get_sub_field('file')); ?>
    <div class="container_flow" style="background-image: url(<?php echo $file ?>.jpg)">
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
    <?php if (get_sub_field('video_embed') != ""){?>
        <div class="container_play">
            <div id="play-button" class="play"><img src=""><?php _e("Guarda il video completo", "mara")?></div>
        </div>
        <div class="container_close">
            <div class="close-button"><?php _e("chiudi", "mara")?></div>
        </div>
    <?php } ?>
</div>
