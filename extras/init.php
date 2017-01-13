<?php
/**
 * Created by PhpStorm.
 * User: RiMaStInO
 * Date: 13/01/2017
 * Time: 10:20
 */
	$extra_includes = [
        'extras/scripts.php',
        'extras/styles.php',
        'extras/setup.php',
        'extras/utils.php',
    ];

foreach ($extra_includes as $file) {
    if (!$filepath = locate_template($file)) {
        trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
    }

    require_once $filepath;
}
unset($file, $filepath);