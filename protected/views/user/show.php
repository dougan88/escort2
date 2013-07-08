<?php

$this->pageTitle=Yii::app()->name . ' - Show user';
$this->breadcrumbs=array(
	'Users', 'Show',
);
?>

<?php if(Yii::app()->user->hasFlash('cantFind')): ?>

	<div class="flash-success">
		<?php echo Yii::app()->user->getFlash('cantFind'); ?>
	</div>

<?php else: ?>

		<h1>
			<?php echo $user->u_username; ?>
        </h1>

		<ul>
            <li>
			    <?php echo $user->u_email; ?>
		    </li>
        </ul>

<?php endif; ?>