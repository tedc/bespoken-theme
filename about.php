<?php
/**
 * Template Name: About
 */
?>
<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/about', 'header'); ?>
  <?php get_template_part('templates/page', 'layout'); ?>
<?php endwhile; ?>