<?php while ( have_rows('testo') ) : the_row(); ?>
    <?php $align = ((get_sub_field('allineamento_testo') === 'Right') ? 'align-right' : (get_sub_field('allineamento_testo') === 'Center') ? 'align-center' : 'align-left'); ?>
    <h3 class="title <?php echo $align ?>"><?php echo $align ?></h3>
<div class="description <?php echo $align ?>"><?php echo get_sub_field('contenuto') ?></div>
<?php endwhile ?>