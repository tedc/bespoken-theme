<?php $users = get_sub_field('utenti') ?>
<?php if( $users ): ?>
<?php foreach( $users as $user ): ?>
<div class="col-<?php the_sub_field("n_cols") ?>">
    <?php var_dump($user) ?>
</div>
<?php endforeach; ?>
<?php endif; ?>
