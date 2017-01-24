<div class="modal-container" ng-class="{visible : isMenu}">
	<div class="gradient"></div>
	<?php close('isModal=false;isMenu=false'); ?>
	<?php
		wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav',]);
		wp_nav_menu(['theme_location' => 'service_navigation', 'menu_class' => 'nav', 'items_wrap' => '<ul id="%1$s" class="%2$s"><li class="title">'.__('I nostri servizi').'</li>%3$s</ul>']);
	?>
</div>