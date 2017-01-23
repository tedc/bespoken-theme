<footer class="footer">
    <?php the_field('intestazione', 'option'); ?>
    <a class="link-cookie" href="<?php the_field('link_page_cookie', 'option'); ?>"><?php _e('Cookie e Privacy Policy', 'bspkn') ?></a>
</footer>
<nav class="cat">
    <span class="cat-text"><?php the_field('frase_sub_footer', 'option'); ?></span>
    <a class="btn" href="<?php the_field('contact_page', 'option'); ?>">
        <span class="btn-line">
            <span class="btn-arrow-up"></span>
            <span class="btn-arrow-down"></span>
        </span>
    </a>
</nav>