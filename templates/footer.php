<footer class="content-info">
  <div class="container">
    <?php dynamic_sidebar('sidebar-footer'); ?>
    <a class="link-cookie" href="<?php the_field('link_page_cookie', 'option'); ?>"><?php _e('Cookie e Privacy Policy', 'bspkn')?></a>
  </div>
    <section class="sub-footer">
      <span class="sub-footer-text"><?php the_field('frase_sub_footer', 'option'); ?></span>
      <a class="btn" href="<?php the_field('contact_page', 'option'); ?>></a>
    </section>

</footer>
