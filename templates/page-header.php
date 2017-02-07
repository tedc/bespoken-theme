<?php use Roots\Sage\Titles; ?>
<?php get_template_part('templates/breadcrumbs'); ?>
<?php if(!is_home() && !is_category()) : ?>
<header class="page-header" id="header">
    <?php get_template_part('templates/header', get_field('kind')) ?>
    <div class="container-text-header row-lg" ng-sm trigger-element=".main" trigger-hook="onLeave" duration="120%" to="{y : '-20%'}">
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
<?php else : ?>
<header class="page-header" id="header">
    <?php $cat = is_category() ? true : false; ?>
    <style>
        #page-header-cover {
            background-image:url(<?php get_category_header_image($cat, 'medium') ?>);
        }
        @media screen and (min-width: <?php echo 640/16 ?>em) {
            #page-header-cover {
                background-image: url(<?php get_category_header_image($cat, 'large') ?>);
            }
        }
        @media screen and (min-width: <?php echo 850/16 ?>em) {
            #page-header-cover {
                background-image: url(<?php get_category_header_image($cat, 'full') ?>);
            }
        }
    </style>
    <div class="cover" id="page-header-cover" ng-sm trigger-element=".main" trigger-hook="onLeave" duration="120%" to="{y : '20%'}"></div>
    <div class="container-text-header row-lg" ng-sm trigger-element=".main" trigger-hook="onLeave" duration="120%" to="{y : '-20%'}">
        <div class="text-header">
            <h1 class="title"><?php echo Titles\title(); ?></h1>
        </div>
    </div>
</header>
<?php endif; ?>