<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class EscAction extends CAction
{

	public function saveImage($images, $girlId)
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


			$photo = new PhotoGirl();
			$photo->pg_girl = $girlId;
			$photo->pg_link = $imagePath;

			if ($photo->save())
			{
				$file->saveAs($imagePath);

				$icon = new EasyImage($imagePath);
				$icon->resize(100, 100);
				$icon->save($iconPath);
			}
			elseif($photo->hasErrors())
			{
				return $photo->getError('pg_girl');
			}
		}
		return true;
	}

}