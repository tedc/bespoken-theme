<?php
$jobs = get_sub_field('posizioni');
if ($jobs): ?>
    <div class="grid-12 row-md jobs">
    <?php foreach ($jobs as $post): ?>
        <?php setup_postdata($post); ?>
        <div class="col-<?php the_sub_field("n_cols") ?> job row" id="job_<?php the_ID(); ?>"
             ng-class="{visible : isJob == <?php the_ID(); ?>}">
            <div class="job-row row">
            <figure>
                <img src="<?php the_field('icon', $post->ID)["url"] ?>">
            </figure>
            <h3 class="job-title"><?php the_title(); ?></h3>
            <?php the_excerpt(); ?>
            <a href="#" ng-click="$event.preventDefault(); isJob = <?php the_ID(); ?>" class="permalink"></a>
            </div>
            <div class="job-content">
                <div class="row">
                    <?php the_content() ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <?php wp_reset_postdata(); ?>
    </div>
<?php endif; ?>
