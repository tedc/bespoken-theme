<style>
    .cover {
        background-image:url(<?php the_post_thumbnail_url('medium') ?>);
        @media screen and (min-width: <?php echo 850/16 ?>em) {
            background-image:url(<?php the_post_thumbnail_url('large') ?>);
        }
    }
</style>
<div class="cover"<!-- style="background-image:url(<?php /*the_post_thumbnail_url() */?>)"-->></div>