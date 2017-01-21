<?php $users = get_sub_field('utenti') ?>
<?php if( $users ): ?>
<?php foreach( $users as $user ): ?>
<div class="col-<?php the_sub_field("n_cols") ?>">
    <?php
    echo get_avatar( $user->user_email, $size = '500' );
    ?>
</div>
<?php endforeach; ?>
<?php endif; ?>
