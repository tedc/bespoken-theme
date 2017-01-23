<div id="home" class="home-container">
	<div ng-carousel items="3" max="7" mousewheel="true" class="carousel">
		<div class="carousel-container">
			<div class="carousel-wrapper">
				<div class="carousel-item">
					<a href="#" class="btn"><span class="btn-text"><?php _e('Scopri', 'bspkn'); ?></span></a>
				</div>
				<div class="carousel-item alt">
				</div>
				<div class="carousel-item">
				</div>
				<div class="carousel-item alt">
				</div>
				<div class="carousel-item">
				</div>
				<div class="carousel-item alt">
				</div>
				<div class="carousel-item">
				</div>
			</div>
		</div>
		<nav class="carousel-nav">
			<span ng-click="move(false)">prima</span>
			<span ng-click="move(true)">dopo</span>
		</nav>
	</div>
	<?php get_template_part( 'footer', 'content' ); ?>
</div>
