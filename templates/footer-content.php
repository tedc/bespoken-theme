<footer class="footer">
    <?php the_field('intestazione', 'option'); ?>
    <a class="link-cookie" href="<?php the_field('link_page_cookie', 'option'); ?>"><?php _e('Cookie e Privacy Policy', 'bspkn') ?></a>
</footer>
<nav class="cat" ng-sm trigger-element="#header" trigger-hook="onLeave" to="{y : '0%'}" offset="70">
    <span class="cat-text"><?php the_field('frase_sub_footer', 'option'); ?></span>
    <span class="btn" ng-click="modal(isContact, contact)" ng-modal>
        <span class="btn-line">
            <span class="btn-arrow-up"></span>
            <span class="btn-arrow-down"></span>
        </span>
    </span>
</nav>