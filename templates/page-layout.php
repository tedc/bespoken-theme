<?php $row = 0; while(have_rows('builder')) : the_row(); ?>
    <?php include(locate_template('builder/' . get_row_layout() . '.php', false, false)); ?>
  <?php $row++; endwhile; ?>