<?php 
$pattern = '/[\w\-]+\.(svg)/';
if (get_sub_field('spaziatura')== '') :
    $padding = 'row-lg';
elseif (get_sub_field('spaziatura') == '0'):
    $padding = get_sub_field('grandezza_spaziatura');
elseif (get_sub_field('spaziatura') == '1'):
    $padding = get_sub_field('grandezza_spaziatura_sopra');
elseif (get_sub_field('spaziatura') == '2'):
    $padding = get_sub_field('grandezza_spaziatura_sotto');
endif;
?>

<?php 
if(preg_match($pattern, get_sub_field('immagine')['url'])) : ?>

<figure class="figure <?php echo get_sub_field('full')? 'full' : 'content'?> <?php echo $padding ?>">
	<img src="<?php echo get_sub_field('immagine')['url']; ?>">
</figure>

<?php else : ?>
<figure class="figure <?php echo get_sub_field('full')? 'full' : 'content'?> <?php echo $padding ?>"<?php if(get_sub_field('full')): ?> style="background-image:url(<?php echo get_sub_field('immagine')['url']; ?>);" ng-sm from="{'background-position' : '50% -200px'}" to="{'background-position' : '50% 0'}" duration="200" trigger-hook="onEnter"<?php endif; ?>>
	<img src="<?php echo get_sub_field('immagine')['url']; ?>">
</figure>

<?php endif; ?>