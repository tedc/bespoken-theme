<div  ng-carousel ng-mouse-wheel-up="move(false)" ng-mouse-wheel-down="move(true)">
	<div class="carousel-wrapper">
		<div class="grid-12">
			<div class="col-4 carousel-item">
			</div>
			<div class="col-4 carousel-item alt">
			</div>
			<div class="col-4 carousel-item">
			</div>
			<div class="col-4 carousel-item alt">
			</div>
			<div class="col-4 carousel-item">
			</div>
			<div class="col-4 carousel-item alt">
			</div>
		</div>
	</div>
	<nav class="carousel-nav">
		<span class="prev" ng-click="move(false)">
		prima
		</span>
		<span class="prev" ng-click="move(true)">
		dopo
		</span>
	</nav>
</div>
