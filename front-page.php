<section class="home-page" ng-anchors>
	<header class="page-header" id="header" ng-mouse-wheel-down="scrollToAnchor('#home')">
		<div class="gradient"></div>
		<h2 class="home-title" ng-split-title kind="home">
			<span class="home-title-row">
				<?php echo strip_tags(get_field('first_row'), '<a>'); ?>
			</span><br />
			<span class="home-title-row">
				<?php echo strip_tags(get_field('second_row'), '<a>'); ?>
			</span><br />
			<span class="home-title-row">
				<?php echo strip_tags(get_field('third_row'), '<a>'); ?>
			</span>
		</h2>
		<span class="btn" ng-click="goToAnchor('#home')">
			<span class="btn-text"><?php _e('Scorri', 'bspkn'); ?></span>
		</span>
	</header>
	<div id="home" class="home-container">
		<?php 
			$query = new WP_Query(
				array(
					'post_type' => 'servizi',
					'posts_per_page' => -1,
					'order_by' => 'menu_order'
				)
			); ?>
		<?php carousel($query); ?>
		<?php get_template_part( 'templates/footer', 'content' ); ?>
	</div>
</section>
