<?php $users = get_sub_field('utenti') ?>
<?php if( $users ): ?>
<?php foreach( $users as $user ): ?>
<div class="col-<?php the_sub_field("n_cols") ?>">
    <?php $user["user_avatar"]?>
</div>
<?php endforeach; ?>
<?php endif; ?>
