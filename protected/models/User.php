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
                array('u_username, u_password, u_email', 'required'),
                array('u_email', 'email'),
                array('u_username', 'length', 'min' => 2, 'max' => 50),
                array('u_password', 'length', 'min' => 6, 'max' => 50),
				array('u_username, u_email', 'unique'),
        );
    }

    public function attributeLabels()
    {
        return array(
			'u_username'     => 'Name: ',
			'u_password'     => 'Password: ',
			'u_email'        => 'E-mail: ',
        );
    }

    public function tableName()
    {
        return 'user';
    }
}