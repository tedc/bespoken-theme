<header class="page-header">
	<div class="gradient"></div>
	<h2 class="home-title">
		<span class="home-title-row">
			<span class="home-title-word">
				<?php 
				foreach (explode(' ', strip_tags(get_field('first_row'), '<a>')) as $word) {
					echo $word .'</span> <span class="home-title-word">';
				} ?>
			</span>
		</span><br />
		<span class="home-title-row">
			<span class="home-title-word">
				<?php 
				foreach (explode(' ', strip_tags(get_field('second_row'), '<a>')) as $word) {
					echo $word .'</span> <span class="home-title-word">';
				} ?>
			</span>
		</span><br />
		<span class="home-title-row">
			<span class="home-title-word">
				<?php 
				foreach (explode(' ', strip_tags(get_field('third_row'), '<a>')) as $word) {
					echo $word .'</span> <span class="home-title-word">';
				} ?>
			</span>
		</span>
	</h2>
</header>
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
	</div>
	<?php get_template_part( 'templates/footer', 'content' ); ?>
</div>
