<?php

if (function_exists('acf_add_options_page')) {

    acf_add_options_sub_page(array(
        'page_title' => 'Extra',
        'menu_title' => 'Impostaioni extra del tema',
        'parent_slug' => 'themes.php'
    ));

}