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
        <div class="cover" id="page-header-cover" ng-sm trigger-element="#header" trigger-hook="onLeave" duration="120%" to="{y : '10%'}" offset="100"></div>
        <div class="container-text-header">
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
    <footer>
        <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </footer>
    <?php comments_template('/templates/comments.php'); ?>
</article>
<?php endwhile; ?>
