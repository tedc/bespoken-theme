<?php
$jobs = get_sub_field('posizioni');
$pattern = '/[\w\-]+\.(svg)/';
if ($jobs): ?>
    <div class="grid-12 jobs">
    <?php foreach ($jobs as $post): ?>
        <?php setup_postdata($post); ?>
        <div class="col-<?php the_sub_field('n_cols') ?> job" id="job_<?php the_ID(); ?>"
             ng-class="{visible : isJob == <?php the_ID(); ?>}">
            <div class="job-row row">
            <figure class="job-icon">
            <?php if(preg_match($pattern, get_field('icon', $post->ID))) : ?>
                <?php 
                    $svg = file_get_contents(get_field('icon'));
                    $svg = str_replace('id', 'class="job-image job-svg" id', $svg);
                    echo $svg;
                ?>
            <?php else : ?>
                <img src="<?php the_field('icon', $post->ID) ?>" class="job-image">
                <img src="<?php the_field('icon_white', $post->ID) ?>" class="job-image-overlay">
            <?php endif; ?>
                <span class="btn">
                    <span class="btn-text"><?php _e('Scopri', 'bspkn'); ?></span>
                </span>
            </figure>
            <h3 class="job-title"><?php the_title(); ?></h3>
            <?php the_excerpt(); ?>
            <a href="#" ng-click="$event.preventDefault(); (isJob != <?php the_ID(); ?>) ? isJob = <?php the_ID(); ?> : isJob = false" class="permalink"></a>
            </div>
            <div class="job-content">
                <?php close('isJob=false;'); ?>
                <div class="row">
                    <?php the_content() ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <?php wp_reset_postdata(); ?>
    </div>
<?php endif; ?>
