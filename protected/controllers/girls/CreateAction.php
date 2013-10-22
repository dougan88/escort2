<?php

class CreateAction extends EscAction
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
			$girl->g_photo = CUploadedFile::getInstances($girl,'g_photo');
			if($girl->save())
			{
				if ($girl->g_photo)
				{
					$message = $this->saveImage($girl->g_photo, $girl->g_id, Yii::app()->params['photoG']);

					if($message !== true)
					{
						$girl->addError('g_photo', $message);
					}
				}
				Yii::app()->user->setFlash('gCreated','Girl is created.');
				$this->controller->refresh();
			}
		}

		$this->controller->render('create', array('girl' => $girl));
	}

}