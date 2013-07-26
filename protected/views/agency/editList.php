<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Edit list';
$this->breadcrumbs=array(
    'Agencies', 'Edit list',
);
?>

    <h1>Edit list</h1>

<?php if(Yii::app()->user->hasFlash('noAgencies')): ?>

    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('noAgencies'); ?>
    </div>

<?php else: ?>

    <?php foreach($agencies as $agency){ ?>
		<ul>
			<li>
				<a href='<?php echo $this->createUrl('agency/edit', array('id'=>$agency->a_id));?>'><?php echo $agency->a_name; ?></a>
			</li>

			<p>
				<?php echo $agency->a_description; ?>
			</p>

			<li>
				<a href='<?php echo $this->createUrl('agency/delete', array('id'=>$agency->a_id));?>'><?php echo 'Delete ' . $agency->a_name; ?></a>
			</li>
		</ul>
    <?php } ?>


<?php endif; ?>