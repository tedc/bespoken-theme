<a class="logo icon-logo" href="<?= esc_url(home_url('/')); ?>"></a>
<a class="btn-menu" href="#" ng-click="openMenu">
    <span class="btn-menu-text" ng-menu-text><?php _e('Menu', 'bspkn'); ?></span>
	<span class="toggle">
		<span class="toggle-line"></span>
		<span class="toggle-line"></span>
		<span class="toggle-line"></span>
	</span>
</a>
<?php get_template_part( 'templates/modal' ); ?>

