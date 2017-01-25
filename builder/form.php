<form class="form" name="jobForm" ng-submit="onSubmit(jobForm.$valid)">
	<?php close('isModal=false;isContact=false'); ?>
	<div class="form-content row-lg">
		<div class="content">
			<?php the_sub_field('testo'); ?>
			<a href="https://www.facebook.com/bspkn.studio/" class="icon-facebook"></a>
			<a href="https://www.linkedin.com/company/10485978" class="icon-linkedin"></a>
		</div>
	</div>
	<div class="form-inputs row-lg">
		<div class="form-col">
			<div class="form-row">
				<input type="text" name="sender" placeholder="<?php _e('Nome e cognome', 'bspkn'); ?>" ng-model="sender">
			</div>
			<div class="form-row">
				<input type="email" name="email" required placeholder="<?php _e('Indirizzo email (richiesto)', 'bspkn'); ?>" ng-model="email">
			</div>
			<div class="form-row">		
				<input type="tel" name="tel" required placeholder="<?php _e('Telefono (richiesto)', 'bspkn'); ?>" ng-model="tel">
			</div>
			<div class="form-uload">

			</div>
		</div>
		<div class="form-col">
			<div class="form-row">
				<textarea name="message" placeholder="<?php _e('Messaggio', 'bspkn'); ?>" ng-model="message"></textarea>
			</div>
			<button class="btn-send" ng-disabled="jobForm.$invalid && !isPrivacyJob">
				<?php _e('Invia', 'bspkn'); ?>
				<span class="btn">
					<span class="btn-line">
						<span class="btn-arrow-up"></span>
						<span class="btn-arrow-down"></span>
					</span>
				</span>
			</button>
		</div>
		<div class="acceptance">
			<input type="checkbox" name="privacy" id="privacyJob" checked="checked">
			<label for="privacyJob" class="form-label" ng-click="isPrivacyJob = !isPrivacyJob">
				<span class="check">
					<span class="check-text">
						<?php _e('Sì', 'bspkn'); ?>
					</span>
					<span class="check-text">
						<?php _e('No', 'bspkn'); ?>
					</span>
					<i class="cursor"></i>
				</span>
				<span class="form-label-text">
					<?php _e('Autorizzo il trattamento dei dati personali ai sensi del D. lgs. 196/03s', 'bspkn'); ?>
				</span>
			</label>
		</div>
	</div>
</form>