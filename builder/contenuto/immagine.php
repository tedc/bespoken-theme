<?php if (get_sub_field('spaziatura')== '') :
    $padding = 'row-lg';
elseif (get_sub_field('spaziatura') == '0'):
    $padding = get_sub_field('grandezza_spaziatura');
elseif (get_sub_field('spaziatura') == '1'):
    $padding = get_sub_field('grandezza_spaziatura_sopra');
elseif (get_sub_field('spaziatura') == '2'):
    $padding = get_sub_field('grandezza_spaziatura_sotto');
endif;?>


<figure class="figure <?php echo get_sub_field('full')? 'full' : 'content'?> <?php echo $padding ?>">
    <img src="<?php the_sub_field('immagine'); ?>">
</figure>
<!--
<?php /*$src = get_sub_field('immagine'); */?>
<figure class="figure <?php /*echo get_sub_field('full')? 'full' : 'content'*/?> <?php /*echo $padding */?>" style="background-image:url('<?php /*echo $src */?>')";>
    <img src="<?php /*echo $src */?>">
</figure>-->