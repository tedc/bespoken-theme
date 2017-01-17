<footer class="content-info">
    <section class="intestazione">
        <span class="intestazione-text"><?php the_field('intestazione', 'option'); ?></span>
        <a class="link-cookie"
           href="<?php the_field('link_page_cookie', 'option'); ?>"><?php _e('Cookie e Privacy Policy', 'bspkn') ?></a>
    </section>
    <section class="sub-footer">
        <span class="sub-footer-text"><?php the_field('frase_sub_footer', 'option'); ?></span>
        <a class="btn" href="<?php the_field('contact_page', 'option'); ?>">
            <span class="btn-line">
                <span class="btn-arrow-up"></span>
                <span class="btn-arrow-down"></span>
            </span>
        </a>
    </section>
</footer>
