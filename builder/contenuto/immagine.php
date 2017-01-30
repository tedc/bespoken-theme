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
<?php $size = (get_sub_field('immagine')['height'] * 100) / get_sub_field('immagine')['width']; ?>
<figure class="figure <?php echo get_sub_field('full')? 'full' : 'content'?> <?php echo $padding ?>"<?php get_sub_field('full'): ?> style="background-image:url(<?php get_sub_field('immagine')['url']; ?>; padding-top: <?php echo $size; ?>%" ng-sm from="{'background-position' : '50% -100%'}" to="{'background-position' : '50% 100%'}" duration="200%" trigger-hook="onEnter"<?php endif; ?>>
	<img src="<?php echo get_sub_field('immagine')['url']; ?>">
</figure>

<?php endif; ?>