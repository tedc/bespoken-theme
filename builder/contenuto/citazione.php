<?php if (get_sub_field('spaziatura')== '') :
    $padding = 'row-lg';
elseif (get_sub_field('spaziatura') == '0'):
    $padding = get_sub_field('grandezza_spaziatura');
elseif (get_sub_field('spaziatura') == '1'):
    $padding = get_sub_field('grandezza_spaziatura_sopra');
elseif (get_sub_field('spaziatura') == '2'):
    $padding = get_sub_field('grandezza_spaziatura_sotto');
endif;?>

<blockquote class="quote <?php echo get_sub_field('full')? 'full' : 'content'?>" ng-sm from="{y : 100}" to="{y : -200}" duration="400%" trigger-hook="onEnter" trigger-element="#content_row_<?php echo $row; ?>">
    <?php echo get_sub_field('testo') ?>
</blockquote>
