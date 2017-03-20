
<?php 
$pattern = '/[\w\-]+\.(svg)/';
$query = new WP_Query(
			array(
				'post_type' => 'lavori',
				'post__in' => get_sub_field('cases'),
				'posts_per_page' => count(get_sub_field('cases'))
			)
		);
if(get_sub_field('case_kind') == 0) : ?>
	<?php $colClass = get_sub_field('cols'); ?>
	<div class="grid-12 alternate cases">
		<?php 
		$colClass .= (is_mobile()) ? ' carousel-item' : '';
		while($query->have_posts()) : $query->the_post();
		 ?>
		<div <?php post_class('col-'.$colClass . ' content row-lg'); ?>">
			<div class="cover" style="background-image: url(<?php the_post_thumbnail_url('large'); ?>)"></div>
			<?php if(preg_match($pattern, get_field('icon', get_the_ID()))) : ?>
<?php 
                    $svg = file_get_contents(get_field('icon')); 
                    $svg = preg_replace('/(<[^>]+) id=".*?"/', '$1', $svg);
                    $svg = preg_replace('/(<[^>]+) data-name=".*?"/', '$1', $svg);
                    $svg = preg_replace('/(w*)?<title>[^>]+<\/title>(w*)?/i', '', $svg);
                    $svg = str_replace('<svg', '<svg class="case-svg" id', $svg);
                    echo $svg;
                ?>
            <?php else : ?>
            <figure class="case-figure">
	          	<img src="<?php the_field('icon', $post->ID) ?>" class="case-image">
	            <img src="<?php the_field('icon_white', $post->ID) ?>" class="case-image-overlay">
            </figure>
            <?php endif; ?>
            <span class="btn">
                <span class="btn-text"><?php _e('Scopri', 'bspkn'); ?></span>
            </span>
            <a href="<?php the_permalink(); ?>"></a>	
		</div>
		<?php endwhile; wp_reset_query(); ?>
	</div>
<?php else : 
if(get_sub_field('cols')) : 
?>
<div class="grid-12 alternate cases">
	<?php
	$colClass = get_sub_field('cols');
	$colClass .= (is_mobile()) ? ' carousel-item' : get_sub_field('cols');
	$slide = 0; while($query->have_posts()) : $query->the_post();
	 ?>
	<div <?php post_class('col-'.$colClass); ?>">
		<?php while(have_rows('builder')) : the_row(); ?>
			<?php if(get_row_layout() == 'intervista') : ?>
			<?php
	            $pattern = '/embed\/(\w+)\?\w+/';
	            $oembed = get_sub_field('video_embed');
	            $iframe = preg_match($pattern, $oembed, $matches);
			?>
			<div class="video">
			<div class="container-player" ng-player player="<?php echo $matches[1]; ?>">
	        <img class="screenshot" src="<?php the_sub_field('video'); ?>">
	        <div class="clients row">
	            <h4 class="name"><?php the_sub_field('titolo') ?></h4>
	            <h5 class="company"><?php the_sub_field('sottotitolo') ?></h5>
	        </div>
	        <?php if (get_sub_field('video_embed') != "") { ?>       
	        <div class="video-foreground" style="background-image: url(<?php the_sub_field('video'); ?>)" ng-class="{visible:isStarted}">
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
	            <a class="btn more" href="<?php the_permalink(); ?>" ng-class="{visible: isEnded}"><span class="btn-text"><?php _e('Scopri', 'bspkn'); ?></span></a>
	        </div>
	        <span class="play" ng-click="isStarted=true;video.player.playVideo()" ng-class="{visible:isReady}"></span>        
	        <?php } ?>
	    	</div>
	    	</div>
		<?php endif; endwhile; ?>
	</div>
	<?php $slide++; endwhile; wp_reset_query(); ?>
</div>
<?php else : ?>
<div class="video-carousel video bg-dark row-lg" ng-carousel items="1" max="<?php echo $query->found_posts; ?>" mousewheel="false">
	<div class="carousel-container">
		<div class="carousel-wrapper">
		<?php $slide = 0; while($query->have_posts()) : $query->the_post(); ?>
			<?php while(have_rows('builder')) : the_row(); ?>
			<?php if(get_row_layout() == 'intervista') : ?>
			<div class="carousel-item">
				<?php
		            $pattern = '/embed\/(\w+)\?\w+/';
		            $oembed = get_sub_field('video_embed');
		            $iframe = preg_match($pattern, $oembed, $matches);
				?>	
				<div class="container-player" ng-player player="<?php echo $matches[1]; ?>">
		        <img class="screenshot" src="<?php the_sub_field('video'); ?>">
		        <div class="clients row">
		            <h4 class="name"><?php the_sub_field('titolo') ?></h4>
		            <h5 class="company"><?php the_sub_field('sottotitolo') ?></h5>
		        </div>
		        <?php if (get_sub_field('video_embed') != "") { ?>       
		        <div class="video-foreground" style="background-image: url(<?php the_sub_field('video'); ?>)" ng-class="{visible:isStarted}">
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
		            <a class="btn more" href="<?php the_permalink(); ?>" ng-class="{visible: isEnded}"><span class="btn-text"><?php _e('Scopri', 'bspkn'); ?></span></a>
		        </div>
		        <span class="play" ng-click="isStarted=true;video.player.playVideo()" ng-class="{visible:isReady}"></span>        
		        <?php } ?>
		    	</div>
			</div>
			<?php endif; ?>
			<?php endwhile;?>
			<?php $slide++; endwhile; wp_reset_query();  ?>
		</div>
	</div>
	<?php if($query->found_posts > 1) : ?>
			<nav class="carousel-nav">
				<span class="btn btn-prev" ng-click="move(false)" ng-class="{inactive : !isPrev}">
					<span class="btn-line">
			            <span class="btn-arrow-up"></span>
			            <span class="btn-arrow-down"></span>
			        </span>
				</span>
				<span class="btn btn-next" ng-click="move(true)" ng-class="{inactive : !isNext}">
					<span class="btn-line">
			            <span class="btn-arrow-up"></span>
			            <span class="btn-arrow-down"></span>
			        </span>
				</span>
			</nav>
			<?php endif; ?>
</div>
<?php endif; endif; ?>