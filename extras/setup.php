<?php

if (function_exists('acf_add_options_page')) {

    acf_add_options_sub_page(array(

        'page_title' => 'Extra',
        'menu_title' => 'Impostazioni footer tema',
        'parent_slug' => 'themes.php'
    ));
}


function ng_app($html) {
	$html =  $html . ' class="no-js" ng-app="bspkn"';
	return $html;
}

add_filter( 'language_attributes', 'ng_app', 100 );

register_nav_menus([
	'service_navigation' => __('Servizi', 'bspkn')
]);

function my_acf_flexible_content_layout_title( $title, $field, $layout, $i ) {
	$title = '<h4>' . $title . ':'

	if(have_rows('contenuto')) : while(have_rows('contenuto')) : the_row();
		if(get_row_layout() == 'testo') {
			if(!get_sub_field('titolo_precompilato') && trim(get_sub_field('titolo'))!='') {
				$title .= ' '.get_sub_field('titolo_precompilato').'</h4>';
			} else {
				$title .= ' '.get_sub_field('titolo').'</h4>';
			}
		} 
		if(get_row_layout() == 'immagine') {
			$img = get_sub_field('immagine')['sizes']['thumbnail'];
			$title .= ' <div class="thumbnail"><<img src="'.$img.'" style="height:36px" /></div>';
		}
		if(get_row_layout() == 'immagine') {
			$img = get_sub_field('immagine')['sizes']['thumbnail'];
			$title .= ' <div class="thumbnail"><img src="'.$img.'" style="height:36px" /></div>';
		}
		if(get_row_layout() == 'slider') {
			if (get_sub_field('tipologia') == 'immagini') {
                $image = get_sub_field('galleria_immagini')[0];
                $src = wp_get_attachment_image_url( $image['id'], 'thumbnail' );
                $title .= ' <div class="thumbnail"><img src="'.$src.'" style="height:36px" /></div>';
			}
			if (get_sub_field('tipologia') == 'testo') {
				$title .= ' Galleria di testo (ie. Manifesto)'.'</h4>';
			}
		}
		if(get_row_layout() == 'video') {
			$file = preg_replace('/\\.[^.\\s]{3,4}$/', '', get_sub_field('file'));
			$title .= ' <div class="thumbnail"><img src="'.$file.'.jpg" style="height:36px" /></div>';
		}	
		if(get_row_layout() == 'citazoine') {
			$title .= ' Citazione'.'</h4>';
		}
	endwhile; endif;
	// return
	return $title;
	
}

// name
add_filter('acf/fields/flexible_content/layout_title/name=colonna', 'my_acf_flexible_content_layout_title', 10, 4);