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
			$imageName = uniqid(Yii::app()->user->id . rand(Yii::app()->params['randMin'], Yii::app()->params['randMax']) . $key . '_', true) .
				'.' .
				$file->getExtensionName();
			$imagePath = Yii::app()->params['imageFolder'] . $imageName;

			$iconName = uniqid(Yii::app()->user->id . rand(Yii::app()->params['randMin'], Yii::app()->params['randMax']) . $key . '_icon', true) .
				'.' .
				$file->getExtensionName();
			$iconPath = Yii::app()->params['iconsFolder'] . $iconName;


			$photo = $this->getImageModel($ownerId, $imageName, $iconName, $modelType);

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

	private function getImageModel($ownerId, $imageName, $iconName, $modelType)
	{
		switch ($modelType) {
			case Yii::app()->params['photoG']:
				$photo = new PhotoGirl();
				$photo->pg_girl = $ownerId;
				$photo->pg_link = $imageName;
				$photo->pg_icon = $iconName;
				break;
			case Yii::app()->params['photoA']:
				$photo = new PhotoAgency();
				$photo->pa_agency = $ownerId;
				$photo->pa_link = $imageName;
				$photo->pa_icon = $iconName;
				break;
		}
		return $photo;
	}

}