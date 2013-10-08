<?php

class Girl extends CActiveRecord
{

	public $g_photo;

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function rules()
    {
        return array(
                array('g_name, g_age, g_hair, g_height, g_weight, g_skype, g_description', 'required'),
                array('g_country_code', 'in', 'range' => array_keys(Yii::app()->params['countries'])),
                array('g_city', 'in', 'range' => array_keys(Yii::app()->params['cities'])),
                array('g_cell_phone', 'safe'),
                array('g_photo', 'file', 'types' => 'jpg, png', 'maxSize' => 2097152, 'allowEmpty' => true, 'maxFiles' => Yii::app()->params['maxFilesUpload']),
        );
    }

    public function attributeLabels()
    {
        return array(
            'g_name'         => 'Name:',
            'g_age'          => 'Age:',
            'g_hair'         => 'Hair color:',
            'g_height'       => 'Height:',
            'g_weight'       => 'Weight:',
            'g_skype'        => 'Skype:',
            'g_cell_phone'   => 'Cell Phone:',
            'g_description'  => 'Description:',
            'g_country_code' => 'Country:',
            'g_city'         => 'City:',
			'g_photo'        => 'Photo:'
        );
    }

    public function tableName()
    {
        return 'girl';
    }
}