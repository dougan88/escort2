<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Agencies list';
$this->breadcrumbs=array(
    'Agencies',
);
?>

    <h1>Agencies list</h1>

<?php if(Yii::app()->user->hasFlash('noAgencies')): ?>

    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('noAgencies'); ?>
    </div>

<?php else: ?>

    <?php

    $dataProvider=new CActiveDataProvider('Agency', array(
        'pagination'=>array(
            'pageSize'=>10,
        ),
    ));


    $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$dataProvider,
        'itemView'=>'_showDetailedAgency',
        'sortableAttributes'=>array(
            'a_name',
            'a_description',
        ),
    ));

    ?>

<?php endif; ?>