<?php while (have_rows('colonna')) : the_row(); ?>
    <?php while (have_rows('contenuto')) : the_row(); ?>
        <div class="prova"></div>
        
    <?php endwhile ?>
<?php endwhile; ?>