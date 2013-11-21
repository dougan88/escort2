<div id="main">
	<h1>Photos</h1>

	<?php if(Yii::app()->user->hasFlash('info')): ?>

		<div class="flash-success">
			<?php echo Yii::app()->user->getFlash('info'); ?>
		</div>

	<?php else: ?>
		<?php $this->renderPartial('forms/photoForm', array('photo' => $photo, 'images' => $images));?>
	<?php endif; ?>

	<div id="response"></div>
	<ul id="image-list">
		<?php
		if(is_array($images))
		{
			foreach($images as $image)
			{
				echo CHtml::image(Yii::app()->assetManager->publish(
					Yii::app()->params['iconsFolder'] . $image
				));
			}
		}
		?>
	</ul>
</div>