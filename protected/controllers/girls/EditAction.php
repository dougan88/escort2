<?php

class EditAction extends EscAction
{
	/**
	 * Declares class-based actions.
	 */
	public function run()
	{
		$girl = false;

		if(isset($_GET['id']))
		{
			$user = User::model()->with('girls')->findByPk(Yii::app()->user->id);
			$girls = $user->girls;
			foreach($girls as $grl)
			{
				if($grl->g_id === $_GET['id'])
				{
					$girl = $grl;
				}
			}
		}

		if(!$girl)
		{
			Yii::app()->user->setFlash('cantFind','Cant find specified girl.');
		}
		elseif(isset($_POST['Girl']))
		{
			if(Yii::app()->request->isAjaxRequest)
			{
				$this->performAjaxValidation($girl);
			}
			$girl->attributes = $_POST['Girl'];
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
			}
		}
		elseif (isset($_GET['sent']))
		{
			Yii::app()->user->setFlash('cantFind','Something went wrong. Probably the images that you downloaded was too big. Please, try again.');
		}
		$this->controller->render('edit', array('girl' => $girl));
	}

	public function performAjaxValidation($girl)
	{
		$girl->attributes = $_POST['Girl'];
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
		}
		echo $this->controller->renderPartial('edit', array('girl' => $girl), true);
		Yii::app()->end();
	}

}