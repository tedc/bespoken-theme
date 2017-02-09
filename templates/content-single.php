<?php while (have_posts()) : the_post(); ?>
<article <?php post_class(); ?>>
    <header class="page-header" id="header">
        <style>
        #page-header-cover {
            background-image:url(<?php the_post_thumbnail_url('medium') ?>);
        }
        @media screen and (min-width: <?php echo 640/16 ?>em) {
            #page-header-cover {
                background-image: url(<?php the_post_thumbnail_url('large') ?>);
            }
        }
        @media screen and (min-width: <?php echo 850/16 ?>em) {
            #page-header-cover {
                background-image: url(<?php the_post_thumbnail_url('full') ?>);
            }
        }
        </style>
        <?php get_template_part('templates/breadcrumbs'); ?>
        <div class="cover" id="page-header-cover" ng-sm trigger-element="#header" trigger-hook="onLeave" duration="120%" to="{y : '10%'}" offset="100"></div>
        <div class="container-text-header" ng-sm trigger-element="#header" trigger-hook="onLeave" duration="120%" to="{y : '-10%'}" offset="100">
            <div class="text-header">
                <?php the_category(', '); ?>
                <h1 class="entry-title title"><?php the_title(); ?></h1>
                <?php get_template_part('templates/entry-meta'); ?>
            </div>
        </div>
    </header>
    <div class="entry-content content row-lg">
        <?php the_content(); ?>
    </div>
    <?php comments_template('/templates/comments.php'); ?>
</article>
<?php endwhile; ?>
<?php 
    $ids = array();
    $prev_post = get_previous_post();
    $next_post = get_next_post();
    if(!empty($prev_post))
        array_push($ids, $prev_post->ID);
    if(!empty($next_post))
        array_push($ids, $next_post->ID);
    $q = new WP_Query(
        array(
            'post__in' => $ids
        )
    );
    carousel($q, 3, 'false', true); ?>