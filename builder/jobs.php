<?php
$jobs = get_sub_field('posizioni');
if( $jobs ): ?>
    <?php foreach( $jobs as $job):?>
        <?php setup_postdata($job); ?>
    <div class="col-<?php the_sub_field("n_cols") ?>">
            <figure>
                <img src="<?php get_sub_field('icon')['url'] ?>">
            </figure>
            <?php the_title(); ?>
    </div>
    <?php endforeach; ?>
    <?php wp_reset_postdata();?>
<?php endif; ?>
