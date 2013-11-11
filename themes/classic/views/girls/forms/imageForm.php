<div id="main">
	<h1>Photos</h1>
	<?php
//				echo '<pre>';
//				print_r($images);
//				echo '</pre>';
	?>
	<?php $imageForm=$this->beginWidget('CActiveForm', array(
		'action'                 => $this->createUrl(Yii::app()->request->getUrl(), array('sent' => 1)),
		'id'                     => 'image-form',
		'enableClientValidation' => true,
		'clientOptions'          => array(
			'validateOnSubmit' => true,
		),
		'htmlOptions' => array('enctype' => 'multipart/form-data'),
	)); ?>

	<?php echo $imageForm->fileField($girl, 'g_photo', array('multiple' => 'multiple', 'name' => 'Girl[g_photo][]')); ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Send Images', array('id' => 'btn')); ?>
	</div>

	<?php echo $imageForm->error($girl, 'g_photo'); ?>

	<?php $this->endWidget(); ?>

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