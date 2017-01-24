<?php
$jobs = get_sub_field('posizioni');
if( $jobs ): ?>
    <?php foreach( $jobs as $post):?>
        <?php setup_postdata($post); ?>
    <div class="col-<?php the_sub_field("n_cols") ?> col-jobs">
            <figure>
                <img src="<?php the_field('icon', $post->ID)["url"]?>">
            </figure>
            <h3 class="job-title"><?php the_title(); ?></h3>
        <span class="job-excerpt"><?php the_excerpt(); ?></span>
    </div>
    <?php endforeach; ?>
    <?php wp_reset_postdata();?>
<?php endif; ?>
