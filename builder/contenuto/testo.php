<?php while ( have_rows('testo') ) : the_row(); ?>
<h3 class="title"><?php echo get_sub_field('titolo') ?></h3>
<div class="description"><?php echo get_sub_field('contenuto') ?></div>
<?php endwhile ?>