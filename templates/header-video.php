<?php if(get_field('cover_video')) : ?>
    <?php $file = preg_replace('/\\.[^.\\s]{3,4}$/', '', get_field('cover_video')); ?>
    <div class="video-cover video-cover-header" style="background-image:url(<?php echo $file; ?>.jpg)" ng-sm trigger-element=".main" trigger-hook="onLeave" duration="120%" to="{y : '10%'}" offset="150">
        <video class="video-item" muted loop poster="<?php echo $file; ?>.jpg" ng-video>
            <source src="<?php echo $file; ?>.mp4" type="video/mp4" />
            <source src="<?php echo $file; ?>.ogv" type="video/ogv" />
            <source src="<?php echo $file; ?>.webm" type="video/webm" />
        </video>
    </div>
<?php endif; ?>
