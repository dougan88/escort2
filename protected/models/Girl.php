<?php

class Girl extends CActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * Declares the validation rules.
     */
    public function rules()
    {
        return array(
//            // verifyCode needs to be entered correctly
//            array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
               array('g_name, g_age, g_hair, g_height, g_weight, g_skype, g_description', 'required'),
        );
    }

    /**
     * Declares customized attribute labels.
     * If not declared here, an attribute would have a label that is
     * the same as its name with the first letter in upper case.
     */
    public function attributeLabels()
    {
        return array(
            'g_name'         => 'Tell me your name sweety:',
            'g_age'          => 'Your age:',
            'g_hair'         => 'Hair color:',
            'g_height'       => 'Height:',
            'g_weight'       => 'Weight:',
            'g_skype'        => 'Skype:',
            'g_cell_phone'   => 'Cell Phone:',
            'g_description'  => 'Tell me something about yourself:',
            'g_country_code' => 'Your country:',
            'g_city'         => 'Your city:',
        );
    }

    public function tableName()
    {
        return 'girl';
    }
}