<?php $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
	if($paged == 1) : get_template_part('templates/page', 'header'); endiif; ?>

<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

<?php $count = 0; while (have_posts()) : the_post(); ?>
  <?php include(locate_template('templates/content.php', false, false)); ?>
<?php $count++; endwhile; ?>

<?php the_posts_navigation(); ?>
