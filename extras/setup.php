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

function column_acf_flexible_content_layout_title( $title, $field, $layout, $i ) {
	$title = $title . ':';

	if(get_sub_field('contenuto')) : foreach(get_sub_field('contenuto') as $row) :
		if($row['acf_fc_layout'] == 'testo') {
			if($row['testo'][0]['titolo_precompilato'] && trim($row['testo'][0]['titolo'])=='') {
				$title .= ' '.$row['testo'][0]['titolo_precompilato'];
			} else {
				$title .= ' '.$row['testo'][0]['titolo'];
			}
		} 
		if($row['acf_fc_layout']== 'immagine') {
			$img = $row['immagine']['sizes']['thumbnail'];
			$title .= ' <div class="thumbnail" style="display:inline-block;"><img src="'.$img.'" style="height:36px" /></div>';
		}
		if($row['acf_fc_layout']== 'slider') {
			if ($row['tipologia'] == 'immagini') {
                $image = $row['galleria_immagini'][0];
                $src = wp_get_attachment_image_url( $image['id'], 'thumbnail' );
                $title .= ' <div class="thumbnail" style="display:inline-block;"><img src="'.$src.'" style="height:36px" /></div>';
			}
			if ($row['tipologia'] == 'testo') {
				$title .= ' Galleria di testo (ie. Manifesto)';
			}
		}
		if($row['acf_fc_layout']== 'video') {
			$file = preg_replace('/\\.[^.\\s]{3,4}$/', '', $row['file']);
			$title .= ' <div class="thumbnail" style="display:inline-block;"><img src="'.$file.'.jpg" style="height:36px" /></div>';
		}	
		if($row['acf_fc_layout']== 'citazoine') {
			$title .= ' Citazione';
		}
	endforeach; endif;
	// return
	return $title;
	
}

// name
add_filter('acf/fields/flexible_content/layout_title/name=colonna', 'column_acf_flexible_content_layout_title', 10, 4);

function builder_acf_flexible_content_layout_title( $title, $field, $layout, $i ) {
	if(get_row_layout() === 'riga') {
		$tite = $title . ':';
		if(have_rows('colonna')) : $row = 0; while(have_rows('colonna')) : the_row();
			if(get_row_layout() ===  'testo') {
			if(get_sub_field('testo')[0]['titolo_precompilato'] && trim(get_sub_field('testo')[0]['titolo'])=='') {
				$title .= ' '.get_sub_field('testo')[0]['titolo_precompilato'];
			} else {
				$title .= ' '.get_sub_field('testo')[0]['titolo'];
			}
		} 
		if(get_row_layout() === 'immagine') {
			$img = get_sub_field('immagine')['sizes']['thumbnail'];
			$title .= ' <div class="thumbnail" style="display:inline-block;"><img src="'.$img.'" style="height:36px" /></div>';
		}
		if(get_row_layout() === 'slider') {
			if (get_sub_field('tipologia') == 'immagini') {
                $image = get_sub_field('galleria_immagini')[0];
                $src = wp_get_attachment_image_url( $image['id'], 'thumbnail' );
                $title .= ' <div class="thumbnail" style="display:inline-block;"><img src="'.$src.'" style="height:36px" /></div>';
			}
			if ($row['tipologia'] == 'testo') {
				$title .= ' Galleria di testo (ie. Manifesto)';
			}
		}
		if(get_row_layout() === 'video') {
			$file = preg_replace('/\\.[^.\\s]{3,4}$/', '', get_sub_field('file'));
			$title .= ' <div class="thumbnail" style="display:inline-block;"><img src="'.$file.'.jpg" style="height:36px" /></div>';
		}	
		if(get_row_layout() === 'citazoine') {
			$title .= ' Citazione';
		}
		$row++; endwhile; endif;
	}

	return $title;
}

add_filter('acf/fields/flexible_content/layout_title/name=builder', 'builder_acf_flexible_content_layout_title', 10, 4);

