<?php

/**
 * Used to encapsulate CRUD operations with different photo instances.
 */
class PhotoComponent extends CApplicationComponent
{

	/**
	 * The folder for storign images.
	 *
	 * @var string
	 */
	public $imageFolder;

	/**
	 * The folder for storign image icons.
	 *
	 * @var string
	 */
	public $iconsFolder;

	const PHOTO_GIRL   = 'girl';
	const PHOTO_AGENCY = 'agency';

	/**
	 * Creates new Photo model according to specified type
	 * and initializes it with specified values.
	 *
	 * Created to encapsulate the creation of Photo model.
	 *
	 * @param int $ownerId Owner ID.
	 * @param string $imageName Image name.
	 * @param string $iconName Icon name.
	 * @param string $modelType The name of required model: PhotoGirl or PhotoAgency.
	 *
	 * @return PhotoGirl | PhotoAgency
	 */
	private function _createPhotoModel($ownerId, $imageName, $iconName, $modelType)
	{
		switch ($modelType) {
			case self::PHOTO_GIRL:
				$photo = new PhotoGirl();
				break;
			case self::PHOTO_AGENCY:
				$photo = new PhotoAgency();
				break;
		}

		$photo->pg_girl = $ownerId;
		$photo->pg_link = $imageName;
		$photo->pg_icon = $iconName;
		return $photo;
	}

	/**
	 * Gets array of CUploadedFile's and saves all images in
	 * appropriate models.
	 *
	 * @param array $images Array of CUploadedFile.
	 * @param int $ownerId Owner ID.
	 * @param string $modelType The name of required model: PhotoGirl or PhotoAgency.
	 *
	 * @return string | boolean
	 */
	public function saveImage($images, $ownerId, $modelType)
	{
		foreach($images as $key => $file)
		{
			//Generates the file name
			$imageName = uniqid(Yii::app()->user->id . rand(Yii::app()->params['randMin'], Yii::app()->params['randMax']) . $key . '_', true) .
				'.' .
				$file->getExtensionName();
			$imagePath = $this->imageFolder . $imageName;

			//Generates icon name
			$iconName = uniqid(Yii::app()->user->id . rand(Yii::app()->params['randMin'], Yii::app()->params['randMax']) . $key . '_icon', true) .
				'.' .
				$file->getExtensionName();
			$iconPath = $this->iconsFolder . $iconName;


			$photo = $this->_createPhotoModel($ownerId, $imageName, $iconName, $modelType);

			if ($photo->save())
			{
				$file->saveAs($imagePath);

				//Saves image icon with EasyImage extension
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

	/**
	 * Getting all icons related with specified girl id.
	 * Returns array of links for all icons.
	 *
	 * @param int $modelId Model ID.
	 * @param string $modelType The name of required model: PhotoGirl or PhotoAgency.
	 *
	 * @return array | boolean
	 */
	public function getIcons($modelId, $modelType)
	{
		switch ($modelType) {
			case self::PHOTO_GIRL:
				$icons = PhotoGirl::getIcons($modelId);
				break;
			case self::PHOTO_AGENCY:
				$icons = PhotoAgency::getIcons($modelId);
				break;
		}

		return $icons;
	}

	/**
	 * Getting all images related with specified girl id.
	 * Returns array of links for all icons.
	 *
	 * @param int $modelId Model ID.
	 * @param string $modelType The name of required model: PhotoGirl or PhotoAgency.
	 *
	 * @return array | boolean
	 */
	public function getImages($modelId, $modelType)
	{
		switch ($modelType) {
			case self::PHOTO_GIRL:
				$images = PhotoGirl::getImages($modelId);
				break;
			case self::PHOTO_AGENCY:
				$images = PhotoAgency::getImages($modelId);
				break;
		}

		return $images;
	}
}