<?php 
	$points = array(		
		array(134,74),
		array(463,74),
		array(566,387),
		array(298,580),
		array(34, 387)
	);
	$total = count($points) - 1;
?>
<div class="method">
	<div class="method-container">
		<svg id="metodo" class="method-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 600 600" ng-method method-steps="<?php echo $total; ?>">
			<defs>
				<?php while(have_rows('metodo')) : the_row(); ?>
				<?php if(get_sub_field('method_icon')) : ?>
				<?php $svg = file_get_contents(get_sub_field('method_icon'));
		            $svg = str_replace('svg', 'symbol', $svg);
		            $svg = preg_replace('/(<[^>]+) id=".*?"/', '$1', $svg);
		            $svg = preg_replace('/(<[^>]+) data-name=".*?"/', '$1', $svg);
		            $svg = preg_replace('/(<[^>]+) xmlns=".*?"/', '$1', $svg);
		            $svg = str_replace('<symbol', '<symbol id="'.sanitize_title(get_sub_field('method_label')).'"', $svg);
		            echo $svg; ?>
				<?php  endif; endwhile;?>
			</defs>
			<circle r="280" cx="300" cy="300" stroke="#e5e5e5" stroke-width="5" fill="white"></circle>
			<?php $step = 0; while(have_rows('metodo')) : the_row(); ?>
			<?php $prev_step = ($step - 1 < 0) ? $total : $step - 1; ?>
			<path id="arc_<?php echo $step; ?>" d="M<?php echo $points[$prev_step][0]; ?>,<?php echo $points[$prev_step][1]; ?> A280,280,0 0 1 <?php echo $points[$step][0]; ?>,<?php echo $points[$step][1]; ?>" stroke-width="5" stroke="#c5168c" fill="transparent" stroke-linecap="round" class="arc"></path>
			<?php $step++; endwhile; ?>
			<path id="arc_<?php echo $total + 1; ?>" d="M<?php echo $points[$total][0]; ?>,<?php echo $points[$total][1]; ?> A280,280,0 0 1 <?php echo $points[0][0]; ?>,<?php echo $points[0][1]; ?>" stroke-width="5" stroke="#c5168c" fill="transparent" stroke-linecap="round" class="arc"></path>
			<?php $step = 0; while(have_rows('metodo')) : the_row(); ?>
			<?php $prev_step = ($step - 1 < 0) ? $total : $step - 1; ?>
			<g class="button" ng-click="goToStep(<?php echo $step; ?>)" id="step_<?php echo $step; ?>" ng-class="{active : isStep==<?php echo $step; ?>}">
				<?php $center = 'cx="'.$points[$step][0].'" cy="'.$points[$step][1].'"'; ?>
				<g class="button-small">
					<circle r="15" fill="#e5e5e5" <?php echo $center; ?> class="grey" stroke-width="4"></circle>
				    <circle r="10" fill="#fff" <?php echo $center; ?> class="white"></circle>
				  	<circle r="0" fill="#e5e5e5" <?php echo $center; ?> class="purple-small"></circle>
				  	<circle r="0" fill="#e5e5e5" <?php echo $center; ?> class="purple-large"></circle>
				</g>
			    <circle r="34" fill="transparent" <?php echo $center; ?>></circle>
			    <use xlink:href="#<php echo sanitize_title(get_sub_field('method_label'); ?>" x="<?php echo $points[$step][0]; ?>" x="<?php echo $points[$step][0]; ?>"></use>
			</g>	
			<?php $step++; endwhile; ?>
		</svg>
	</div>
</div>