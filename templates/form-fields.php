<div class="form-content<?php if( get_sub_field('is_contact') ): ?> row-lg<?php endif; ?>">
	<div class="content">
		<?php the_field('testo_contatti', 'options'); ?>
		<p><a href="https://www.facebook.com/bspkn.studio/" class="icon-facebook"></a>
		<a href="https://www.linkedin.com/company/10485978" class="icon-linkedin"></a></p>
	</div>
</div>
<div class="form-inputs<?php if( get_sub_field('is_contact') ): ?> row-lg<?php endif; ?>">
	<div class="form-col">
		<div class="form-row">
			<input type="text" name="sender" placeholder="<?php _e('Nome e cognome', 'bspkn'); ?>" ng-model="formData.sender">
		</div>
		<div class="form-row">
			<input type="email" name="email" required placeholder="<?php _e('Indirizzo email (richiesto)', 'bspkn'); ?>" ng-model="formData.email">
		</div>			
		<input type="tel" name="tel" required placeholder="<?php _e('Telefono (richiesto)', 'bspkn'); ?>" ng-model="formData.tel">
	</div>
	<div class="form-col">
		<div class="form-row">
			<textarea name="message" placeholder="<?php _e('Messaggio', 'bspkn'); ?>" ng-model="formData.message"></textarea>
		</div>
		<button class="btn-send" ng-disabled="contactForm.$invalid && !isPrivacyCheckd">
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
		<input type="checkbox" name="privacy" id="privacy<?php get_sub_field('is_contact') : ?>-contact<?php endif; ?>" checked="checked">
		<label for="privacy<?php get_sub_field('is_contact') : ?>-contact<?php endif; ?>" class="form-label" ng-click="isPrivacyCheckd = !isPrivacyCheckd">
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
		<input type="checkbox" name="newsletter<?php get_sub_field('is_contact') : ?>-contact<?php endif; ?>" id="newsletter">
		<label for="newsletter<?php get_sub_field('is_contact') : ?>-contact<?php endif; ?>" class="form-label" ng-click="isNewsletter = !isNewsletter">
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
				<?php _e('Voglio iscrivermi alla vostra newsletter', 'bspkn'); ?>
			</span>
		</label>
	</div>
	<div class="alert" ng-click="isSubmitted=false;isContactSent=true" ng-class="{visible: isSubmitted}">
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/bespoken-logo-gif-dark.gif" class="loader" ng-class="{hidden:isContactSent}" />
		<div class="message" ng-class="{visible:isContactSent}">
			<p><?php _e('Grazie per averci contattato.<br/>Ti risponderemo il prima possibile.', 'bspkn'); ?></p>
		</div>
	</div>
</div>