<?php $users = get_sub_field('utenti') ?>
<?php if( $users ): ?>
<?php foreach( $users as $user ): ?>
<div class="col-<?php the_sub_field("n_cols") ?> no-padding">
    <figure class="user-image">
    <?php
    echo get_avatar( 'guzzi.mattia@gmail.com', $size = '500' );
    ?>
    </figure>
</div>
<?php endforeach; ?>
<?php endif; ?>
