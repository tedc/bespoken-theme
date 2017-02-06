
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
		
		while($query->have_posts()) : $query->the_post(); ?>
		<div <?php post_class('col-'.$colClass . ' content row-lg'); ?>">
			<div class="cover" style="background: url(<?php the_post_thumbnail_url('large'); ?>)"></div>
			<?php if(preg_match($pattern, get_field('icon', get_the_ID()))) : ?>
<?php 
                    $svg = file_get_contents(get_field('icon'));
                    $svg = str_replace('id', 'class="case-svg" id', $svg);
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
<?php else : ?>
<div class="video-carousel video bg-dark" ng-carousel items="1" max="<?php echo $query->found_posts; ?>">
	<div class="carousel-wrapper">
	<?php 
		
		while($query->have_posts()) : $query->the_post(); ?>
		<div class="carouse-item">
		<?php while(have_rows('builder')) : the_row(); ?>
		<?php if(get_row_layout() == 'intervista') : ?>
		<?php
            $pattern = '/embed\/(\w+)\?\w+/';
            $oembed = get_sub_field('video_embed');
            $iframe = preg_match($pattern, $oembed, $matches);
		?>	
		<div class="container-player" ng-player player="<?php echo $matches[1]; ?>">
        <img class="screenshot" src="<?php the_sub_field('video'); ?>">
        <?php echo $row; ?>"><?php _e('La parola del cliente', 'bspkn') ?></h3>
        <div class="clients row">
            <h4 class="name"><?php the_sub_field('titolo') ?></h4>
            <h5 class="company"><?php the_sub_field('sottotitolo') ?></h5>
        </div>
        <?php if (get_sub_field('video_embed') != "") { ?>       
        <div class="video-foreground" style="background-image: url(<?php the_sub_field('video'); ?>)" ng-class="{visible:isStarted}">
            <youtube-video id="player_<?php echo $row; ?>" video-id="video.id" player-vars="video.vars" player="video.player" ng-class="{visible: isPlaying}"></youtube-video>
            <?php close('isPlaying=false;isStarted=false;video.player.stopVideo()'); ?> 
            <div class="controls">
                <div class="buttons">
                    <span class="play-pause" ng-click="playPause(video.player)" ng-class="{playing: !isPaused}"></span>
                    <span class="fs" title="<?php _e('Full screen', 'bspkn'); ?>" ng-click="fulScreen('player_<?php echo $row; ?>')"></span>
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
		<?php endif; ?>
		<?php endwhile; ?>
		</div>
		<?php endwhile; ?>
		<?php if($query->found_posts > 1) : ?>
		<nav class="carousel-nav">
			<span class="btn btn-prev" ng-click="move(false)">
				<span class="btn-line">
		            <span class="btn-arrow-up"></span>
		            <span class="btn-arrow-down"></span>
		        </span>
			</span>
			<span class="btn btn-next" ng-click="move(true)">
				<span class="btn-line">
		            <span class="btn-arrow-up"></span>
		            <span class="btn-arrow-down"></span>
		        </span>
			</span>
		</nav>
		<?php endif; ?>
	</div>
</div>
<?php endif; ?>