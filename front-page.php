<div ng-carousel ng-mouse-wheel-up="scroll(true, 5)" ng-mouse-wheel-down="scroll(false, 5)" items="3">
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
	<nav class="carousel-nav">
		<span ng-click="move(true, 6)">prima</span>
		<span ng-click="move(false, 6)">dopo</span>
	</nav>
</div>
