<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Girls list';
$this->breadcrumbs=array(
    'Girls',
);
?>

    <h1>Girls list</h1>

<?php if(Yii::app()->user->hasFlash('noGirls')): ?>

    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('noGirls'); ?>
    </div>

<?php else: ?>

    <?php

    $dataProvider=new CActiveDataProvider('Girl', array(
        'pagination'=>array(
            'pageSize'=>10,
        ),
    ));


    $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$dataProvider,
        'itemView'=>'_showDetailedGirl',
        'sortableAttributes'=>array(
            'g_name',
            'g_age',
            'g_description',
        ),
    ));



    ?>


<?php endif; ?>