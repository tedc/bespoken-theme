<?php

if (function_exists('acf_add_options_page')) {

    acf_add_options_sub_page(array(

        'page_title' => 'Extra',
        'menu_title' => 'Impostazioni footer tema',
        'parent_slug' => 'themes.php'
    ));
}

function ng_app($html) {
	return $html . ' ng-app="bspkn"';
}

add_filter( 'language_attributes' );