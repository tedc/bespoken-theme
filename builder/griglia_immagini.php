<?php $images = get_sub_field('immagini'); ?>
<?php foreach( $images as $image ): ?>
<div class="col-<?php the_sub_field("n_cols") ?>">
    <figure class="image-grid">
        <?php var_dump($image['sizes'])?>
        <?php var_dump($image)?>
        <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
    </figure>
</div>
<?php endforeach; ?>