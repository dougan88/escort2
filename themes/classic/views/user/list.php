<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Users list';
$this->breadcrumbs=array(
    'Users',
);
?>

    <h1>Users list</h1>

<?php if(Yii::app()->user->hasFlash('noUsers')): ?>

    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('noUsers'); ?>
    </div>

<?php else: ?>

    <?php

    $dataProvider=new CActiveDataProvider('User', array(
        'pagination'=>array(
            'pageSize'=>10,
        ),
    ));


    $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$dataProvider,
        'itemView'=>'_showDetailedUser',
        'sortableAttributes'=>array(
            'u_username',
            'u_email',
        ),
    ));

    ?>

<?php endif; ?>