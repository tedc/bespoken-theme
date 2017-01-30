<?php use Roots\Sage\Titles; ?>
<?php get_template_part('templates/breadcrumbs'); ?>
<header class="page-header about-header" id="header">
    <div class="gradient" ng-sm trigger-element="#header" trigger-hook="onLeave" to="{y : '10%'}" duration="120%"></div>
    <div class="container-text-header" ng-sm trigger-element="#header" trigger-hook="onLeave" duration="120%" to="{y : '-10%'}" offset="100">
        <div class="text-header">
            <h1 class="title">
                <?php _e('Siamo', 'bspkn'); ?>
                <strong class="words" ng-about>
                    <?php while(have_rows('words')) : the_row(); ?>
                    <span class="word"><?php the_sub_field('word'); ?></span>
                    <?php endwhile; ?>
                </strong>
            </h1>
        </div>
    </div>
</header>