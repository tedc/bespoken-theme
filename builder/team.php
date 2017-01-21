<?php $users = get_sub_field('utenti') ?>
<?php if ($users): ?>
    <?php foreach ($users as $user): ?>
        <div class="col-<?php the_sub_field("n_cols") ?> user-col">
            <figure class="user-image">
                <?php
                echo get_avatar($user["user_email"], $size = '500');
                ?>
            </figure>
            <div class="user-details">
                <div class="user-details-name"><?php echo $user["user_firstname"].' '.$user["user_lastname"] ?></div>
                <div class="user-details-social"></div>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
