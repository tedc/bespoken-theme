<?php
$jobs = get_sub_field('posizioni');
if ($jobs): ?>
    <div class="grid-12 row-lg">
    <?php foreach ($jobs as $post): ?>
        <?php setup_postdata($post); ?>
        <div class="col-<?php the_sub_field("n_cols") ?> col-jobs" id="job_<?php the_ID(); ?>"
             ng-class="{visible : isJob == <?php the_ID(); ?>}">
            <figure>
                <img src="<?php the_field('icon', $post->ID)["url"] ?>">
            </figure>
            <h3 class="job-title"><?php the_title(); ?></h3>
            <?php the_excerpt(); ?>
            <a href="#" ng-click="$event.preventDefault(); isJob = <?php the_ID(); ?>" class="permalink"></a>
            <div class="job-content">
                <?php the_content() ?>
            </div>
        </div>
    <?php endforeach; ?>
    <?php wp_reset_postdata(); ?>
    </div>
<?php endif; ?>
