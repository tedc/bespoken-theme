<?php
	function close($ngClick) {
		echo '<span class="btn close" ng-clic="'.$ngClick.'"><span class="btn-line"></span><span class="btn-line"></span></span>';
	}

	function carousel($q, $el, $mw) { ?>
		<?php
			if($q->have_posts()) : 
		?>
		<div<?php if($q->found_posts > 1) : ?> ng-carousel items="<?php echo $el; ?>" max="<?php echo $q->found_posts; ?>" mousewheel="<?php echo $mw; ?>"<?php endif; ?> class="carousel">
			<div class="carousel-container">
				<div class="carousel-wrapper">
					<?php while($q->have_posts()) : $q->the_post(); ?>
					<?php get_template_part( 'templates/content', 'related' ); ?>
					<?php endwhile; wp_reset_query(); ?>	
				</div>
			</div>
			<?php if($q->found_posts > 1) : ?>
			<nav class="carousel-nav">
				<span class="btn btn-prev" ng-click="move(false)">
					<span class="btn-line">
			            <span class="btn-arrow-up"></span>
			            <span class="btn-arrow-down"></span>
			        </span>
				</span>
				<span class="btn up" ng-click="goToAnchor('#home')">
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
		<?php endif; ?>
	<?php }