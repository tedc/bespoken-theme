<?php use Roots\Sage\Titles; ?>
<?php get_template_part('templates/breadcrumbs'); ?>
<div class="page-header">
  <?php get_template_part( 'templates/header', get_field('kind'))?>
  <h1><?= Titles\title(); ?></h1>
  <?php if(get_field('sottotitolo')) : ?>
    <h2 class="subtitle"><?php the_field('sottotitolo'); ?></h2>
  <?php endif; ?>
</div>