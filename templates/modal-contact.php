<?php 
global $wp;
get_template_part( 'templates/form', 'header' );
$current_url = home_url(add_query_arg(array(),$wp->request)); ?>
<div class="modal-container" ng-class="{visible : isContact}" ng-ps ng-form>
	<form class="form" name="contactForm" ng-submit="onSubmit(contactForm.$valid, '<?php echo $current_url; ?>')">
		<span class="close btn" ng-modal ng-click="modal('contact', false)">
			<span class="btn-line"></span>
			<span class="btn-line"></span>
		</span>
		<?php get_template_part( 'templates/form', 'fields' ); ?>
	</form>
</div>