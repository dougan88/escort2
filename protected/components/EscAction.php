<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class EscAction extends CAction
{

	public function saveImage($images, $ownerId, $modelType)
	{
		foreach($images as $key => $file)
		{
			//Generates the file name
			$imagePath = Yii::app()->params['imageFolder'] .
				uniqid(Yii::app()->user->id . rand(Yii::app()->params['randMin'], Yii::app()->params['randMax']) . $key . '_', true) .
				'.' .
				$file->getExtensionName();

			$iconPath = Yii::app()->params['iconsFolder'] .
				uniqid(Yii::app()->user->id . rand(Yii::app()->params['randMin'], Yii::app()->params['randMax']) . $key . '_icon', true) .
				'.' .
				$file->getExtensionName();

			$photo = $this->getImageModel($ownerId, $imagePath, $iconPath, $modelType);

			if ($photo->save())
			{
				$file->saveAs($imagePath);

				$icon = new EasyImage($imagePath);
				$icon->resize(Yii::app()->params['iconHeight'], Yii::app()->params['iconWidth']);
				$icon->save($iconPath);
			}
			elseif($photo->hasErrors())
			{
				return $photo->getError('pg_girl');
			}
		}
		return true;
	}

	private function getImageModel($ownerId, $imagePath, $iconPath, $modelType)
	{
		switch ($modelType) {
			case Yii::app()->params['photoG']:
				$photo = new PhotoGirl();
				$photo->pg_girl = $ownerId;
				$photo->pg_link = $imagePath;
				$photo->pg_icon = $iconPath;
				break;
			case Yii::app()->params['photoA']:
				$photo = new PhotoAgency();
				$photo->pa_agency = $ownerId;
				$photo->pa_link = $imagePath;
				$photo->pa_icon = $iconPath;
				break;
		}
		return $photo;
	}

}