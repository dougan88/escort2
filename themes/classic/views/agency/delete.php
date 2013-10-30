<?php

$this->pageTitle=Yii::app()->name . ' - Edit agency';
$this->breadcrumbs=array(
	'Agencies', 'Delete',
);
?>

<?php if(Yii::app()->user->hasFlash('cantFind')): ?>

	<div class="flash-success">
		<?php echo Yii::app()->user->getFlash('cantFind'); ?>
	</div>

<?php else: ?>

	<div class="flash-success">
		<?php echo Yii::app()->user->getFlash('deleted'); ?>
	</div>

<?php endif; ?>