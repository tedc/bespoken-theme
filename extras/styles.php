<?php
use Roots\Sage\Assets;
function footer_css() {
	wp_enqueue_style('sage/css', Assets\asset_path('styles/main.css'), false, null);
}
//add_action('wp_footer', 'footer_css', 999);
function head_css() { ?>
	<style>
		body { visibility: hidden}
	</style>
<? }
//add_action('wp_head', 'head_css');

function crop_service_images() {
	add_image_size('slider_images', 957, 957, true);
}
add_action('after_setup_theme', 'crop_service_images');