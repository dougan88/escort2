<?php

$this->pageTitle=Yii::app()->name . ' - Create user';
$this->breadcrumbs=array(
	'Users',
);
?>

<h1>Create user</h1>

<?php if(Yii::app()->user->hasFlash('uCreated')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('uCreated'); ?>
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

	<?php echo $form->errorSummary($user); ?>

	<div class="row">
		<?php echo $form->labelEx($user,'u_username'); ?>
		<?php echo $form->textField($user,'u_username'); ?>
		<?php echo $form->error($user,'u_username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($user,'u_password'); ?>
		<?php echo $form->passwordField($user,'u_password'); ?>
		<?php echo $form->error($user,'u_password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($user,'u_email'); ?>
		<?php echo $form->textField($user,'u_email'); ?>
		<?php echo $form->error($user,'u_email'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>