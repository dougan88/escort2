<?php

class User extends CActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function rules()
    {
        return array(
//            // verifyCode needs to be entered correctly
//            array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
                array('u_username, u_password, u_email, u_role', 'required'),
                array('u_email', 'email'),
                array('u_username', 'length', 'min' => 2, 'max' => 50),
                array('u_password', 'length', 'min' => 6, 'max' => 50),
				array('u_username, u_email', 'unique'),
				array('u_role', 'in', 'range' => array_keys(Yii::app()->params['userTypes'])),
        );
    }

    public function attributeLabels()
    {
        return array(
			'u_username'     => 'Name: ',
			'u_password'     => 'Password: ',
			'u_email'        => 'E-mail: ',
			'u_role'         => 'Registration type: '
        );
    }

    public function tableName()
    {
        return 'user';
    }
}