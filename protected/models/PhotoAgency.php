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
}