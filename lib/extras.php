<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Setup;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  // Add class if sidebar is active
  if (Setup\display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return ' &hellip;<br/><a class="btn-complete" href="' . get_permalink() . '"><span class="label emphasis">' . __('Leggi tutto', 'bspkn') . '</span><span class="btn"><span class="btn-line"><span class="btn-arrow-up"></span><span class="btn-arrow-down"></span></span></a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');
