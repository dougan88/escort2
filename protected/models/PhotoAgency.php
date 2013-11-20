<?php

class PhotoAgency extends CActiveRecord
{

	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

	public function rules()
	{
		return array(
				array('pa_agency, pa_link, pa_icon', 'required'),
		);
	}

	public function afterValidate()
	{
		if ($this->countByAttributes(array('pa_agency' => $this->pg_girl)) >= Yii::app()->params['maxFilesUpload'])
		{
			$this->addError('pa_agency', 'Exceeded allowed file number.');
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

	public static function getIcons($agencyId)
	{
		$icons = self::model()->findAllByAttributes(array('pa_agency'=>$agencyId));
		if(count($icons))
		{
			foreach($icons as &$icon)
			{
				$icon = $icon->getAttributes(array('pa_icon'));
				$icon = $icon['pa_icon'];
			}
			return $icons;
		}
		else
		{
			return false;
		}
	}

	public static function getImages($agencyId)
	{
		$images = self::model()->findAllByAttributes(array('pa_agency'=>$agencyId));
		if(count($images))
		{
			foreach($images as &$image)
			{
				$image = $image->getAttributes(array('pa_icon'));
				$image = $image['pa_icon'];
			}
			return $images;
		}
		else
		{
			return false;
		}
	}
}