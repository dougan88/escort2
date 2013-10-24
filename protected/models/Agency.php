<?php

class Agency extends CActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function rules()
    {
        return array(
                array('a_name, a_description, a_skype, a_email', 'required'),
                array('a_country_code', 'in', 'range' => array_keys(Yii::app()->params['countries'])),
                array('a_city', 'in', 'range' => array_keys(Yii::app()->params['cities'])),
                array('a_cell_phone', 'safe'),
                array('a_name, a_email, a_skype, a_cell_phone', 'unique'),
				array('a_cell_phone', 'type', 'type' => 'integer'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'a_name'         => 'Name: ',
            'a_description'  => 'Description: ',
            'a_country_code' => 'Country: ',
            'a_city'         => 'City: ',
            'a_skype'        => 'Skype: ',
            'a_cell_phone'   => 'Cell phone: ',
            'a_email'        => 'E-mail: ',
        );
    }

    public function tableName()
    {
        return 'agency';
    }
}