<?php $users = get_sub_field('utenti') ?>
<?php if ($users): ?>
    <div class="grid-12">
    <?php $i = 0;
    foreach ($users as $user): ?>
        <div class="col-<?php the_sub_field("n_cols") ?> user-col" data-position="<?php echo $i ?>">
            <figure class="user-image">
                <?php
                echo get_avatar($user["user_email"], $size = '500');
                ?>
            </figure>
            <div class="mask">
                <div class="user-details">
                    <div
                        class="user-details-name"><?php echo $user["user_firstname"] . ' ' . $user["user_lastname"] ?></div>
                    <nav class="user-details-social">
                        <?php $user_info = get_user_meta($user["ID"]); ?>
                        <?php if ($user["user_url"] != '') : ?>
                            <a class="icon-linkedin" href="<?php echo $user["user_url"]; ?>" target="_blank"></a>
                        <?php endif ?>
                        <?php if ($user_info['facebook'][0] != '') : ?>
                            <a class="icon-facebook" href="<?php echo $user_info['facebook'][0]; ?>"
                               target="_blank"></a>
                        <?php endif ?>
                        <?php if ($user["ID"] != '') : ?>
                            <a class="icon-twitter"
                               href="https://twitter.com/<?php echo get_user_meta('twitter', $user["ID"]); ?>"
                               target="_blank"></a>
                        <?php endif ?>
                        <?php if ($user_info['googleplus'][0] != '') : ?>
                            <a class="icon-instagram" href="<?php echo $user_info['googleplus'][0]; ?>"
                               target="_blank"></a>
                        <?php endif ?>
                    </nav>
                </div>
            </div>
        </div>
        <?php if ($i = 4): $i = 0; endif ?>
        <?php $i++; endforeach; ?>
    </div>
<?php endif; ?>
