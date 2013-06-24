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
			'id'=>'contact-form',
			'enableClientValidation'=>true,
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
			),
		)); ?>

		<p class="note">Fields with <span class="required">*</span> are required.</p>

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
			<?php echo CHtml::submitButton('Submit'); ?>
		</div>

		<?php $this->endWidget(); ?>

	</div><!-- form -->

<?php endif; ?>