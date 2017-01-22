<div class="modal-container" ng-class="{visible : isContact}">
	<?php close('isModal=false;isContact=false'); ?>
	<form class="form">
		<div class="form-content">
		</div>
		<div class="form-inputs">
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
	</form>
</div>