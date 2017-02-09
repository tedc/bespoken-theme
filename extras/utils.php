<?php
	function close($ngClick) {
		echo '<span class="btn close" ng-click="'.$ngClick.'"><span class="btn-line"></span><span class="btn-line"></span></span>';
	}

	function carousel($q, $el, $mw, $l = false) { ?>
		<?php
			if($q->have_posts()) : 
		?>
		<div<?php if($q->found_posts > 1) : ?> ng-carousel items="<?php echo $el; ?>" max="<?php echo $q->found_posts; ?>" mousewheel="<?php echo $mw; ?>"<?php endif; ?> class="carousel<?php echo ($l) ? ' closing' : ''; ?>"<?php echo ($l) ? ' id="last-related"' : ''; ?>>
			<?php $sm = ($l) ? ' ng-sm trigger-element="#last-related" class-toggle="pinned" trigger-hook="onLeave"' : ''; ?>
			<div class="carousel-container"<?php echo $sm; ?><?php if($mw == 'true') : ?> msd-wheel="scrollMove($event, $delta, $deltaX, $deltaY)" ng-mouse-wheel-up="scrollMove($event, false)"<?php endif; ?>>
				<div class="carousel-wrapper">
					<?php while($q->have_posts()) : $q->the_post(); ?>
					<?php get_template_part( 'templates/content', 'related' ); ?>
					<?php endwhile; wp_reset_query(); ?>	
				</div>
			</div>
			<?php if($q->found_posts > 1) : ?>
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
		<?php endif; ?>
	<?php }
	function get_category_header_image($term = false, $size = 'full') {
		if($term) : 
			$array = array(
				'cat' => get_queried_object()->term_id,
	        	'posts_per_page' => 1,
	        	'orderby' => 'rand'
			);
		else :
			$array = array(
	        	'posts_per_page' => 1,
	        	'orderby' => 'rand'
	    	);
	    endif;		
	    $post = get_posts($array);
	    $img_id = get_post_thumbnail_id( $post[0]->ID );
	    return wp_get_attachment_image_src( $img_id, $size)[0];
	}