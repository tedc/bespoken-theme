<div class="modal-container modal-container-menu" ng-class="{visible : isMenu}" ng-ps>
	<div class="gradient"></div>
	<div class="menu iscroll-scroller">
		<?php close('isModal=false;isMenu=false'); ?>
		<?php
			wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'menu_id' => 'main-menu']);
			wp_nav_menu(['theme_location' => 'service_navigation', 'menu_class' => 'nav', 'items_wrap' => '<ul id="%1$s" class="%2$s"><li class="title">'.__('I nostri servizi').'</li>%3$s</ul>', 'menu_id' => 'service-menu']);
		?>
		</div>
</div>