<?php use Roots\Sage\Titles; ?>
<?php get_template_part('templates/breadcrumbs'); ?>
<header class="page-header" id="header">
    <?php get_template_part('templates/header', get_field('kind')) ?>
    <div class="container-text-header">
        <div class="text-header">
            <?php if(get_field('titolo_alternativo')) :?>
            <?php if (get_field('titolo_testata')) : ?>
            <h1 class="title"><?php the_field('titolo_testata'); ?></h1>
            <?php endif; ?>
            <?php else :?>
            <h1 class="title"><?php the_title(); ?></h1>
            <?php endif ?>
            <?php if (get_field('sottotitolo_testata')) : ?>
                <h2 class="subtitle"><?php the_field('sottotitolo_testata'); ?></h2>
            <?php endif; ?>
        </div>
    </div>
</header>