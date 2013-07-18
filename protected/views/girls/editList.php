<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Edit list';
$this->breadcrumbs=array(
    'Girls', 'Edit list',
);
?>

    <h1>Edit list</h1>

<?php if(Yii::app()->user->hasFlash('noGirls')): ?>

    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('noGirls'); ?>
    </div>

<?php else: ?>

    <?php foreach ($girls as $girl) { ?>
		<ul>
			<li>
				<a href='<?php echo $this->createUrl('girls/edit', array('id'=>$girl->g_id));?>'><?php echo $girl->g_name; ?></a>
			</li>
			<li>
				<?php echo $girl->g_age; ?>
			</li>
			<p>
				<?php echo $girl->g_description; ?>
			</p>
		</ul>
	<?php } ?>


<?php endif; ?>