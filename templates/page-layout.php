<?php 
	$row = 0;
	$count_row = count(get_field('builder')) - 1;
	print_r($count_row);
	while(have_rows('builder')) : the_row(); ?>
    <?php include(locate_template('builder/' . get_row_layout() . '.php', false, false)); ?>
 <?php $row++; endwhile; ?>