<?php

if (function_exists('acf_add_options_page')) {

    acf_add_options_sub_page(array(
        'page_title' => 'Extra',
        'menu_title' => 'Impostazioni extra del tema',
        'parent_slug' => 'themes.php'
    ));

}