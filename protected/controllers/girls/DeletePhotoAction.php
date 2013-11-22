<?php

class DeletePhotoAction extends EscAction
{
	/**
	 * Declares class-based actions.
	 */
	public function run()
	{
		if(!Yii::app()->request->isAjaxRequest) {
			throw new CHttpException(404,'The specified page cannot be found.');
		}
		$images = false;

		$photo = new Photo();

		if (!isset($_GET['id']) || !isset($_GET['type'])) {
			Yii::app()->user->setFlash('info','Photo info is not specified.');
		}

		if(isset($_GET['id']) && isset($_GET['type']))
		{
			if (isset($_FILES['Photo'])) {
				$photo->attributes = $_FILES['Photo'];
				$photo->photo = CUploadedFile::getInstances($photo,'photo');
				Yii::app()->photo->saveImage($photo->photo, $_GET['id'], $_GET['type']);

				if (Yii::app()->request->isAjaxRequest) {
					$images = Yii::app()->photo->getImages($_GET['id'], PhotoComponent::PHOTO_GIRL);
					echo $this->controller->renderPartial('photo', array('photo' => $photo, 'images' => $images));
					Yii::app()->end();
				}
			}

			$images = Yii::app()->photo->getImages($_GET['id'], PhotoComponent::PHOTO_GIRL);
		}

		if (!$_POST && !$_FILES && isset($_GET['sent']))
		{
			Yii::app()->user->setFlash('cantFind','Something went wrong. Probably the images that you downloaded was too big. Please, try again.');
		}

		$this->controller->render('photo', array('photo' => $photo, 'images' => $images));
	}

}