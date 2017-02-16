<?php while (have_posts()) : the_post(); ?>
<article <?php post_class(); ?>>
    <header class="page-header" id="header" ng-sm class-toggle="scrolled" trigger-element="#entry-content" trigger-hook="1" offset="100">
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
        <div class="cover" id="page-header-cover" ng-sm trigger-element="#entry-content" trigger-hook="1" duration="120%" to="{y : '10%'}" offset="150"></div>
        <div class="container-text-header" ng-sm trigger-element="#entry-content" trigger-hook="1" duration="120%" to="{y : '-10%'}" offset="150">
            <div class="text-header">
                <?php the_category(', '); ?>
                <h1 class="entry-title title"><?php the_title(); ?></h1>
                <?php get_template_part('templates/entry-meta'); ?>
            </div>
        </div>
    </header>
    <div class="entry-content content" id="entry-content">
        <figure class="post-author">
            <?php $imgId = get_field('avatar', 'user_'.$post->post_author);
                    if($imgId) {
                        $img = wp_get_attachment_image($imgId, 'medium', false, array('class' => 'avatar')); 
                        echo $img;
                    } else {
                        echo get_avatar(get_the_author_meta('user_email', $post->post_author), $size = 240);
                    } ?>
            <figcaption><?php the_author_meta( 'user_firstname', $post->post_author); ?> <?php the_author_meta( 'user_lastname', $post->post_author); ?></figcaption>
        </figure>
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