<form class="form" name="contactForm" ng-submit="onSubmit(contactForm.$valid, '<?php echo $current_url; ?>')" ng-form>
	<?php get_template_part( 'templates/form', 'fields' ); ?>
</form>