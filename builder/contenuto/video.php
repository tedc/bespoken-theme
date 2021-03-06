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

    <?php if (get_sub_field('cornice') == true) :
        get_template_part('templates/cornice');
    endif; ?>
    <?php $oembed = get_sub_field('video_embed'); $file = preg_replace('/\\.[^.\\s]{3,4}$/', '', get_sub_field('file')); ?>
    <div class="container-player" style="background-image: url(<?php echo $file ?>.jpg)">
        <video poster="<?php echo $file ?>.jpg" class="player" ng-video loop muted<?php echo (get_sub_field('video_embed') != "") ? ' ng-mouseenter="playVideo(true)" ng-mouseleave="playVideo(false)"' : ''; ?>>
            <source src="<?php echo $file ?>.mp4" type="video/mp4">
            <source src="<?php echo $file ?>.webm" type="video/webm">
            <source src="<?php echo $file ?>.ogv" type="video/ogv">
        </video>
        <?php if (get_sub_field('video_embed') != "") { ?>
        <div class="video-foreground">
            <?php $oembed = get_sub_field('video_embed');
            echo $oembed; ?>
        
             <span class="icon-play play"></span>
            <?php close('isModal=false;isMenu=false'); ?>
        </div>
        <?php } ?>
    </div>
</div>