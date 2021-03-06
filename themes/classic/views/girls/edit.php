<?php

$this->pageTitle=Yii::app()->name . ' - Edit girl';
$this->breadcrumbs=array(
	'Girls', 'Edit',
);
?>

<?php if(Yii::app()->user->hasFlash('cantFind')): ?>

	<div class="flash-success">
		<?php echo Yii::app()->user->getFlash('cantFind'); ?>
	</div>

<?php else: ?>


	<div class="form">

		<?php $form=$this->beginWidget('CActiveForm', array(
			'action'                 => $this->createUrl(Yii::app()->request->getUrl(), array('sent' => 1)),
			'id'                     => 'contact-form',
			'enableClientValidation' => true,
//			'enableAjaxValidation' => true,
			'clientOptions'          => array(
				'validateOnSubmit' => true,
			),
			'htmlOptions' => array('enctype' => 'multipart/form-data'),
		)); ?>

		<a href='<?php echo $this->createUrl('girls/delete', array('id'=>$girl->g_id));?>'><?php echo 'Delete ' . $girl->g_name; ?></a>

		<?php echo $form->errorSummary($girl); ?>

		<div class="row">
			<?php echo $form->labelEx($girl,'g_name'); ?>
			<?php echo $form->textField($girl,'g_name'); ?>
			<?php echo $form->error($girl,'g_name'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($girl,'g_age'); ?>
			<?php echo $form->textField($girl,'g_age'); ?>
			<?php echo $form->error($girl,'g_age'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($girl,'g_hair'); ?>
			<?php echo $form->textField($girl,'g_hair'); ?>
			<?php echo $form->error($girl,'g_hair'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($girl,'g_height'); ?>
			<?php echo $form->textField($girl,'g_height'); ?>
			<?php echo $form->error($girl,'g_height'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($girl,'g_weight'); ?>
			<?php echo $form->textField($girl,'g_weight'); ?>
			<?php echo $form->error($girl,'g_weight'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($girl,'g_skype'); ?>
			<?php echo $form->textField($girl,'g_skype'); ?>
			<?php echo $form->error($girl,'g_skype'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($girl,'g_cell_phone'); ?>
			<?php echo $form->textField($girl,'g_cell_phone'); ?>
			<?php echo $form->error($girl,'g_cell_phone'); ?>
		</div>

		<div class="row" id="main">
			<h1>Photos</h1>
			<?php
//			echo '<pre>';
//			print_r($images);
//			echo '</pre>';
			?>
			<?php echo $form->labelEx($girl, 'g_photo'); ?>
			<?php echo $form->fileField($girl, 'g_photo', array('multiple' => 'multiple', 'name' => 'Girl[g_photo][]')); ?>
			<?php echo $form->error($girl, 'g_photo'); ?>
			<div id="response"></div>
			<ul id="image-list">
			<?php
				if($images)
				{
					foreach($images as $image)
					{
						echo CHtml::image(Yii::app()->params['iconsFolder'] . $image);
					}
				}
			?>
			</ul>
		</div>

		<div class="row">
			<?php echo $form->labelEx($girl,'g_description'); ?>
			<?php echo $form->textArea($girl,'g_description',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($girl,'g_description'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($girl,'g_country_code'); ?>
			<?php echo $form->dropDownList($girl,'g_country_code', Yii::app()->params['countries'], array('empty' => 'Select your country')); ?>
			<?php echo $form->error($girl,'g_country_code'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($girl,'g_city'); ?>
			<?php echo $form->dropDownList($girl,'g_city', Yii::app()->params['cities'], array('empty' => 'Select your country')); ?>
			<?php echo $form->error($girl,'g_city'); ?>
		</div>

		<div class="row buttons">
			<?php echo CHtml::ajaxSubmitButton('Save', '',
			array('type'=>'POST',
					'update'=>'#contact-form')); ?>
		</div>

		<?php $this->endWidget(); ?>

	</div><!-- form -->

<?php endif; ?>