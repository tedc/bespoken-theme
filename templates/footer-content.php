<footer class="footer">
    <?php the_field('intestazione', 'option'); ?>
    <a class="link-cookie" href="<?php the_field('link_page_cookie', 'option'); ?>"><?php _e('Cookie e Privacy Policy', 'bspkn') ?></a>
</footer>
<nav class="cat" ng-sm trigger-element=".main" trigger-hook="onLeave" class-toggle="visible" offset="70" ng-click="modal('contact', true)" ng-modal>
    <span class="cat-text"><?php the_field('frase_sub_footer', 'option'); ?></span>
    <span class="btn">
        <span class="btn-line">
            <span class="btn-arrow-up"></span>
            <span class="btn-arrow-down"></span>
        </span>
    </span>
</nav>