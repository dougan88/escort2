<?php

$this->pageTitle=Yii::app()->name . ' - Show agency';
$this->breadcrumbs=array(
	'Agencies', 'Show',
);
?>

<?php if(Yii::app()->user->hasFlash('cantFind')): ?>

	<div class="flash-success">
		<?php echo Yii::app()->user->getFlash('cantFind'); ?>
	</div>

<?php else: ?>

		<h1>
			<?php echo $agency->a_name; ?>
        </h1>

        <p>
            <?php echo $agency->a_description; ?>
        </p>

		<ul>
            <li>
			    <?php echo $agency->a_skype; ?>
		    </li>

			<li>
				<?php echo $agency->a_cell_phone; ?>
			</li>

            <li>
                <?php echo $agency->a_email; ?>
		    </li>


            <li>
                <?php echo $agency->a_country_code; ?>
            </li>

            <li>
                <?php echo $agency->a_city; ?>
		    </li>

        </ul>


<?php endif; ?>