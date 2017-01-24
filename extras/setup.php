<?php

if (function_exists('acf_add_options_page')) {

    acf_add_options_sub_page(array(

        'page_title' => 'Extra',
        'menu_title' => 'Impostazioni footer tema',
        'parent_slug' => 'themes.php'
    ));
}

function image() {
    add_image_size('grid-img', 685, 400, true);
}

function ng_app($html) {
	$html =  $html . ' class="no-js" ng-app="bspkn"';
	return $html;
}

add_filter( 'language_attributes', 'ng_app', 100 );

register_nav_menus([
    'service_navigation' => __('Servizi', 'bspkn')
  ]);