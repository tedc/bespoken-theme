<?php if (get_sub_field('spaziatura') == '') :
    $padding = 'row-lg';
elseif (get_sub_field('spaziatura') == '0'):
    $padding = get_sub_field('grandezza_spaziatura');
elseif (get_sub_field('spaziatura') == '1'):
    $padding = get_sub_field('grandezza_spaziatura_sopra');
elseif (get_sub_field('spaziatura') == '2'):
    $padding = get_sub_field('grandezza_spaziatura_sotto');
endif; ?>

<div class="video <?php echo get_sub_field('full') ? ' full' : 'content ' . $padding ?>">
    <div class="container-cornice">
    <?php if (get_sub_field('cornice') == true) :
        get_template_part('templates/cornice');
    endif; ?>
    </div>
    <?php $file = preg_replace('/\\.[^.\\s]{3,4}$/', '', get_sub_field('file')); ?>
    <div class="container-player" style="background-image: url(<?php echo $file ?>.jpg)">
        <video poster="<?php echo $file ?>.jpg" class="player" autoplay loop muted>
            <source src="<?php echo $file ?>.mp4" type="video/mp4">
            <source src="<?php echo $file ?>.webm" type="video/webm">
            <source src="<?php echo $file ?>.ogv" type="video/ogv">
        </video>
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
            <div class="icon-play play">PLAY</div>
        </div>
        <div class="container-close">
            <div class="close"><?php _e("CHIUDI", "bspkn") ?></div>
        </div>
    <?php } ?>
</div>