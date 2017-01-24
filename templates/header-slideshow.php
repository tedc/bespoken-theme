<div class="slider" ng-slider>
    <ul class="slider-wrapper">
        <?php $images = get_sub_field('galleria_immagini_slideshow'); ?>
        <?php if ($images): ?>
            <?php $n_page = 0;
            foreach ($images as $image): ?>
                <li class="slider-item" ng-class="{current:pos==<?php echo $n_page ?>}">
                    <figure><?php echo wp_get_attachment_image($image["id"], "large"); ?></figure>
                </li>
                <?php $n_page++; endforeach; ?>
            <div class="mask"></div>
        <?php endif ?>
    </ul>
</div>
