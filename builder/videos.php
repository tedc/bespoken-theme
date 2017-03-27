
<div class="grid-12 bg-dark cases">
	<?php
	$colClass = get_sub_field('video_cols');
	$colClass .= (is_mobile()) ? ' carousel-item' : '';
	$slide = 0; while(have_rows('video')) : the_row(); ?>
			
	<div <?php post_class('col-'.$colClass); ?>">
			<?php
	            $pattern = '/embed\/(\w+)\?\w+/';
	            $oembed = get_sub_field('video_embed');
	            $iframe = preg_match($pattern, $oembed, $matches);
			?>
			<div class="video row-md">
			<div class="container-player" ng-player player="<?php echo $matches[1]; ?>">
	        <img class="screenshot" src="<?php the_sub_field('screenshot'); ?>">
	        <?php if(get_sub_field('video_title') != '' || get_sub_field('video_subtitle') != '') : ?>
	        <div class="clients row">
	        	<?php if(get_sub_field('video_title') != '') : ?>
	            <h4 class="name col-name"><?php the_sub_field('video_title') ?></h4>
	        	<?php endif; if(get_sub_field('video_subtitle') != '') : ?>
	            <h5 class="company col-company"><?php the_sub_field('video_subtitle') ?></h5>
	        	<?php endif; ?>
	        </div>
	    	<?php endif; ?>
	        <?php if (get_sub_field('video_embed') != "") { ?>       
	        <div class="video-foreground" style="background-image: url(<?php the_sub_field('screenshot'); ?>)" ng-class="{visible:isStarted}">
	            <youtube-video id="player_<?php echo $slide; ?>" video-id="video.id" player-vars="video.vars" player="video.player" ng-class="{visible: isPlaying}"></youtube-video>
	            <?php close('isPlaying=false;isStarted=false;video.player.stopVideo()'); ?> 
	            <div class="controls">
	                <div class="buttons">
	                    <span class="play-pause" ng-click="playPause(video.player)" ng-class="{playing: !isPaused}"></span>
	                    <span class="fs" title="<?php _e('Full screen', 'bspkn'); ?>" ng-click="fulScreen('player_<?php echo $slide; ?>')"></span>
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
	</div>
	<?php $slide++; endwhile;  ?>
</div>