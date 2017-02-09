<a class="icon-logo" href="<?= esc_url(home_url('/')); ?>"></a>
<a class="btn-menu" href="#" ng-click="$event.preventDefault(); modal('menu', true)" ng-class="{hidden: isModal}" ng-modal>
    <span class="btn-menu-text"><?php _e('Menu', 'bspkn'); ?></span>
	<span class="toggle">
		<span class="toggle-line"></span>
		<span class="toggle-line"></span>
		<span class="toggle-line"></span>
	</span>
</a>
<?php get_template_part( 'templates/modal' ); ?>

