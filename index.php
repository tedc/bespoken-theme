<?php $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
	if($paged == 1) : get_template_part('templates/page', 'header'); endif; ?>

<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

<?php $count = 0; while (have_posts()) : the_post(); ?>
  <?php include(locate_template('templates/content.php', false, false)); ?>
<?php $count++; endwhile; ?>
<?php $one = (get_previous_posts_link() || get_next_posts_link()) ? '' : ' singl-page'; ?>
<nav class="post-navigation row-md<?php echo $one; ?>">
<?php posts_nav_link( '', '<span class="btn btn-prev"><span class="btn-line"><span class="btn-arrow-up"></span><span class="btn-arrow-down"></span></span></span>'.__('Articoli precedenti', 'bspkn'), __('Articoli successivi', 'bspkn') . '<span class="btn"><span class="btn-line"><span class="btn-arrow-up"></span><span class="btn-arrow-down"></span></span></span>' ); ?>
</nav>
