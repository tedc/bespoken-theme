<style>
    #page-header-cover {
        background-image:url(<?php the_post_thumbnail_url('medium') ?>);
    }
    @media screen and (min-width: <?php echo 640/16 ?>em) {
        #page-header-cover {
            background-image: url(<?php the_post_thumbnail_url('large') ?>);
        }
    }
    @media screen and (min-width: <?php echo 850/16 ?>em) {
        #page-header-cover {
            background-image: url(<?php the_post_thumbnail_url('full') ?>);
        }
    }
</style>
<div class="cover" id="page-header-cover"></div>