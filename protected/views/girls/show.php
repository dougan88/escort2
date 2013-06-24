<?php

$this->pageTitle=Yii::app()->name . ' - Show girl';
$this->breadcrumbs=array(
	'Girls', 'Show',
);
?>

<?php if(Yii::app()->user->hasFlash('cantFind')): ?>

	<div class="flash-success">
		<?php echo Yii::app()->user->getFlash('cantFind'); ?>
	</div>

<?php else: ?>

		<h1>
			<?php echo $girl->g_name; ?>
        </h1>

        <p>
            <?php echo $girl->g_description; ?>
        </p>

		<ul>
            <li>
			    <?php echo $girl->g_age; ?>
		    </li>

            <li>
                <?php echo $girl->g_hair; ?>
		    </li>

            <li>
                <?php echo $girl->g_height; ?>
		    </li>

            <li>
                <?php echo $girl->g_weight; ?>
		    </li>

            <li>
                <?php echo $girl->g_skype; ?>
		    </li>

            <li>
                <?php echo $girl->g_cell_phone; ?>
		    </li>

            <li>
                <?php echo $girl->g_country_code; ?>
            </li>

            <li>
                <?php echo $girl->g_city; ?>
		    </li>

        </ul>


<?php endif; ?>