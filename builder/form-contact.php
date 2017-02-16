<form class="form" name="contactForm" ng-submit="onSubmit(contactForm.$valid, '<?php the_permalink(); ?>')">
	<?php get_template_part( 'templates/form', 'fields' ); ?>
</form>