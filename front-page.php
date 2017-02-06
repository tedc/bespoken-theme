<section class="home-page">
	<header class="page-header" id="header" ng-sm from="{y: 0, overflow: 'visible'}" to="{y : 60, overflow: 'visible'}" duration="100%" trigger-hook="onLeave" trigger-element=".home-page">
		<div class="gradient" ng-sm to="{y : -60, boxShadow : 'inset 0px -35px 27px -32px rgba(0,0,0,0.52)'}" duration="100%" trigger-hook="onLeave" trigger-element=".home-page"></div>
		<h2 class="home-title" ng-sm from="{y: 0, overflow: 'visible'}" to="{opacity: 0}" duration="100%" trigger-hook="onLeave" offset="50" trigger-element=".home-page">
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
		<span class="btn" ng-click="goToAnchor('#home')" ng-anchors>
			<i class="icon-scroll-mouse"></i>
		</span>
	</header>
	<div id="home" class="home-container">
		<span class="btn up" ng-click="isScrolled=false">
			<span class="btn-line">
	            <span class="btn-arrow-up"></span>
	            <span class="btn-arrow-down"></span>
	        </span>
		</span>		
		<?php 
			$query = new WP_Query(
				array(
					'post_type' => 'servizi',
					'posts_per_page' => -1,
					'order_by' => 'menu_order',
					'post_parent' => 0
				)
			); ?>
		<?php carousel($query, 3, 'true', false); ?>
		<?php get_template_part( 'templates/footer', 'content' ); ?>
	</div>
</section>
