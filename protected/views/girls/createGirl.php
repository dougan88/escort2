<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Create girl';
$this->breadcrumbs=array(
	'Girls',
);
?>

<h1>Create girl</h1>

<?php if(Yii::app()->user->hasFlash('gCreated')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('gCreated'); ?>
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
        <?php echo $form->textField($girl,'g_country_code'); ?>
        <?php echo $form->error($girl,'g_country_code'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($girl,'g_city'); ?>
        <?php echo $form->textField($girl,'g_city'); ?>
        <?php echo $form->error($girl,'g_city'); ?>
    </div>

<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($girl,'subject'); ?>
<!--		--><?php //echo $form->textField($girl,'subject',array('size'=>60,'maxlength'=>128)); ?>
<!--		--><?php //echo $form->error($girl,'subject'); ?>
<!--	</div>-->
<!---->

<!---->
<!--	--><?php //if(CCaptcha::checkRequirements()): ?>
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'verifyCode'); ?>
<!--		<div>-->
<!--		--><?php //$this->widget('CCaptcha'); ?>
<!--		--><?php //echo $form->textField($model,'verifyCode'); ?>
<!--		</div>-->
<!--		<div class="hint">Please enter the letters as they are shown in the image above.-->
<!--		<br/>Letters are not case-sensitive.</div>-->
<!--		--><?php //echo $form->error($model,'verifyCode'); ?>
<!--	</div>-->
<!--	--><?php //endif; ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>