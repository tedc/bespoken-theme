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
                <div
                    class="user-details-name"><?php echo $user["user_firstname"] . ' ' . $user["user_lastname"] ?></div>
                <nav class="user-details-social">
                    <?php var_dump($user)?>
                    <?php if ($user["user_url"] != '') : ?>
                        <a class="icon-linkedin" href="<?php echo $user["user_url"]; ?>" target="_blank"></a>
                    <?php endif ?>
                    <?php if (the_author_meta('facebook') != '') : ?>
                        <a class="icon-facebook" href="<?php the_author_meta('facebook', $user["ID"]); ?>" target="_blank"></a>
                    <?php endif ?>
                    <?php if (the_author_meta('twitter') != '') : ?>
                        <a class="icon-twitter"
                           href="https://twitter.com/<?php the_author_meta('twitter', $user["ID"]); ?>" target="_blank"></a>
                    <?php endif ?>
                    <?php if (the_author_meta('google_plus') != '') : ?>
                        <a class="icon-instagram" href="<?php the_author_meta('google_plus', $user["ID"]); ?>" target="_blank"></a>
                    <?php endif ?>
                </nav>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
