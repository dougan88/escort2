<?php

class PhotoGirl extends CActiveRecord
{

	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

	public function rules()
	{
		return array(
				array('pg_girl, pg_link, pg_icon', 'required'),
		);
	}

	public function afterValidate()
	{
		if ($this->countByAttributes(array('pg_girl' => $this->pg_girl)) >= Yii::app()->params['maxFilesUpload'])
		{
			$this->addError('pg_girl', 'Exceeded allowed file number.');
		}
	}

	public function tableName()
	{
		return 'photo_g';
	}

	public function attributeLabels()
	{
		return array(
		);
	}

	public static function getIcons($girlId)
	{
		$icons = self::model()->findAllByAttributes(array('pg_girl'=>$girlId));
		if(count($icons))
		{
			foreach($icons as &$icon)
			{
				$icon = $icon->getAttributes(array('pg_icon'));
				$icon = $icon['pg_icon'];
			}
			return $icons;
		}
		else
		{
			return false;
		}
	}

	public static function getImages($girlId)
	{
		$images = self::model()->findAllByAttributes(array('pg_girl'=>$girlId));
		if(count($images))
		{
			foreach($images as &$image)
			{
				$image = $image->getAttributes(array('pg_icon'));
				$image = $image['pg_icon'];
			}
			return $images;
		}
		else
		{
			return false;
		}
	}

}