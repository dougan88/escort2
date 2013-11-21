<?php

class Photo extends CFormModel
{
	public $photo;

	public function rules()
	{
		return array(
			array('photo', 'file', 'types' => 'jpg, png', 'maxSize' => Yii::app()->params['maxUploadFileSize'], 'allowEmpty' => true, 'maxFiles' => Yii::app()->params['maxFilesUpload']),
		);
	}

//	public function afterValidate()
//	{
//		if ($this->countByAttributes(array('pg_girl' => $this->pg_girl)) >= Yii::app()->params['maxFilesUpload'])
//		{
//			$this->addError('photo', 'Exceeded allowed file number.');
//		}
//	}

	public function attributeLabels()
	{
		return array(
			'photo' => 'Photo:'
		);
	}

}