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
			$title .= ' <div class="thumbnail" style="display:inline-block; vertical-align:middle"><img src="'.$img.'" style="height:36px" /></div>';
		}
		if($row['acf_fc_layout']== 'slider') {
			if ($row['tipologia'] == 'immagini') {
                $image = $row['galleria_immagini'][0];
                $src = wp_get_attachment_image_url( $image['id'], 'thumbnail' );
                $title .= ' <div class="thumbnail" style="display:inline-block; vertical-align:middle"><img src="'.$src.'" style="height:36px" /></div>';
			}
			if ($row['tipologia'] == 'testo') {
				$title .= ' Galleria di testo (ie. Manifesto)';
			}
		}
		if($row['acf_fc_layout']== 'video') {
			$file = preg_replace('/\\.[^.\\s]{3,4}$/', '', $row['file']);
			$title .= ' <div class="thumbnail" style="display:inline-block; vertical-align:middle"><img src="'.$file.'.jpg" style="height:36px" /></div>';
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
	if($title === 'Riga') :
		$title = $title . ':';
		if(get_sub_field('colonna')) : foreach(get_sub_field('colonna') as $row) :
		foreach($row['contenuto'] as $row) :	
			if($row['acf_fc_layout'] ===  'testo') {
				if($row['testo'][0]['titolo_precompilato'] && trim($row['testo'][0]['titolo']) =='') {
					$title .= ' '.$row['testo'][0]['titolo_precompilato'];
				} else {
					$title .= ' '.$row['testo'][0]['titolo'];
				}
			} 
			if($row['acf_fc_layout'] === 'immagine') {
				$img = $row['immagine']['sizes']['thumbnail'];
				$title .= ' <div class="thumbnail" style="display:inline-block; vertical-align:middle"><img src="'.$img.'" style="height:36px" /></div>';
			}
			if($row['acf_fc_layout'] === 'slider') {
				if ($row['tipologia'] == 'immagini') {
	                $image = $row['galleria_immagini'][0];
	                $src = wp_get_attachment_image_url( $image['id'], 'thumbnail' );
	                $title .= ' <div class="thumbnail" style="display:inline-block; vertical-align:middle"><img src="'.$src.'" style="height:36px" /></div>';
				}
				if ($row['tipologia'] == 'testo') {
					$title .= ' Galleria di testo (ie. Manifesto)';
				}
			}
			if($row['acf_fc_layout'] === 'video') {
				$file = preg_replace('/\\.[^.\\s]{3,4}$/', '', $row['file']);
				$title .= ' <div class="thumbnail" style="display:inline-block; vertical-align:middle"><img src="'.$file.'.jpg" style="height:36px" /></div>';
			}	
			if($row['acf_fc_layout'] === 'citazoine') {
				$title .= ' Citazione';
			}
		endforeach; endforeach; endif;
	endif;

	return $title;
}

add_filter('acf/fields/flexible_content/layout_title/name=builder', 'builder_acf_flexible_content_layout_title', 10, 4);


function cc_mime_types($mimes) {
  	$mimes['svg'] = 'image/svg+xml';
  	$mimes['mp4|m4v'] = 'video/mp4';
	$mimes['ogv'] = 'video/ogg';
	$mimes['webm'] ='video/webm';
	
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

add_filter('deprecated_constructor_trigger_error', '__return_false');
define("ICL_DONT_LOAD_LANGUAGES_JS", true);
define("ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS", true);
define("ICL_DONT_LOAD_NAVIGATION_CSS ", true);

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );


function favicon() {
	?>
	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon/favicon-16x16.png">
	<link rel="manifest" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/assets/img/favicon/ms-icon-144x144.png">
<?php }

add_action( 'wp_head', 'favicon' );

function na_remove_slug( $post_link, $post, $leavename ) {

    if ( 'servizi' != $post->post_type || 'publish' != $post->post_status ) {
        return $post_link;
    }

    $post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );

    return $post_link;
}
add_filter( 'post_type_link', 'na_remove_slug', 10, 3 );


function gp_parse_request_trick( $query ) {
 
    // Only noop the main query
    if ( ! $query->is_main_query() )
        return;
 
    // Only noop our very specific rewrite rule match
    if ( 2 != count( $query->query ) || ! isset( $query->query['page'] ) ) {
        return;
    }
 
    // 'name' will be set if post permalinks are just post_name, otherwise the page rule will match
    if ( ! empty( $query->query['name'] ) ) {
        $query->set( 'post_type', array( 'post', 'page', 'servizi' ) );
    }
}
add_action( 'pre_get_posts', 'gp_parse_request_trick' );