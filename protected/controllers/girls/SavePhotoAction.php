<?php

class SavePhotoAction extends EscAction
{
	/**
	 * Declares class-based actions.
	 */
	public function run()
	{
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
			}

			$images = Yii::app()->photo->getImages($_GET['id'], PhotoComponent::PHOTO_GIRL);
		}

		if (!$_POST && !$_FILES && isset($_GET['sent']))
		{
			Yii::app()->user->setFlash('cantFind','Something went wrong. Probably the images that you downloaded was too big. Please, try again.');
		}

		$this->controller->render('photo', array('photo' => $photo, 'images' => $images));
	}


//	public function saveGirlByAjax($girl)
//	{
//		$this->_saveGirl($girl);
//		$images = $this->_getImages($girl->g_id);
//		echo $this->controller->renderPartial('edit', array('girl' => $girl, 'images' => $images), true);
//		Yii::app()->end();
//	}
//
//	public function saveImagesByAjax($girl)
//	{
//		$this->_saveImages($girl);
//		$images = $this->_getImages($girl->g_id);
//		echo $this->controller->renderPartial('forms/imageForm', array('girl' => $girl, 'images' => $images), true);
//		Yii::app()->end();
//	}
//
//
//	//Saving all girl properties without images
//	private function _saveGirl($girl)
//	{
//		$girl->attributes = $_POST['Girl'];
//		$girl->save();
//	}
//
//	//Saving all images for specified girl
//	private function _saveImages($girl)
//	{
//		$girl->g_photo = CUploadedFile::getInstances($girl,'g_photo');
//		if($girl->save())
//		{
//			if ($girl->g_photo)
//			{
//				$message = $this->saveImage($girl->g_photo, $girl->g_id, Yii::app()->params['photoG']);
//
//				if($message !== true)
//				{
//					$girl->addError('g_photo', $message);
//				}
//			}
//		}
//	}

}