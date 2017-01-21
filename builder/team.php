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
                <?php var_dump($user); ?>
                <div class="user-details-name"><?php echo $user["user_firstname"].' '.$user["user_lastname"] ?></div>
                <nav class="user-details-social">
                    <a class="icon-linkedin" href="<?php $user["user_url"]; ?>"></a>
                    <a class="icon-facebook" href="<?php the_author_meta( 'facebook',  $user["ID"] ); ?>"></a>
                    <a class="icon-twitter" href="<?php the_author_meta( 'twitter',  $user["ID"] ); ?>"></a>
                    <a class="icon-instagram" href="<?php the_author_meta( 'google',  $user["ID"] ); ?>"></a>
                </nav>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
