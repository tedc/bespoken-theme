<?php if(is_front_page()) : ?>
	<h1 class="logo">
		<a  href="<?= esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
	</h1>
<?php else : ?>
	<a class="logo" href="<?= esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
<?php endif; ?>
<a class="btn-menu" href="#" ng-click="$event.preventDefault(); isModal=true; isMenu=true;">
    <span class="btn-menu-text" ng-menu-text><?php _e('Menu', 'bspkn'); ?></span>
	<span class="toggle">
		<span class="toggle-line"></span>
		<span class="toggle-line"></span>
		<span class="toggle-line"></span>
	</span>
</a>
<?php get_template_part( 'templates/modal' ); ?>

