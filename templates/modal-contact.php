<div class="modal-container" ng-class="{visible : isContact}">
	<?php close('isModal=false;isContact=false'); ?>
	<form class="grid-12 form">
		<div class="col-4 alternate form-col">
		</div>
		<div class="col-8 dark form-col">
			<div class="grid-12 row-lg">
				<div class="col-6">
					<div class="row-input">
						<input type="text" name="sender" placeholder="<?php _e('Nome e cognome', 'bspkn'); ?>">
					</div>
					<div class="row-input">
						<input type="email" name="email" required placeholder="<?php _e('Indirizzo email (richiesto)', 'bspkn'); ?>">
					</div>
					
					<input type="tel" name="tel" required placeholder="<?php _e('Telefono (richiesto)', 'bspkn'); ?>">
				</div>
				<div class="col-6">
					<div class="row-input">
					<textarea name="message" placeholder="<?php _e('Messaggio', 'bspkn'); ?>"></textarea>
					<button class="btn-send">
						<?php _e('Invia', 'bspkn'); ?>
					</button>
				</div>
			</div>
		</div>
	</form>
</div>