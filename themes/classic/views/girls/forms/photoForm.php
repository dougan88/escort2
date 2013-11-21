<?php $imageForm=$this->beginWidget('CActiveForm', array(
	'action'                 => $this->createUrl(Yii::app()->request->getUrl(), array('sent' => 1)),
	'id'                     => 'image-form',
	'enableClientValidation' => true,
	'clientOptions'          => array(
		'validateOnSubmit' => true,
	),
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

<?php echo $imageForm->fileField($photo, 'photo', array('multiple' => 'multiple', 'name' => 'Photo[photo][]')); ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Send Images', array('id' => 'btn')); ?>
	</div>

<?php echo $imageForm->error($photo, 'g_photo'); ?>

<?php $this->endWidget(); ?>