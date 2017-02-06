<?php
            $pattern = '/embed\/(\w+)\?\w+/';
            $oembed = get_sub_field('video_embed');
            $iframe = preg_match($pattern, $oembed, $matches);
?>
<div class="video row-lg bg-dark" id="video_<?php echo $row; ?>">
    <div class="container-player" ng-player player="<?php echo $matches[1]; ?>">
        <img class="screenshot" src="<?php the_sub_field('video'); ?>">
        <h3 class="title-video" ng-sm from="{y: '120%'}" to="{y : '-120%'}" duration="200%" trigger-hook="onEnter" trigger-element="#video_<?php echo $row; ?>"><?php _e('La parola del cliente', 'bspkn') ?></h3>
        <div class="clients row">
            <h4 class="name"><?php the_sub_field('titolo') ?></h4>
            <h5 class="company"><?php the_sub_field('sottotitolo') ?></h5>
        </div>
        <?php if (get_sub_field('video_embed') != "") { ?>       
        <div class="video-foreground" style="background-image: url(<?php the_sub_field('video'); ?>)" ng-class="{visible:isStarted}">
            <youtube-video video-id="video.id" player-vars="video.vars" player="video.player" ng-class="{visible: isPlaying}"></youtube-video>
            <?php close('isPlaying=false;isStarted=false;video.player.stopVideo()'); ?> 
            <div class="controls">
                <div class="buttons">
                    <span class="play-pause" ng-click="playPause(video.player)" ng-class="{playing: !isPaused}"></span>
                    <span class="fs" title="<?php _e('Full screen', 'bspkn'); ?>" ng-click="fulScreen()"></span>
                </div>
                <div class="status-bar" ng-click="skipTo($event, video.player)">
                    <div class="progress-bar"></div>
                    <div class="progress-mask">
                        <span class="time" ng-bind-html="time" ng-class="{invert: isHalf}"></span>
                    </div>
                </div>
            </div>
        </div> 
        <span class="play" ng-click="isStarted=true;video.player.playVideo()" ng-class="{visible:isReady}"></span>        
        <?php } ?>
    </div>
</div>