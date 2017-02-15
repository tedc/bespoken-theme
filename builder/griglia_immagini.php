<?php $images = get_sub_field('immagini'); ?>
<?php if(is_mobile()) : ?>
<div class="carousel <?php the_sub_field('grid_bg'); ?> row-top" ng-carousel items="2" max="<?php echo count($images) - 1; ?>">
	<div class="carouse-container">
		<div class="carousel-wrapper">
		<?php foreach( $images as $image ): ?>
			<div class="carousel-item">
			    <figure class="image-grid">
			        <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
			    </figure>
			</div>
		<?php endforeach; ?>
		</div>
	</div>
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
</div>
<?php else : ?>
<div class="grid-12 <?php the_sub_field('grid_bg'); ?> row-top">
<?php foreach( $images as $image ): ?>
	<div class="col-<?php the_sub_field("n_cols") ?>">
	    <figure class="image-grid">
	        <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
	    </figure>
	</div>
<?php endforeach; ?>
</div>
<?php endif; ?>