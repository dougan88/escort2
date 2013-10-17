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
                array('pg_girl, pg_link', 'required'),
        );
    }

	public function afterValidate()
	{
		if ($this->countByAttributes(array('pg_girl' => $this->pg_girl)) >= Yii::app()->params['maxFilesUpload'])
		{
			$this->addError('Exceeded allowed file number.');
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
}