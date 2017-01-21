<?php $row = 0; while(have_rows('builder')) : the_row(); ?>
    <div class="grid-12"><?php include(locate_template('builder/' . get_row_layout() . '.php', false, false)); ?></div>
  <?php $row++; endwhile; ?>