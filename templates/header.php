<header class="total-header">
<header class="banner">
  <a class="logo icon-logo" href="<?= esc_url(home_url('/')); ?>">
  </a>
  <div class="menu-container">
    <?php wp_nav_menu( ['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'container_id' => 'menu', 'container_class' => 'menu'] ); ?>
    <a class="btn-header btn-menu" href="#" data-reveal="#menu">
      <span class="btn-header-text"><?php _e('Menu', 'bspkn'); ?></span>
			<span class="toggle" data-close="<?php _e('Chiudi', 'bspkn'); ?>">
				<span class="toggle-line"></span>
				<span class="toggle-line"></span>
				<span class="toggle-line"></span>
			</span>
    </a>
    <?php icl_selector(); ?>
  </div>
</header>
