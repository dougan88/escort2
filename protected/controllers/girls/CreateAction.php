<?php

class CreateAction extends CAction
{
	/**
	 * Declares class-based actions.
	 */
	public function run()
	{
		$girl = new Girl;

		if(isset($_POST['Girl']))
		{
			$girl->attributes = $_POST['Girl'];
			$girl->g_user = Yii::app()->user->id;
			if($girl->validate())
			{
				$girl->save();
				Yii::app()->user->setFlash('gCreated','Girl is created.');
				$this->controller->refresh();
			}
		}

		$this->controller->render('create', array('girl' => $girl));
	}

}