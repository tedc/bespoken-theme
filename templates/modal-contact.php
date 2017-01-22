<div class="modal-container" ng-class="{visible : isContact}">
	<?php close('isModal=false;isContact=false'); ?>
	<form class="form">
		<div class="form-content row-lg">
		</div>
		<div class="form-inputs row-lg">
			<div class="form-col">
				<div class="form-row">
					<input type="text" name="sender" placeholder="<?php _e('Nome e cognome', 'bspkn'); ?>">
				</div>
				<div class="form-row">
					<input type="email" name="email" required placeholder="<?php _e('Indirizzo email (richiesto)', 'bspkn'); ?>">
				</div>			
				<input type="tel" name="tel" required placeholder="<?php _e('Telefono (richiesto)', 'bspkn'); ?>">
			</div>
			<div class="form-col">
				<div class="form-row">
					<textarea name="message" placeholder="<?php _e('Messaggio', 'bspkn'); ?>"></textarea>
				</div>
				<button class="btn-send">
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
				<input type="checkbox" name="privacy" id="privacy" checked="checked">
				<label for="privacy" class="form-label" ng-click="isPrivacyCheckd = !isPrivacyCheckd">
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
</div>