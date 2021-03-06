<div class="<?php if(!get_sub_field('is_contact') ): ?>jobs<?php else : ?>contact<?php endif; ?>-form" ng-form<?php if(!get_sub_field('is_contact') ): ?> job-form="true"<?php endif; ?>>
<?php if(get_sub_field('is_contact')) :
	get_template_part( 'builder/'. get_row_layout(), 'contact' );
	else : ?>
	<form class="form" name="jobForm" ng-submit="onSubmit(jobForm.$valid, '<?php the_permalink(); ?>')">
		<div class="form-content row-lg">
			<div class="content">
				<?php the_sub_field('Testo'); ?>
			</div>
		</div>
		<div class="form-inputs row-lg">
			<div class="form-col">
				<div class="form-row">
					<input type="text" name="sender" placeholder="<?php _e('Nome e cognome', 'bspkn'); ?>" ng-model="formData.sender">
				</div>
				<div class="form-row">
					<input type="email" name="email" required placeholder="<?php _e('Indirizzo email (richiesto)', 'bspkn'); ?>" ng-model="formData.email">
				</div>
				<div class="form-row">		
					<input type="tel" name="tel" required placeholder="<?php _e('Telefono (richiesto)', 'bspkn'); ?>" ng-model="formData.tel">
				</div>
				<div class="form-uload">
					<input type="file" ng-model="formData.filecv" id="file" ngf-select="selectFile($file)" />
					<label for="file">
						<span class="file-text" ng-bind-html="(file) ? file : '<?php _e('Allega il tuo cv', 'bspkn'); ?>'"></span>
						<span class="btn-send">
							<?php _e('Carica', 'bspkn'); ?>
							<span class="btn up">
								<span class="btn-line">
									<span class="btn-arrow-up"></span>
									<span class="btn-arrow-down"></span>
								</span>
							</span>
						</span>
					</label>
				</div>
			</div>
			<div class="form-col">
				<div class="form-row">
					<textarea name="message" placeholder="<?php _e('Messaggio', 'bspkn'); ?>" ng-model="formData.message"></textarea>
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
			<div class="alert" ng-click="isSubmitted=false;isJobSent=true" ng-class="{visible: isSubmitted}">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/bespoken-logo-gif-dark.gif" class="loader" ng-class="{hidden:isJobSent}" />
				<div class="message" ng-class="{visible:isJobSent}">
					<p><?php _e('Grazie per averci contattato.<br/>Ti risponderemo il prima possibile.', 'bspkn'); ?></p>
				</div>
			</div>
		</div>
	</form>
<?php endif; ?>
</div>