<?php
            $pattern = '/embed\/(\w+)\?\w+/';
            $oembed = get_sub_field('video_embed');
            $iframe = preg_match($pattern, $oembed, $matches);
?>
<div class="video row-lg dark-bg">
    <div class="container-player">
        <img class="screenshot" src="<?php echo get_sub_field('video') ?>">
        <h3 class="title-video"><?php _e('La parola del cliente', 'bspkn') ?></h3>
        <div class="clients row">
            <h4 class="name"><?php the_sub_field('titolo') ?></h4>
            <h5 class="company"><?php the_sub_field('sottotitolo') ?></h5>
        </div>
        <?php if (get_sub_field('video_embed') != "") { ?>       
        <div class="video-foreground" ng-player player="<?php echo $matches[1]; ?>">
            <youtube-video video-id="player.id" video-vars="player.vars"></youtube-video>
            <?php close('isModal=false;isMenu=false'); ?>   
        </div> 
        <span class="play"></span>        
        <?php } ?>
    </div>
</div>